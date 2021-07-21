<?php
include_once('connection.php');
$user = $_POST['fname'];
$amt = $_POST['amt'];
$id = $_GET['id'];
$query2="SELECT * FROM `customer` WHERE `acc_no`=$id";
$data2=mysqli_query($conn,$query2);
$result2=$data2->fetch_assoc();
$res=$result2['current'];
if($res>$amt && $amt>0) {
$sub=abs($amt-$result2['current']);
echo $sub;
$query3="UPDATE `customer` SET `current`='$sub' WHERE `acc_no`='$id'";
$data3=mysqli_query($conn,$query3);
$query="SELECT * FROM `customer` WHERE `firstname`='$user'";
$data=mysqli_query($conn,$query);
$result=$data->fetch_assoc();
$total=$amt+$result['current'];
$query1="UPDATE `customer` SET `current`='$total' WHERE `firstname`='$user'";
$data1=mysqli_query($conn,$query1);
$date=date("d-m-Y");
$time=date("h:i:s a");
echo $date;
echo $time;
$query5="SELECT * FROM `history` ORDER BY `id` DESC LIMIT 1";
$result5=mysqli_query($conn,$query5);
$res5=mysqli_fetch_assoc($result5);
$ids=$res5['id']+1;
$from=$result2['firstname'];
$to=$result['firstname'];
$acc1=$result2['acc_no'];
$acc2=$result['acc_no'];
$query4="INSERT INTO `history`(`id`, `from`, `acc1`, `to`, `acc2`, `date`, `time`, `amt`) VALUES ('$ids','$from','$acc1','$to','$acc2','$date','$time','$amt')";
$data4=mysqli_query($conn,$query4);
header("Location: http://localhost/webdev/banking%20system/transaction=Successfull");
}
else {
    header("Location: http://localhost/webdev/banking%20system/transaction=Failed");
    exit();
}
?>