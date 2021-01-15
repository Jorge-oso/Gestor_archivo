<?php
session_start();

if(isset($_SESSION['usuario'])){
	include "header.php";
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body><center>
		<div class="col-sm-12" style="background: #154360;">
			<section>
				<div style="color: white;">
					<h1 style="font-size: 50px;">Gestor de Archivos <br>
												"Imagenes, MP3 Y MP4</h1>
					<img src="../img/archivo1.jpg" style="border-radius: 5px; width: 20%;"><br><br>
					<img src="../img/MP3.png" style="border-radius:  5px; width: 20%;">
					<img src="../img/MP4.png" style="border-radius: 5px; width: 20%;">
				</div>
			</section>
		</div>
	</center>
</body>
</html>
<?php
include "footer.php";
} else {
	header("location:../index.php");
}
?>
