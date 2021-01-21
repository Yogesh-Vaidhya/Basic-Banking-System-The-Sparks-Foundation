<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Transfer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        include('config.php');
        $query = "SELECT * FROM user";
        $result = mysqli_query($conn,$query);
    ?>

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
    <div class="started">
        <h1>Money Transfer</h1>
        <br>
            <table>
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Name </th>
                        <th> E-mail </th>
                        <th> Balance </th>
                        <th>Operation </th>
                    </tr>
                </thead>
                <tbody>
        <?php
                while($row = mysqli_fetch_array($result)){
        
        ?>          
                    <tr>
                        <td style="text-align:center;"> <?php echo $row[0]; ?></td>
                        <td> <?php echo $row[1]; ?></td>
                        <td> <?php echo $row[2]; ?></td>
                        <td> <?php echo $row[3]; ?></td>
                        <td><a class = "Operation" href="selecteduser.php? id=<?php echo $row['Customer_ID'];?>">Transfer</a></td>
                    </tr>
    <?php } ?>
                </tbody>
            </table>
    </div>
</body>
</html>