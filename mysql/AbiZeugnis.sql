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
