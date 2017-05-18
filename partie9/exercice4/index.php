<html>
    <head>
        <meta charset=UTF-8" />
        <title>Exercice 4 Partie 9</title>
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <input type="button" value="Exercice 1" onClick="javascript:document.location.href = 'http://partie9/exercice1/'" />
            <input type="button" value="Exercice 2" onClick="javascript:document.location.href = 'http://partie9/exercice2/'" />
            <input type="button" value="Exercice 3" onClick="javascript:document.location.href = 'http://partie9/exercice3/'" />
            <input type="button" value="Exercice 4" onClick="javascript:document.location.href = 'http://partie9/exercice4/'" />
            <input type="button" value="Exercice 5" onClick="javascript:document.location.href = 'http://partie9/exercice5/'" />
            <input type="button" value="Exercice 6" onClick="javascript:document.location.href = 'http://partie9/exercice6/'" />
            <input type="button" value="Exercice 7" onClick="javascript:document.location.href = 'http://partie9/exercice7/'" />
            <input type="button" value="Exercice 8" onClick="javascript:document.location.href = 'http://partie9/exercice8/'" />
            <input type="button" value="TP" onClick="javascript:document.location.href = 'http://partie9/tp/'" />
        </header>
        <h1>Exercice 4  Partie 9</h1>
        <h2> Afficher la date courante en respectant la forme jj/mm/aaaa (ex : 16/05/2016)
        </h2>
        <p>

            <?php
            $date = date_create();
            date_default_timezone_set('Europe/Paris');
// --- La setlocale() fonctionnne pour strftime mais pas pour DateTime->format()
            setlocale(LC_TIME, 'fr_FR.utf8', 'fra'); // OK
// strftime("jourEnLettres jour moisEnLettres annee") de la date courante
            echo "Date du jour : ", strftime("%A %d %B %Y");
            ?>
            <br>
            <?php
            date_timestamp_set($date, 1470142800);
            echo "Autre date : ", date_format($date, 'U = Y-m-d H:i:s') . "\n";
            ?>

        </p>
    </body>
</html>
