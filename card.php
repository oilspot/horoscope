<?php
require_once 'connect.php';
require_once 'functions.php';

// sezione risultato calcolo del segno zodiacale

echo "<div class='d-flex justify-content-center'>
        <span my-4'>$zodiacSign</span>
      </div>";


// all'invio del form completato, viene stampata a video una card per ciascun record che rispetta i requisiti

if(isset($_POST['btn-calculate'])){
    if (mysqli_num_rows($GLOBALS['zodiac']) > 0) {
    echo "<div class='d-flex row justify-content-center m-0'>";

    while($row = mysqli_fetch_assoc($GLOBALS['zodiac'])) {
        echo "
        
        <div class='card m-3 p-0 col-md-3'>
        <div class='card-header text-right'>" . '<strong>Day</strong>: ' . $row['date']."</div>
            <div class='card-body'>
                <p class='card-text'>" . $row['text']."</p>
            </div>
        </div>";        
    }
    
    echo "</div>";

// gestione dell'errore in caso di database vuoto
    } else {
        echo "<div class='d-flex justify-content-center'><p>Nothing to predict!</p></div>";
    }
}

?>