  
drop database if exists ParcInfo;
create database if not exists ParcInfo;
use ParcInfo; 

create table types(
    idTyp  int(4) auto_increment primary key,
    libelleTyp varchar(50)
    
);
 
create table etats(
    idEta int(4) auto_increment primary key,
    libelleEta varchar(50)
    
);


create table categories(
    idCat int(4) auto_increment primary key,
    libelleCat varchar(50)
    
);
 
 
 
create table emplacements(
    idEmp int(4) auto_increment primary key,
    libelleEmp varchar(50)
	 
	 
);
create table equipements(
    idEqu int(4) auto_increment primary key, 
	reference varchar(50),
	marque varchar(50),
	photo varchar(50),
     idEta int,
	 idTyp INT,
	 idCat int ,
	 idEmp int(4)
);
 
 

create table utilisateurs(
    iduser int(4) auto_increment primary key,
    login varchar(50), 
    email varchar(255),
    role varchar(50),   -- admin ou visiteur
    etat int(1),        -- 1:activé 0:desactivé
    pwd varchar(255), 
);


    Alter table equipements add constraint 
    foreign key(idEta) references etats(idEta);

    Alter table equipements add constraint 
    foreign key(idTyp) references types(idTyp); 

    Alter table equipements add constraint 
    foreign key(idCat) references categories(idCat);

Alter table equipements add constraint 
    foreign key(idEmp)references emplacements(idEmp);
	
    

INSERT INTO types(libelleTyp) VALUES
	('Ordinateurs Portable'),
	('Ordinateurs fixe'),
	('Imprimant'),
	('Clavier'),
    ('Souris');	
INSERT INTO etats(libelleEta) VALUES
	('En service'),
	('En panne');
    ('En maintenance');
	 
 INSERT INTO categories(libelleCat) VALUES
	('Peripherique et Accessoire'),
	('Ordinateur'),
	('Logiciel et Licence'),
    ('Serveur'),
    ('Imprimant');
	
	INSERT INTO emplacements(libelleEmp) VALUES
	('E1'),
	('E2'),
	('E3');
INSERT INTO equipements(reference,marque,photo,idEta,idTyp,idCat,idEmp ) VALUES
    ('HP-AX-44F-D','HP','fixe1.jpg',1,2,2,1 ),
	('LENOVO-MNB-ED-5RRR','LENOVO','portable2.jpg',2 ,1,2,1),
	('EFJ8-FWER','HP','Scanner1.jpg',1 ,4,1,1),
	('FWRE-R-4345','DELL','portable1.jpg' ,1,1,1,2),
	('46-FEHBF-RFG','HP','clavier1.jpg',2,5,1,1 ),
	('T55T-FFFF','HP','Scanner2.jpg',2,4,2,1),
    ('ERFE','DELL','portable3.jpg',1,1,2,1 ),
	('34SES-RF','ASUS','portable4.jpeg',2 ,1,2,1),
	('ERF-ERFE','SAMSUNG','souris1.jpg',1 ,3,1,1),
	('RR-XZ555','HP','scanner3.jpeg' ,1,4,1,2),
	('37YDB-V','HP','fixe5.jpg',2,2,1,1 ),
	('EAKI-VFF44','HP','fixe3.jpg',2,2,2,1),
('DNV5-55','LENOVO','portable5.jpg',1,1,2,1 ),
	('FNJK55-55','HP','fixe6.jpg',2 ,2,2,1);
	 
  
INSERT INTO utilisateurs(login,email,role,etat,pwd ) VALUES 
    ('admin','admin@gmail.com','ADMIN',1,('123') ),
    ('user1','user1@gmail.com','VISITEUR',0,('123') ),
    ('user2','user2@gmail.com','VISITEUR',1,('123') ); 
	
select * from types;
select * from categories;
select * from etats;
select * from equipements;
select * from emplacements;
select * from utilisateurs;

