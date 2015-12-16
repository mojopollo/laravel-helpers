<?php namespace Mojopollo\Helpers;

interface DateTimeInterface
{

  /**
   * Generates an array of start and endates for a specified period of time (UTC)
   * based on: date_range by alioygur@gmail.com on SO
   *
   * @see                                    http://stackoverflow.com/questions/4312439/php-return-all-dates-between-two-dates-in-an-array/9225875#9225875
   * @param  string $startDate               example: 2015-06-04 08:00:00
   * @param  string $endDate                 example: ends at 2015-06-04 12:00:00
   * @param  string $periodDate              example: keep generating these dates until 2015-08-01 12:00:00
   * @param  string $step                    example: +2 days in the period, +1 week, +2 week
   * @param  string $daysOfWeek              example: mon,tues,wed,thu,fri,sat,sun      mon,wed,fri
   * @param  string $daysOfWeekTimeZoneName  example: null or anything other than "UTC", for example "America/Los_Angeles", this is so we can convert mon, tues, wed, etc into its correct variation in UTC time
   * @param  string $dateFormat              example: Y-m-d
   * @return array                           Final array with collection of start and end dates
   */
  public function startEndDateRange($startDate, $endDate, $periodDate, $step = '+1 day', $daysOfWeek = null, $daysOfWeekTimeZoneName = null, $dateFormat = 'Y-m-d H:i:s');

}