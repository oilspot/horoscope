<?php
require_once 'connect.php';

// connessione al database
$con = connect();


// Tentativo di sintetizzare le 12 queries in un'unica query. La variabile $zodiacSign risulta undefined, se indicata come globale provoca errori di sintassi. Impossibile fare escaping degli apici.

//$GLOBALS['getHoroscopes'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
//                                               FROM horoscopes 
//                                               INNER JOIN zodiacs 
//                                               ON horoscopes.zodiac_id = zodiacs.id 
//                                               where sign = '$zodiacSign' 
//                                               order by date desc;");


// queries per ogni singolo segno zodiacale per estrapolare i contenuti inerenti dalle tabelle horoscopes e zodiacs nel database
    // una join consente di unire i record utili delle due tabelle, tramite l'ausilio dello zodiac_id (foreign key in horoscopes)
    // ordinati data decrescente.

$GLOBALS['getCapricorn'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
                                            FROM horoscopes 
                                            INNER JOIN zodiacs 
                                            ON horoscopes.zodiac_id = zodiacs.id 
                                            where sign = 'capricorn' 
                                            order by date desc");


$GLOBALS['getAquarius'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
                                            FROM horoscopes 
                                            INNER JOIN zodiacs 
                                            ON horoscopes.zodiac_id = zodiacs.id 
                                            where sign = 'aquarius' 
                                            order by date desc");


$GLOBALS['getPisces'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
                                            FROM horoscopes 
                                            INNER JOIN zodiacs 
                                            ON horoscopes.zodiac_id = zodiacs.id 
                                            where sign = 'pisces' 
                                            order by date desc");


$GLOBALS['getAries'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
                                            FROM horoscopes 
                                            INNER JOIN zodiacs 
                                            ON horoscopes.zodiac_id = zodiacs.id 
                                            where sign = 'aries' 
                                            order by date desc");

$GLOBALS['getTaurus'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
                                            FROM horoscopes 
                                            INNER JOIN zodiacs 
                                            ON horoscopes.zodiac_id = zodiacs.id 
                                            where sign = 'taurus'
                                            order by date desc");


$GLOBALS['getGemini'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
                                            FROM horoscopes 
                                            INNER JOIN zodiacs 
                                            ON horoscopes.zodiac_id = zodiacs.id 
                                            where sign = 'gemini' 
                                            order by date desc");

$GLOBALS['getCancer'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
                                            FROM horoscopes 
                                            INNER JOIN zodiacs 
                                            ON horoscopes.zodiac_id = zodiacs.id 
                                            where sign = 'cancer' 
                                            order by date desc");


$GLOBALS['getLeo'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
                                            FROM horoscopes 
                                            INNER JOIN zodiacs 
                                            ON horoscopes.zodiac_id = zodiacs.id 
                                            where sign = 'leo' 
                                            order by date desc");

$GLOBALS['getVirgo'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
                                            FROM horoscopes 
                                            INNER JOIN zodiacs 
                                            ON horoscopes.zodiac_id = zodiacs.id 
                                            where sign = 'virgo' 
                                            order by date desc");

$GLOBALS['getLibra'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
                                            FROM horoscopes 
                                            INNER JOIN zodiacs 
                                            ON horoscopes.zodiac_id = zodiacs.id 
                                            where sign = 'libra' 
                                            order by date desc");


$GLOBALS['getScorpio'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
                                            FROM horoscopes 
                                            INNER JOIN zodiacs 
                                            ON horoscopes.zodiac_id = zodiacs.id 
                                            where sign = 'scorpio' 
                                            order by date desc");


$GLOBALS['getSagittarius'] = mysqli_query($con,"SELECT horoscopes.text, horoscopes.date, zodiacs.emoji, zodiacs.name, zodiacs.start_date, zodiacs.end_date 
                                            FROM horoscopes 
                                            INNER JOIN zodiacs 
                                            ON horoscopes.zodiac_id = zodiacs.id 
                                            where sign = 'sagittarius' 
                                            order by date desc");


// disconnessione dal database
$con->close();

?>