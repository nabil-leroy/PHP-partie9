<!DOCTYPE html>
<html>
    <head>
        <meta charset=UTF-8" />
        <title>Exercice 8 Partie 9</title>
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
        <h1>Exercice 8  Partie 9</h1>
        <h2> Faire un formulaire avec deux listes déroulantes. La première sert à choisir le mois, et le deuxième permet d'avoir l'année.
            En fonction des choix, afficher un calendrier
        </h2>
        <form action="index.php" method="post">
            <!-- Création de la liste déroulante des mois -->
            <select name="months" id="months">
                <?php
                $array = array(
                    '1' => 'Janvier',
                    '2' => 'Février',
                    '3' => 'Mars',
                    '4' => 'Avril',
                    '5' => 'Mai',
                    '6' => 'Juin',
                    '7' => 'Juillet',
                    '8' => 'Août',
                    '9' => 'Septembre',
                    '10' => 'Octobre',
                    '11' => 'Novembre',
                    '12' => 'Décembre',
                );
                // Variable qui ajoutera l'attribut selected au mois courant
                $selected = '';
                // Pour chaque ligne du tableau $array on stocke la valeur de cette ligne dans $monthName
                foreach ($array as $value => $monthName) {
                    // Si le mois choisi est égal à la valeur du mois, il prend l'attribut selected
                    if ($_POST['months'] == $value) {
                        $selected = ' selected';
                    } // On affiche la ligne avec les bonnes valeurs 
                    ?>
                    <option value="<?= $value; ?>" <?= $selected; ?>><?= $monthName; ?></option>
                    <?php
                    // Remise à zéro de $selected
                    $selected = '';
                }
                ?>
            </select>
            <!-- Création de la liste déroulante des années -->
            <select name="years" id="years">
                <?php
                // Variable qui ajoutera l'attribut selected à l'année courante
                $selected = '';
                // Parcours du tableau
                // Pour $i allant de 1900 à 2020, on ajoute 1 à chaque passage dans la boucle
                for ($year = 1900; $year <= 2020; $year++) {
                    // Si l'année choisie est égale à $i
                    if ($_POST['years'] == $year) {
                        // On ajoute l'attribut selected
                        $selected = ' selected';
                    }
                    // On affiche la ligne 
                    ?>
                    <option value="<?= $year; ?>" <?= $selected; ?>><?= $year; ?></option>
                    <?php
                    // Remise à zéro de $selected
                    $selected = '';
                }
                ?>
            </select>
            <input type="submit" value="Envoyer">
        </form>
        <?php
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        // On stocke les jours de la semaine dans un tableau
        $days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');

        if (isset($_POST['months']) && isset($_POST['years'])) {
            // mktime — Retourne le timestamp UNIX d'une date 
            $firstDay = mktime(0, 0, 0, $_POST['months'], 1, $_POST['years']);
            // On cherche le nombre de jours que contient le mois
            $daysNumber = date('t', $firstDay);
            // On récupère des informations sur le premier jour du mois
            $dateInfos = getdate($firstDay);
            $dayWeek = $dateInfos['wday'] - 1;
            // Pour que le calendrier commence un Lundi
            if ($dayWeek < 0) {
                $dayWeek = 6;
            }
            // On initialise le compteur de jours, en commençant par 1
            $currentDay = 1;
            ?>
            <!--Création du tableau qui fait le calendrier -->
            <table>
                <caption>La date que vous avez choisi est : <?= ucfirst(strftime('%B', $firstDay)) . ' ' . $_POST['years'] ?></caption>
                <tr>
                    <?php
                    // Pour chaque ligne dans le tableau $days on crée une colonne <th> avec la valeur de la ligne
                    foreach ($days as $day) {
                        echo '<th>'
                        ?><?= $day; ?></th><?php
                    }
                    ?>
                </tr>
                <tr>
                    <?php
                    // Si le nombres de jours dans la semaine est supérieur à 0
                    if ($dayWeek > 0) {
                        // On ajoute une colonne qui fera la largeur des jours manquants 
                        ?>
                        <td colspan="<?= $dayWeek; ?>"></td>
                        <?php
                    }
                    // Tant que le compteur de jours est inférieur ou égal au nombre de jours dans le mois
                    while ($currentDay <= $daysNumber) {
                        // Si le jour de le semaine atteint 7 (la ligne atteint 7 colonnes)
                        if ($dayWeek == 7) {
                            // On remet la valeur de $dayWeek à 0
                            $dayWeek = 0;
                            // On ferme puis on ouvre une ligne (<tr>)
                            ?>
                        </tr><tr><?php } // On ajoute une colonne avec le numéro du jour au calendrier 
                        ?>
                        <td><?= $currentDay; ?></td><?php
                        // On ajoute 1 au numéro du jour et au jour de la semaine
                        $currentDay++;
                        $dayWeek++;
                    }
                    // Complète la ligne de la dernière semaine du mois si nécessaire
                    // Si le nombre de jour de la semaine est différent de 7
                    if ($dayWeek != 7) {
                        // On calcule le nombre de jours restants et on stocke ce nombre dans une variable
                        $remainingDays = 7 - $dayWeek;
                        // On ajoute une colonnes qui fait la taille des jours manquants 
                        ?>
                        <td colspan="<?= $remainingDays; ?>"></td><?php
                    }
                }
                ?>
            </tr>
        </table> 
    </body>
</html>