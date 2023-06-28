CREATE DATABASE myserver;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com');