<?php
use Mojopollo\Helpers\Arr;

class ArrTest extends \PHPUnit_Framework_TestCase
{
  /**
   * Arr class object
   *
   * @var Arr
   */
  protected $arr;

  /**
   * This will run at the beginning of every test method
   */
  public function setUp()
  {
    // Parent setup
    parent::SetUp();

    // Set Arr class
    $this->arr = new Arr;
  }

  /**
   * This will run at the end of every test method
   */
  public function tearDown()
  {
    // Parent teardown
    parent::tearDown();

    // Unset Arr class
    $this->arr = null;
  }

  /**
   * Test randomElement()
   *
   * @return void
   */
  public function testRandomElement()
  {
    // Set parameters
    $array = [
      'one',
      'two',
      'three',
    ];

    // Execute method
    $result = $this->arr->randomElement($array);

    // Expected result, we get a string back with either of the following values
    $expectedResult = ($result == 'one' || $result == 'two' || $result == 'three');

    // Check result
    $this->assertTrue($expectedResult, $result);
  }

  /**
   * Test morphArrayKeys() with camel case
   *
   * @return void
   */
  public function testMorphArrayKeysWithCamel()
  {
    // Set parameters
    $originalArray = [
      'user' => [
        'first_name' => 'mojo',
        'attributes' => [
          'second_key' => 'second value',
        ],
      ],
    ];
    $morphTo = 'camel';

    // Execute method
    $result = $this->arr->morphArrayKeys($originalArray, $morphTo);

    // Expected result
    $expectedInfo = 'Keys should be camelized to firstName and secondKey, regardless of multi dimensional array level';
    $expectedResult = isset($result['user']['firstName']) && isset($result['user']['attributes']['secondKey']);

    // Check result
    $this->assertTrue($expectedResult, json_encode([
      'expectedInfo' => $expectedInfo,
      'result' => $result,
    ], JSON_UNESCAPED_SLASHES));
  }

  /**
   * Test morphArrayKeys() with snake case
   *
   * @return void
   */
  public function testMorphArrayKeysWithSnake()
  {
    // Set parameters
    $originalArray = [
      'user' => [
        'firstName' => 'mojo',
        'attributes' => [
          'secondKey' => 'second value',
        ],
      ],
    ];
    $morphTo = 'snake';

    // Execute method
    $result = $this->arr->morphArrayKeys($originalArray, $morphTo);

    // Expected result
    $expectedInfo = 'Keys should be snakecased to first_name and second_key, regardless of multi dimensional array level';
    $expectedResult = isset($result['user']['first_name']) && isset($result['user']['attributes']['second_key']);

    // Check result
    $this->assertTrue($expectedResult, json_encode([
      'expectedInfo' => $expectedInfo,
      'result' => $result,
    ], JSON_UNESCAPED_SLASHES));
  }

}
