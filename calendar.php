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
?>
<div class="addEvent">
    <?php
    $calendar->display();
    ?>

    <section id="bookingForm">
        <form action="bookings.php" method="post">
            <div>
                <label for="name">Namn:</label><br>
                <input type="text" name="name">
            </div>

            <div>
                <label for="email">E-mail:</label><br>
                <input type="text" name="email">
            </div>

            <div>
                <label for="telephone">Telefonnummer:</label><br>
                <input type="tel" name="telephone" min="9" max="10">
            </div>

            <div>
                <label for="date">Datum:</label><br>
                <input type="date" name="date"><br>
            </div>

            <div>
                <label for="start_time">Från:</label><br>
                <input type="time" name="start_time"><br>
            </div>

            <div>
                <label for="end_time">Till:</label><br>
                <input type="time" name="end_time"><br>
            </div>
            <br>

            <div>
                <label for="type_of_work">Utfört arbete:</label> <br>
                <input type="checkbox" name="treatment1" value="1">Klippning dam
                <br>
                <input type="checkbox" name="treatment2" value="2">Klippning herr
                <br>
                <input type="checkbox" name="treatment3" value="3">Slingor
                <br>
                <input type="checkbox" name="treatment4" value="4">Toning
                <br>
                <input type="checkbox" name="treatment5" value="5">Tvätta hår
                <br><br>
                <input type="submit" name="submit" value="Lägg till i kalender">
            </div>
        </form>
    </section>
</div>