<?php
	$id = "";
	$descricao = "";
	
	if (isset($_POST["id"])) $id = $_POST["id"];
	if (isset($_POST["descricao"])) $descricao = $_POST["descricao"];
	
	$conexao = new mysqli("localhost","root", "","petshop");

	if ($id == 0) 
	{
		$sql = $conexao->prepare("INSERT INTO cadastroespecie(descricao) VALUES ('$descricao')");		
		$sql->execute();
		
	} else 
	{
		$sql = $conexao->prepare("UPDATE cadastroespecie SET descricao = '$descricao' WHERE id = '$id'");
		$sql->execute();
	}
	mysqli_close(conexao);
	header("location: cadastroEspecie.php");
					
?>