
use materielMangement ;


-- Create a stored procedure to update material quantity when reservations are made
CREATE PROCEDURE UpdateMaterialQuantity
AS
BEGIN
    DECLARE @materielID INT;
    DECLARE @reservationID INT;
    DECLARE @quantity INT;

    -- Declare a cursor to fetch all reservations
    DECLARE reservationCursor CURSOR FOR
    SELECT idreservation, idmateriels, materielQte
    FROM reservation
    FOR UPDATE;

    -- Open the cursor
    OPEN reservationCursor;

    -- Fetch the first reservation
    FETCH NEXT FROM reservationCursor INTO @reservationID, @materielID, @quantity;

    -- Loop through all reservations
    WHILE @@FETCH_STATUS = 0
    BEGIN
        -- Update material quantity
        UPDATE materiel
        SET materielQte = materielQte - @quantity
        WHERE id = @materielID;

        -- Fetch the next reservation
        FETCH NEXT FROM reservationCursor INTO @reservationID, @materielID, @quantity;
    END;

    -- Close the cursor
    CLOSE reservationCursor;
    DEALLOCATE reservationCursor;
END;


-----------------------------------------------------------------------------------------------------------------------

-- Create a stored procedure to fetch and display professor names
CREATE PROCEDURE FetchProfessorNames
AS
BEGIN
    DECLARE @firstname VARCHAR(100);
    DECLARE @lastname VARCHAR(100);

    -- Declare a cursor to fetch professor names
    DECLARE professorCursor CURSOR FOR
    SELECT firstname, lastname
    FROM professor;

    -- Open the cursor
    OPEN professorCursor;

    -- Fetch the first professor name
    FETCH NEXT FROM professorCursor INTO @firstname, @lastname;

    -- Loop through all professor names
    WHILE @@FETCH_STATUS = 0
    BEGIN
        -- Display professor name
        PRINT 'Professor Name: ' + @firstname + ' ' + @lastname;

        -- Fetch the next professor name
        FETCH NEXT FROM professorCursor INTO @firstname, @lastname;
    END;

    -- Close the cursor
    CLOSE professorCursor;
    DEALLOCATE professorCursor;
END;
