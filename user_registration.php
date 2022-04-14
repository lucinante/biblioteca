<?php
include "connection_library.php";
echo "<h1>MY LIBRARY SECRETARY REGISTRATION FORM</h1></br></br>";

if($_POST) {
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query_user_exists="
        SELECT email, password
        FROM lettori
        WHERE email='$email'
    ";

    //controllare se utente esiste gia, potrebbe essere migliorata con un contorllo dinamico durante la registrazione
    if($conn->query($query_user_exists)->num_rows > 0){
        echo "</br></br><a href='user_registration.php'>Email already registered... Click to try again!</a>";
    }else{
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $gender=$_POST['gender'];
        $bdate=$_POST['bdate'];
        $title=$_POST['title'];
        $idnumber=$_POST['id'];
        $nationality=$_POST['nationality'];
        $city=$_POST['city'];
        $street=$_POST['street'];
        $house_number=$_POST['house_number'];
        $phone_number=$_POST['phone_number'];

        $query_register="
            INSERT INTO lettori(nome,cognome,sesso, data_di_nascita, titolo_di_studio, codice_fiscale,
                                paese, citta, via, numero_civico, email, password, numero_telefono)
                VALUES('$name','$surname','$gender','$bdate','$title','$idnumber','$nationality','$city','$street','$house_number','$email','$password','$phone_number');
        ";

        if($conn->query($query_register)===FALSE){
            echo "FAILED: ".$conn->error;
        }else{
            echo "Registration completed!";
            echo "</br></br><a href='index.php'>Already have an account? Click here to log in!</a>";
        }

    }

}else {
    echo "
        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            <label for='email'>Email:</label>
            <input type='email' id='email' name='email' minlength='5' maxlength='128' required>
            <label for='password'>Password:</label>
            <input type='password' id='password' name='password' minlength='4' maxlength='32' required>
            </br></br>

            <label for='name'>Name: </label>
            <input type='text' id='name' name='name' minlength='2' maxlength='32' required>
            <label for='surname'>Surname:</label>
            <input type='text' id='surname' name='surname' minlength='2' maxlength='32' required>
            </br></br>

            <label for='gender'>Gender:</label>
            Male<input type='radio' id='gender' name='gender' value='Maschio'>
            Female<input type='radio' id='gender' name='gender' value='Femmina'>
            </br></br>
            
            <label for='bdate'>Date of birth:</label>
            <input type='date' id='bdate' name='bdate' required>
            </br></br>
            
            <label for='title'>Study title:</label>
            <input type='text' id='title' name='title' maxlength='64' required>
            <label for='id'>TAX ID:</label>
            <input type='text' id='id' name='id' minlength='16' maxlength='16' required>
            <label for='nationality'>Nationality:</label>
            <input type='text' id='nationality' name='nationality' maxlength='32' required>
            </br></br>    
            
            <label for='city'>City:</label>
            <input type='text' id='city' name='city' maxlength='32' required>
            <label for='street'>Street:</label>
            <input type='text' id='street' name='street' maxlength='32' required>
            <label for='house_number'>House number:</label>
            <input type='number' id='house_number' name='house_number' required>
            </br></br>
            

            <label for='phone_number'>Phone number:</label>
            <input type='text' id='phone_number' name='phone_number' minlength='8' maxlength='15' required>
            </br></br>
            
            <input type='submit' value='Register now'>
        </form>
    ";

    echo "</br></br><a href='index.php'>Already have an account? Click here to log in!</a>";
}


?>