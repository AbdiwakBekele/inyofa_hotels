<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rental Confirmation</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">
    </head>

    <body>

        <br><br>

        <div class="container">
            <?php
            require("db.php");
                    if(isset($_POST['Submit']) ){
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $rental_id = $_POST['rental_id'];
                    $checkin = $_POST['checkin'];
                    $checkout = $_POST['checkout'];

                    $sql = "INSERT INTO rental_reservation (rental_id, first_name, last_name, email, phone, checkin, checkout) 
                                VALUES ('$rental_id','$firstname', '$lastname', '$email', '$phone', '$checkin', '$checkout') ";

                    $sql_result = mysqli_query($con, $sql);
                    if($sql_result){

                        $msg = "<div class='alert alert-success' > You have successfully reserved a rental property </div> ";
                        echo $msg;

                        // $sql_update = "UPDATE rental SET status ='YES' WHERE rental_id = '$rental_id'";
                        // $update_result = mysqli_query($con, $sql_update);
                        // if($update_result){
                        //     $msg = "<div class='alert alert-success' > You have successfully reserved a rental property </div> ";
                        //     echo $msg;
                        // }else{
                        //     $msg = "<div class='alert alert-danger' > Error Reserving a property </div> ";
                        //     echo $msg;
                        // }
                    }else{
                        $msg = "<div class='alert alert-success' > You have successfully reserved a rental property </div> ";
                        echo $msg;
                    }

                    }
                ?>
            <a class="btn btn-lg btn-primary" style="text-decoration: none;" href="rental.php"> Go Back</a>
        </div>

    </body>

</html>