<?php

if (isset($_POST['signIn'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Connect to deskauthoritydb
    require_once 'db_connection.php';


    $query_e = "SELECT email FROM da_signup WHERE email = '$email'";
    $result_e = mysqli_query($handler,$query_e);
    $query_p = "SELECT password FROM da_signup WHERE password = '$password'";
    $result_p = mysqli_query($handler,$query_p);

    if ((mysqli_num_rows($result_e) == 1) && (mysqli_num_rows($result_p) == 1)) {
        echo "<script>window.location='../homepage.html'</script>";
    }
    else {
        echo "<script>alert('Login Failed')</script>";
        echo "<script>window.location='account.php?signin=loginfailed'</script>";
        exit();
    }
}

else {
    header("location: account.php");
}

?>