
CREATE DATABASE materielMangement ;

use materielMangement ;

-- Table to store information about materials
CREATE TABLE materiel (
    id INT IDENTITY(1,1) PRIMARY KEY, -- Unique identifier for the material
    materielCode VARCHAR(255) NULL, -- Code for the material
    materielName VARCHAR(255) NULL, -- Name of the material
    materielTitle VARCHAR(255) NULL, -- Title of the material
    materielQte INT NULL, -- Quantity of the material
    materielURL VARCHAR(255) NULL -- URL for the material (if applicable)
);

-- Table to store information about professors
CREATE TABLE professor (
    id INT IDENTITY(1,1) PRIMARY KEY, -- Unique identifier for the professor
    firstname VARCHAR(100) NULL, -- First name of the professor
    lastname VARCHAR(100) NULL, -- Last name of the professor
    email VARCHAR(100) NULL, -- Email address of the professor
    password CHAR(32) NULL, -- Password for the professor (hashed ideally)
    address VARCHAR(255) NULL, -- Address of the professor
    phone VARCHAR(100) NULL, -- Phone number of the professor
    promotion INT NULL -- Promotion information for the professor
);

-- Table to store reservations made by professors for materials
CREATE TABLE reservation (
    idreservation INT IDENTITY(1,1) PRIMARY KEY, -- Unique identifier for the reservation
    idprofessor INT NOT NULL, -- Foreign key referencing professor id
    idmateriels INT NOT NULL, -- Foreign key referencing material id
    datereservation DATE, -- Date of the reservation
    FOREIGN KEY (idprofessor) REFERENCES professor(id), -- Reference to the professor table
    FOREIGN KEY (idmateriels) REFERENCES materiel(id) -- Reference to the materiel table
);

-- Table to store contracts between professors and materials
CREATE TABLE Contrat (
    idContrat INT IDENTITY(1,1) PRIMARY KEY, -- Unique identifier for the contract
    idmateriels INT NOT NULL, -- Foreign key referencing material id
    idprofessor INT NOT NULL, -- Foreign key referencing professor id
    dateObtention DATE, -- Date of obtaining the contract
    FOREIGN KEY (idmateriels) REFERENCES materiel(id), -- Reference to the materiel table
    FOREIGN KEY (idprofessor) REFERENCES professor(id) -- Reference to the professor table
);

-- Table to store information about administrators
CREATE TABLE adminstarteur (
    id INT IDENTITY(1,1) PRIMARY KEY, -- Unique identifier for the administrator
    firstname VARCHAR(100) NULL, -- First name of the administrator
    lastname VARCHAR(100) NULL, -- Last name of the administrator
    email VARCHAR(100) NULL, -- Email address of the administrator
    password CHAR(32) NULL -- Password for the administrator (hashed ideally)
);


-- Inserting sample data into the 'materiel' table
INSERT INTO materiel (materielCode, materielName, materielTitle, materielQte, materielURL) 
VALUES 
('M001', 'Laptop', 'HP Pavilion', 10, 'images/materiel1.jpg'),
('M002', 'Projector', 'Epson Home Cinema', 5, 'images/materiel1.jpg'),
('M003', 'Tablet', 'Samsung Galaxy Tab', 8, 'images/materiel1.jpg');

-- Inserting sample data into the 'professor' table
INSERT INTO professor (firstname, lastname, email, password, address, phone, promotion) 
VALUES 
('Abdelwahid', 'Amdjar', 'abdelwahid@emsi-edu.ma', 'rtyuihgfdfvbnjknbvftyuhb', 'Marrakech SYBA', '0641957212', 991217),
('mohamed', 'naim', 'mohamed@emsi-edu.ma', 'jhgfvhu345dfg5èggfrfrsd', 'Marrakech M Hamid', '06453729364', 887744),
('marieme', 'aqaddar', 'mariem@emsi-edu.ma', 'fgh56fghj456fghjhg', 'Marrakech SYBA', '0654387654', 009453);

-- Inserting sample data into the 'reservation' table
INSERT INTO reservation (idprofessor, idmateriels, datereservation) 
VALUES 
(1, 1, '2024-05-12'),
(2, 2, '2024-05-13'),
(3, 3, '2024-05-14');

-- Inserting sample data into the 'Contrat' table
INSERT INTO Contrat (idmateriels, idprofessor, dateObtention) 
VALUES 
(1, 1, '2024-05-12'),
(2, 2, '2024-05-13'),
(3, 3, '2024-05-14');

-- Inserting sample data into the 'Admin' table
INSERT INTO adminstarteur (firstname, lastname, email, password) 
VALUES 
('emsi', 'student', 'admin@emsi-edu.ma', 'EMSI2024');


