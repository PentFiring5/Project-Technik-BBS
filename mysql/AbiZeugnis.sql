drop database if exists abizeugnis;
create database abizeugnis;
use abizeugnis;

CREATE TABLE Schueler(
	SuSNr INT NOT NULL AUTO_INCREMENT,
	name1 VARCHAR(30) NOT NULL,
	Nachname VARCHAR(30) NOT NULL,
	Schuljahr VARCHAR(10),
	Klasse VARCHAR(6),

	Pruefungsfach1 VARCHAR(30),
	P1NoteSe1 INT,
	P1NoteSe2 INT,
	P1NoteSe3 INT,
	P1NoteSe4 INT,

	Pruefungsfach2 VARCHAR(30), 
	P2NoteSe1 INT,
	P2NoteSe2 INT,
	P2NoteSe3 INT,
	P2NoteSe4 INT,

	Pruefungsfach3 VARCHAR(30), 
	P3NoteSe1 INT,
	P3NoteSe2 INT,
	P3NoteSe3 INT,
	P3NoteSe4 INT,

	Pruefungsfach4 VARCHAR(30), 
	P4NoteSe1 INT,
	P4NoteSe2 INT,
	P4NoteSe3 INT,
	P4NoteSe4 INT,

	Pruefungsfach5 VARCHAR(30), 
	P5NoteSe1 INT,
	P5NoteSe2 INT,
	P5NoteSe3 INT,
	P5NoteSe4 INT,

	Wahlpflichtkurs VARCHAR(40),
	WahlNoteSe1 INT,
	WahlNoteSe2 INT,
	WahlNoteSe3 INT,
	WahlNoteSe4 INT,
	
	InformationNoteSe1 INT,
	InformationNoteSe2 INT,
	InformationNoteSe3 INT,
	InformationNoteSe4 INT,

	PhysikNoteSe1 INT,
	PhysikNoteSe2 INT,
	PhysikNoteSe3 INT,
	PhysikNoteSe4 INT,

	Fremdsprache VARCHAR(30),
	FremdspracheSe1 INT,
	FremdspracheSe2 INT,
	FremdspracheSe3 INT,
	FremdspracheSe4 INT,

	SportNoteSe1 INT,
	SportNoteSe2 INT,
	SportNoteSe3 INT,
	SportNoteSe4 INT,

	Unterkurse INT,

	primary key (SuSNr)
	);

INSERT INTO Schueler ( SuSNr, name1, Nachname, Schuljahr, Klasse, Pruefungsfach1, P1NoteSe1, P1NoteSe2, P1NoteSe3, P1NoteSe4, Pruefungsfach2, P2NoteSe1, P2NoteSe2, P2NoteSe3, P2NoteSe4, Pruefungsfach3, P3NoteSe1, P3NoteSe2, P3NoteSe3, P3NoteSe4, Pruefungsfach4, P4NoteSe1, P4NoteSe2, P4NoteSe3, P4NoteSe4, Pruefungsfach5, P5NoteSe1, P5NoteSe2, P5NoteSe3, P5NoteSe4, Wahlpflichtkurs, WahlNoteSe1, WahlNoteSe2, WahlNoteSe3, WahlNoteSe4,     InformationNoteSe1, InformationNoteSe2, InformationNoteSe3, InformationNoteSe4,       PhysikNoteSe1, PhysikNoteSe2, PhysikNoteSe3, PhysikNoteSe4, Fremdsprache, FremdspracheSe1, FremdspracheSe2, FremdspracheSe3,FremdspracheSe4, SportNoteSe1, SportNoteSe2, SportNoteSe3, SportNoteSe4, Unterkurse)
VALUES ('','Thomas' ,'Berger','2010/2013','BGI1','Wirtschaft','10','5','4','8','Deutsch', '12','10', '11', '1','Englisch', '9','8','13','7','Mathe', '4', '10', '13', '15','BIF','3', '7', '11', '4',   'Werte und Normen', '8', '12','12','6',   '6', '11','15','8',   '8', '12','5','9',     'Spanisch','5', '10','12','6',  '9', '12','10','6',   '5');
