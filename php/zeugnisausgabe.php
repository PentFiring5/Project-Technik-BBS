<html>
<head>
<title>PHP-Skript f&uuml;r eine Suchmaschine</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/ZeugnisAudsgabe.css">
</head>
<body style="background-image: url('../bilder/background.jpg');">



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


            //Bei dieser Schleife wird geprüft ob bei der Serch html was eingegeben wurde wenn nichts bei allen 4 feldern 
            //steht wird eine andere Seite ausgegeben die sagt das man parameter für die suche eingrbrn musss
            
            if (($Name=="") && ($Nachname =="") && ($Schuljahr =="") && ($Klasse =="")){
                echo '<meta http-equiv="refresh" content="0; URL=../html/NoSearchParameters.html">';
            }
            else{
            //Der Select Befehl
                $sqlselect = "Select * From schueler where name1 Like '%$Name%' AND Nachname LIKE '%$Nachname%' and Schuljahr LIKE '%$Schuljahr%' AND Klasse LIKE '%$Klasse%' ";
                $sqlquery = mysqli_query($verbindung, $sqlselect);//mysql_query () sendet eine einzelne Abfrage an die Datenbank
            
                        
                    if ($sqlquery->num_rows > 0) {

                        while ($row = mysqli_fetch_assoc($sqlquery)) { //gibt dem gesuchten Parameter als Array zurück, ein Array ist Datentyp mit beliebig vielen Werten.
                            $daten[] = $row;
                        }    
                    }
                    else {
                        //weiterleitung auf eine andere seite dei darstellt das es keinen Eintrag giebt
                        echo '<meta http-equiv="refresh" content="0; URL=../html/NoEntry.html">';
                        //echo "Zu Ihrer Eingabe wurde kein Datensatz gefunden.";
                    }    
            }    
    
        
    
        
    ?>

<!--Ausgabe HTML Tabelle-->


<div>

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

            
            if ($Wahlpflichtkurs==""){
                $Wahlpflichtkurs = "Wahlpflichtkurs";
            }


            //Berechnung Gesammtdurchschnittes aus allen semestern zusammen
            $gesamtDurchschnitt = $P1NoteSe1+$P1NoteSe2+$P1NoteSe3+$P1NoteSe4+ $P2NoteSe1+$P2NoteSe2+$P2NoteSe3+$P2NoteSe4+ $P3NoteSe1+$P3NoteSe2+$P3NoteSe3+$P3NoteSe4+ $P4NoteSe1+$P4NoteSe2+$P4NoteSe3+$P4NoteSe4+ $P5NoteSe1+$P5NoteSe2+$P5NoteSe3+$P5NoteSe4+ $WahlNoteSe1+$WahlNoteSe2+$WahlNoteSe3+$WahlNoteSe4+ $InformationNoteSe1+$InformationNoteSe2+$InformationNoteSe3+$InformationNoteSe4+ $PhysikNoteSe1+$PhysikNoteSe2+$PhysikNoteSe3+$PhysikNoteSe4+ $SportNoteSe1+$SportNoteSe2+$SportNoteSe3+$SportNoteSe4;  
            $GesamtDurch= $gesamtDurchschnitt/40; //GesamtDurchschnitt auß allen eingegbenen Noten und geteilt durch 40 die Anzahl aller eingegebener Zahlen.
            




            //Berechnung des Gesamt Durchschnittes für jedes Semester im einzelnen
            $gesamtDurchschnittSe1 = $P1NoteSe1+$P2NoteSe1+$P3NoteSe1+$P4NoteSe1+$P5NoteSe1+$WahlNoteSe1+$InformationNoteSe1+$PhysikNoteSe1+$SportNoteSe1;
            $GesamtDurchSe1= $gesamtDurchschnittSe1/9;

            $gesamtDurchschnittSe2 = $P1NoteSe2+$P2NoteSe2+$P3NoteSe2+$P4NoteSe2+$P5NoteSe2+$WahlNoteSe2+$InformationNoteSe2+$PhysikNoteSe2+$SportNoteSe2;
            $GesamtDurchSe2= $gesamtDurchschnittSe2/9;

            $gesamtDurchschnittSe3 = $P1NoteSe3+$P2NoteSe3+$P3NoteSe3+$P4NoteSe3+$P5NoteSe3+$WahlNoteSe3+$InformationNoteSe3+$PhysikNoteSe3+$SportNoteSe3;
            $GesamtDurchSe3= $gesamtDurchschnittSe3/9;

            $gesamtDurchschnittSe4 = $P1NoteSe4+$P2NoteSe4+$P3NoteSe4+$P4NoteSe4+$P5NoteSe4+$WahlNoteSe4+$InformationNoteSe4+$PhysikNoteSe4+$SportNoteSe4;
            $GesamtDurchSe4= $gesamtDurchschnittSe4/9;





            
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
            
            echo '<meta http-equiv="refresh" content="0; URL=../html/NoEntry.html">';
        }
        
        mysqli_close ($verbindung);
        ?> 

    </table>


    
    <?php
        //Ausgabe aller Werte + Durchschnitte + Unterkurse + Abitur bestanden ja oder nein zur Kontrolle

        /*
        .$Name;
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
        */
    ?>

