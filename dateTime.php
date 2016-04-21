<?php
// Format date and time.

// Returns 20.06.2014
function dateFormatted($oldDate) {
    $oldDateTimestamp = strtotime($oldDate);     // The time stamp of our date.
    $newDate = date('d.m.Y', $oldDateTimestamp); // Convert to a new date using the time stamp.
    return $newDate;
}

// Returns 20.06.14 @ 12:31
function dateTimeShort($oldDate) {
    $oldDateTimestamp = strtotime($oldDate);               // The time stamp of our date.
    $newDate = date('d.m.y &#64; H:i', $oldDateTimestamp); // Convert to a new date using the time stamp.
    return $newDate;
}

// Returns 20.06.2014 @ 12:31
function dateTimeMedium($oldDate) {
    $oldDateTimestamp = strtotime($oldDate);               // The time stamp of our date.
    $newDate = date('d.m.Y &#64; H:i', $oldDateTimestamp); // Convert to a new date using the time stamp.
    return $newDate;
}

// Returns 20.06.2014 @ 12:31:48
function dateTimeLong($oldDate) {
    $oldDateTimestamp = strtotime($oldDate);                 // The time stamp of our date.
    $newDate = date('d.m.Y &#64; H:i:s', $oldDateTimestamp); // Convert to a new date using the time stamp.
    return $newDate;
}

// Return the time in milliseconds.
// Often used for start/end time calculations.
function getMicroTime() {
    list($usec, $sec) = explode(' ', microtime());
    return ((float)$usec + (float)$sec);
}

// Returns 12:31:48
function timeFormatted($dateTime) {
    $oldDateTimestamp = strtotime($oldTime);      // The time stamp of our date.
    $newDTime = date('H:i:s', $oldDateTimestamp); // Convert to a new date using the time stamp.
    return $newTime;
}

// Return how many working days there are in each month.
function workingDays($year, $month) {
    $ignore  = array(0,6); // Ignore Sunday (0) and Saturday (6).
    $count   = 0;
    $counter = mktime(0, 0, 0, $month, 1, $year);

    // Loop through the month and tally all the working days.
    while (date("n", $counter) == $month) {
        if (in_array(date("w", $counter), $ignore) == false) {
            $count++;
        }

        $counter = strtotime("+1 day", $counter);
    }

    return $count;
}