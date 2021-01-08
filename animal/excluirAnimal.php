<?php
	
	$id = "";
	
	if (isset($_GET["id"])) $id = $_GET["id"];
	
	$conexao = new mysqli("localhost", "root", "", "petshop");
	
	$sql = $conexao->prepare("DELETE FROM cadastroanimal WHERE id = '$id'");

	$sql->execute();
	
	mysqli_close($conexao);
	
	header("location: cadastroAnimal.php");
	
?>