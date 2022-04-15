<?php
    session_start();
    if($_SESSION) {
        include "connection_library.php";
        echo "<h1>MY LIBRARY BOOK RETURN</h1>";

        if($_POST){


        }else{
            $userid=$_SESSION['userid'];

            $query="
                SELECT id, data_inizio, data_fine, titolo, codice_isbn
                FROM prestiti INNER JOIN libri ON prestiti.ID_LIBRO=libri.CODICE_LIBRO
                WHERE prestiti.ID_LETTORE=$userid
            ";

            $result=$conn->query($query);

            echo "<form action='$_SERVER[PHP_SELF]'>";
            echo "<select >"


            echo "<input type='submit'>";
            echo "</form>";

        }
    }else{
        Header('Location: index.php');
    }




?>
