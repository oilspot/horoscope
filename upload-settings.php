<?php
require_once 'connect.php';

// connessione al database
$con = connect();


$updates = "UPDATE horoscopes SET zodiac_id = '1' WHERE sign = 'aries';
UPDATE horoscopes SET zodiac_id = '2' WHERE sign = 'taurus';
UPDATE horoscopes SET zodiac_id = '3' WHERE sign = 'gemini';
UPDATE horoscopes SET zodiac_id = '4' WHERE sign = 'cancer';
UPDATE horoscopes SET zodiac_id = '5' WHERE sign = 'leo';
UPDATE horoscopes SET zodiac_id = '6' WHERE sign = 'virgo';
UPDATE horoscopes SET zodiac_id = '7' WHERE sign = 'libra';
UPDATE horoscopes SET zodiac_id = '8' WHERE sign = 'scorpio';
UPDATE horoscopes SET zodiac_id = '9' WHERE sign = 'sagittarius';
UPDATE horoscopes SET zodiac_id = '10' WHERE sign = 'capricorn';
UPDATE horoscopes SET zodiac_id = '11' WHERE sign = 'aquarius';
UPDATE horoscopes SET zodiac_id = '12' WHERE sign = 'pisces';
";

// disconnessione dal database
$con->close();

?>