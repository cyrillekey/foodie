<?php
include('../../conf/pdo_conf.php');
if(isset($_POST['loginbut'])){
    $username=$_POST['uname'];
    $_mail=$_POST['umail'];
    $pwd=$_POST['pwd'];
    //error handle
    if(empty($username) || empty($_mail) || empty($pwd)){
        header('Location:../html/signup.php?error=missing');
        exit();
    }elseif(!filter_var($_mail,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location:../html/signup.php?error=invalmailuser");
        exit();
    }
    elseif (!filter_var($_mail,FILTER_VALIDATE_EMAIL)) {
        header("Location:../html/signup.php?error=invalmail");
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location:../html/signup.php?error=invaluser");
        exit();
    }
    elseif(strlen($pwd)<6){
        header("Location:../html/signup.php?error=pwdlen");
        exit();

    }else{
        $sql="select * from users_table where user_id=?";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$username]);
        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count(array_filter($row))>0){
            header("location:../html/signup.php?error=usertaken");
            exit();
        }else{
            $sql="select * from users_table where user_email=?";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([$_mail]);
            $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count(array_filter($row))>0){
                header("location:../html/signup.php?error=mailtaken");
                exit();
            }else{
                $hashpwd=password_hash($pwd,PASSWORD_DEFAULT);
                $sql="Insert into users_table(user_id,user_email,user_password) values(?,?,?)";
                $stmt=$pdo->prepare($sql);
                $stmt->execute([
                    $username,
                    $_mail,
                    $hashpwd

                ]);
                header("location:../html/login.php?Error=signsucc");
                exit();    
            }
        }

    }
}else{
    header("location:../html/signup.php");
    exit();
}