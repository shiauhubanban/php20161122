<?php
    $account = $_POST['account']; $passwd = $_POST['passwd'];
    $newPass = password_hash($passwd, PASSWORD_DEFAULT);
    try {
        $pdo = new PDO("mysql:host=127.0.0.1; dbname=member", "root", "87654321");
        $stmt = $pdo -> prepare("INSERT INTO member(member,password) VALUE (?,?)");
        $stmt ->bindParam(1,$account);
        $stmt ->bindParam(2,$newPass);
        if($stmt->execute()){
            echo  "ok";
        }else{
            echo "XX";
        }
    }catch (Exception $e){
        die("server busy");
    }