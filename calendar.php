<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use benhall14\phpCalendar\Calendar as Calendar;

$calendar = new Calendar;
$calendar->useMondayStartingDate();

$events = array();

$events[] = array(
    'start' => '2023-07-14',
    'end' => '2023-07-14',
    'summary' => 'My Birthday',
    'mask' => true,
    'classes' => ['myclass', 'abc']
);

$events[] = array(
    'start' => '2023-07-25',
    'end' => '2023-07-25',
    'summary' => 'Hej',
    'mask' => true
);

$calendar->addEvents($events);
$calendar->display();
