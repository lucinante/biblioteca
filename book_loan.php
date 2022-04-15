


<?php

/*
DA MODIFICARE LA QUERY CHE CERCA TUTTI I LIBRI PRESENTI, VERIRFICANDO CHE TUTTE LE DATE DI RESTITUZIONE NON SIANO NULL
*/
    session_start();


    if($_SESSION){
        include "connection_library.php";
        echo "<h1>MY LIBRARY SECRETARY</h1>";

        if($_POST){
            $dateLend=date('y-m-d');
            $dateReturn=$_POST['date_return'];
            $idUser=$_SESSION['userid'];
            $idBook=$_POST['id_book'];

            $query="
            INSERT INTO prestiti(data_inizio, data_fine, ID_LIBRO, ID_LETTORE)
            VALUES('$dateLend','$dateReturn','$idBook','$idUser')
        ";

            if($conn->query($query)===FALSE){
                echo "failed: ".$conn->error;
            }else{
                echo "prestito inserita...</br>";
                echo "<a href='book_loan.php'>premi qua per inserire un'altra!</a></br>";
            }

        }else {
            //cerco libri non ancora prestati e la loro quantità
            $queryBooks = "
            SELECT CODICE_LIBRO, titolo, CODICE_ISBN, COUNT(*) as qta_presente
            FROM libri LEFT JOIN prestiti ON libri.CODICE_LIBRO=prestiti.ID_LIBRO
            WHERE prestiti.ID_LIBRO IS null 
                OR prestiti.data_restituzione IS NOT null
            GROUP BY CODICE_ISBN
            ORDER BY titolo, CODICE_ISBN
        ";

            $resBooks = $conn->query($queryBooks);

            echo "<form action='$_SERVER[PHP_SELF]' method='post'>";

            echo "<label for='id_book'>Book: </label>";
            echo "<select name='id_book' id='id_book' required>";
            if ($resBooks->num_rows > 0)
                echo "<option disabled>TITLE; ISBN; QUANTITY</option>";
            else
                echo "<option disabled>NO BOOKS PRESENT YET</option>";
            while ($row = $resBooks->fetch_assoc()) {
                $id = $row['CODICE_LIBRO'];
                $titolo = $row['titolo'];
                $isbn = $row['CODICE_ISBN'];
                $qty = $row['qta_presente'];

                echo "<option value='$id'>";
                echo $titolo . ";   " . $isbn . ";   Qtà rimanente:   " . $qty;
                echo "</option>";
            }
            echo "</select>";
            echo "</br>";

            //
            echo "<label for='date_return'>Return date: </label>";
            echo "<input name='date_return' id='date_return' type='date' required>";

            echo "<input type='submit'>";
            echo "</form>";

            echo "</br></br><a href='homepage.php'>HOME</a>";
        }
    }else
        Header('Location: index.php');
?>