<!--Transaction Page-->

<?php
include_once('php/connection.php');
$query="select * from customer";
$query1="select * from customer";
if (isset($_GET['id'])) { 
    $id=$_GET['id']; 
    $query="select * from customer where acc_no!=".$_GET['id'];
    $query1="select * from customer where acc_no=".$_GET['id'];
}
$result=mysqli_query($conn,$query);
$result1=mysqli_query($conn,$query1);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Transaction</title>
        <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,intial-scale=1.0">
	<link rel="stylesheet" href="css/tstyle1.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
                <li><a href="history">History</a></li>
            </ul>
        </div>
    </div>


    <!--Transaction Section Starts-->
    <div class="main">
        <h1>Transaction</h1>
        <form method="POST" action="php/trans.php?id=<?php echo $id;?>">
            <table class="table">
                <tbody>
                <tr>
                    <td data-label="To">
                        <?php
                            if($result->num_rows>0) {
                            echo "<select name='fname'>";
                            while($row=$result->fetch_assoc()) {
                                echo "<option>".$row["firstname"]."</option>";
                            }
                            echo "</select><br>";
                            }
                            else {
                                echo "0 result";
                            }
                        ?>
                    </td>
                    <td data-label="Amount">
                        <input type="number" name="amt" placeholder="Enter Amount" required>
                    </td>
                    <td>
                    <button type="submit">Transfer</button>
                    </td>
                </tr>
                </tbody>
            </table>            
        </form>
    </div>


    <!--Customer Detail Section Starts-->
    <div class="table-container">
    <h1 class="heading">Customers Details</h1>
    <table class="table1">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Account No</th>
            <th>Email</th>
            <th>Balance</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($result1->num_rows>0) {
            if($rows=$result1->fetch_assoc()) {
                echo "<tr><td data-label='First Name'>".$rows["firstname"]."</td><td data-label='Last Name'>".$rows["lastname"]."</td><td data-label='Account No'>".$rows["acc_no"]."</td><td data-label='Contact'>".$rows["email"]."</td><td data-label='Balance'>".$rows["current"]."</td></tr>";
            }
            echo "</tbody></table>";
        }
        else {
            echo "0 result";
        }
        ?>
    </tbody>
    </table>
    </div>

    
    </body>
</html>