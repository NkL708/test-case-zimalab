CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,

    first_name VARCHAR(30),
    last_name VARCHAR(30),

    email VARCHAR(30),
    -- phone number

    company_name VARCHAR(30),
    position VARCHAR(30)
);

INSERT INTO users(first_name, last_name, email, company_name, position) VALUES
('John', 'Doe', 'john.doe@gmail.com', '', 'Suspect'),
('Harry', 'Potter', 'theboywholived@gmail.com', 'Hogwarts', 'Student'),
('Darth', 'Vader', 'anakinskywalker@gmail.com', 'Death star', 'Sith');
