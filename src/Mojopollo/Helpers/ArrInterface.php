<?php namespace Mojopollo\Helpers;

interface ArrInterface
{
  /**
   * Get a random element from the array supplied
   *
   * @param  array $array the source array
   * @return mixed        one of the elements of the array
   */
  public static function randomElement(Array $array);

  /**
   * Will camelize all keys found in a array or multi dimensional array
   *
   * @param  array $originalArray   the source
   * @param  string $morphTo        camel | snake
   * @return array                  the final array with the camielize keys
   */
  public static function morphArrayKeys($originalArray, $morphTo = 'camel');

  /**
   * Will cast '123' as int, 'true' as the boolean true, etc
   *
   * @param  array $originalArray the source array
   * @return array                the modified array
   */
  public static function castValues(Array $originalArray);

  /**
   * Re-orders an array by moving elements to the top of the array based
   * on a pre-defined array stating which elements to move to top of array
   *
   * @param  Array  $originalArray The array thats to be re-ordered
   * @param  Array  $priority      The array that contains which
   * @return Array                 The final re-ordered array
   */
  public static function sortByPriority(Array $originalArray, Array $priority);
}
