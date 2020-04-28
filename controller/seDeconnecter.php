<?php
session_start(); // j ouvre la session
$_SESSION = array(); // je met les session a 0
setcookie("catch_up_name","", time()- 4200,'/'); // je perime le cookie et tu le vide
setcookie("catch_up_type_user","", time()- 4200,'/');
unset($_COOKIE["catch_up_name"]); // je supprime les variable direct pas la valeur du cookie pour etre sur
unset($_COOKIE["catch_up_type_user"]);
header('Location: ../view/index.php'); // redirection
session_destroy(); // je detruit la session
?>
