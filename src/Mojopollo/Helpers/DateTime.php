<?php namespace Mojopollo\Helpers;

class DateTime implements DateTimeInterface
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
  public function startEndDateRange($startDate, $endDate, $periodDate, $step = '+1 day', $daysOfWeek = null, $daysOfWeekTimeZoneName = null, $dateFormat = 'Y-m-d H:i:s')
  {
    // Date array
    $dates = [];

    // Set current and period date
    $currentDate = strtotime($startDate);
    $periodDate = strtotime($periodDate);

    // Set days of week
    $daysOfWeek = static::daysOfWeek($daysOfWeek);

    // Get difference between current date and end date
    $endDateDifference = strtotime($endDate) - $currentDate;

    // Generate dates
    while ($currentDate <= $periodDate) {

      // If this is a days of the week thing
      if ($daysOfWeek !== null) {

        // For every day of the week specified
        foreach ($daysOfWeek as $dayOfWeek) {

          // If we do not need to convert the days of the week
          if ($daysOfWeekTimeZoneName === null || $daysOfWeekTimeZoneName === 'UTC') {

            // Set day of week start time
            $dayOfWeekStartTime = strtotime("{$dayOfWeek} this week " . date('Y-m-d H:i:s', $currentDate));

          // Otherwise, adjust $dayOfWeekStartTime if we have $daysOfWeekTimeZoneName
          } else {

            // Set day of week start time in this time zone
            $dayOfWeekStartTimeInDifferentTimeZone = strtotime("{$dayOfWeek} this week " . static::setTimeZone(date('Y-m-d H:i:s', $currentDate), $daysOfWeekTimeZoneName));

            // Convert backk to UTC time
            $dayOfWeekStartTime = strtotime(static::convertToUtc(date('Y-m-d H:i:s', $dayOfWeekStartTimeInDifferentTimeZone), $daysOfWeekTimeZoneName));
          }

          // Set day of week end time
          $dayOfWeekEndTime = strtotime(date('Y-m-d H:i:s', $dayOfWeekStartTime + $endDateDifference));

          // Add to our dates array
          $dates[] = [
            'start' => date($dateFormat, $dayOfWeekStartTime),
            'end' => date($dateFormat, $dayOfWeekEndTime),
          ];
        }

      // Its a daily, monthly thing...
      } else {

        // Add to our dates array
        $dates[] = [
          'start' => date($dateFormat, $currentDate),
          'end' => date($dateFormat, $currentDate + $endDateDifference),
        ];
      }

      // Set current date
      $currentDate = strtotime($step, $currentDate);
    }

    // Return all dates generated
    return $dates;
  }

}
