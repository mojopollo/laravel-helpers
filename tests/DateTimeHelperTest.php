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
   * Test range() with daily generation
   *
   * @return void
   */
  public function testRangeDaily()
  {
    // Set parameters
    $startDate = '2015-06-04 08:00:00';
    $endDate = '2015-06-04 12:00:00';
    $periodDate = '2015-06-15 12:00:00';
    $step = '+1 day';
    $daysOfWeek = null;
    $daysOfWeekTimeZoneName = null;
    $dateFormat = 'Y-m-d H:i:s';

    // Execute method
    $result = $this->dateTimeHelper->range($startDate, $endDate, $periodDate, $step, $daysOfWeek, $daysOfWeekTimeZoneName, $dateFormat);

    // Check: there should be a total of 12 total records created
    $this->assertEquals(12, count($result));
  }

}
