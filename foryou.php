
<h1>MY LIBRARY FOR YOU PAGE</h1>

<?php
    /*
     methodo serialize cookie by Haseeb Saleemi.
     */
    include "connection_library.php";

    if(isset($_COOKIE['library_preferred_genre'])){
        $cookie_name='library_preferred_genre';
        $preferences=unserialize($_COOKIE[$cookie_name]);

        function quote($str){
            return sprintf("'%s'", $str);
        }

        $preferencesArray=implode(",", array_map("quote",$preferences));


        $query="
            SELECT *
            FROM libri
            WHERE genere IN ($preferencesArray)
        ";

        $query=substr($query, 0, -3);

        $result=mysqli_query($conn, $query);

        if($result->num_rows>0) {

            echo "<table>";
            echo "<th>ISBN</th>";
            echo "<th>Title</th>";
            echo "<th>Genre</th>";
            echo "<th>Author</th>";
            echo "<th>Editor</th>";
            echo "<th>Language</th>";
            echo "<th>Edition</th> <tr>";

            while ($row = $result->fetch_assoc()) {

                echo "<td>";
                echo $isbn = $row['CODICE_ISBN'];
                echo "</td>";

                echo "<td>";
                echo $title = $row['titolo'];
                echo "</td>";

                echo "<td>";
                echo $title = $row['genere'];
                echo "</td>";

                echo "<td>";
                echo $title = $row['autore'];
                echo "</td>";

                echo "<td>";
                echo $title = $row['editore'];
                echo "</td>";

                echo "<td>";
                echo $title = $row['lingua'];
                echo "</td>";

                echo "<td>";
                echo $title = $row['edizione'];
                echo "</td>";

                echo "<tr>";
            }

            echo "</table>";
        }else{
            echo "No books found with currently set preferences!";
        }

    }else{
        echo "</br><a href='set_preference.php'You dont have any preference yet, click here to set</a>";
        //echo "</br><a href='homepage.php'You dont have any preference yet, click here to set</a>";
    }

    echo "</br></br><a href='homepage.php'> </a>";


?>