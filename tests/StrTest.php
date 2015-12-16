<?php
use Mojopollo\Helpers\Str;

class StrTest extends \PHPUnit_Framework_TestCase
{
  /**
   * String class object
   *
   * @var Str
   */
  protected $str;

  /**
   * This will run at the beginning of every test method
   */
  public function setUp()
  {
    // Parent setup
    parent::SetUp();

    // Set string class
    $this->str = new Str;
  }

  /**
   * This will run at the end of every test method
   */
  public function tearDown()
  {
    // Parent teardown
    parent::tearDown();

    // Unset string class
    $this->str = null;
  }

  /**
   * Test that words camelize
   * @return void
   */
  public function testCamelCase()
  {
    // Original text
    $original = 'mojo_pollo';

    // Convert to camel
    $result = $this->str->camelCase($original);

    // Expected string
    $expected = 'mojoPollo';

    // Test
    $this->assertEquals($result, $expected);
  }

  /**
   * Test that words snakecase
   * @return void
   */
  public function testSnakeCase()
  {
    // Original text
    $original = 'mojoPollo';

    // Convert to camel
    $result = $this->str->snakeCase($original);

    // Expected string
    $expected = 'mojo_pollo';

    // Test
    $this->assertEquals($result, $expected);
  }

  /**
   * Test that only the first match is replaced and not subsequent others
   *
   * @return void
   */
  public function testReplaceFirstMatch()
  {
    // Original sentence
    $original = 'mojo is a pollo and mojo';

    // Replace "mojo" with "jojo"
    $result = $this->str->replaceFirstMatch('mojo', 'jojo', $original);

    // Expected modified sentence
    $expected = 'jojo is a pollo and mojo';

    // Test
    $this->assertEquals($result, $expected);
  }

  /**
   * Test that you can limit a secntence by a specific number of works
   *
   * @return void
   */
  public function testLimitByWords()
  {
    // Original sentence
    $original = 'one two three four five six';

    // Replace "mojo" with "jojo"
    $result = $this->str->limitByWords($original, 3);

    // Expected modified sentence
    $expected = 'one two three';

    // Test
    $this->assertEquals($result, $expected);
  }
}
