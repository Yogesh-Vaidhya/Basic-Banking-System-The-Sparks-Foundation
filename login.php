<?php
    session_start();
    include('config.php');
    if(isset($_POST['Submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $balance = $_POST['balance'];
        $sql = "INSERT INTO user(Name,Email_ID,Balance) VALUES ('$name','$email','$balance')";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            echo " Error";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>SignUp</title>
</head>
<body>
    <div class="Navigation">
        <nav>
            <a href="index.php">CENTRAL BANK</a>
            <a href="home.php">Home</a>
            <a href="login.php">SignUp</a>
            <a href="view_users.php">View Customers</a>
            <a href="payment_transfer.php">Money Transfer</a>
            <a href="transaction_history.php">Transaction History</a>
        </nav>
    </div>
    <br>
    <h1 style="text-align:center;color:blue">Sign Up</h1>
    <div class="form container">
        <form action="login.php" method="post">
            <h4>User Name</h4> <input type="text" name = "name" required placeholder="John" style="padding:15px;color:white">
            <h4>E-Mail :</h4> <input type="email" name="email" required placeholder="abcd@gmail.com" style="padding:15px;color:white">
            <h4>Amount :</h4> <input type="number" name="balance" required placeholder="Enter Amount" style="color:white">
            <button name="Submit" type="submit" value="Submit"><h3>Submit</h3></button>
        </form>
    </div>
</body>
</html>