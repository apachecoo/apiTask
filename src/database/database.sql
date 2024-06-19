CREATE DATABASE IF NOT EXISTS level2_employees;

USE level2_employees;

CREATE TABLE IF NOT EXISTS `employees`
(
    id int(11) NOT NULL AUTO_INCREMENT,
    dni bigint NOT NULL,
    name varchar(255) NOT NULL,
    lastName varchar(255) NOT NULL,
    gender ENUM('M','F') NOT NULL,
    birthdate date NOT NULL,
    joindate date NOT NULL,
    salary integer NOT NULL,
    PRIMARY KEY (id),
    UNIQUE(dni)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

 insert into employees(dni, name, lastName,gender, birthdate,joindate,salary) values (11102053366,'Leonor','Cardona Hernandez','F','1992-06-01','2022-01-16',4000000);


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    token VARCHAR(255)
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);



GRANT ALL PRIVILEGES ON level2_employees.* TO 'user'@'%';

FLUSH PRIVILEGES;