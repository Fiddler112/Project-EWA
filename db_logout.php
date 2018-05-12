<?php
//    session_start();
//    unset($_SESSION["login"]);
//    session_destroy();
//    echo "<script> alert('You've been logged off')";  Werkt niet?
    setcookie("profileName", "", time()-60, "/","", 0);
    setcookie("email", "", time()-60, "/","", 0);
    setcookie("gIdToken", "", time()-60, "/","", 0);
    setcookie("firstName", "", time()-60, "/","", 0);
    setcookie("firstName", "", time()-60, "/","", 0);
    setcookie("imgURL", "", time()-60, "/","", 0);

    header("Location: login.php");
    //logOut('login.php');
    
?>
<!--
<script>
  function logOut(location) {
      window.location = location;
  }
</script>-->
