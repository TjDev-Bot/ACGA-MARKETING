<?php
    ob_start();

    // $servername = "sql300.infinityfree.com";
    // $username = "if0_36567256";
    // $password = "6ZVhpPoskWrf";
    // $dbname = "if0_36567256_genkicms";

    $servername = "sql208.infinityfree.com";
    $username = "if0_37055028";
    $password = "eiGjpEiYVRuHxS";
    $dbname = "if0_37055028_acg_marketing";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die ("Connection failed: " . mysqli_connect_error());
    }