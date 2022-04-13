<?php
    include "connection_library.php";
    echo "<h1>MY LIBRARY SECRETARY</h1>";
    //cerco libri non ancora prestati e la loro quantità
    $queryBooks="
        SELECT CODICE_LIBRO, titolo, CODICE_ISBN, COUNT(*) as qta_presente
        FROM libri LEFT JOIN prestiti ON libri.CODICE_LIBRO=prestiti.ID_LIBRO
        WHERE prestiti.ID_LIBRO IS null
        GROUP BY CODICE_ISBN
        ORDER BY titolo, CODICE_ISBN
    ";
    $queryUsers="
        SELECT CODICE_LETTORE, nome, cognome, codice_fiscale 
        FROM lettori
        ORDER BY cognome, nome, codice_fiscale
    ";

    $resBooks=$conn->query($queryBooks);
    $resUsers=$conn->query($queryUsers);


    echo "<form action='lend_book.php' method='post'>";

        //
        echo "<label for='id_user'>User: </label>";
        echo "<select name='id_user' id='id_user' required>";
            echo "<option disabled>Surname; Name; TAX ID</option>";
            while($row=$resUsers->fetch_assoc()){
                $id=$row['CODICE_LETTORE'];
                $nome=$row['nome'];
                $cognome=$row['cognome'];
                $cf=$row['codice_fiscale'];

                echo "<option value='$id'>";
                    echo $cognome.";   ".$nome.";   ".$cf;
                echo "</option>";
            }
        echo "</select>";
        echo "</br>";

        echo "<label for='id_book'>Book: </label>";
        echo "<select name='id_book' id='id_book' required>";
            echo "<option disabled>TITLE; ISBN; QUANTITY</option>";
            while($row=$resBooks->fetch_assoc()){
                $id=$row['CODICE_LIBRO'];
                $titolo=$row['titolo'];
                $isbn=$row['CODICE_ISBN'];
                $qty=$row['qta_presente'];

                echo "<option value='$id'>";
                    echo $titolo.";   ".$isbn.";   Qtà rimanente:   ".$qty;
                echo "</option>";
            }
        echo "</select>";
        echo "</br>";

        //
        echo "<label for='date_return'>Return date: </label>";
        echo "<input name='date_return' id='date_return' type='date' required>";

        echo "<input type='submit'>";
    echo "</form>";
    
    echo "</br></br><a href='index.php'>HOME</a>";
?>