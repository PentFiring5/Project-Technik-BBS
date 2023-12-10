<html>

<head>
<title>PHP-Skript f&uuml;r eine Abizeugnis Suchmaschine</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/start.css">
</head>


<body id="body2">

    <div id="titel">
		<h1>Gespeichert!!!</h1>
	</div>

    <nav>
        <a href="../index.html">Zurück zur Speichern Seite</a>
        <a href="../html/AbiSuche.html">Zurück zur Suchen Seite</a>
    </nav>

    <?php
        $server = "localhost"; $user = "root"; $pass = "";

        $database = "abizeugnis";
        $table = "schueler";
        
	



       // echo "<b>Versuche Datenbank $database zu Öffnen ...</b>";
        $verbindung = mysqli_connect($server, $user, $pass)
            or die ("Verbindung fehlgeschlagen, Datenbank zur Zeit nicht erreichbar...");
        echo "<br><b>Verbindung erfolgreich hergestellt.</b>";
        mysqli_select_db ($verbindung, $database);

        //Wenn Titel existiert, dann abschicken.
      // if (array_key_exists("Titel", $_POST))     {

            $unterkurse = 0;

            
        //Variablen für die Suche      
            // Infos Schüler
            $id="0";   
            $Name = $_POST["Name"];
            $Nachname = $_POST["Nachname"];
            $Schuljahr = $_POST["Schuljahr"];
            $Klasse = $_POST["Klasse"];




            //Prüfungsfächer Selections + Punkte und Unterkurse Anzahl berechnung
            $Prüfungsfach1 = $_POST["Prüfungsfach1"];
            $P1NoteSe1 = $_POST["P1NoteSe1"];
            $P1NoteSe2 = $_POST["P1NoteSe2"];
            $P1NoteSe3 = $_POST["P1NoteSe3"];
            $P1NoteSe4 = $_POST["P1NoteSe4"];

            if ($P1NoteSe1 < 5){
                $unterkurse++;
            }
            if ($P1NoteSe2 < 5){
                $unterkurse++;
            }
            if ($P1NoteSe3 < 5){
                $unterkurse++;
            }
            if ($P1NoteSe4 < 5){
                $unterkurse++;
            }

            $Prüfungsfach2 = $_POST["Prüfungsfach2"];
            $P2NoteSe1 = $_POST["P2NoteSe1"];
            $P2NoteSe2 = $_POST["P2NoteSe2"];
            $P2NoteSe3 = $_POST["P2NoteSe3"];
            $P2NoteSe4 = $_POST["P2NoteSe4"];

            if ($P2NoteSe1 < 5){
                $unterkurse++;
            }
            if ($P2NoteSe2 < 5){
                $unterkurse++;
            }
            if ($P2NoteSe3 < 5){
                $unterkurse++;
            }
            if ($P2NoteSe4 < 5){
                $unterkurse++;
            }

            $Prüfungsfach3 = $_POST["Prüfungsfach3"];
            $P3NoteSe1 = $_POST["P3NoteSe1"];
            $P3NoteSe2 = $_POST["P3NoteSe2"];
            $P3NoteSe3 = $_POST["P3NoteSe3"];
            $P3NoteSe4 = $_POST["P3NoteSe4"];

            if ($P3NoteSe1 < 5){
                $unterkurse++;
            }
            if ($P3NoteSe2 < 5){
                $unterkurse++;
            }
            if ($P3NoteSe3 < 5){
                $unterkurse++;
            }
            if ($P3NoteSe4 < 5){
                $unterkurse++;
            }

            $Prüfungsfach4 = $_POST["Prüfungsfach4"];
            $P4NoteSe1 = $_POST["P4NoteSe1"];
            $P4NoteSe2 = $_POST["P4NoteSe2"];
            $P4NoteSe3 = $_POST["P4NoteSe3"];
            $P4NoteSe4 = $_POST["P4NoteSe4"];

            if ($P4NoteSe1 < 5){
                $unterkurse++;
            }
            if ($P4NoteSe2 < 5){
                $unterkurse++;
            }
            if ($P4NoteSe3 < 5){
                $unterkurse++;
            }
            if ($P4NoteSe4 < 5){
                $unterkurse++;
            }

            $Prüfungsfach5 = $_POST["Prüfungsfach5"];
            $P5NoteSe1 = $_POST["P5NoteSe1"];
            $P5NoteSe2 = $_POST["P5NoteSe2"];
            $P5NoteSe3 = $_POST["P5NoteSe2"];
            $P5NoteSe4 = $_POST["P5NoteSe4"];

            if ($P5NoteSe1 < 5){
                $unterkurse++;
            }
            if ($P5NoteSe2 < 5){
                $unterkurse++;
            }
            if ($P5NoteSe3 < 5){
                $unterkurse++;
            }
            if ($P5NoteSe4 < 5){
                $unterkurse++;
            }




            $Wahlpflichtkurs = $_POST["Wahlpflichtkurs"];
            $WahlNoteSe1 = $_POST["WahlNoteSe1"];
            $WahlNoteSe2 = $_POST["WahlNoteSe2"];
            $WahlNoteSe3 = $_POST["WahlNoteSe3"];
            $WahlNoteSe4 = $_POST["WahlNoteSe4"];

            if ($WahlNoteSe1 < 5){
                $unterkurse++;
            }

            if ($WahlNoteSe2 < 5){
                $unterkurse++;
            }
            
            if ($WahlNoteSe3 < 5){
                $unterkurse++;
            }
            
            if ($WahlNoteSe4 < 5){
                $unterkurse++;
            }
            
            

            $InformationNoteSe1 = $_POST["InformationNoteSe1"];
            $InformationNoteSe2 = $_POST["InformationNoteSe2"];
            $InformationNoteSe3 = $_POST["InformationNoteSe3"];
            $InformationNoteSe4 = $_POST["InformationNoteSe4"];

            if ($InformationNoteSe1 !=""){
                if ($InformationNoteSe1 < 5){
                    $unterkurse++;
                }
            }

            if ($InformationNoteSe2 !=""){
                if ($InformationNoteSe2 < 5){
                    $unterkurse++;
                }
            }
            
            
            if ($InformationNoteSe3 !=""){
                if ($InformationNoteSe3 < 5){
                    $unterkurse++;
                }
            }

            if ($InformationNoteSe4 !=""){
                if ($InformationNoteSe4 < 5){
                    $unterkurse++;
                }
            }


            $PhysikNoteSe1 = $_POST["PhysikNoteSe1"];
            $PhysikNoteSe2 = $_POST["PhysikNoteSe2"];
            $PhysikNoteSe3 = $_POST["PhysikNoteSe3"];
            $PhysikNoteSe4 = $_POST["PhysikNoteSe4"];

            if ($PhysikNoteSe1 !=""){
                if ($PhysikNoteSe1 < 5){
                    $unterkurse++;
                }
            }

            if ($PhysikNoteSe2 !=""){
                if ($PhysikNoteSe2 < 5){
                    $unterkurse++;
                }
            }  
            
            if ($PhysikNoteSe3 !=""){
                if ($PhysikNoteSe3 < 5){
                    $unterkurse++;
                }
            }

            if ($PhysikNoteSe4 !=""){
                if ($PhysikNoteSe4 < 5){
                    $unterkurse++;
                }
            }

            $Fremdsprache = $_POST["Fremdsprache"];
            $FremdspracheSe1 = $_POST["FremdspracheSe1"];
            $FremdspracheSe2 = $_POST["FremdspracheSe2"];
            $FremdspracheSe3 = $_POST["FremdspracheSe3"];
            $FremdspracheSe4 = $_POST["FremdspracheSe4"];
            
            if ($FremdspracheSe1 != ""){
                if ($FremdspracheSe1 < 5){
                    $unterkurse++;
            }
            }

            if ($FremdspracheSe2 != ""){
                if ($FremdspracheSe2 < 5){
                    $unterkurse++;
                }
            }   

            if ($FremdspracheSe3 != ""){
                if ($FremdspracheSe3 < 5){
                    $unterkurse++;
                }
            }

            if ($FremdspracheSe4 != ""){
                if ($FremdspracheSe4 < 5){
                    $unterkurse++;
                }
            }



            $SportNoteSe1 = $_POST["SportNoteSe1"];
            $SportNoteSe2 = $_POST["SportNoteSe2"];
            $SportNoteSe3 = $_POST["SportNoteSe3"];
            $SportNoteSe4 = $_POST["SportNoteSe4"];
            
            
            if ($SportNoteSe1 < 5){
                $unterkurse++;
            }
            
            if ($SportNoteSe2 < 5){
                $unterkurse++;
            }
            
            if ($SportNoteSe3 < 5){
                $unterkurse++;
            }
            
            if ($SportNoteSe4 < 5){
                $unterkurse++;
            }
            
            





            //Eingegebene Daten werden in die Datenbank einsortiert.
            if (!empty($Name)) {

                

                
                    
                $ausgabe = "<br>Vielen Dank für Ihr vertrauen. Ihre Daten wurden erfolgreich gespeichert.";


                
                //Übersenden der Daten in die Datenbank
                $res = "INSERT INTO $table VALUES ('$id','$Name', '$Nachname', '$Schuljahr', '$Klasse',  '$Prüfungsfach1', '$P1NoteSe1','$P1NoteSe2','$P1NoteSe3','$P1NoteSe4',  '$Prüfungsfach2', '$P2NoteSe1','$P2NoteSe2','$P2NoteSe3','$P2NoteSe4',  '$Prüfungsfach3','$P3NoteSe1','$P3NoteSe2','$P3NoteSe3','$P3NoteSe4',  '$Prüfungsfach4','$P4NoteSe1','$P4NoteSe2','$P4NoteSe3','$P4NoteSe4',   '$Prüfungsfach5','$P5NoteSe1','$P5NoteSe2','$P5NoteSe3','$P5NoteSe4',   '$Wahlpflichtkurs','$WahlNoteSe1','$WahlNoteSe2','$WahlNoteSe3','$WahlNoteSe4',   '$InformationNoteSe1','$InformationNoteSe2','$InformationNoteSe3','$InformationNoteSe4',   '$PhysikNoteSe1','$PhysikNoteSe2','$PhysikNoteSe3','$PhysikNoteSe4',   '$Fremdsprache','$FremdspracheSe1','$FremdspracheSe2','$FremdspracheSe3','$FremdspracheSe4',   '$SportNoteSe1','$SportNoteSe2','$SportNoteSe3','$SportNoteSe4','$unterkurse')";
                mysqli_query($verbindung, $res);
                

                //Zur Sicherheit die ganzen Daten abfragen:
                $sql = "SELECT * FROM $table";
                $query = mysqli_query($verbindung, $sql);
                if (!$query) {
                    echo "<i>SQL-Anweisung fehlgeschlagen.</i>";
                }
                    

                //Ausgabe aller eingetragenen Werte nochmal zur bestätigung
                $anz = mysqli_num_rows($query);
                echo "<hr><b>In der Tabelle $table befinden sich $anz Datensätze: </b><br><br>";

                echo "<b>Ihre Eingabe:</b><br><br>";
                echo 'Name:  ',$Name;
                echo '<br><br>';
                echo 'Nachname:  ',$Nachname;
                echo '<br><br>';
                echo 'Schuljahr:  ',$Schuljahr;
                echo '<br><br>';
                echo 'Klasse:  ', $Klasse;
                echo '<br><br>';



                echo '<b></b>Prüfungsfach 1:</b>  ',$Prüfungsfach1;
                echo '<br>';
                echo 'Semester 1:  ',$P1NoteSe1,' Punkte';
                echo '<br>';
                echo 'Semester 2:  ',$P1NoteSe2,' Punkte';
                echo '<br>';
                echo 'Semester 3:  ',$P1NoteSe3,' Punkte';
                echo '<br>';
                echo'Semester 4:  ',$P1NoteSe3,' Punkte';
                
                echo '<br><br>';

                echo 'Prüfungsfach 2:  ',$Prüfungsfach2;
                echo '<br>';
                echo 'Semester 1:  ',$P2NoteSe1,' Punkte';
                echo '<br>';
                echo 'Semester 2:  ',$P2NoteSe2,' Punkte';
                echo '<br>';
                echo 'Semester 3:  ',$P2NoteSe3,' Punkte';
                echo '<br>';
                echo 'Semester 4:  ',$P2NoteSe4,' Punkte';

                echo '<br><br>';

                echo 'Prüfungsfach 3:  ',$Prüfungsfach3;
                echo '<br>';
                echo 'Semester 1:  ',$P3NoteSe1,' Punkte';
                echo '<br>';
                echo 'Semester 2:  ',$P3NoteSe2,' Punkte';
                echo '<br>';
                echo 'Semester 3:  ',$P3NoteSe3,' Punkte';
                echo '<br>';
                echo 'Semester 4:  ',$P3NoteSe4,' Punkte';

                echo '<br><br>';

                echo 'Prüfungsfach 4:  ',$Prüfungsfach4;
                echo '<br>';
                echo 'Semester 1:  ',$P4NoteSe1,' Punkte';
                echo '<br>';
                echo 'Semester 2:  ',$P4NoteSe2,' Punkte';
                echo '<br>';
                echo 'Semester 3:  ',$P4NoteSe3,' Punkte';
                echo '<br>';
                echo 'Semester 4:  ',$P4NoteSe4,' Punkte';
                
                echo '<br><br>';

                echo 'Prüfungsfach 5:  ',$Prüfungsfach5;
                echo '<br>';
                echo 'Semester 1:  ',$P5NoteSe1,' Punkte';
                echo '<br>';
                echo 'Semester 2:  ',$P5NoteSe2,' Punkte';
                echo '<br>';
                echo 'Semester 3:  ',$P5NoteSe3,' Punkte';
                echo '<br>';
                echo 'Semester 4:  ',$P5NoteSe4,' Punkte';
                
                echo '<br><br>';

                echo 'Wahlpflichtkurs: '. $Wahlpflichtkurs;
                echo '<br>';
                echo 'Semester 1:  ', $WahlNoteSe1,' Punkte';
                echo '<br>';
                echo 'Semester 2:  ',$WahlNoteSe2,' Punkte';
                echo '<br>';
                echo 'Semester 3:  ',$WahlNoteSe3,' Punkte';
                echo '<br>';
                echo 'Semester 4:  ',$WahlNoteSe4,' Punkte';

                echo '<br><br>';

                
                echo 'Informationstechnik:';
                echo '<br>';
                echo 'Semester 1:  ',$InformationNoteSe1,' Punkte';
                echo '<br>';
                echo 'Semester 2:  ',$InformationNoteSe2,' Punkte';
                echo '<br>';
                echo 'Semester 3:  ',$InformationNoteSe3,' Punkte';
                echo '<br>';
                echo 'Semester 4:  ',$InformationNoteSe4,' Punkte';
                
                echo '<br><br>';

                echo 'Physik:';
                echo '<br>';
                echo 'Semester 1:  ',$PhysikNoteSe1,' Punkte';
                echo '<br>';
                echo 'Semester 2:  ',$PhysikNoteSe2,' Punkte';
                echo '<br>';
                echo 'Semester 3:  ',$PhysikNoteSe2,' Punkte';
                echo '<br>';
                echo 'Semester 4:  ',$PhysikNoteSe2,' Punkte';

                echo '<br><br>';

                echo 'Sprache:', $Fremdsprache;
                echo '<br>';
                echo 'Semester 1:  ',$FremdspracheSe1,' Punkte';
                echo '<br>';
                echo 'Semester 2:  ',$FremdspracheSe2,' Punkte';
                echo '<br>';
                echo 'Semester 3:  ',$FremdspracheSe3,' Punkte';
                echo '<br>';
                echo 'Semester 4:  ',$FremdspracheSe4,' Punkte';
                
                echo '<br><br>';

                echo 'Sport:';
                echo '<br>';
                echo 'Semester 1:  ',$SportNoteSe1,' Punkte';
                echo '<br>';
                echo 'Semester 2:  ',$SportNoteSe2,' Punkte';
                echo '<br>';
                echo 'Semester 3:  ',$SportNoteSe3,' Punkte';
                echo '<br>';
                echo 'Semester 4:  ',$SportNoteSe4,' Punkte'; 
                
                
                echo "<br><br>";
                
                echo "Anzahl Unterkurse: ".$unterkurse;
                

                echo   "<br><b>Ihr AbiZeugnis wurde erfolgreich zur Datenbank hinzugefügt.<br>Vielen Dank :)</b><br><br>";


            }
            else {
                echo "Die Eingabe ist leer. Es wurde kein Datensatz hinzugefügt";
            }
        
        ?>


        <footer>
			<h4>Präsentiert von Maxi Bergheim und Maxi Kühnlein</h4>
        </footer>


</body>
</html>
