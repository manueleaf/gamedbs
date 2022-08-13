<?php
session_start();

$imagen_monstruo = $_GET['id'];
$nameimagen = $_GET['id'].".jpg";
$extimagen = pathinfo($nameimagen);
$tmpimagen = $_FILES["imagen"] ["tmp_name"];
$ext =array("png","gif","jpg");
$urlnueva="../../../root/img/monsters/".$nameimagen;


if(is_uploaded_file($tmpimagen)) {
	if(array_search($extimagen["extension"],$ext)){
		move_uploaded_file($tmpimagen,$urlnueva);
		echo "Se ha guardado correctamente";
		header('location: ../modifmonst.php?MonsterID='.$_GET['id']);
		
	}else{
		echo "Error: solo imagenes con formato (jpg, png o gif)";
	}

}else{
	echo "Elija una imagen";
	echo '<script> window.location="../modifmonst.php"; </script>';
}

?>