
-- Création d'un base de donnée nommée bibliotheque2.
-- Suppression de la base si pré-existante ... 
DROP DATABASE IF EXISTS bibliotheque2;
CREATE DATABASE bibliotheque2 CHARACTER SET 'utf8';

-- Afficher les warnings et cibler la base a utiliser.
SHOW WARNINGS;
USE bibliotheque2;

-- Création d'un utilisateur pour l'administration de la base bibliotheque2.
-- Suppression si existant de 'bibliotheque2PHP'@'localhost' avant une connexion ... 
DROP USER IF EXISTS 'bibliotheque2PHP'@'localhost'; 
CREATE USER 'bibliotheque2PHP'@'localhost' IDENTIFIED BY 'bibliotheque2PHP76530';
GRANT USAGE ON *.* TO 'bibliotheque2PHP'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON bibliotheque2.* TO 'bibliotheque2PHP'@'localhost';

-- Création de la table Lecteur.
CREATE TABLE Lecteur (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    carte_numero INT(6) NOT NULL
)
ENGINE=InnoDB;

INSERT INTO Lecteur (nom, prenom, carte_numero)
VALUES 
('Lencapsuler', 'Roger', '123456'),
('Deloin', 'Alain', '259476'),
('Ptitegoutte', 'Justine', '875625'),
('Ladebrouille', 'Dédé', '654321');

-- Création de la table Livre.
CREATE TABLE Livre (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    auteur VARCHAR(75) NOT NULL,
    categorie VARCHAR(50) NOT NULL,
    synopsis TEXT NOT NULL,
    statut BOOLEAN NOT NULL,
    lecteur_id INT UNSIGNED,
    CONSTRAINT fk_livre_lecteur
        FOREIGN KEY (lecteur_id)
        REFERENCES Lecteur(id)
)
ENGINE=InnoDB;

INSERT INTO Livre (titre, auteur, categorie, synopsis, statut, lecteur_id)
VALUES 
('Les Misérables', 
'Victor Hugo', 
'Roman', 
'Tant qu’il existera, par le fait des lois et des moeurs, une damnation sociale créant artificiellement, en pleine civilisation, des enfers, et compliquant d’une fatalité humaine la destinée qui est divine ; tant que les trois problèmes du siècle, la dégradation de l’homme par le prolétariat, la déchéance de la femme par la faim, l’atrophie de l’enfant par la nuit, ne seront pas résolus ; tant que, dans de certaines régions, l’asphyxie sociale sera possible ; en d’autres termes, et à un point de vue plus étendu encore, tant qu’il y aura sur la terre ignorance et misère, des livres de la nature de celui-ci pourront ne pas être inutiles.
Hauteville-House, 1er janvier 1862.
Victor Hugo.', 
0, 
1),
('Vingt mille lieues sous les mers', 
'Jules Vernes', 
'Roman', 
'Le professeur Aronnax, son domestique Conseil et le harponneur Ned Land, qui cherchaient à capturer un fantastique monstre marin, se retrouvent prisonniers du capitaine Némo, à bord de son sous-marin le Nautilus.
Quel lourd secret cache Némo pour vouloir les retenir ainsi à jamais ? C’est alors que parallèlement au fabuleux périple maritime qu’ils entament, s’engage une lutte psychologique et culturelle entre Aronnax et Némo.', 
0, 
4),
('Le meilleurs des Mondes', 
'Aldous Huxley', 
'Roman',  
"Défi, réquisitoire, utopie, ce livre mondialement célèbre, chef-d’œuvre de la littérature d'anticipation, a fait d'Aldous Huxley l'un des témoins les plus lucides de notre temps.
« Aujourd'hui, devait écrire l'auteur près de vingt ans après la parution de son livre, il semble pratiquement possible que cette horreur s'abatte sur nous dans le délai d'un siècle. Du moins, si nous nous abstenons d'ici là de nous faire sauter en miettes... Nous n'avons le choix qu'entre deux solutions : ou bien un certain nombre de totalitarismes nationaux, militarisés, ayant comme racine la terreur de la bombe atomique, et comme conséquence la destruction de la civilisation (ou, si la guerre est limitée, la perpétuation du militarisme) ; ou bien un seul totalitarisme supranational, suscité par le chaos social résultant du progrès technologique. » ...", 
0, 
3),
('Fables de Jean de la Fontaine', 
'Jean de la Fontaine', 
'Poésie', 
'6 Fables de Jean de La Fontaine. Les Fables sont des récits incontournables et intemporels de la langue française, pour petits et grands.', 
0, 
2),
('Le Petit Robert', 
'Le Robert', 
'Dictionnaire', 
'Le dictionnaire le plus complet : 300 000 mots et sens, 35 000 citations littéraires, 150 000 synonymes et contraires, 75 000 étymologies', 
1,
NULL),
('Voyage au centre de la Terre', 
'Jules Verne', 
'Roman', 
"Ce livre raconte l'histoire d'un scientifique, le Professeur Lidenbrock, et de son neveu Axel, qui découvrent le mystérieux parchemin d'un certain Arne Saknussemme. Dans ce parchemin, ils découvriront qu'il est maintenant possible d'aller au centre de la Terre. Alors ils décideront de se lancer dans cette aventure, avec leur guide. Là-bas ils découvriront un monde aussi époustouflant que terrifiant.... ", 
1, 
NULL),
('Encyclopédie du Savoir Relatif et Absolu', 
'Bernard Werber', 
'Encyclopédie', 
"Réunir tous les savoirs de son époque : telle a été l'ambition du professeur Edmond Wells. Mêlant science et spiritualité, physique quantique et recettes de cuisine, ce savant singulier et solitaire a accumulé tout au long de sa vie des informations étonnantes. Un seul point commun à tous ces textes : donner à réfléchir, « faire pétiller les neurones ».
Le professeur Edmond Wells était un homme plein d'humour qui accordait une grande importance à la notion de paradoxe. Mais de tous les paradoxes, le plus étonnant est certainement le statut même de ce personnage puisqu'il n'est que le fruit de l'imagination fertile de Bernard Werber.", 
1, 
NULL);

-- Création de la table Emprunt.
CREATE TABLE Emprunt (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    -- livre_emprunt VARCHAR(100),
    date_emprunt DATE,
    -- livre_rendu VARCHAR(100),
    date_rendu DATE,
    livre_id INT UNSIGNED,
    CONSTRAINT fk_livre_lu
        FOREIGN KEY (livre_id)
        REFERENCES Livre(id)
)
ENGINE=InnoDB;

INSERT INTO Emprunt (livre_id, date_emprunt)
VALUES 
(1, '2021-06-15'), 
(2, '2021-06-15'), 
(3, '2021-06-15'), 
(4, '2021-06-15');
