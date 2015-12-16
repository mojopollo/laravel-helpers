<?php namespace Mojopollo\Helpers;

use Illuminate\Support\Str as IlluminateStr;

class Str implements StrInterface
{
  /**
   * Convert a value to camel case.
   *
   * @param  string  $value
   * @return string
   */
  public static function camelCase($value)
  {
    return IlluminateStr::camel($value);
  }

  /**
   * Convert a string to snake case.
   *
   * @param  string  $value
   * @param  string  $delimiter
   * @return string
   */
  public static function snakeCase($value, $delimiter = '_')
  {
    return IlluminateStr::snake($value, $delimiter);
  }

  /**
   * str_replace() for replacing just the first match in a string search
   * logic borrowed from StackOverflow
   *
   * @see http://stackoverflow.com/questions/1252693/using-str-replace-so-that-it-only-acts-on-the-first-match#answer-1252710
   * @param  string $search   The string to search for
   * @param  string $replace  The string to replace with
   * @param  string $subject  The original string to be searched against
   * @return string           Returns modified $subject OR returns original $subject when no match is found
   */
  public static function replaceFirstMatch($search, $replace, $subject)
  {
    // If we have a match
    $pos = strpos($subject, $search);
    if ($pos !== false) {

      // Replace original string
      $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    // Return original or modified string
    return $subject;
  }

  /**
   * Returns a string limited by the word count specified
   * logic borrowed from StackOverflow
   *
   * @see http://stackoverflow.com/questions/79960/how-to-truncate-a-string-in-php-to-the-word-closest-to-a-certain-number-of-chara#answer-10026115
   * @param  string  $str        paragraph to limit by words
   * @param  integer $wordCount  amount to wordCount paragraph to
   * @return string              string with int limitation set
   */
  public static function limitByWords($str, $wordCount = 10)
  {
    // Reads amount of words in paragraph
    $words = preg_split("/[\s]+/", $str, $wordCount + 1);

    // limit paragraph to $wordCount value
    $words = array_slice($words, 0, $wordCount);

    // Return the words back
    return join(' ', $words);
  }

}
