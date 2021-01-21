<?php
    session_start();
    include('config.php');
    $query = "SELECT * FROM transactions";
    $result = mysqli_query($conn,$query);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Transaction History</title>
</head>
<body>
    <div class="Navigation">
        <nav>
            <a href="index.php">CENTRAL BANK</a>
            <a href="home.php">Home</a>
            <a href="login.php">Sign Up</a>
            <a href="view_users.php">View Customers</a>
            <a href="payment_transfer.php">Money Transfer</a>
            <a href="transaction_history.php">Transaction History</a>
        </nav>
    </div>
    <br> <br> 

    <div>
        <table>
            <thead>
                <tr>
                    <th> Sr. No </th>
                    <th> Sender </th>
                    <th> Receiver </th>
                    <th> Amount </th>
                    <th> TimeStamp </th>
                </tr>
            </thead>

        <?php
                while($row = mysqli_fetch_array($result)){

        ?>
            <tbody>
                <tr>
                    <td> <?php echo $row[0]; ?></td>
                    <td> <?php echo $row[1]; ?></td>
                    <td> <?php echo $row[2]; ?></td>
                    <td> <?php echo $row[3]; ?></td>
                    <td> <?php echo $row[4]; ?></td>
                </tr>
            </tbody>
        <?php } ?>
        </table>
    </div>
    
</body>
</html>