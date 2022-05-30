<?php
require_once '../connect.php';

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
            $start_dateFormat = "STR_TO_DATE('$getData[2]', '%M %d')";
            $end_dateFormat = "STR_TO_DATE('$getData[3]', '%M %d')";

// la variabile $store contiene la query per la memorizzazione dei dati nelle singole colonne della tabella zodiacs del database
            $store = "INSERT into zodiacs (emoji,name,start_date,end_date) 
                        VALUES ('".$getData[0]."','".$getData[1]."',".$start_dateFormat.",".$end_dateFormat.")";

// la variabile $result si connette al database e registra un record nel database
            $result = mysqli_query($con, $store);            
        }

// alert di avviso dell'avvenuto upload e redirect alla index
      if(isset($result)) {
        echo "<script type=\"text/javascript\">
              alert(\"The file has been uploaded!\");
              window.location = \"service-upload.php\"
              </script>";
        }

// chiusura del file aperto in lettura
      fclose($file);  

    }

    // disconnessione dal database
    $con->close();

}

 ?>

<?php
require_once 'header.php';
include 'navbar.php';
?>
<div class="container mt-4">
        <h1>Upload the csv file</h1>
        <p>Fill the database with the daily horoscope datas</p>
        
            <div class="form-group mt-5 justify-content-center">
                <form method="POST" name="upload-horoscopes" enctype="multipart/form-data" class="form-horizontal justify-content-center">
                    
                    <div class="form-group col-md-4">
                        <input type="file" name="file" id="file" class="input-large" required>
                    </div>
                        
                    <div class="text-center">
                        <button type="submit" id="submit" name="submit" class="btn btn-success m-3 text-light">Import</button>
                    </div>

                </form>
            </div>
    </div>


<?php
require_once 'footer.php';
?>