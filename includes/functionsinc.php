<?php

function emptyInputSignup($name, $email, $username, $pwd, $rptpwd) {
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($rptpwd)){
        $result = true;
    } 
    else{
        $result = false;
    }
    return $result;
}

function Invaliduid($username) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result =true;
    } else{
        $result=false;
    }
    return $result;
}

function Invalidemail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result =true;
    } else{
        $result=false;
    }  
    return $result;
}

function pwdmatch($pwd, $rptpwd) {
    $result;
    if($pwd !== $rptpwd){
        $result =true;
    } else{
        $result=false;
    }  
    return $result;
}

function uidexists($conn, $username, $email) {
    $sql = "SELECT * FROM usuario WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row; 
    } else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createuser($conn, $username, $email, $pwd, $name) {
    $sql = "INSERT INTO usuario (username, email, pwd, nombre) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmterror");
        exit();
    }

    $hashedpwd =password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedpwd, $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd) {
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    } 
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidexists($conn, $username, $username);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] =  $uidExists["id"];
        $_SESSION["useruid"] =  $uidExists["username"];
        header("location: ../index.php");
        exit();
    }
}