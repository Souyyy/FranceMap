<?php
// Si le format == JSON et que si depart et arrivé ne sont pas vide on execute le fichier apiJSON.py avec deux variable (départ,arrivé) aussinon on affiche une erreur
if ($_GET['format'] == 'JSON') {
    if ($_GET['depart'] != '' && $_GET['arrive'] != '') {
        $variable1    = ucfirst(strtolower(strtoupper($_GET['depart'])));
        $variable2    = ucfirst(strtolower(strtoupper($_GET['arrive'])));
        $resultatJson = exec("python3 ./apiJSON.py 2>&1 $variable1 $variable2");
        header('Content-Type: application/json');
        $myJSON = json_encode($resultatJson);
        echo $myJSON;
    } else {
        echo ("Il manque quelque chose :/");
    }
// Si le format == XML et que si depart et arrivé ne sont pas vide on execute le fichier apiXML.py avec deux variable (départ,arrivé) aussinon on affiche une erreur
} elseif ($_GET['format'] == 'XML') {
    if ($_GET['depart'] != '' && $_GET['arrive'] != '') {
        $variable1 = ucfirst(strtolower(strtoupper($_GET['depart'])));
        $variable2 = ucfirst(strtolower(strtoupper($_GET['arrive'])));

        $resultatXML = exec("python3 ./apiXML.py 2>&1 $variable1 $variable2");
        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="UTF-8"?' . ">\n";
        echo '<VilleProche>';
        echo $resultatXML;
        echo '</VilleProche>';
    } else {
        echo ("Il manque quelque chose :/");
    }

// Si le format == a tout autre chose on affiche une erreur
} else {
    echo ("Une erreur est survenue.");
}


?>
