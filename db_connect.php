<?php
define('DB_NAME', 'zedep002');
define('DB_USER', 'edep002');
define('DB_PASSWORD','oMaIEqzNzZ$Fu/');
define('DB_HOST', 'oege.ie.hva.nl:3306');
$conn=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
?>