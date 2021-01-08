<?php
	
	$id = "";
	
	if (isset($_GET["id"])) $id = $_GET["id"];
	
	$conexao = new mysqli("localhost", "root", "", "petshop");
	
	$sql = $conexao->prepare("DELETE FROM cadastroespecie WHERE id = '$id'");

	$sql->execute();
	
	mysqli_close($conexao);
	
	header("location: cadastroEspecie.php");
	
?>