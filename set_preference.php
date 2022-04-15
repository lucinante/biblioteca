<?php
session_start();

if($_SESSION){
    include "connection_library.php";
    echo "<h1>MY LIBRARY SET GENRE PREFERENCE</h1>";

    if($_POST){
        $tmpstr=implode(" ",$_POST['genre']);

        //set cookie
        $cookie_name="library_preferred_genre";
        $cookie_value=explode(" ",$tmpstr);

        setcookie($cookie_name, serialize($cookie_value), time()+(86400), '/');


        //if(isset($_COOKIE[$cookie_name]))
            echo "preferences saved, try looking at the section <a href='foryou.php'>for you</a>!";
        //else
       //     echo "preferences not set, operation failed!";


    }else{      //ask for preferences
        $query="
            SELECT DISTINCT genere
            FROM libri
        ";
        $result=$conn->query($query);


        echo "<form action='$_SERVER[PHP_SELF]' method='post'>";

            while($row=$result->fetch_assoc()){
                $genre=$row['genere'];
                echo "<input type='checkbox' name='genre[]' value='$genre'>$genre</input>";
            }

            echo "<input type='submit'>";
        echo "</form>";
    }

    echo "</br></br><a href='homepage.php'>Back to home</a>";
}else
    Header("Location: index.php");
?>



