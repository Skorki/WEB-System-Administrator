<?php
    session_start();

    if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
    {
        header('Location: index.php');
        exit();
    }

    require_once "connect.php";


    $connect = @new mysqli($host,$db_user,$db_password,$db_name);

    if ($connect->connect_errno!=0)
    {
        echo "Error: ".@$connect->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");


        $sql = "SELECT * FROM users WHERE login='$login' AND pass='$haslo'";

        if ($rezultat = @$connect->query(sprintf("SELECT * FROM users WHERE login='%s' AND pass='%s'",
            mysqli_real_escape_string($connect,$login),
            mysqli_real_escape_string($connect,$haslo))))
        {
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0)
            {
                $_SESSION['zalogowano'] = true;
                $wiersz = $rezultat->fetch_assoc();
                $_SESSION['id'] = $wiersz['id'];
                $_SESSION['login'] = $wiersz['login'];
                unset($_SESSION['blad_logowania']);

                $rezultat->close();

                header('Location: kolejka.php');
            } else {
                $_SESSION['blad_logowania'] = '<span style ="color:red">Nieprawidłowy login lub hasło!</span>';
                header('Location: index.php');
            }
        }
        else{
            echo "nie2";
        }
        $connect->close();
    }
?>