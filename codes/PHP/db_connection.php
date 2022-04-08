<?php

$servername = "127.0.0.1";
$serverusername = "root";
$serverpassword = "";

$handler1 = mysqli_connect($servername,$serverusername,$serverpassword);
mysqli_query($handler1, 'CREATE DATABASE deskauthoritydb');

$handler = mysqli_connect($servername,$serverusername,$serverpassword, "deskauthoritydb");

$create_table_query = "CREATE TABLE da_signup (
                        name VARCHAR(30) NOT NULL,
                        email VARCHAR(50) NOT NULL,
                        password VARCHAR(50) NOT NULL   
                    )";

mysqli_query($handler,$create_table_query);

?>