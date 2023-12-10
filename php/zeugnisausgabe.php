<html>
<head>
<title>PHP-Skript f&uuml;r eine Suchmaschine</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/start.css">
</head>
<!--<body style="background-image: url('../bilder/background.jpg');"-->

<body>

    <div id="titel">
		<h1>Dein Abizeugnis</h1>
	</div>

    <nav>
        <a href="../index.html">Abi Zeugnis Speichern</a>
        <a href="../html/AbiSuche.html">Abi Zeugnis Suchen</a>
    </nav>


    <?php
    // defenierung der Variabeln für Datenbank login
        $server = "localhost"; 
        $user = "root"; 
        $pass = "";
        $database = "abizeugnis";
        $table = "schueler";
        $daten = array();
        $errorsql ="1";
	


    
        

        //echo "<b>Versuche Datenbank $database zu Öffnen ...</b>";
        $verbindung = mysqli_connect($server, $user, $pass)
            or die ("Verbindung fehlgeschlagen, Datenbank zur Zeit nicht erreichbar...");
        //echo "<br><b>Verbindung erfolgreich hergestellt.</b><hr>";
        mysqli_select_db ($verbindung, $database);






        //Hier beginnt die Selektion/


            $Name = $_POST["Name"];
            $Nachname = $_POST["Nachname"];
            $Schuljahr = $_POST["Schuljahr"];
            $Klasse = $_POST["Klasse"];

            
            //Der Select Befehl
            $sqlselect = "Select * From schueler where name1 Like '%$Name%' AND Nachname LIKE '%$Nachname%' and Schuljahr LIKE '%$Schuljahr%' AND Klasse LIKE '%$Klasse%' ";
            $sqlquery = mysqli_query($verbindung, $sqlselect);//mysql_query () sendet eine einzelne Abfrage an die Datenbank
            
                        
                if ($sqlquery->num_rows > 0) {

                    while ($row = mysqli_fetch_assoc($sqlquery)) { //gibt dem gesuchten Parameter als Array zurück, ein Array ist Datentyp mit beliebig vielen Werten.
                        $daten[] = $row;
                    }    
                }
                else {
                    echo "Zu Ihrer Eingabe wurde kein Datensatz gefunden.";
                }    
                
    
        
    
        
    ?>

<!-- Ausgabe HTML Tabelle -->

