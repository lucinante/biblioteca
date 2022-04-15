<?php
    session_start();
    if($_SESSION) {
        include "connection_library.php";
        echo "<h1>MY LIBRARY BOOK RETURN</h1>";

        if($_POST){
            $id_loan=$_POST['id_loan'];
            $return_date=date("Y-m-d");

            $query="
                UPDATE prestiti
                SET data_restituzione='$return_date'
                WHERE id=$id_loan
            ";

            if($conn->query($query)) {
                echo "Book returned!";
                echo "</br><a href='book_return.php'>Click here to return another book</a>";
            }else
                echo "<a href='book_return.php'>Failed to return the book. Click here to retry!</a>";


        }else{
            $userid=$_SESSION['userid'];

            $query="
                SELECT id, data_inizio, data_fine, titolo, codice_isbn
                FROM prestiti INNER JOIN libri ON prestiti.ID_LIBRO=libri.CODICE_LIBRO
                WHERE prestiti.ID_LETTORE=$userid AND prestiti.data_restituzione is null
                ORDER BY data_inizio
            ";

            $result=$conn->query($query);

            echo "<form action='$_SERVER[PHP_SELF]' method='post'>";
            echo "<label for='loan'>Ongoing loans </label>";
            echo "<select name='id_loan' id='loan'>";

                if($result->num_rows>0)
                    echo "<option disabled>title; ISBN; borrow-date; end-loan</option>";
                else
                    echo "<option disabled>CONGRATULATIONS, YOU HAVE NO BOOKS TO RETURN!</option>";

                while($row=$result->fetch_assoc()){
                    $id_loan=$row['id'];
                    $date_start=$row['data_inizio'];
                    $date_end=$row['data_fine'];
                    $isbn_code=$row['codice_isbn'];
                    $title=$row['titolo'];

                    echo "<option value='$id_loan'>";
                        echo $title."; ".$isbn_code."; ".$date_start."; ".$date_end;
                    echo "</option>";
                }

            echo "</select>";
            echo "<input type='submit' value='return'>";
            echo "</form>";
        }
        echo "</br></br><a href='homepage.php'>Home</a>";


    }else{
        Header('Location: index.php');
    }




?>
