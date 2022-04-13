<?php
    include "connection_library.php";
    echo "<h1>MY LIBRARY SECRETARY</h1>";

    $dateLend=date('y-m-d');
    $dateReturn=$_POST['date_return'];
    $idUser=$_POST['id_user'];
    $idBook=$_POST['id_book'];

    $query="
        INSERT INTO prestiti(data_inizio, data_fine, ID_LIBRO, ID_LETTORE)
        VALUES('$dateLend','$dateReturn','$idBook','$idUser')
    ";

    if($conn->query($query)===FALSE){
        echo "failed: ".$conn->error;
    }else{
	echo "<h1>MY LIBRARY SECRETARY REGISTRATION FORM</h1></br></br>";
        echo "prestito inserita.. </br>";
        echo "<a href='index.php'>premi qua per inserire un'altra!</a></br>";
    }
    
    echo "</br></br><a href='index.php'>HOME</a>";
?>
