<?php
session_start();
if(!isset($_SESSION['zalogowano']))
{
    header('Location: index.php');
    exit();
}
?>
<!DOCKTYPE HTML>
<HTML>
<HEAD>
    <meta charset="utf-8" />
    <title>Logowanie</title>
</HEAD>
<BODY>

<?php

 echo "Zalogowany jako: ".$_SESSION['login']. ' [<a href="logout.php">Wyloguj</a>] ';
?>


</BODY>
</HTML>