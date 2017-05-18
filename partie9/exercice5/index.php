<html>
    <head>
        <meta charset=UTF-8" />
        <title>Exercice 5 Partie 9</title>
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
        <h1>Exercice 5 Partie 9</h1>
        <h2> Afficher le nombre de jour qui sépare la date du jour avec le 16 mai 2016.
        </h2>
        <p>

            <?php
            $datetime1 = date_create('now');
            $datetime2 = date_create('2016-05-16');
            $interval = date_diff($datetime1, $datetime2);
            ?>
            Il y a <?php echo $interval->format('%R%a jours');?> qui sépare les deux dates.
        </p>
    </body>
</html>
