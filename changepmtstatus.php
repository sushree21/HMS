<?php
    $dsn = "mysql:dbname=myhmsdb;host=localhost";
    $username= "root";
    $password = "";
    $conn = new PDO($dsn,$username,$password);

    $conn->beginTransaction();
    $query = "update appointmenttb set paymentmode = ? where ID = ?";
    $res = $conn->prepare($query);
    $status = 'paynow';
    $data = array($status,$_GET['id']);
    $success = $res->execute($data);

    if($success){
        $conn->commit();
        header('location: admin-panel1.php#app-hist');
    } else {
        $conn->rollBack();
    }
?>