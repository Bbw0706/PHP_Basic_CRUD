<?php 
    //! mysqli_connect("localhost", "username", "password", "dbname")
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //? Check Conn

    if(mysqli_connect_errno()){
        echo "Error, " . mysqli_connect_errno();
    }


