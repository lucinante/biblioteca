<?php
session_start();

if($_SESSION){
    echo "<h1>MY LIBRARY SECRETARY</h1></br></br>";

    echo "<a href='set_preference.php'>SET GENRE PREFERENCE</a></br>";
    echo "<a href='foryou.php'>FOR YOU PAGE</a></br>";
    echo "<a href='book_loan.php'>LEND A BOOK</a></br>";

    echo "</br></br><a href='logout.php'>LOG-OUT</a>";
}else
    Header("Location: index.php");
?>
