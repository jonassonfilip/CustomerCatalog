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

$treatments = [
    "Klippning dam",
    "Klippning herr",
    "Slingor långt, inkl. klippning",
    "Slingor mellan inkl. klippning",
    "Slingor kort inkl. klippning",
    "Färg långt inkl. klippning",
    "Färg mellan inkl. klippning",
    "Färg kort inkl. klippning",
    "Toning långt inkl. klippning",
    "Toning mellan inkl. klippning",
    "Toning kort inkl. klippning",
    "Tvätt och fön",
    "Ögonfransar färg",
    "Ögonbryn färg"
];
$prices = [
    695,
    550,
    2100,
    1900,
    1600,
    2100,
    1900,
    1600,
    1900,
    1700,
    1600,
    450,
    300,
    200
];

$calendar->addEvents($events);
?>
<section class="addEvent">
    <?php
    $calendar->display();
    ?>

    <div id="addBooking">
        <div class="customerForm">
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
        </div>

        <div class="typeOfWork">
            <label for="type_of_work" style="text-decoration-line:underline">Utfört arbete:</label><br>
            <input type="checkbox" name="treatment1" value="1">
            <?php echo $treatments[0]; ?>
            <br>
            <input type="checkbox" name="treatment2" value="2">
            <?php echo $treatments[1]; ?>
            <br>
            <input type="checkbox" name="treatment3" value="3">
            <?php echo $treatments[2]; ?>
            <br>
            <input type="checkbox" name="treatment4" value="4">
            <?php echo $treatments[3]; ?>
            <br>
            <input type="checkbox" name="treatment5" value="5">
            <?php echo $treatments[4]; ?>
            <br>
            <input type="checkbox" name="treatment6" value="6">
            <?php echo $treatments[5]; ?>
            <br>
            <input type="checkbox" name="treatment7" value="7">
            <?php echo $treatments[6]; ?>
            <br>
            <input type="checkbox" name="treatment8" value="8">
            <?php echo $treatments[7]; ?>
            <br>
            <input type="checkbox" name="treatment9" value="9">
            <?php echo $treatments[8]; ?>
            <br>
            <input type="checkbox" name="treatment10" value="10">
            <?php echo $treatments[9]; ?>
            <br>
            <input type="checkbox" name="treatment11" value="11">
            <?php echo $treatments[10]; ?>
            <br>
            <input type="checkbox" name="treatment12" value="12">
            <?php echo $treatments[11]; ?>
            <br>
            <input type="checkbox" name="treatment13" value="13">
            <?php echo $treatments[12]; ?>
            <br>
            <input type="checkbox" name="treatment14" value="14">
            <?php echo $treatments[13]; ?>
            <br><br>
            <input type="submit" name="submit" id="addToCalendar" value="Lägg till i kalender">
            <br>
            <button class="customerRegisterButton">Kundregister</button>
        </div>
        </form>
    </div>
</section>