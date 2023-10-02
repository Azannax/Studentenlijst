<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Dompdf\Dompdf;
use Dompdf\Options;

require_once __DIR__ . '/../vendor/autoload.php';

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$options->set('defaultFont', 'Courier');

$dompdf = new Dompdf($options);

try {
    $mysqli = new mysqli("localhost", "root", "root", "studenten");

    if ($mysqli->connect_errno) {
        throw new Exception("Failed to connect to MySQL: " . $mysqli->connect_error);
    }

    $query = $mysqli->prepare("SELECT idStudent, Naam, tussenvoegsel, achternaam, email, nummer FROM studentenlijst");

    if (!$query) {
        throw new Exception("Failed to prepare query: " . $mysqli->error);
    }

    $query->execute();

    $result = $query->get_result();

    $cardData = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cardData[] = $row;
        }
    } else {
        throw new Exception("No data found in the database.");
    }

    $html = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Studentenlijst PDF</title>
        <style>
            h1 {
                text-align: center;
            }
            .container {
                margin: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #ff3399;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #ff3399;
                color: white;
            }
        </style>
    </head>
    <body>
        <h1>Studentenlijst</h1>
        <div class="container">
            <table>
                <tr><th>Naam</th><th>Nummer</th><th>Mail</th></tr>';

    foreach ($cardData as $row) {
        $fullName = $row["Naam"] . " " . $row["tussenvoegsel"] . " " . $row["achternaam"];
        $html .= "<tr><td>{$fullName}</td><td>{$row['nummer']}</td><td>{$row['email']}</td></tr>";
    }

    $html .= '</table></div></body></html>';

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream();
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

</body>

</html>


//Werkend  \/
/*
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

try {
    $dompdf->loadHtml('hello world');
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream();
} catch (\Exception $e) {
    $e->getMessage();
}
 */


