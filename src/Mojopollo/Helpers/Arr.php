<?php namespace Mojopollo\Helpers;

use Illuminate\Support\Arr as IlluminateArr;
use String;

class Arr implements ArrInterface
{
  /**
   * Get a random element from the array supplied
   *
   * @param  array $array the source array
   * @return mixed        one of the elements of the array
   */
  public function randomElement(Array $array)
  {
    // Get random index
    $index = rand(0, count($array) - 1);

    // Return element
    return $array[$index];
  }

  /**
   * Will camelize all keys found in a array or multi dimensional array
   *
   * @param  array $originalArray   the source
   * @param  string $morphTo        camel | snake
   * @return array                  the final array with the camielize keys
   */
  public function morphArrayKeys($originalArray, $morphTo = 'camel')
  {
    // New array with the morphed keys
    $newArray = [];

    // Iterate through each items
    foreach ($originalArray as $key => $value) {

      // If $value is an array in itself, re-run through this function
      if (is_array($value)) {
        $value = static::morphArrayKeys($value, $morphTo);
      }

      // Set new key
      $newKey = '';
      switch ($morphTo) {

        // Camel case
        case 'camel':
          $newKey = camel_case($key);
        break 1;

        // Snake case
        case 'snake':
          $newKey = snake_case($key);
        break 1;
      }

      // Set array line
      $newArray[$newKey] = $value;
    }

    // Return new array
    return $newArray;
  }

  /**
   * Will cast '123' as int, 'true' as the boolean true, etc
   *
   * @param  array $originalArray the source array
   * @return array                the modified array
   */
  public function castValues(Array $originalArray)
  {
    // Convert booleans and integers
    foreach ($originalArray as $key => $value) {

      // Value casting
      switch (true) {

        // Convert booleans
        case $value === 'true':
          $originalArray[$key] = true;
          break 1;
        case $value === 'false':
          $originalArray[$key] = false;
          break 1;

        // Convert integers
        case is_numeric($value):
          $originalArray[$key] = (int) $value;
          break 1;

        // Convert json
        case is_string($value) && null !== ($jsonToArray = json_decode($value, true)):
          $originalArray[$key] = $jsonToArray;
          break 1;
      }
    }

    // Return modfied array
    return $originalArray;
  }
}
