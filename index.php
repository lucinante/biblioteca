<?php
    session_start();

	include "connection_library.php";

    if($_POST){
        $email=$_POST['email'];
        $pwd=$_POST['password'];

        $query="
            SELECT email, password
            FROM lettori
            WHERE email='$email' and password='$pwd'
        ";

        $result=$conn->query($query);

        if($result->num_rows >0){


            header("Location: homepage.php");
        }else{
            echo "<a href='index.php'> Password and username unmatch... Check your typo and CLICK to try again! </a>";
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
?>

