<?php
require_once 'connect.php';
require_once 'functions.php';
require_once 'header.php';
include 'navbar.php';
?>
    <div class="container mt-4">
        <h1>Get a look into your future</h1>
        <p>Type your birthdate and check your daily horoscopes. <em>Allowed format DD MM YYYY</em></p>
        
            <div class="form-group mt-5">
                <form method="POST" name="calculate-zodiac" class="row justify-content-center">
                    
                        <div class="col-md-3 text-center">
                            <label class="control-label" for="day">Day</label>
                            <input type="number" name="day" id="day" class="form-control" minlength="1" maxlength="2" required>
                        </div>

                        <div class="col-md-3 text-center">
                            <label class="control-label" for="month">Month</label>
                            <input type="number" name="month" id="month" class="form-control" minlength="1" maxlength="2" required>

                        </div>
                        <div class="col-md-3 text-center">
                            <label class="control-label" for="year">Year</label>
                            <input type="number" name="year" id="year" class="form-control" minlength="4" maxlength="4">
                        </div>
                        
                        <div class="text-center">
                            <button name="btn-calculate" id="btn-calculate" class="btn btn-info m-3 text-light">Calculate</button>
                        </div>

                </form>
            </div>
    </div>

<?php 
include 'card.php';          
        
require_once 'footer.php';
?>