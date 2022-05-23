<?php
require_once 'connect.php';

// all'invio del form
if(isset($_POST["submit"])){

      // connessione al database
      $con = connect();

      $filename=$_FILES["file"]["tmp_name"];  

// se la dimensione del file è maggiore di 0
      if($_FILES["file"]["size"] > 0) {

// il file viene aperto in modalità di sola lettura
      $file = fopen($filename, "r");

// fino a quando il contenuto del file è presente, questo viene memorizzato nella variabile $getData senza limite di caratteri e con | come separatore tra i dati
      while (($getData = fgetcsv($file, null, "|")) !== FALSE)
        {

// la variabile $store contiene la query per la memorizzazione dei dati nelle singole colonne della tabella horoscopes del database
            $store = "INSERT into horoscopes (num,text,date,sign) 
                        VALUES ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."')";

// la variabile $result si connette al database e registra un record nel database
            $result = mysqli_query($con, $store);            
        }

// alert di avviso dell'avvenuto upload e redirect alla index
      if(isset($result)) {
        echo "<script type=\"text/javascript\">
              alert(\"The file has been uploaded!\");
              window.location = \"index.php\"
              </script>";
        }

// chiusura del file aperto in lettura
      fclose($file);  

    }

    // disconnessione dal database
    $con->close();

}

 ?>