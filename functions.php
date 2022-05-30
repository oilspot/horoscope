<?php
require_once 'get-signs.php';

// inizializzazione di due variabili globali
  // $zodiacSign identifica il segno zodiacale calcolato
  // $zodiac racchiude la query del segno zodiacale calcolato, permettendo di pubblicarne i contenuti

$zodiac = '';
$zodiacSign = '';


// funzione per il calcolo del segno zodiacale

function calculateZodiacalSign() {

// la variabile $birthdate raccoglie il valore inserito nel date picker del form. Di default il formato della data è yyyy-mm-dd
    $birthdate = $_POST['birthdate'];

// il metodo explode consente di
    $cutBirthdate = explode("-", $birthdate);
    $month = $cutBirthdate[1];
    $day = $cutBirthdate[2];

  // crea un alert in caso di immissione di valori numerici non corretti
    if ( ($month > 12 || $day > 31 ) ) { echo "<script type=\"text/javascript\">alert(\"ERROR: entry a valid input!\"); window.location = \"horoscope.php\"</script>";}
  
  // determina il segno zodiacale in base ai valori inseriti nel form
    if ( ( $month == 12 && $day > 21 ) || ( $month == 1 && $day < 20 ) ) { $GLOBALS['zodiacSign'] = "Capricorn"; }
        elseif ( ( $month == 1 && $day > 19 ) || ( $month == 2 && $day < 19 ) ) { $GLOBALS['zodiacSign'] = "Aquarius"; }
        elseif ( ( $month == 2 && $day > 18 ) || ( $month == 3 && $day < 21 ) ) { $GLOBALS['zodiacSign'] = "Pisces"; }
        elseif ( ( $month == 3 && $day > 20 ) || ( $month == 4 && $day < 20 ) ) { $GLOBALS['zodiacSign'] = "Aries"; }
        elseif ( ( $month == 4 && $day > 19 ) || ( $month == 5 && $day < 21 ) ) { $GLOBALS['zodiacSign'] = "Taurus"; }
        elseif ( ( $month == 5 && $day > 20 ) || ( $month == 6 && $day < 21 ) ) { $GLOBALS['zodiacSign'] = "Gemini"; }
        elseif ( ( $month == 6 && $day > 20 ) || ( $month == 7 && $day < 23 ) ) { $GLOBALS['zodiacSign'] = "Cancer"; }
        elseif ( ( $month == 7 && $day > 22 ) || ( $month == 8 && $day < 23 ) ) { $GLOBALS['zodiacSign'] = "Leo"; }
        elseif ( ( $month == 8 && $day > 22 ) || ( $month == 9 && $day < 23 ) ) { $GLOBALS['zodiacSign'] = "Virgo"; }
        elseif ( ( $month == 9 && $day > 22 ) || ( $month == 10 && $day < 23 ) ) { $GLOBALS['zodiacSign'] = "Libra"; }
        elseif ( ( $month == 10 && $day > 22 ) || ( $month == 11 && $day < 22 ) ) { $GLOBALS['zodiacSign'] = "Scorpio"; }
        elseif ( ( $month == 11 && $day > 21 ) || ( $month == 12 && $day < 22 ) ) { $GLOBALS['zodiacSign'] = "Sagittarius"; }
      }    

// funzione per la selezione degli oroscopi giornalieri dal database

function getHoroscopes() {

  // seleziona la query appropriata per ciasun segno zodiacale
    if (($GLOBALS['zodiacSign'] == "Capricorn")) { $GLOBALS['zodiac'] = $GLOBALS['getCapricorn'];}
        else if (($GLOBALS['zodiacSign'] == "Aquarius")) { $GLOBALS['zodiac'] = $GLOBALS['getAquarius']; }
        else if (($GLOBALS['zodiacSign'] == "Pisces")) { $GLOBALS['zodiac'] = $GLOBALS['getPisces']; }
        else if (($GLOBALS['zodiacSign'] == "Aries")) { $GLOBALS['zodiac'] = $GLOBALS['getAries']; }
        else if (($GLOBALS['zodiacSign'] == "Taurus")) { $GLOBALS['zodiac'] = $GLOBALS['getTaurus']; }
        else if (($GLOBALS['zodiacSign'] == "Gemini")) { $GLOBALS['zodiac'] = $GLOBALS['getGemini']; }
        else if (($GLOBALS['zodiacSign'] == "Cancer")) { $GLOBALS['zodiac'] = $GLOBALS['getCancer']; }
        else if (($GLOBALS['zodiacSign'] == "Leo")) { $GLOBALS['zodiac'] = $GLOBALS['getLeo']; }
        else if (($GLOBALS['zodiacSign'] == "Virgo")) { $GLOBALS['zodiac'] = $GLOBALS['getVirgo']; }
        else if (($GLOBALS['zodiacSign'] == "Libra")) { $GLOBALS['zodiac'] = $GLOBALS['getLibra']; }
        else if (($GLOBALS['zodiacSign'] == "Scorpio")) { $GLOBALS['zodiac'] = $GLOBALS['getScorpio']; }
        else if (($GLOBALS['zodiacSign'] == "Sagittarius")) { $GLOBALS['zodiac'] = $GLOBALS['getSagittarius']; }

    // echo 'Test funzionamento getHoroscopes';

  // restituisce la query appropriata dentro la variabile $zodiac
  return $GLOBALS['zodiac'];
  
}

// al click del bottone del form, invoca la funzione di calcolo del segno zodiacale, e quella della selezione degli oroscopi giornalieri
  
if(isset($_POST['btn-calculate'])) {

  calculateZodiacalSign();
  //echo 'Test', $zodiac;

  getHoroscopes();

  } 