<!--Abiturzeugnis Ausgabe, alle Noten die hier angezeigt werden sind der berechnete durchschnitt aus allen 4 Semestern zusammen-->
    <div class="container">
    <div class="title">
        <h2><u>Abi Zeugnis</u></h2>
    </div>
    <div class="details-clearfix">
        <div class="student-details">
            <strong>Name: </strong><?php echo $Name;?><br>
            <strong>Nachname: </strong><?php echo $Nachname;?><br>
			<strong>Klasse:  </strong><?php echo $Klasse;?><br>
        </div>
        <div class="certificate-details">
            <strong>Schüler-ID:  </strong><?php echo $SusNr;?><br>
            <strong>Schwerpunkt: </strong><?php echo $Prüfungsfach1;?><br>
			<strong>Schuljahr: </strong><?php echo $Schuljahr;?><br>
        </div>
    </div>

    <hr>
    <h2>Noten</h2>

    <table>
        <thead>
            <tr>
                <th></th>
                <th>Fach</th>
                <th>Punkte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>P1:</th>
                <td><?php echo $Prüfungsfach1;?></td><!--FAch-->
                <td><?php echo $P1Durch;?></td><!--Punkte-->
            </tr>
            <tr>
                <th>P2:</th>
                <td><?php echo $Prüfungsfach2;?></td>
                <td><?php echo $P2Durch;?></td>
            </tr>
            <tr>
                <th>P3:</th>
                <td><?php echo $Prüfungsfach3;?></td>
                <td><?php echo $P3Durch;?></td>
            </tr>
            <tr>
                <th>P4:</th>
                <td><?php echo $Prüfungsfach4;?></td>
                <td><?php echo $P4Durch;?></td>
            </tr>
            <tr>
                <th>P5:</th>
                <td><?php echo $Prüfungsfach5;?></td>
                <td><?php echo $P5Durch;?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <th>Fach</th>
                <th>Punkte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $Fremdsprache;?></td>
                <td><?php echo $FremdDurch;?></td><!--FAch-->
            </tr>
            <tr>
                <td><?php echo $Wahlpflichtkurs;?></td>
                <td><?php echo $WahlDurch;?></td>

            </tr>
            <tr>
                <td>Informationstechnik:</td>
                <td><?php echo $InfoDurch;?></td>
 
            </tr>
            <tr>
                <td>Sport:</td>
                <td><?php echo $SportDurch;?></td>

            </tr>
            <tr>
                <td>Physik:</td>
                <td><?php echo $PhysikDurch;?></td>

            </tr>
        </tbody>
    </table>

    <br>

    <table>
        <thead>
            <tr>
                <th>Gesamt Durchschnitt:</th>
                <td><?php echo $GesamtDurch;?></td>
            </tr>
        </thead>
        </tbody>
    </table>

    <br>

    <table>
        <thead>
            <tr>
                <th>Anzahl Unterkurse:</th>
                <td><?php echo $unterkurse;?></td>
            </tr>
        </thead>
        </tbody>
    </table>

    <h3><?php echo 'Sie haben Ihr Abitur '.$Unterkurseausgabe;?></h3>



    <div class="footer">
        <img src="../bilder/Notentabelle.png" widht="200" height="70" alt="bbslogo2">
    </div>