<div>
    <h5><b>Ergebnis:</b></h5>
    <table border="1">

        <?php
        if ($daten > 0){ 
            foreach ($daten as $inhalt) {       //foreach zählt die Elemente und führt jedes dieser Elemente aus.
    
            // Varablen für Unterkurse berechnung und textausgabe ob bestanden oder nicht
            $Unterkurseausgabe ="";


            // abrufen der allgemeine Informationen des Schüler und speichern in Variablen
            $Name= $inhalt['name1'];
            $Nachname= $inhalt['Nachname'];
            $Schuljahr= $inhalt['Schuljahr'];
            $Klasse= $inhalt['Klasse'];
            $SusNr = $inhalt['SuSNr'];
            

            // Abrufen der Notenpunkte aus der Datenbank und speichern in Vareablen
            
            //P1
            $Prüfungsfach1 = $inhalt['Pruefungsfach1'];// $Notenpunktzahl aus Datenbank = &inhalt['Variablenname aus der datenbank txt!!!']
            $P1NoteSe1 = $inhalt['P1NoteSe1'];
            $P1NoteSe2 = $inhalt['P1NoteSe2'];
            $P1NoteSe3 = $inhalt['P1NoteSe3'];
            $P1NoteSe4 = $inhalt['P1NoteSe4'];

            $p1durchschnitt= $P1NoteSe1+$P1NoteSe2+$P1NoteSe3+$P1NoteSe4;
            $P1Durch = $p1durchschnitt/4; //Durchschnitt P1

            //p2
            $Prüfungsfach2 = $inhalt['Pruefungsfach2'];
            $P2NoteSe1 = $inhalt['P2NoteSe1'];
            $P2NoteSe2 = $inhalt['P2NoteSe2'];
            $P2NoteSe3 = $inhalt['P2NoteSe3'];
            $P2NoteSe4 = $inhalt['P2NoteSe4'];

            $p2durchschnitt= $P2NoteSe1+$P2NoteSe2+$P2NoteSe3+$P2NoteSe4;
            $P2Durch = $p2durchschnitt/4; //Durchschnitt P2

            //p3
            $Prüfungsfach3 = $inhalt['Pruefungsfach3'];
            $P3NoteSe1 = $inhalt['P3NoteSe1'];
            $P3NoteSe2 = $inhalt['P3NoteSe2'];
            $P3NoteSe3 = $inhalt['P3NoteSe3'];
            $P3NoteSe4 = $inhalt['P3NoteSe4'];
            
            $p3durchschnitt= $P3NoteSe1+$P3NoteSe2+$P3NoteSe3+$P3NoteSe4;
            $P3Durch = $p3durchschnitt/4; //Durchschnitt P3


            //p4
            $Prüfungsfach4 = $inhalt['Pruefungsfach4'];
            $P4NoteSe1 = $inhalt['P4NoteSe1'];
            $P4NoteSe2 = $inhalt['P4NoteSe2'];
            $P4NoteSe3 = $inhalt['P4NoteSe3'];
            $P4NoteSe4 = $inhalt['P4NoteSe4'];

            $p4durchschnitt= $P4NoteSe1+$P4NoteSe2+$P4NoteSe3+$P4NoteSe4;
            $P4Durch = $p4durchschnitt/4; //Durchschnitt P4
            

            //p5
            $Prüfungsfach5 = $inhalt['Pruefungsfach5'];
            $P5NoteSe1 = $inhalt['P5NoteSe1'];
            $P5NoteSe2 = $inhalt['P5NoteSe2'];
            $P5NoteSe3 = $inhalt['P5NoteSe3'];
            $P5NoteSe4 = $inhalt['P5NoteSe4'];

            $p5durchschnitt= $P5NoteSe1+$P5NoteSe2+$P5NoteSe3+$P5NoteSe4;
            $P5Durch = $p5durchschnitt/4; //Durchschnitt P5
            


            //Fremdsprache
            $Fremdsprache = $inhalt['Fremdsprache'];
            $FremdspracheSe1 = $inhalt['FremdspracheSe1'];
            $FremdspracheSe2 = $inhalt['FremdspracheSe2'];
            $FremdspracheSe3 = $inhalt['FremdspracheSe3'];
            $FremdspracheSe4 = $inhalt['FremdspracheSe4'];

            $Fremddurchschnitt= $FremdspracheSe1+$FremdspracheSe2+$FremdspracheSe3+$FremdspracheSe4;
            $FremdDurch = $Fremddurchschnitt/4; //Durchschnitt Fremdsprache


            //Wahlpflichtkurse:
            $Wahlpflichtkurs = $inhalt['Wahlpflichtkurs'];
            $WahlNoteSe1 = $inhalt['WahlNoteSe1'];
            $WahlNoteSe2 = $inhalt['WahlNoteSe2'];
            $WahlNoteSe3 = $inhalt['WahlNoteSe3'];
            $WahlNoteSe4 = $inhalt['WahlNoteSe4'];

            $Wahldurchschnitt= $WahlNoteSe1+$WahlNoteSe2+$WahlNoteSe3+$WahlNoteSe4;
            $WahlDurch = $Wahldurchschnitt/4; //Durchschnitt Werte und Normen


            //Informationstechnik:
            $InformationNoteSe1 = $inhalt['InformationNoteSe1'];
            $InformationNoteSe2 = $inhalt['InformationNoteSe2'];
            $InformationNoteSe3 = $inhalt['InformationNoteSe3'];
            $InformationNoteSe4 = $inhalt['InformationNoteSe4'];

            $Infodurchschnitt= $InformationNoteSe1+$InformationNoteSe2+$InformationNoteSe3+$InformationNoteSe4;
            $InfoDurch = $Infodurchschnitt/4; //Durchschnitt Informationstechnik


            //Physik:
            $PhysikNoteSe1 = $inhalt['PhysikNoteSe1'];
            $PhysikNoteSe2 = $inhalt['PhysikNoteSe2'];
            $PhysikNoteSe3 = $inhalt['PhysikNoteSe3'];
            $PhysikNoteSe4 = $inhalt['PhysikNoteSe4'];
            
            $Physikdurchschnitt= $PhysikNoteSe1+$PhysikNoteSe2+$PhysikNoteSe3+$PhysikNoteSe4;
            $PhysikDurch = $Physikdurchschnitt/4; //Durchschnitt Physik


            //Sport:
            $SportNoteSe1 = $inhalt['SportNoteSe1'];
            $SportNoteSe2 = $inhalt['SportNoteSe2'];
            $SportNoteSe3 = $inhalt['SportNoteSe3'];
            $SportNoteSe4 = $inhalt['SportNoteSe4'];

            $Sportdurchschnitt= $SportNoteSe1+$SportNoteSe2+$SportNoteSe3+$SportNoteSe4;
            $SportDurch = $Sportdurchschnitt/4; //Durchschnitt Sport

            

            $gesamtDurchschnitt = $P1NoteSe1+$P1NoteSe2+$P1NoteSe3+$P1NoteSe4+ $P2NoteSe1+$P2NoteSe2+$P2NoteSe3+$P2NoteSe4+ $P3NoteSe1+$P3NoteSe2+$P3NoteSe3+$P3NoteSe4+ $P4NoteSe1+$P4NoteSe2+$P4NoteSe3+$P4NoteSe4+ $P5NoteSe1+$P5NoteSe2+$P5NoteSe3+$P5NoteSe4+ $WahlNoteSe1+$WahlNoteSe2+$WahlNoteSe3+$WahlNoteSe4+ $InformationNoteSe1+$InformationNoteSe2+$InformationNoteSe3+$InformationNoteSe4+ $PhysikNoteSe1+$PhysikNoteSe2+$PhysikNoteSe3+$PhysikNoteSe4+ $SportNoteSe1+$SportNoteSe2+$SportNoteSe3+$SportNoteSe4;  
            $GesamtDurch= $gesamtDurchschnitt/40; //GesamtDurchschnitt auß allen eingegbenen Noten und geteilt durch 40 die Anzahl aller eingegebener Zahlen.
    
            
            //Ausgabe der Unterkursanzahl -- Ausgenommen sind die Fächer Informationstechnik, Sprache, Physik da diese nur alternativ nach Profil benotet werden
            $unterkurse = $inhalt['Unterkurse'];
            
            //Textausgabe Abitur bestanden -- nicht bestanden
            if ($unterkurse > 7 || $GesamtDurch<5){
                $Unterkurseausgabe="nicht bestanden";
            }
            else{
                $Unterkurseausgabe="bestanden";
            }

            }
        }
        else {
            echo "Zu Ihrer Eingabe wurde kein Datensatz gefunden.";
        }
        
        mysqli_close ($verbindung);
        ?> 

    </table>


    
    <?php
        //Ausgabe aller Werte + Durchschnitte + Unterkurse + Abitur bestanden ja oder nein

        echo 'Name:  '.$Name;
        echo '<br>';
        echo 'Nachname:  '.$Nachname;
        echo '<br>';
        echo 'Schuljahr:  '.$Schuljahr;
        echo '<br>';
        echo 'Klasse:  '.$Klasse;
        echo '<br>';
        echo 'Schülernummer:  '.$SusNr;
        echo '<br>';
        echo 'Schwerpunkt:  '.$Prüfungsfach1;
        echo '<br><br>';
        

        echo 'P1 Fach:  '.$Prüfungsfach1;
        echo '<br>';
        echo 'Semester 1:  '.$P1NoteSe1;
        echo '<br>';
        echo 'Semester 2:  '.$P1NoteSe2;
        echo '<br>';
        echo 'Semester 3:  '.$P1NoteSe3;
        echo '<br>';
        echo 'Semester 4:  '.$P1NoteSe4;
        echo '<br>';
        echo 'Durchschnitt P1:  '. $P1Durch;
        echo '<br><br>';

        echo 'P2 Fach:  '.$Prüfungsfach2;
        echo '<br>';
        echo 'Semester 1:  '.$P2NoteSe1;
        echo '<br>';
        echo 'Semester 2:  '.$P2NoteSe2;
        echo '<br>';
        echo 'Semester 3:  '.$P2NoteSe3;
        echo '<br>';
        echo 'Semester 4:  '.$P2NoteSe4;
        echo '<br>';
        echo 'Durchschnitt P2:  '. $P2Durch;
        echo '<br><br>';

        echo 'P3 Fach:  '.$Prüfungsfach3;
        echo '<br>';
        echo 'Semester 1:  '.$P3NoteSe1;
        echo '<br>';
        echo 'Semester 2:  '.$P3NoteSe2;
        echo '<br>';
        echo 'Semester 3:  '.$P3NoteSe3;
        echo '<br>';
        echo 'Semester 4:  '.$P3NoteSe4;
        echo '<br>';
        echo 'Durchschnitt P3:  '. $P3Durch;
        echo '<br><br>';

        echo 'P4 Fach:  '.$Prüfungsfach4;
        echo '<br>';
        echo 'Semester 1:  '.$P4NoteSe1;
        echo '<br>';
        echo 'Semester 2:  '.$P4NoteSe2;
        echo '<br>';
        echo 'Semester 3:  '.$P4NoteSe3;
        echo '<br>';
        echo 'Semester 4:  '.$P4NoteSe4;
        echo '<br>';
        echo 'Durchschnitt P4:  '. $P4Durch;
        echo '<br><br>';

        echo 'P5 Fach:  '.$Prüfungsfach5;
        echo '<br>';
        echo 'Semester 1:  '.$P5NoteSe1;
        echo '<br>';
        echo 'Semester 2:  '.$P5NoteSe2;
        echo '<br>';
        echo 'Semester 3:  '.$P5NoteSe3;
        echo '<br>';
        echo 'Semester 4:  '.$P5NoteSe4;
        echo '<br>';
        echo 'Durchschnitt P5:  '. $P5Durch;
        echo '<br><br>';

        echo 'Fremdsprache:  '.$Fremdsprache;
        echo '<br>';
        echo 'Semester 1:  '.$FremdspracheSe1;
        echo '<br>';
        echo 'Semester 2:  '.$FremdspracheSe2;
        echo '<br>';
        echo 'Semester 3:  '.$FremdspracheSe3;
        echo '<br>';
        echo 'Semester 4:  '.$FremdspracheSe4;
        echo '<br>';
        echo 'Durchschnitt Fremdsprache:  '. $FremdDurch;
        echo '<br><br>';

        echo 'Wahlpflichtkurs:  '.$Wahlpflichtkurs;
        echo '<br>';
        echo 'Semester 1:  '.$WahlNoteSe1;
        echo '<br>';
        echo 'Semester 2:  '.$WahlNoteSe2;
        echo '<br>';
        echo 'Semester 3:  '.$WahlNoteSe3;
        echo '<br>';
        echo 'Semester 4:  '.$WahlNoteSe4;
        echo '<br>';
        echo 'Durchschnitt Wahlkurs:  '. $WahlDurch;
        echo '<br><br>';

        echo 'Informationstechnik:';
        echo '<br>';
        echo 'Semester 1:  ',$InformationNoteSe1;
        echo '<br>';
        echo 'Semester 2:  ',$InformationNoteSe2;
        echo '<br>';
        echo 'Semester 3:  ',$InformationNoteSe3;
        echo '<br>';
        echo 'Semester 4:  ',$InformationNoteSe4;
        echo '<br>';
        echo 'Durchschnitt Informationstechnik: '. $InfoDurch;
                
        echo '<br><br>';

        echo 'Physik:';
        echo '<br>';
        echo 'Semester 1:  ',$PhysikNoteSe1;
        echo '<br>';
        echo 'Semester 2:  ',$PhysikNoteSe2;
        echo '<br>';
        echo 'Semester 3:  ',$PhysikNoteSe2;
        echo '<br>';
        echo 'Semester 4:  ',$PhysikNoteSe2;
        echo '<br>';
        echo 'Durchschnitt Physik: '. $PhysikDurch;

        echo '<br><br>';

        echo 'Sport:';
        echo '<br>';
        echo 'Semester 1:  ',$SportNoteSe1;
        echo '<br>';
        echo 'Semester 2:  ',$SportNoteSe2;
        echo '<br>';
        echo 'Semester 3:  ',$SportNoteSe3;
        echo '<br>';
        echo 'Semester 4:  ',$SportNoteSe4;
        echo '<br>';
        echo 'Durchschnitt Sport: '. $SportDurch;
        
        echo '<br><br>';
                
        echo 'Gesamtdurchschnitt:  '.$GesamtDurch;
        
        echo '<br><br>';
        echo 'Die Unterkurse werden bei Physik, Informationstechnik sowie bei der Fremdsprache ignoriert!';
        echo '<br>';
        echo 'Anzahl Unterkurse:  '.$unterkurse;
        echo '<br><br>';
        echo 'Sie haben Ihr Abitur  '.$Unterkurseausgabe;
    ?>

    <footer>
            <h4>Präsentiert von Maxi Bergheim und Maxi Kühnlein</h4>
    </footer>
    
</body>
</html>
