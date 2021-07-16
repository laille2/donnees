CREATE DATABASE IF NOT EXISTS donnees;
USE donnees;

CREATE TABLE contenu 
(
id int AUTO_INCREMENT PRIMARY KEY,
nom varchar(50),
prenom varchar(50)
)

INSERT INTO `contenu` (`nom`,`prenom`) VALUES ("Steven","Townsend"),("Byron","Hammond"),("Otto","Ashley"),("Clarke","Sharp"),("Jerry","Casey"),("Reese","Mcknight"),("Avram","Mack"),("Flynn","Hines"),("Channing","Fitzgerald"),("Herman","Mosley");
INSERT INTO `contenu` (`nom`,`prenom`) VALUES ("Hop","Hamilton"),("Jermaine","Bishop"),("Fletcher","Bean"),("Declan","Rodriguez"),("Knox","Randall"),("Lane","Nieves"),("Jakeem","Howard"),("Benjamin","Harper"),("Dean","Roach"),("Lucius","Lancaster");
INSERT INTO `contenu` (`nom`,`prenom`) VALUES ("Samson","Hogan"),("Jakeem","Martinez"),("Edward","Curry"),("Igor","Barrera"),("Tyler","Galloway"),("Rooney","Newman"),("Levi","Strickland"),("Ezra","England"),("Tanner","Summers"),("Trevor","Haley");
INSERT INTO `contenu` (`nom`,`prenom`) VALUES ("Hammett","Gutierrez"),("Ezekiel","Decker"),("Guy","Ryan"),("Paki","Carney"),("Octavius","Barrett"),("Branden","Joyce"),("Prescott","Herring"),("Logan","Payne"),("Quentin","Crane"),("Finn","Blankenship");
INSERT INTO `contenu` (`nom`,`prenom`) VALUES ("Wallace","Lynn"),("Beck","Newton"),("Byron","Velez"),("Hilel","Spears"),("Tiger","Manning"),("Christian","Adams"),("Macaulay","Reilly"),("Elton","Zimmerman"),("Vincent","Larsen"),("Vernon","Allen");
