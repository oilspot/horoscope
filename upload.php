<?php
require_once 'connect.php';
include 'upload-settings.php';

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

// la variabile $dateFormat contiene la query per formattare correttamente la data durante l'inserimento nel database
            $dateFormat = "STR_TO_DATE('$getData[2]', '%m-%d-%Y')";

// la variabile $store contiene la query per la memorizzazione dei dati nelle singole colonne della tabella horoscopes del database
            $store = "INSERT into horoscopes (num,text,date,sign) 
                        VALUES ('".$getData[0]."','".$getData[1]."',".$dateFormat.",'".$getData[3]."')";

// la variabile $result si connette al database e registra un record nel database
            $result = mysqli_query($con, $store);        
            
        }
        
// una volta memorizzati tutti i record nel database, si aggiunge l'id di ciasun segno zodiacale ai relativi record

        if(isset($result)) {

/* PRIMO TENTATIVO */
/*
            // $x query che seleziona la colonna sign dalla tabella horoscopes
            $x = mysqli_query($con, 'SELECT sign FROM horoscopes');

            //$y è la variabile corrispondente all'id del segno da inserire nella foreign key zodiac_id
            $y = '';

            while ($row = mysqli_fetch_assoc($x)) {

                  if (($x == 'aries')) { $y = 1;}
                  elseif (($x == 'taurus')) { $y = 2;}
                  elseif (($x == 'gemini')) { $y = 3;}
                  elseif (($x == 'cancer')) { $y = 4;}
                  elseif (($x == 'leo')) { $y = 5;}
                  elseif (($x == 'virgo')) { $y = 6;}
                  elseif (($x == 'libra')) { $y = 7;}
                  elseif (($x == 'scorpio')) { $y = 8;}
                  elseif (($x == 'sagittarius')) { $y = 9;}
                  elseif (($x == 'capricorn')) { $y = 10;}
                  elseif (($x == 'aquarius')) { $y = 11;}
                  elseif (($x == 'pisces')) { $y = 12;}

                  // return ($y);
            }
            
            $updates = "UPDATE horoscopes SET zodiac_id = '$y'";

            $update = mysqli_query($con, $updates);

            // risultato non funzionante: i record vengono memorizzati nel database, ma $zodiac_id risulta sempre null.
            // se il return è attivo, non visualizzo nessun errore, $zodiac_id rimane null, $update !issset

            // se il return è disattivato ottengo questo errore:
            // Fatal error: Uncaught mysqli_sql_exception: Cannot add or update a child row: a foreign key constraint fails (`test`.`horoscopes`, CONSTRAINT `fk_horoscopes_zodiacs` FOREIGN KEY (`zodiac_id`) REFERENCES `zodiacs` (`id`)) 
            // in C:\xampp\htdocs\altaformazione\upload.php:65 Stack trace: #0 C:\xampp\htdocs\altaformazione\upload.php(65): mysqli_query(Object(mysqli), 'UPDATE horoscop...') #1 {main} thrown in C:\xampp\htdocs\altaformazione\upload.php on line 65
*/
/* FINE PRIMO TENTATIVO */

/* SECONDO TENTATIVO*/

// la variabile $updates contenente le queries è dichiarata nel file set-updates.php

            $update = mysqli_multi_query($con, $updates);
           
        }

// alert di avviso dell'avvenuto upload e redirect alla index
      if(isset($update)) {
        echo "<script type=\"text/javascript\">
              alert(\"The file has been uploaded!\");
              
              </script>";
        }//window.location = \"index.php\"

// chiusura del file aperto in lettura
      fclose($file);  

    }

    // disconnessione dal database
    $con->close();

}

 ?>