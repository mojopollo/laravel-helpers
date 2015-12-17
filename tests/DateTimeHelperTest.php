<?php
use Mojopollo\Helpers\DateTimeHelper;

class DateTimeHelperTest extends \PHPUnit_Framework_TestCase
{
  /**
   * DateTimeHelper class object
   *
   * @var DateTimeHelper
   */
  protected $dateTimeHelper;

  /**
   * This will run at the beginning of every test method
   */
  public function setUp()
  {
    // Parent setup
    parent::SetUp();

    // Set string class
    $this->dateTimeHelper = new DateTimeHelper;
  }

  /**
   * This will run at the end of every test method
   */
  public function tearDown()
  {
    // Parent teardown
    parent::tearDown();

    // Unset GoogleApisHelper class
    $this->dateTimeHelper = null;
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
