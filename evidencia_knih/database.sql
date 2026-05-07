CREATE DATABASE IF NOT EXISTS evidencia_knih;
USE evidencia_knih;

CREATE TABLE authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    year INT NOT NULL,
    author_id INT NOT NULL,
    FOREIGN KEY (author_id) REFERENCES authors(id)
);

INSERT INTO authors (name) VALUES
('J. K. Rowling'),
('J. R. R. Tolkien'),
('George Orwell');

INSERT INTO books (title, year, author_id) VALUES
('Harry Potter a Kameň mudrcov', 1997, 1),
('Hobit', 1937, 2),
('1984', 1949, 3);