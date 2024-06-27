<?php
    $connection = mysqli_connect("localhost", "root", "");

    if(!$connection)
    {
        die("Database Connection Failed");
    }

    $select_db = mysqli_select_db($connection, 'baza');

    if(!$select_db)
    {
        die("Database Selection Failed");
    }
?>