<?php
    session_start();

	include "connection_library.php";

    if($_POST){
        $email=$_POST['email'];
        $pwd=$_POST['password'];

        $query="
            SELECT CODICE_LETTORE, email, password
            FROM lettori
            WHERE email='$email' and password='$pwd'
        ";

        $result=$conn->query($query);

        if($user=$result->fetch_assoc()){
            $_SESSION['userid']=$user['CODICE_LETTORE'];

            header("Location: homepage.php");
        }else{
            echo "<a href='index.php'> Password and username dont't match... Check your typo and CLICK to try again! </a>";
        }

    }else{
        echo"<h1>MY LIBRARY LOGIN PAGE</h1>";

        echo"
            <form action=".$_SERVER['PHP_SELF']." method='post'>
                <label for='email'>Email:</label>
                <input type='email' name='email' id='email' maxlength='128' minlength='5' required placeholder='user@example.com'>
                <label for='password'>Passowrd:</label>
                <input type='password' name='password' maxlength='32' minlength='2' required placeholder='password'>
                <input type='submit'>
            </form>
        ";

    }

    echo "</br></br><a href='user_registration.php'>Not a user yet? Click here to register!</a>"
?>

