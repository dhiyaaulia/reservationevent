<?php 
// CREATE DATABASE CONNECTION
 $db = mysqli_connect('localhost', 'root', '', 'reservationevent') or die("connection failed" . mysqli_error());    

 // SELECT FORM FIELD DATA
 if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $event = mysqli_real_escape_string($db, $_POST['event']);
    $location = mysqli_real_escape_string($db, $_POST['location']);
    $detail = mysqli_real_escape_string($db, $_POST['detail']);

    // QUERY
    $query = mysqli_query($db, "INSERT INTO users(user,email,event,location,detail) VALUES('$username','$email','$event','$location','$detail') ");
    if ($query) {
        $_SESSION['success'] = "Your Reservation has been Submitted";
        $_SESSION['id'] = $db->inser_id;
        header('location: index.php');
        exit();
    } else {
        $_SESSION['error'] = "Tolong kembali cek pesanan anda";
    }
 }
    

//INSERT DATA TO DATABASE TO SAVE AS A RECORD
 

       