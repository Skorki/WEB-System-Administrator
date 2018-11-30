<?php
    session_start();
    if((isset($_SESSION['zalogowano'])) && ($_SESSION['zalogowano']== true))
    {
        header('Location: kolejka.php');
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
<form action="login.php" method="post">

    Login:
    <input title="Login" type="text" name="login" /> <br /><br />
    Hasło:
    <input title="Haslo" type="password" name="haslo" />

    <input type="submit" value="Zaloguj"/>
</form>
<?php
    if(isset($_SESSION['blad_logowania'])) echo $_SESSION['blad_logowania'];
?>




</BODY>
</HTML>