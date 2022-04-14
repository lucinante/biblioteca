<?php
    session_start();

    include "connection_library.php";
    echo "<h1>MY LIBRARY SECRETARY</h1>";

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
        echo "prestito inserita.. </br>";
        echo "<a href='book_loan.php'>premi qua per inserire un'altra!</a></br>";
    }
    
    echo "</br></br><a href='homepage.php'>HOME</a>";
?>
