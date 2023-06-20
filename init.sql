CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,

    first_name VARCHAR(30),
    last_name VARCHAR(30),

    email VARCHAR(30),

    company_name VARCHAR(30),
    position VARCHAR(30)
);

CREATE TABLE phone_numbers (
    id INT PRIMARY KEY AUTO_INCREMENT,

    number VARCHAR(20),

    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users(first_name, last_name, email, company_name, position) VALUES
('John', 'Doe', 'john.doe@gmail.com', '', 'Suspect'),
('Harry', 'Potter', 'theboywholived@gmail.com', 'Hogwarts', 'Student'),
('Darth', 'Vader', 'anakinskywalker@gmail.com', 'Death star', 'Sith');

INSERT INTO phone_numbers(number, user_id) VALUES
('+77777', 1),
('+66666', 2),
('+55555', 3);
