<?php
    $account = $_POST['account']; $passwd = $_POST['passwd'];
    $newPass = password_hash($passwd, PASSWORD_DEFAULT);
    try {
        $pdo = new PDO("mysql:host=127.0.0.1; dbname=member", "root", "87654321");
        $stmt = $pdo -> prepare("INSERT INTO member(member,password) VALUE (?,?)");
        $stmt ->bindParam(1,$account);
        $stmt ->bindParam(2,$newPass);
        if($stmt->execute()){
            echo 'OK';
            // 以下進行檔案上傳處理
            $newid = $pdo -> lastInsertId();
            $upload = $_FILES['upload'];  // 上傳檔案的資訊 => 陣列
            if($upload['error']==0){
                if (copy($upload['tmp_name'], "upload/icon_{$newid}.jpg")){
                    echo 'OK2';
                }else{
                    echo 'Copy Fail';
                }
            }else{
                echo 'Upload Fail:' . $upload['error'];
            }
        }else{
            echo 'XX';
        }
    }catch (Exception $e){
        die("server busy");
    }