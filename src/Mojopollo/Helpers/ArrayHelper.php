<?php namespace Mojopollo\Helpers;

use Illuminate\Support\Arr as IlluminateArr;
use Mojopollo\Helpers\StringHelper;

class ArrayHelper implements ArrayHelperInterface
{
  /**
   * Get a random element from the array supplied
   *
   * @param  array $array the source array
   * @return mixed        one of the elements of the array
   */
  public static function random(Array $array)
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
  public static function morphKeys($originalArray, $morphTo = 'camel')
  {
    // New array with the morphed keys
    $newArray = [];

    // Iterate through each items
    foreach ($originalArray as $key => $value) {

      // If $value is an array in itself, re-run through this function
      if (is_array($value)) {
        $value = static::morphKeys($value, $morphTo);
      }

      // Set new key
      $newKey = '';
      switch ($morphTo) {

        // Camel case
        case 'camel':
          $newKey = StringHelper::camelCase($key);
        break 1;

        // Snake case
        case 'snake':
          $newKey = StringHelper::snakeCase($key);
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
  public static function castValues(Array $originalArray)
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

  /**
   * Re-orders an array by moving elements to the top of the array based
   * on a pre-defined array stating which elements to move to top of array
   *
   * @param  array   $originalArray The array thats to be re-ordered
   * @param  array   $priority      The array that contains which
   * @param  boolean $exactMatch    When set to false will match both array keys and values without case sensitivity or type matching
   * @return array                  The final re-ordered array
   */
  public static function sortByPriority(Array $originalArray, Array $priority, $exactMatch = true)
  {
    // The priority array
    $priorityArray = [];

    // For each priority array index
    foreach ($priority as $priorityElement) {

      // Get priority key and valye
      foreach ($priorityElement as $priorityKey => $priorityValue) {

        // Now scan the original array
        foreach ($originalArray as $originalElementKey => $originalElement) {

          // Get original key and valye
          foreach ($originalElement as $originalKey => $originalValue) {

            // Exact match
            // If keys and values match exactly
            if ($exactMatch && $priorityKey === $originalKey && $priorityValue === $originalValue) {

              // Add to priority array
              $priorityArray[] = $originalElement;

              // Unset this element from original array
              unset($originalArray[$originalElementKey]);
            }

            // "Loose" match
            // If keys and values match without taking type into account or case sensitivity
            if ($exactMatch === false && $priorityKey === $originalKey && $priorityValue === $originalValue) {

            }
          }
        }
      }
    }

    // Merge both the priority and original arrays with priority on top
    return array_merge($priorityArray, $originalArray);
  }
}
