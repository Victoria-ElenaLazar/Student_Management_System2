<?php

"CREATE TABLE students (
    registration_number VARCHAR(225) NOT NULL,
    student_name VARCHAR(225) NOT NULL,
    student_grade INTEGER NOT NULL,
    student_classroom INTEGER NOT NULL,
    classroom_id INTEGER NOT NULL,
    created_on DATE NOT NULL,
    PRIMARY KEY (registration_number),
    FOREIGN KEY (classroom_id) REFERENCES classrooms(classroom_id)
)";

"CREATE TABLE classrooms (
    classroom_id VARCHAR(225) NOT NULL ,
    classroom_name VARCHAR(225) NOT NULL,
    created_on DATE NOT NULL,
    PRIMARY KEY (classroom_id)
)";
"CREATE TABLE users(
    user_id int NOT NULL AUTO_INCREMENT,
    email VARCHAR(225) NOT NULL,
    password VARCHAR(225) NOT NULL,
    created_on date NOT NULL, 
    PRIMARY KEY (user_id)
)";