</div>




<br>




<!--Zeugnisausgabe Semester 1-->
<div class="container">
    <div class="title">
        <h2><u>1 Semester</u></h2>
    </div>
    <div class="details-clearfix">
        <div class="student-details">
            <strong>Name: </strong><?php echo $Name;?><br>
            <strong>Nachname: </strong><?php echo $Nachname;?><br>
			<strong>Klasse: </strong><?php echo $Klasse;?><br>
        </div>
        <div class="certificate-details">
            <strong>Schüler-ID: </strong><?php echo $SusNr;?><br>
            <strong>Schwerpunkt: </strong><?php echo $Prüfungsfach1;?><br>
			<strong>Schuljahr: </strong><?php echo $Schuljahr;?><br>
        </div>
    </div>
    
    <hr>
    <h2>Noten</h2>

    <table>
        <thead>
            <tr>
                <th></th>
                <th>Fach</th>
                <th>Punkte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>P1:</th>
                <td><?php echo $Prüfungsfach1;?></td><!--FAch-->
                <td><?php echo $P1NoteSe1;?></td><!--Punkte-->
            </tr>
            <tr>
                <th>P2:</th>
                <td><?php echo $Prüfungsfach2;?></td>
                <td><?php echo $P2NoteSe1;?></td>
            </tr>
            <tr>
                <th>P3:</th>
                <td><?php echo $Prüfungsfach3;?></td>
                <td><?php echo $P3NoteSe1;?></td>
            </tr>
            <tr>
                <th>P4:</th>
                <td><?php echo $Prüfungsfach4;?></td>
                <td><?php echo $P4NoteSe1;?></td>
            </tr>
            <tr>
                <th>P5:</th>
                <td><?php echo $Prüfungsfach5;?></td>
                <td><?php echo $P5NoteSe1;?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <th>Fach</th>
                <th>Punkte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $Fremdsprache;?></td>
                <td><?php echo $FremdspracheSe1;?></td><!--FAch-->
            </tr>
            <tr>
                <td><?php echo $Wahlpflichtkurs;?></td>
                <td><?php echo $WahlNoteSe1;?></td>

            </tr>
            <tr>
                <td>Informationstechnik:</td>
                <td><?php echo $InformationNoteSe1;?></td>
 
            </tr>
            <tr>
                <td>Sport:</td>
                <td><?php echo $SportNoteSe1;?></td>

            </tr>
            <tr>
                <td>Physik:</td>
                <td><?php echo $PhysikNoteSe1;?></td>

            </tr>
        </tbody>
    </table>

    <br>

    <table>
        <thead>
            <tr>
                <th>Durchschnitt:</th>
                <td><?php echo $GesamtDurchSe1;?></td>
            </tr>
        </thead>
        </tbody>
    </table>

    

    <div class="footer">
        <img src="../bilder/Notentabelle.png" widht="200" height="70" alt="bbslogo2">
    </div>
</div>




<br>




