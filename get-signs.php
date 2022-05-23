<?php
require_once 'connect.php';

// connessione al database
$con = connect();

// queries per ogni singolo segno zodiacale per estrapolare i contenuti inerenti dalla tabella horoscopes nel database
    // le colonne selezionate sono text e date, i contenuti esclusivamente quelli del segno zodiacale preposto,
    // ordinati per numero d'inserimento decrescente (questo consente che la visualizzazione sia in ordine cronologico decrescente).

$GLOBALS['getCapricorn'] = mysqli_query($con,"SELECT text, date FROM horoscopes WHERE sign = 'capricorn' ORDER BY num DESC");
$GLOBALS['getAquarius'] = mysqli_query($con,"SELECT text, date FROM horoscopes WHERE sign = 'aquarius' ORDER BY num DESC");
$GLOBALS['getPisces'] = mysqli_query($con,"SELECT text, date FROM horoscopes WHERE sign = 'pisces' ORDER BY num DESC");
$GLOBALS['getAries'] = mysqli_query($con,"SELECT text, date FROM horoscopes WHERE sign = 'aries' ORDER BY num DESC");
$GLOBALS['getTaurus'] = mysqli_query($con,"SELECT text, date FROM horoscopes WHERE sign = 'taurus' ORDER BY num DESC");
$GLOBALS['getGemini'] = mysqli_query($con,"SELECT text, date FROM horoscopes WHERE sign = 'gemini' ORDER BY num DESC");
$GLOBALS['getCancer'] = mysqli_query($con,"SELECT text, date FROM horoscopes WHERE sign = 'cancer' ORDER BY num DESC");
$GLOBALS['getLeo'] = mysqli_query($con,"SELECT text, date FROM horoscopes WHERE sign = 'leo' ORDER BY num DESC");
$GLOBALS['getVirgo'] = mysqli_query($con,"SELECT text, date FROM horoscopes WHERE sign = 'virgo' ORDER BY num DESC");
$GLOBALS['getLibra'] = mysqli_query($con,"SELECT text, date FROM horoscopes WHERE sign = 'libra' ORDER BY num DESC");
$GLOBALS['getScorpio'] = mysqli_query($con,"SELECT text, date FROM horoscopes WHERE sign = 'scorpio' ORDER BY num DESC");
$GLOBALS['getSagittarius'] = mysqli_query($con,"SELECT text, date FROM horoscopes WHERE sign = 'sagittarius' ORDER BY num DESC");

// disconnessione dal database
$con->close();

?>