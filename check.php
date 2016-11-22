<?php
    $account = $_POST['account']; $passwd = $_POST['passwd'];
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=member","root","87654321");
        $sql = "SELECT * FROM member WHERE member = '{$account}'";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbpasswd =  $result['password'];
        if (password_verify($passwd, $dbpasswd)){
            echo 'OK';
        }else{
            echo 'XX';
        }
    }catch (Exception $e){
        die("Server Busy");
    }