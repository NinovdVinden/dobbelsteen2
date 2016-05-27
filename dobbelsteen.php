<!DOCTYPE html>
<html>
<head>
    <title>Gokken</title>
</head>
<body>
<?php

function create_image($worp){
    $im = @imagecreate(200, 200) or die("Cannot Initialize new GD image stream");
    $background_color = imagecolorallocate($im, 128, 128, 128);   
    $red = imagecolorallocate($im, 0, 0, 255);
    
    if($worp == 2 OR $worp == 4 OR $worp == 5 OR $worp == 6) {
    imagefilledellipse($im, 50, 50, 40, 40, $red); //1
    }
    
    if($worp == 3 OR $worp == 4 OR $worp == 5 OR $worp == 6) {
    imagefilledellipse($im, 150, 50, 40, 40, $red); //2
    }
    
    if($worp == 6) {
    imagefilledellipse($im, 50, 100, 40, 40, $red); //3
    }
    
    if($worp == 1 OR $worp == 3 OR $worp == 5) {
    imagefilledellipse($im, 100, 100, 40, 40, $red); //4
    }
    
    if($worp == 6) {
    imagefilledellipse($im, 150, 100, 40, 40, $red); //5
    }
    
    if($worp == 3 OR $worp == 4 OR $worp == 5 OR $worp == 6) {
    imagefilledellipse($im, 50, 150, 40, 40, $red); //6
    }
    
    if($worp == 2 OR $worp == 4 OR $worp == 5 OR $worp == 6) {
    imagefilledellipse($im, 150, 150, 40, 40, $red); //7
    }
    imagepng($im,$worp . ".png");
    imagedestroy($im);
}

// Hoofdprogramma
for ($i=0; $i<5; $i++)
{
    $worp = rand(1,6);
    create_image($worp, $i);
    print "<img src=".$worp.".png?".date("U").">";
    //de complete worp is nodig in een array tbv score analyse
    //maak de array
    $aWorp[$i] = $worp;
}
//tel de ogen van de worp
    $aScore = analyse($aWorp);//tel de ogen van de worp
    pokerOrNot($aScore);//tell it like it is




function analyse($aWorp){
    $aScore = array (0,0,0,0,0,0,0); //initialiseer de array met alle waarden op 0
    for ($i = 1; $i <=6; $i++){ //outer loop
            for ($j = 0; $j <5; $j++){ //inner loop
        if($aWorp[$j] == $i){
            $aScore[$i]++;
        }}}
    return $aScore; //$aScore is een lokale variabele
        //via de return krijg je de arraY $aScore 'buiten de functie'
}

function pokerOrNot($aScore){
    
    echo "<br>";
    print_r($aScore);
    rsort($aScore);
    
    echo "<hr> <font size = '6'>";
    if ($aScore[0] == 5) {echo "je hebt een poker";}
    if ($aScore[0] == 4) {echo "je hebt een carre";}
    if ($aScore[0] == 3) {
        if ($aScore[1] == 2) {echo "je hebt een full house";}
        else {echo "je hebt een 3 of a kind";}
    }
    if ($aScore[0] == 2) {
        if ($aScore[1] == 2) {echo " je hebt two pairs";}
        else {echo " je hebt one pair";}
    }
    if ($aScore[0] == 1) {echo " je hebt niks";}
    
}


?>

<form action="dobbelsteen.php">
    <input type="submit" value="randomize">
</form>

</body>
</html>