<?php
//  $conn = mysqli_connect("oege.ie.hva.nl", "edep002", 'oMaIEqzNzZ$Fu/', "zedep002");
//// Check connection
//if (!$conn) {
//    die('Could not connect: ' . mysql_error());
//}

//localdatabase
  $conn = mysqli_connect("localhost", "root", '', "zedep002");
// Check connection
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

?>