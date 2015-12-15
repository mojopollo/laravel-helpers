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

    // Set timezone to UTC
    date_default_timezone_set('UTC');

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
   * Temp placeholder
   *
   * @return void
   */
  public function testInitial()
  {
    // Test
    $this->assertTrue(true);
  }

}
