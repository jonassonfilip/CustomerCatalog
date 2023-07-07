<?php

use benhall14\phpCalendar\Calendar as Calendar;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

require 'vendor/autoload.php';
require(__DIR__ . '/header.php');
require(__DIR__ . '/calendar.php');
require(__DIR__ . '/functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="calendarstyles.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Shippori+Antique&display=swap" rel="stylesheet">

    <title>Kundregister</title>
</head>

<body>
    <div class="monthButtons">
        <button>Föregående månad</button>
        <button>Nästa månad</button>
    </div>
</body>