<!--Transaction History Page-->

<?php
include_once('php/connection.php');
$query="SELECT * FROM `history` ORDER BY id DESC";
$result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,intial-scale=1.0">
	<link rel="stylesheet" href="css/hist.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>History</title>
</head>
<body>
    <!--Navigation Bar Starts-->
    <div class="nav">
        <div class="max-width">
            <div class="logo">
                <a href="#">Spark <span>Bank</span></a>
            </div>
            <ul class="menu">
                <li><a href="home">Home</a></li>
                <li><a href="customer">Customers</a></li>
                <li><a href="transaction">Transaction</a></li>
                <li class="hom">History</li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </div>


    <!--History Section Starts-->
    <div class="table-container">
    <h1 class="heading">Transaction History</h1>
    <table>
    <thead>
        <tr>
            <th>From</th>
            <th>Account No</th>
            <th>To</th>
            <th>Account No</th>
            <th>Date</th>
            <th>Time</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($result->num_rows>0) {
            while($row=$result->fetch_assoc()) {
                echo "<tr><td data-label='From'>".$row["from"]."</td><td data-label='Acc No'>".$row["acc1"]."</td><td data-label='To'>".$row["to"]."</td><td data-label='Acc No'>".$row["acc2"]."</td><td data-label='Date'>".$row["date"]."</td><td data-label='time'>".$row["time"]."</td><td class='last' data-label='Amount'>".$row["amt"]."</td></tr>";
            }
            echo "</tbody></table>";
        }
        ?>
    </tbody>
    </table>
    </div>

    
</body>
</html>