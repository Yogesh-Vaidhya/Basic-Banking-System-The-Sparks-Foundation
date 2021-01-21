<?php
include ('config.php');

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
    $sql = "SELECT * from user where Customer_ID=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from user where Customer_ID=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1[3]) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1[3] - $amount;
                $sql = "UPDATE user set Balance=$newbalance where Customer_ID=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE user set Balance=$newbalance where Customer_ID=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO transactions (`Sender`, `Receiver`, `Amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transaction_history.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
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
    <title>Transaction</title>
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
	<div class="started container">
        <h1>Transaction</h1>
            <?php
                include('config.php');
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  user where Customer_ID=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_array($result);
            ?>
            <form method="post"><br>
        <div>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                </tr>
                <tr>
                    <td><?php echo $rows[0]; ?></td>
                    <td><?php echo $rows[1]; ?></td>
                    <td><?php echo $rows[2]; ?></td>
                    <td><?php echo $rows[3]; ?></td>
                </tr>
            </table>
        </div>
        <br><br>
        <h2>Transfer To:</h2>
        <select name="to" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include('config.php');
                $sid=$_GET['id'];
                $sql = "SELECT * FROM user where Customer_ID!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_array($result)) {
            ?>
                <option value="<?php echo $rows[0];?>" >
                
                    <?php echo $rows[1] ;?> 
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
            <h2>Amount:</h2>
            <input type="number" name="amount" required placeholder="Enter Amount">   
            <br>
                <div class="text-center" >
            <button name="submit" type="submit"><h3>Transfer</h3></button>
            </div>
        </form>
    </div>
</body>
</html>