<?php
require_once 'connect.php';
require_once 'functions.php';
require_once 'header.php';
include 'navbar.php';
?>
    <div class="container mt-4">
        <h1>Get a look into your future</h1>
        <p>Pick your birthdate and check your daily horoscopes.</p>
        
            <div class="form-group mt-5">
                <form method="POST" name="calculate-zodiac" class="row justify-content-center">
                    
                        <label for="birthdate">Birthdate</label>
                        <input type="date" id="birthdate" name="birthdate" required>
                        
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