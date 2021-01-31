<?php
session_start();
include "server.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css.css">
    <title>CRUD</title>
</head>
<body>
    <div class="container">
        <div class="inserts">
            <h1>Hotel Reservation Event Form</h1>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Input Username" required=""><br>
                <input type="email" name="email" placeholder="Input Email" required=""><br>
                <input type="text" name="event" placeholder="Input Event" required=""><br>
                <input type="text" name="location" placeholder="Input Location" required=""><br>
                <textarea name="detail" placeholder="Add a Description Event" rows="10" required="">

                </textarea><br>
                <input type="submit" name="submit" value="Submit">
            </form> 
        </div> 
        <div class="views">
            <h1>Booking Report</h1>
            <h2>
                Terimakasih telah mengisi form. Pesanan telah kami terima <?php echo date('D, d M Y');?>
            </h2>
                <div class="links">
                     <div class="body">
                        <?php
                        $query = "SELECT * FROM users";
                        $return = mysqli_query($db, $query);

                        if($return){
                           if (mysqli_num_rows($return) > 0) {
                                $new_reserv = mysqli_fetch_all($return, MYSQLI_ASSOC);

                                foreach ($new_reserv as $value) {
                            ?>
                            <h4><?php echo $value['user'] ?></h4>
                                <a href="view.php?detail=<?php echo $value['id'] ?>">
                                    <?php
                                        if(strlen($value['detail']) >= 150) {
                                            echo substr($value['detail'], 0, 50) . "...";
                                            
                                        } else {
                                            echo $value['detail'];
                                        }
                                    ?>
                                </a>
                                <?php } } } ?>
                        </div>
                    </div>
                <p style="color: white;"> <strong>NOTE:</strong> THIS SECTION WILL BE VISIBLE FOR ADMIN </p>
                
        </div>
        
    </div>
</body>

</html>