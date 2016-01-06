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
   * Test daysOfWeek()
   *
   * @return void
   */
  public function testDaysOfWeek()
  {
    // These values should pass (be an array)
    $shouldPass = [
      'mon,tue,wed,thu,fri,sat,sun',
      'mon,wed,fri',
      'sun,mon',
      'mon',
    ];

    // Test passable
    foreach ($shouldPass as $daysOfWeek) {

      // Execute method
      $result = $this->dateTimeHelper->daysOfWeek($daysOfWeek);

      $this->assertTrue(is_array($result), json_encode([
        'error' => "Expected result is we get back a array",
        'result' => $result,
      ], JSON_UNESCAPED_SLASHES));
    }

    // These values should NOT pass (be a null)
    $shouldNotPass = [
      'mon,tue, wed,thu,fri,sat,sun',
      'mon,wednesday,fri',
      'Mon',
      'M',
      'm',
    ];

    // Test not passable
    foreach ($shouldNotPass as $daysOfWeek) {

      // Execute method
      $result = $this->dateTimeHelper->daysOfWeek($daysOfWeek);

      $this->assertNull($result, json_encode([
        'error' => "Expected result is we get back a null",
        'result' => $result,
      ], JSON_UNESCAPED_SLASHES));
    }
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
    $periodDate = '2015-06-06 12:00:00';
    $step = '+1 day';
    $daysOfWeek = null;
    $dateFormat = 'Y-m-d H:i:s';

    // Execute method
    $result = $this->dateTimeHelper->range($startDate, $endDate, $periodDate, $step, $daysOfWeek, $dateFormat);
    // fwrite(STDERR, print_r($result, true));

    // Expected array
    $expectedResults = [
      [
        'start' => '2015-06-04 08:00:00',
        'end' => '2015-06-04 12:00:00',
      ],
      [
        'start' => '2015-06-05 08:00:00',
        'end' => '2015-06-05 12:00:00',
      ],
      [
        'start' => '2015-06-06 08:00:00',
        'end' => '2015-06-06 12:00:00',
      ],
    ];

    // Check: there should be a total of 12 total records created
    $this->assertEquals($result, $expectedResults);
  }

  /**
   * Test range() with monthly generation
   *
   * @return void
   */
  public function testRangeMonthly()
  {
    // Set parameters
    $startDate = '2015-06-04 08:00:00';
    $endDate = '2015-06-04 12:00:00';
    $periodDate = '2015-09-04 08:00:00';
    $step = '+1 month';
    $daysOfWeek = null;
    $dateFormat = 'Y-m-d H:i:s';

    // Execute method
    $result = $this->dateTimeHelper->range($startDate, $endDate, $periodDate, $step, $daysOfWeek, $dateFormat);
    // fwrite(STDERR, print_r($result, true));

    // Expected array
    $expectedResults = [
      [
        'start' => '2015-06-04 08:00:00',
        'end' => '2015-06-04 12:00:00',
      ],
      [
        'start' => '2015-07-04 08:00:00',
        'end' => '2015-07-04 12:00:00',
      ],
      [
        'start' => '2015-08-04 08:00:00',
        'end' => '2015-08-04 12:00:00',
      ],
      [
        'start' => '2015-09-04 08:00:00',
        'end' => '2015-09-04 12:00:00',
      ],
    ];

    // Check: there should be a total of 12 total records created
    $this->assertEquals($result, $expectedResults);
  }

  /**
   * Test range() with weekly generation
   *
   * @return void
   */
  public function testRangeWeekly()
  {
    // Set parameters
    $startDate = '2015-09-23 10:11:51';
    $endDate = '2015-09-24 02:55:51';
    $periodDate = '2015-09-30 11:59:59';
    $step = '+1 week';
    $daysOfWeek = 'mon,wed,fri';
    $dateFormat = 'Y-m-d H:i:s';

    // Execute method
    $result = $this->dateTimeHelper->range($startDate, $endDate, $periodDate, $step, $daysOfWeek, $dateFormat);
    // fwrite(STDERR, print_r($result, true));

    // Check: there should be a total of 6 total records created
    $this->assertEquals(6, count($result));

    // Expected array
    $expectedResults = [
      [
        'start' => '2015-09-21 10:11:51',
        'end' => '2015-09-22 02:55:51',
      ],
      [
        'start' => '2015-09-23 10:11:51',
        'end' => '2015-09-24 02:55:51',
      ],
      [
        'start' => '2015-09-25 10:11:51',
        'end' => '2015-09-26 02:55:51',
      ],
      [
        'start' => '2015-09-28 10:11:51',
        'end' => '2015-09-29 02:55:51',
      ],
      [
        'start' => '2015-09-30 10:11:51',
        'end' => '2015-10-01 02:55:51',
      ],
      [
        'start' => '2015-10-02 10:11:51',
        'end' => '2015-10-03 02:55:51',
      ],
    ];

    // Check: there should be a total of 12 total records created
    $this->assertEquals($result, $expectedResults);
  }

}
