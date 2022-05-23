<?php
require_once 'header.php';
include 'navbar.php';
?>
<div class="container mt-4">
        <h1>Upload the csv file</h1>
        <p>Fill the database with the daily horoscope datas</p>
        
            <div class="form-group mt-5 justify-content-center">
                <form action="upload.php" method="POST" name="upload-horoscopes" enctype="multipart/form-data" class="form-horizontal justify-content-center">
                    
                    <div class="form-group col-md-4">
                        <input type="file" name="file" id="file" class="input-large" required>
                    </div>
                        
                    <div class="text-center">
                        <button type="submit" id="submit" name="submit" class="btn btn-info m-3 text-light">Import</button>
                    </div>

                </form>
            </div>
    </div>


<?php
require_once 'footer.php';
?>