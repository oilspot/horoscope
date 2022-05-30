<?php
require_once 'connect.php';
require_once 'functions.php';
require_once 'get-signs.php';

// connessione al database
$con = connect();

// preparazione di una variabile per determinare la pagina corrente, utile alla paginazione
// NB Paginazione non funzionante

if(isset($_GET['page']) & !empty($_GET['page'])) {
	$currentPage = $_GET['page'];
} else {
	$currentPage = 1;
}

// all'immissione del form per il calcolo del segno zodiazale

if(isset($_POST['btn-calculate'])){
    
    echo "<div class='d-flex row justify-content-center m-0'>";

    // se il numero dei record contenuto è maggiore di 0

    if ($totRecords = mysqli_num_rows($GLOBALS['zodiac']) > 0) {

        // preparazione delle variabili utili per la paginazione dei contenuti per impostare il limite di record mostrati
        // indicare quali sono la prima pagina, l'ultima pagina, la pagina successiva e quella precedente

        $limit = 12;
        $startPage = 1;
        $endPage = ceil($totRecords / $limit);
        $nextPage = $currentPage + 1;
        $previousPage = $currentPage - 1;

        $start = ($currentPage * $limit) - $limit;
    

        // ho rimosso il $limit dalle queries in get-signs.php perché la paginazione non funzionava, e i contenuti visualizzati erano limitati a 12
        // in assoluto, non erano paginati. Non visualizzavo errori a video, e non ho ancora trovato una vera soluzione.


        // ciclo while destinato all'intestazione della sezione: lo scopo è quello di prendere un solo record e utilizzare 
        // il nome del segno, l'emoji, la data di inizio e di fine. Il ciclo viene interrotto dopo la prima esecuzione.

        while ($intro = mysqli_fetch_row($GLOBALS['zodiac'])) {

            $startSign = $intro[4];
            $endSign = $intro[5];
            $formatStartDate = date("M-d", strtotime($startSign));  // formattazione della data di inizio
            $formatEndDate = date("M-d", strtotime($endSign));      // formattazione della data di fine

            echo "<div class='text-center'>
                <span class='my-4'>$intro[3] $intro[2]</span><br>
                <p><strong>$formatStartDate - $formatEndDate</strong></p> 
            </div>";

            break;
        }

        // ciclo while destinato ad ogni singolo record: viene stampata a video una card contenente  prevalentemente il testo e la data
        // di ciascun oroscopo giornaliero

        while($row = mysqli_fetch_assoc($GLOBALS['zodiac'])) {

            $dbDate = $row['date'];
            $formatDate = date("d-m-Y", strtotime($dbDate));

            echo "<div class='card m-3 p-0 col-md-3'>
                        <div class='card-header text-right'>" . $row['emoji'] . '<strong> Day</strong>: ' . $formatDate . "</div>
                            <div class='card-body'>
                                <p class='card-text'>" . $row['text'] . "</p>
                            </div>
                  </div>";         
        }
    echo "</div>";

// gestione dell'errore in caso di database vuoto
    } else {
        echo "<div class='d-flex justify-content-center'><p>Nothing to predict!</p></div>";
    }
    
}

// disconnessione dal database
$con->close();

?>
<!-- 
    Barra di navigazione per la paginazione 
    NB: la pagina horoscope.php?page=1 non mostra nessun contenuto, e così horoscope.php?page=2 e altri numeri successivi.
-->

<?php if(isset($_POST['btn-calculate'])) : ?>
    
        <div class="container mb-3">

            <nav aria-label="Page navigation">
                <ul class="pagination">

                    <?php if($currentPage != $startPage) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $startPage ?>">
                                <span aria-hidden="true">Previous</span>
                            </a>
                        </li>
                    <?php endif ?>

                    <?php if($currentPage >= 2) : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
                    <?php endif ?>

                    <li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>

                    <?php if($currentPage != $endPage) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a>
                    </li>
                    
                    <?php endif ?>
                </ul>
            </nav>
        </div>
<?php endif ?>

