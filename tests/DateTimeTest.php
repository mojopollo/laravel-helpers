<?php
use Mojopollo\Helpers\String;

class DateTimeTest extends \PHPUnit_Framework_TestCase
{
  /**
   * DateTime class object
   *
   * @var DateTime
   */
  protected $dateTime;

  /**
   * This will run at the beginning of every test method
   */
  public function setUp()
  {
    // Parent setup
    parent::SetUp();

    // Set string class
    $this->dateTime = new DateTime;
  }

  /**
   * This will run at the end of every test method
   */
  public function tearDown()
  {
    // Parent teardown
    parent::tearDown();

    // Unset GoogleApisHelper class
    $this->dateTime = null;
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
    $result = $this->string->replaceFirstMatch('mojo', 'jojo', $original);

    // Expected modified sentence
    $expected = 'jojo is a pollo and mojo';

    // Test
    $this->assertEquals($result, $expected);
  }

}
