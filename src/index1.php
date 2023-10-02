<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

$mysqli = new mysqli("localhost", "root", "root", "studenten");

$query = $mysqli->prepare("SELECT idstudent, Naam, tussenvoegsel, achternaam, email, nummer FROM studentenlijst");

$query->execute();

$result = $query->get_result();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../style/style.css">
    
</head>
<body>

<div class="topnav">
    <button id="sorteerButtonAZ">Sorteer (A-Z)</button>
    <button id="sorteerButtonZA">Sorteer (Z-A)</button>
    <input type="text" placeholder="zoek..">
    <button type="submit">Zoek</button>
    <button id="pdf"><a href="pdf.php" id="studentenlijst">Download als pdf</a></button>
    <form method="POST" action="csv.php"><button id="csv" name="csv"><p id="studentenlijst">Download als csv</p></button></form>
</div>

<div class="studenten-blokken">
        <?php
        //studenten op het scherm tonen
        while ($row = $result->fetch_assoc()) {
            $naam = $row['Naam'];
            $tussenvoegsel = $row['tussenvoegsel']; 
            $achternaam = $row['achternaam'];
            $nummer = $row['nummer'];
            $email = $row['email'];
        
            echo "<div class='student-blok' 
                        data-student-name='$naam'
                        data-student-email='$email'
                        data-student-nummer='$nummer'>
                    <div class='voornaam'>$naam</div>
                    <div class='tussenvoegsel'>$tussenvoegsel</div>
                    <div class='achternaam'>$achternaam</div>
                </div>";
        }
        ?>
</div>

 <!-- popup container -->
 <div class="popup" id="popup">
        <h2>Student Details</h2>
        <div id="popupContent">
            <p><strong>Naam:</strong> <span id="studentName"></span></p>
            <p><strong>Email:</strong> <a id="studentEmail" href="Mailer.php"></a></p>
            <p><strong>Nummer:</strong> <span id="studentNumber"></span></p>
        </div>
        <button onclick="closePopup()">Close</button>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const sorteerButtonAZ = document.getElementById("sorteerButtonAZ");
    const sorteerButtonZA = document.getElementById("sorteerButtonZA");
    const studentenBlokken = document.querySelector(".studenten-blokken");
    const zoekButton = document.querySelector("button[type='submit']");
    const zoekInput = document.querySelector("input[type='text']");

    function sorteerStudenten(omgekeerd) {
        // Haal alle studenten-blokken op
        const studentBlokken = document.querySelectorAll(".student-blok");

    
        const studentArray = Array.from(studentBlokken);

        // Sorteer de studenten op basis van achternaam
        studentArray.sort(function (a, b) {
            const achternaamA = a.querySelector(".achternaam").textContent;
            const achternaamB = b.querySelector(".achternaam").textContent;
            if (omgekeerd) {
                return achternaamB.localeCompare(achternaamA);
            } else {
                return achternaamA.localeCompare(achternaamB);
            }
        });

        

        // Voeg gesorteerde studenten-blokken toe
        studentArray.forEach(function (student) {
            studentenBlokken.appendChild(student);
        });
    }

    sorteerButtonAZ.addEventListener("click", function () {
        sorteerStudenten(false);
    });

    sorteerButtonZA.addEventListener("click", function () {
        sorteerStudenten(true);
    });

    // Het zoeken van studenten
    zoekButton.addEventListener("click", function () {
        const zoekTerm = zoekInput.value.trim().toLowerCase();
        const studentBlokken = document.querySelectorAll(".student-blok");

        studentBlokken.forEach(function (student) {
            const voornaam = student.querySelector(".voornaam").textContent.toLowerCase();
            if (voornaam === zoekTerm) {
                student.style.backgroundColor = "#ff3399";
                student.scrollIntoView({ behavior: "smooth" });
            } else {
                student.style.backgroundColor = "white";
            }
        });
    });
});


 // de popup script
 const studentBlocks = document.querySelectorAll('.student-blok');
        const popup = document.getElementById('popup');
        const studentNameSpan = document.getElementById('studentName');
        const studentEmailSpan = document.getElementById('studentEmail');
        const studentNumberSpan = document.getElementById('studentNumber');

        studentBlocks.forEach(studentBlock => {
            studentBlock.addEventListener('click', () => {
                const studentName = studentBlock.getAttribute('data-student-name');
                const studentEmail = studentBlock.getAttribute('data-student-email');
                const studentNumber = studentBlock.getAttribute('data-student-nummer');

                studentNameSpan.textContent = studentName;
                studentEmailSpan.textContent = studentEmail;
                studentNumberSpan.textContent = studentNumber;

                popup.style.display = 'block';
            });
        });

        function closePopup() {
            popup.style.display = 'none';
        }
        
</script>

</body>
</html>