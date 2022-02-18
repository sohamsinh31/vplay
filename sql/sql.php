<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "vuploads";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
$sql =" CREATE TABLE users (
    id varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    image varchar(255) NOT NULL,
    PRIMARY KEY (Personid)
    "
);
$sql2 = " CREATE TABLE persons (
    id varchar(255) NOT NULL,
    Name varchar(255) NOT NULL,
    Description varchar(255) NOT NULL,
    thumbpath varchar(255) NOT NULL,
    vidpath varchar(255) NOT NULL,
    uploadedby varchar(255) NOT NULL,
    PRIMARY KEY (id)
    "
);
"
?>