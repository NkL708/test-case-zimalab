CREATE TABLE users(
    id INT PRIMARY KEY,

    first_name VARCHAR(30),
    last_name VARCHAR(30),

    email VARCHAR(30),
    -- phone number

    company_name VARCHAR(30),
    position VARCHAR(30)
);

INSERT INTO users VALUES 
(1, 'John', 'Doe', 'john.doe@gmail.com', 'Jail', 'Prisoner'),
(2, 'John2', 'Doe2', 'john.doe@gmail.com2', 'Jail2', 'Prisoner2');