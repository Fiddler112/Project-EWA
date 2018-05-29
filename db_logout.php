<?php
//    session_start();
//    unset($_SESSION["login"]);
//    session_destroy();
//    echo "<script> alert('You've been logged off')";  Werkt niet?
//    setcookie("profileName", "", time()-60, "/","", 0);
//    setcookie("email", "", time()-60, "/","", 0);
//    setcookie("gIdToken", "", time()-60, "/","", 0);
//    setcookie("firstName", "", time()-60, "/","", 0);
//    setcookie("firstName", "", time()-60, "/","", 0);
//    setcookie("imgURL", "", time()-60, "/","", 0);
//    unset($_COOKIE["firstName"]);
//    unset($_COOKIE["email"]);
//    unset($_COOKIE["gIdToken"]);
//    setcookie("email", "", time()-3600);
//    setcookie("gIdToken", "", time()-3600);
    // unset cookies
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
    header("Location: login.php");
    logOut('login.php');
    
?>

<script>
  function logOut(location) {
      window.location = location;
  }
</script>
