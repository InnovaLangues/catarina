CREATE TABLE cat_profil (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(64)
	);
	
CREATE TABLE cat_langue (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(64)
	)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci; 
	
CREATE TABLE cat_activite_langagiere (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(64)
	);

CREATE TABLE cat_type (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(128),
	parent_id INTEGER,
	FOREIGN KEY (parent_id) REFERENCES cat_type(id)
	);

CREATE TABLE cat_note (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	note FLOAT,
	nb_votant INTEGER
	);		

CREATE TABLE cat_ressource (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(256),
	url VARCHAR(256),
	auteur VARCHAR(128),
	version VARCHAR(64),
	description text, 
	repertoire boolean,
	ressource_fonctionnement text,
	ressource_analogue text,
	note_id INTEGER,
	FOREIGN KEY (note_id) REFERENCES cat_note(id)	
	);	
	
CREATE TABLE cat_ressource_profil (
	ressource_id INTEGER,
	profil_id INTEGER,
	PRIMARY KEY (ressource_id, profil_id),
	FOREIGN KEY (ressource_id) REFERENCES cat_ressource(id),
	FOREIGN KEY (profil_id) REFERENCES cat_profil(id)
	);			
	
CREATE TABLE cat_ressource_langue (
	ressource_id INTEGER,
	langue_id INTEGER,
	PRIMARY KEY (ressource_id, langue_id),
	FOREIGN KEY (ressource_id) REFERENCES cat_ressource(id),
	FOREIGN KEY (langue_id) REFERENCES cat_langue(id)
	);			

CREATE TABLE cat_ressource_activite (
	ressource_id INTEGER,
	activite_id INTEGER,
	PRIMARY KEY (ressource_id, activite_id),
	FOREIGN KEY (ressource_id) REFERENCES cat_ressource(id),
	FOREIGN KEY (activite_id) REFERENCES cat_activite_langagiere(id)
	);	

CREATE TABLE cat_ressource_type (
	ressource_id INTEGER,
	type_id INTEGER,
	PRIMARY KEY (ressource_id, type_id),
	FOREIGN KEY (ressource_id) REFERENCES cat_ressource(id),
	FOREIGN KEY (type_id) REFERENCES cat_type(id)
	);			
	
	
		
	

	
	
	