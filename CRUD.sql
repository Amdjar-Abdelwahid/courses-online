
use materielMangement ;

-- ------------------------------------- CRUD operations for materiel table: 
-- Create
CREATE PROCEDURE sp_create_materiel
    @materielCode VARCHAR(255),
    @materielName VARCHAR(255),
    @materielTitle VARCHAR(255),
    @materielQte INT,
    @materielURL VARCHAR(255)
AS
BEGIN
    INSERT INTO materiel (materielCode, materielName, materielTitle, materielQte, materielURL)
    VALUES (@materielCode, @materielName, @materielTitle, @materielQte, @materielURL)
END

-- Read
CREATE PROCEDURE sp_get_materiel
    @id INT
AS
BEGIN
    SELECT * FROM materiel WHERE id = @id
END

-- Update
CREATE PROCEDURE sp_update_materiel
    @id INT,
    @materielCode VARCHAR(255),
    @materielName VARCHAR(255),
    @materielTitle VARCHAR(255),
    @materielQte INT,
    @materielURL VARCHAR(255)
AS
BEGIN
    UPDATE materiel
    SET materielCode = @materielCode,
        materielName = @materielName,
        materielTitle = @materielTitle,
        materielQte = @materielQte,
        materielURL = @materielURL
    WHERE id = @id
END

-- Delete
CREATE PROCEDURE sp_delete_materiel
    @id INT
AS
BEGIN
    DELETE FROM materiel WHERE id = @id
END

-- ------------------------------------- CRUD operations for professor table:
-- Create
CREATE PROCEDURE sp_create_professor
    @firstname VARCHAR(100),
    @lastname VARCHAR(100),
    @email VARCHAR(100),
    @password CHAR(32),
    @address VARCHAR(255),
    @phone VARCHAR(100),
    @promotion INT
AS
BEGIN
    INSERT INTO professor (firstname, lastname, email, password, address, phone, promotion)
    VALUES (@firstname, @lastname, @email, @password, @address, @phone, @promotion)
END

-- Read
CREATE PROCEDURE sp_get_professor
    @id INT
AS
BEGIN
    SELECT * FROM professor WHERE id = @id
END

-- Update
CREATE PROCEDURE sp_update_professor
    @id INT,
    @firstname VARCHAR(100),
    @lastname VARCHAR(100),
    @email VARCHAR(100),
    @password CHAR(32),
    @address VARCHAR(255),
    @phone VARCHAR(100),
    @promotion INT
AS
BEGIN
    UPDATE professor
    SET firstname = @firstname,
        lastname = @lastname,
        email = @email,
        password = @password,
        address = @address,
        phone = @phone,
        promotion = @promotion
    WHERE id = @id
END

-- Delete
CREATE PROCEDURE sp_delete_professor
    @id INT
AS
BEGIN
    DELETE FROM professor WHERE id = @id
END


-- ------------------------------------- CRUD operations for reservation table:
-- Create
CREATE PROCEDURE sp_create_reservation
    @idprofessor INT,
    @idmateriels INT,
    @datereservation DATE
AS
BEGIN
    INSERT INTO reservation (idprofessor, idmateriels, datereservation)
    VALUES (@idprofessor, @idmateriels, @datereservation)
END

-- Read
CREATE PROCEDURE sp_get_reservation
    @id INT
AS
BEGIN
    SELECT * FROM reservation WHERE idreservation = @id
END

-- Update
CREATE PROCEDURE sp_update_reservation
    @id INT,
    @idprofessor INT,
    @idmateriels INT,
    @datereservation DATE
AS
BEGIN
    UPDATE reservation
    SET idprofessor = @idprofessor,
        idmateriels = @idmateriels,
        datereservation = @datereservation
    WHERE idreservation = @id
END

-- Delete
CREATE PROCEDURE sp_delete_reservation
    @id INT
AS
BEGIN
    DELETE FROM reservation WHERE idreservation = @id
END


-- ------------------------------------- CRUD operations for contart table:

-- Create
CREATE PROCEDURE sp_create_contrat
    @idmateriels INT,
    @idprofessor INT,
    @dateObtention DATE
AS
BEGIN
    INSERT INTO Contrat (idmateriels, idprofessor, dateObtention)
    VALUES (@idmateriels, @idprofessor, @dateObtention)
END

-- Read
CREATE PROCEDURE sp_get_contrat
    @id INT
AS
BEGIN
    SELECT * FROM Contrat WHERE idContrat = @id
END

-- Update
CREATE PROCEDURE sp_update_contrat
    @id INT,
    @idmateriels INT,
    @idprofessor INT,
    @dateObtention DATE
AS
BEGIN
    UPDATE Contrat
    SET idmateriels = @idmateriels,
        idprofessor = @idprofessor,
        dateObtention = @dateObtention
    WHERE idContrat = @id
END

-- Delete
CREATE PROCEDURE sp_delete_contrat
    @id INT
AS
BEGIN
    DELETE FROM Contrat WHERE idContrat = @id
END


-- ------------------------------------- CRUD operations for adminstarteur table:
-- Create
CREATE PROCEDURE sp_create_admin
    @firstname VARCHAR(100),
    @lastname VARCHAR(100),
    @email VARCHAR(100),
    @password CHAR(32)
AS
BEGIN
    INSERT INTO adminstarteur (firstname, lastname, email, password)
    VALUES (@firstname, @lastname, @email, @password)
END

-- Read
CREATE PROCEDURE sp_get_admin
    @id INT
AS
BEGIN
    SELECT * FROM adminstarteur WHERE id = @id
END

-- Update
CREATE PROCEDURE sp_update_admin
    @id INT,
    @firstname VARCHAR(100),
    @lastname VARCHAR(100),
    @email VARCHAR(100),
    @password CHAR(32)
AS
BEGIN
    UPDATE adminstarteur
    SET firstname = @firstname,
        lastname = @lastname,
        email = @email,
        password = @password
    WHERE id = @id
END

-- Delete
CREATE PROCEDURE sp_delete_admin
    @id INT
AS
BEGIN
    DELETE FROM adminstarteur WHERE id = @id
END