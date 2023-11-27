<?php
    $dsn = "mysql:dbname=myhmsdb;host=localhost";
    $username= "root";
    $password = "";
    $conn = new PDO($dsn,$username,$password);

    $conn->beginTransaction();
    $query = "update appointmenttb set approvalstatus = ? where ID = ?";
    $res = $conn->prepare($query);
    $status = '';
    if($_GET['status'] === 'pending'){
        $status = 'approve';
    } else{
        $status = 'pending';
    }
    $data = array($status,$_GET['id']);
    $success = $res->execute($data);

    if($success){
        $conn->commit();
        header('location: admin-panel1.php#app-hist');
    } else {
        $conn->rollBack();
    }
?>