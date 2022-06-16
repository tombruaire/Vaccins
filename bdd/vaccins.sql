Drop database if exists gestvaccins;
Create database gestvaccins;
Use gestvaccins;

Drop table if exists personnes;
Create table personnes (
	idPersonne int(3) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	email varchar(255),
	mdp varchar(255),
	role enum("admin", "user"),
	primary key (idPersonne)
) ENGINE=InnoDB;

Insert into personnes values
(null, "BRUAIRE", "Tom", "tom@gmail.com", "123", "admin"),
(null, "CHICHE", "Mehdi", "mehdi@gmail.com", "456", "admin"),
(null, "LI", "Jean-Pierre", "jp@gmail.com", "789", "admin"),
(null, "BENHAMED", "Okacha", "okacha@gmail.com", "987", "admin"),
(null, "USER", "Le", "user@gmail.com", "654", "user");

update personnes set mdp = sha1(mdp);

Drop trigger if exists beforeInsert;
Delimiter //
Create trigger beforeInsert
Before insert on personnes
For each row
Begin
	Set new.mdp = sha1(new.mdp);
End //
Delimiter ;

Drop trigger if exists beforeUpdate;
Delimiter //
Create trigger beforeUpdate
Before update on personnes
For each row
Begin
	Set new.mdp = sha1(new.mdp);
End //
Delimiter ;

Drop table if exists typeCentreVaccinations;
Create table typeCentreVaccinations (
	idType int(3) not null auto_increment,
	libelle varchar(100),
	type varchar(100),
	primary key (idType)
) ENGINE=InnoDB;

Insert into typeCentreVaccinations values
(null, "Georges Pompidou", "Hopital"),
(null, "Cerbaillance", "Laboratoire");

Drop table if exists centresVaccinations;
Create table centresVaccinations (
	idCV int(3) not null auto_increment,
	adresse varchar(255),
	cp varchar(5),
	ville varchar(50),
	capacite int(3),
	idType int(3),
	primary key (idCV),
	foreign key (idType) references typeCentreVaccinations (idType)
	on delete cascade
) ENGINE=InnoDB;

Insert into centresVaccinations values
(null, "6-8 Imp. des 2 Cousins", "75017", "Paris", 1500, 1),
(null, "5 rue de Paris", "75001", "Paris", 500, 2);

Create or replace view vCentresVaccinations as (
	Select c.idCV, c.adresse, c.cp, c.ville, c.capacite, t.libelle, t.type
	From centresVaccinations c, typeCentreVaccinations t
	Where c.idType = t.idType
);

Drop table if exists vaccins;
Create table vaccins (
	idVaccin int(3) not null auto_increment,
	nomV varchar(50),
	datePeremption date,
	quantite int(3),
	prix decimal(10,2),
	idPersonne int(3),
	idCV int(3),
	primary key (idVaccin),
	foreign key (idPersonne) references personnes (idPersonne)
	on delete cascade,
	foreign key (idCV) references centresVaccinations (idCV)
	on delete cascade
) ENGINE=InnoDB;

Insert into vaccins values
(null, "Pfizer", "2023-01-01", 300, 25.99, 1, 1),
(null, "AstraZeneca", "2023-01-01", 2, 34.99, 2, 2);

Create or replace view vVaccins as (
	Select v.idVaccin, v.nomV, v.datePeremption, v.quantite, v.prix, p.nom, p.prenom, t.libelle, t.type
	From vaccins v, personnes p, typeCentreVaccinations t, centresVaccinations c
	Where v.idPersonne = p.idPersonne and c.idType = t.idType and v.idCV = c.idCV
);

Create or replace view nbTypesCentres as (
	select t.libelle, count(c.idCV) as nb
	from typeCentreVaccinations t, centresVaccinations c
	where t.idType = c.idType
	group by t.libelle
);