<!--Zeugnisausgabe Semester 2-->
<div class="container">
    <div class="title">
        <h2><u>2 Semester</u></h2>
    </div>
    <div class="details-clearfix">
        <div class="student-details">
            <strong>Name: </strong><?php echo $Name;?><br>
            <strong>Nachname: </strong><?php echo $Nachname;?><br>
			<strong>Klasse: </strong><?php echo $Klasse;?><br>
        </div>
        <div class="certificate-details">
            <strong>Schüler-ID: </strong><?php echo $SusNr;?><br>
            <strong>Schwerpunkt: </strong><?php echo $Prüfungsfach1;?><br>
			<strong>Schuljahr: </strong><?php echo $Schuljahr;?><br>
        </div>
    </div>
    
    <hr>
    <h2>Noten</h2>

    <table>
        <thead>
            <tr>
                <th></th>
                <th>Fach</th>
                <th>Punkte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>P1:</th>
                <td><?php echo $Prüfungsfach1;?></td><!--FAch-->
                <td><?php echo $P1NoteSe2;?></td><!--Punkte-->
            </tr>
            <tr>
                <th>P2:</th>
                <td><?php echo $Prüfungsfach2;?></td>
                <td><?php echo $P2NoteSe2;?></td>
            </tr>
            <tr>
                <th>P3:</th>
                <td><?php echo $Prüfungsfach3;?></td>
                <td><?php echo $P3NoteSe2;?></td>
            </tr>
            <tr>
                <th>P4:</th>
                <td><?php echo $Prüfungsfach4;?></td>
                <td><?php echo $P4NoteSe2;?></td>
            </tr>
            <tr>
                <th>P5:</th>
                <td><?php echo $Prüfungsfach5;?></td>
                <td><?php echo $P5NoteSe2;?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <th>Fach</th>
                <th>Punkte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $Fremdsprache;?></td>
                <td><?php echo $FremdspracheSe2;?></td><!--FAch-->
            </tr>
            <tr>
                <td><?php echo $Wahlpflichtkurs;?></td>
                <td><?php echo $WahlNoteSe2;?></td>

            </tr>
            <tr>
                <td>Informationstechnik:</td>
                <td><?php echo $InformationNoteSe2;?></td>

            </tr>
            <tr>
                <td>Sport:</td>
                <td><?php echo $SportNoteSe2;?></td>

            </tr>
            <tr>
                <td>Physik:</td>
                <td><?php echo $PhysikNoteSe2;?></td>

            </tr>
        </tbody>
    </table>

    <br>

    <table>
        <thead>
            <tr>
                <th>Durchschnitt:</th>
                <td><?php echo $GesamtDurchSe2;?></td>
            </tr>
        </thead>
        </tbody>
    </table>


    <div class="footer">
        <img src="../bilder/Notentabelle.png" widht="200" height="70" alt="bbslogo2">
    </div>
</div>


<br>




<!--Zeugnisausgabe Semester 3-->
<div class="container">
    <div class="title">
        <h2><u>3 Semester</u></h2>
    </div>
    <div class="details-clearfix">
        <div class="student-details">
            <strong>Name: </strong><?php echo $Name;?><br>
            <strong>Nachname: </strong><?php echo $Nachname;?><br>
			<strong>Klasse: </strong><?php echo $Klasse;?><br>
        </div>
        <div class="certificate-details">
            <strong>Schüler-ID: </strong><?php echo $SusNr;?><br>
            <strong>Schwerpunkt: </strong><?php echo $Prüfungsfach1;?><br>
			<strong>Schuljahr: </strong><?php echo $Schuljahr;?><br>
        </div>
    </div>
    
    <hr>
    <h2>Noten</h2>

    <table>
        <thead>
            <tr>
                <th></th>
                <th>Fach</th>
                <th>Punkte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>P1:</th>
                <td><?php echo $Prüfungsfach1;?></td><!--FAch-->
                <td><?php echo $P1NoteSe3;?></td><!--Punkte-->
            </tr>
            <tr>
                <th>P2:</th>
                <td><?php echo $Prüfungsfach2;?></td>
                <td><?php echo $P2NoteSe3;?></td>
            </tr>
            <tr>
                <th>P3:</th>
                <td><?php echo $Prüfungsfach3;?></td>
                <td><?php echo $P3NoteSe3;?></td>
            </tr>
            <tr>
                <th>P4:</th>
                <td><?php echo $Prüfungsfach4;?></td>
                <td><?php echo $P4NoteSe3;?></td>
            </tr>
            <tr>
                <th>P5:</th>
                <td><?php echo $Prüfungsfach5;?></td>
                <td><?php echo $P5NoteSe3;?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <th>Fach</th>
                <th>Punkte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $Fremdsprache;?></td>
                <td><?php echo $FremdspracheSe3;?></td><!--FAch-->
            </tr>
            <tr>
                <td><?php echo $Wahlpflichtkurs;?></td>
                <td><?php echo $WahlNoteSe3;?></td>

            </tr>
            <tr>
                <td>Informationstechnik:</td>
                <td><?php echo $InformationNoteSe3;?></td>
 
            </tr>
            <tr>
                <td>Sport:</td>
                <td><?php echo $SportNoteSe3;?></td>

            </tr>
            <tr>
                <td>Physik:</td>
                <td><?php echo $PhysikNoteSe3;?></td>

            </tr>
        </tbody>
    </table>

    <br>

    <table>
        <thead>
            <tr>
                <th>Durchschnitt:</th>
                <td><?php echo $GesamtDurchSe3;?></td>
            </tr>
        </thead>
        </tbody>
    </table>


    <div class="footer">
        <img src="../bilder/Notentabelle.png" widht="200" height="70" alt="bbslogo2">
    </div>
