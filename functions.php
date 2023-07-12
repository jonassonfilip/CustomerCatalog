<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

// Function that handeles the bookings. Connecting to database, making variables out of the content the traveller posts in the form.
function bookings($customerId, $name, $email, $phoneNumber, $date, $startTime, $endTime, $treatments, $totalCost)
{
    $database = connect('/bookings.db');
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['date'], $_POST['start'], $_POST['end'], $_POST['ID'])) {
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $phoneNumber = htmlspecialchars(trim($_POST['phone']));
        $startTime = htmlspecialchars(trim($_POST['start']));
        $endTime = htmlspecialchars(trim($_POST['end']));
        $customerId = $_POST['ID'];
        $price = $_POST['price'];
        // Assigns the function totalCost to the variable with the same name. See further down.
        $totalCost = totalCost($customerId, $treatments, $price);

        $query = 'INSERT INTO bookings (name, email, phone, date, start, end, total_cost) VALUES (:name, :email, :phone, :date, :start, :end, :total_cost)';

        $statement = $database->prepare($query);

        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phoneNumber, PDO::PARAM_STR);
        $statement->bindParam(':date', $date, PDO::PARAM_STR);
        $statement->bindParam(':start', $startTime, PDO::PARAM_STR);
        $statement->bindParam(':end', $endTime, PDO::PARAM_STR);
        $statement->bindParam(':ID', $customerId, PDO::PARAM_INT);
        $statement->bindParam(':treatments', $treatments, PDO::PARAM_STR);
        $statement->bindParam(':total_cost', $totalCost, PDO::PARAM_INT);

        // Creating receipt
        $receiptContent = [
            "Namn: " . $name,
            "E-mail: " . $email,
            "Telefonnummer: " . $phoneNumber,
            "Datum: " . $date,
            "Tid: " . $startTime . ' - ' . $endTime,
            "Behandling: " . $treatments,
            "Kostnad: " . $totalCost
        ];

        $generateReceipt = file_get_contents(__DIR__ . '/confirmation.json');
        $receipt = json_decode($generateReceipt, true);
        array_push($receipt, $receiptContent);
        $json = json_encode($receipt);
        file_put_contents(__DIR__ . '/confirmation.json', $json);
        // Directs the traveller to the receipt
        header('Content-Type: application/json');

        echo "Tack för besöket! Hoppas vi ses snart igen! \n
        Här är ditt kvitto:\n\n" .
            json_encode(end($receipt));

        $statement->execute();
    }
};

// Calculating the total cost of every stay.

function totalCost(int $customerId, string $treatments, int $price)
{
    $database = connect('/bookings.db');
    $stmt = $database->prepare('SELECT price FROM rooms WHERE id = :room_id');
    $stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);
    $stmt->execute();

    $roomCost = $stmt->fetch(PDO::FETCH_ASSOC);
    $roomCost = $roomCost['price'];

    $totalCost = (((strtotime($departureDate) - strtotime($arrivalDate)) / 86400) * $roomCost);
    return $totalCost;
}

/* function occupied(int $room_id, string $arrivalDate, string $departureDate)
{
    if (isValidUuid($transferCode)) {

        $totalCost = totalCost($rooms, $arrivalDate, $departureDate);
        //calls on function that checks if the transfer code and deposit are valid
        $isTransferCodeTrue = checkCode($transferCode, $totalCost);
        $isDepositTrue = deposit($transferCode);
    }
} */

// Function that checks if the transfer code is valid

function checkCode(string $transferCode, int $totalCost): bool
{
    $client = new Client();
    $response = $client->request(
        'POST',
        'https://www.yrgopelago.se/centralbank/transferCode',
        [
            'form_params' => [
                'transferCode' => $transferCode,
                'totalcost' => $totalCost
            ]
        ]

    );
    if ($response->hasHeader('Content-Length')) {
        $transfer_code = json_decode($response->getBody()->getContents());
    }

    if (isset($transfer_code->error)) {

        return false;
    } else {
        return true;
    }
};

// Function that makes the the deposit

function deposit(string $transferCode)
{
    $client = new Client();

    $response = $client->request(
        'POST',
        'https://www.yrgopelago.se/centralbank/deposit',
        [
            'form_params' => [
                'user' => 'Filip',
                'transferCode' => $transferCode
            ]
        ]
    );
    if ($response->hasHeader('Content-Length')) {
        $deposit = json_decode($response->getBody()->getContents());
    }

    if (isset($deposit->error)) {

        return false;
    } else {
        return true;
    }
}
