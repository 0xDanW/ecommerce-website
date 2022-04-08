<?php

if (isset($_POST['signUp'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to deskauthoritydb
    require_once 'db_connection.php';

    // Check if email exists in database
    $query_e = "SELECT * FROM da_signup WHERE email = '$email'";
    $result_e = mysqli_query($handler,$query_e);
    
    if (mysqli_num_rows($result_e) > 0) {
        echo "<script>alert('Account already exists with this email')</script>";
        echo "<script>window.location='account.php?signup=emailalreadyexist'</script>";
        exit();
    }

    // Store data into table
    $sql_query = "INSERT INTO DA_signup (name, email, password) VALUES ('$name','$email','$password')";
    mysqli_query($handler,$sql_query);
    echo "<script>alert('Account Successfully Created')</script>";
    echo "<script>window.location='account.php?signup=success'</script>";
}

else {
    header("location: ./PHP/account.php");
}

?>