</div>


<br>



<!--Zeugnisausgabe Semester 4-->
<div class="container">
    <div class="title">
        <h2><u>4 Semester</u></h2>
    </div>
    <div class="details-clearfix">
        <div class="student-details">
            <strong>Name: </strong><?php echo $Name;?><br>
            <strong>Nachname: </strong><?php echo $Nachname;?><br>
			<strong>Klasse: </strong><?php echo $Klasse;?><br>
        </div>
        <div class="certificate-details">
            <strong>Schüler-ID: </strong><?php echo $SusNr;?><br>
            <strong>Schwerpunkt: </strong><?php echo $Prüfungsfach1;?><br>
			<strong>Schuljahr: </strong><?php echo $Schuljahr;?><br>
        </div>
    </div>
    
    <hr>
    <h2>Noten</h2>

    <table>
        <thead>
            <tr>
                <th></th>
                <th>Fach</th>
                <th>Punkte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>P1:</th>
                <td><?php echo $Prüfungsfach1;?></td><!--FAch-->
                <td><?php echo $P1NoteSe4;?></td><!--Punkte-->
            </tr>
            <tr>
                <th>P2:</th>
                <td><?php echo $Prüfungsfach2;?></td>
                <td><?php echo $P2NoteSe4;?></td>
            </tr>
            <tr>
                <th>P3:</th>
                <td><?php echo $Prüfungsfach3;?></td>
                <td><?php echo $P3NoteSe4;?></td>
            </tr>
            <tr>
                <th>P4:</th>
                <td><?php echo $Prüfungsfach4;?></td>
                <td><?php echo $P4NoteSe4;?></td>
            </tr>
            <tr>
                <th>P5:</th>
                <td><?php echo $Prüfungsfach5;?></td>
                <td><?php echo $P5NoteSe4;?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <th>Fach</th>
                <th>Punkte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $Fremdsprache;?></td>
                <td><?php echo $FremdspracheSe4;?></td><!--FAch-->
            </tr>
            <tr>
                <td><?php echo $Wahlpflichtkurs;?></td>
                <td><?php echo $WahlNoteSe4;?></td>

            </tr>
            <tr>
                <td>Informationstechnik:</td>
                <td><?php echo $InformationNoteSe4;?></td>
 
            </tr>
            <tr>
                <td>Sport:</td>
                <td><?php echo $SportNoteSe4;?></td>

            </tr>
            <tr>
                <td>Physik:</td>
                <td><?php echo $PhysikNoteSe4;?></td>

            </tr>
        </tbody>
    </table>

    <br>

    <table>
        <thead>
            <tr>
                <th>Durchschnitt:</th>
                <td><?php echo $GesamtDurchSe4;?></td>
            </tr>
        </thead>
        </tbody>
    </table>


    <div class="footer">
        <img src="../bilder/Notentabelle.png" widht="200" height="70" alt="bbslogo2">
    </div>
</div>




    <footer>
            <h4>Präsentiert von Maxi Bergheim und Maxi Kühnlein</h4>
    </footer>
    
</body>
</html>
