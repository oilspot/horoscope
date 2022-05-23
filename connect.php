<?php

// credenziali database
function connect() {
    $db = "test";
    $hostname = "localhost:3306";
    $username = "root";
    $password = "";

// gestione della connessione ed eventuale errore
    try {
        $conn = mysqli_connect(
            $hostname, 
            $username, 
            $password, 
            $db
        );
            
        } catch(Exception $e) {
            echo "Error: ";
            var_dump($e);
        }
        return $conn;
    }
