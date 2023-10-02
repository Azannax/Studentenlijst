<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once __DIR__ . '/../vendor/autoload.php';


if (isset($_POST['csv'])) {
    $mysqli = new mysqli("localhost", "root", "root", "studenten");

    if ($mysqli->connect_errno) {
        throw new Exception("Failed to connect to MySQL: " . $mysqli->connect_error);
    }

    $query = $mysqli->prepare("SELECT idStudent, Naam, tussenvoegsel, achternaam, email, nummer FROM studentenlijst");

    if (!$query) {
        throw new Exception("Failed to prepare query: " . $mysqli->error);
    }

    if (!$query->execute()) {
        throw new Exception("Failed to execute query: " . $query->error);
    }

    $result = $query->get_result();
    
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="studentinfo.csv"');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('IdStudent', 'Naam', 'tussenvoegsel', 'achternaam', 'nummer', 'email'));

    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit();
}


?>
</body>
</html>
