<?php
    session_start();
    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = "Tehking99"; /* Password */
    $dbname = "assignment"; /* Database name */

    $con = mysqli_connect($host, $user, $password,$dbname);
    // Check connection
    if (!$con) {
        ie("Connection failed: " . mysqli_connect_error());
    }

?>