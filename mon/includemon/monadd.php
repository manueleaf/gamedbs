<?php

if (isset($_POST["submit"])){

    $name = $_POST['name'];
    $atk = $_POST['atk'];
    $def = $_POST['def'];
    $hp = $_POST['hp'];
    $spd = $_POST['spd'];

    require_once '../../includes/dbhinc.php';
    require_once '../../includes/functionsinc.php';

    if(emptyInputMonster($name, $atk,$def,$hp,$spd) !== false){
        header("location: ../agregarMonstruo.php?=emptyinput");
        exit();
    }
    newMonster($conn, $name, $atk,$def,$hp,$spd);
} else {
    header("location: ../agregarMonstruo.php");
    exit;
}