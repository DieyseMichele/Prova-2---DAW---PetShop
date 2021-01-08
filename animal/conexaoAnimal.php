<?php
	$id = "";
	$nomeAnimal = "";
	$nomeDono = "";
	$idEspecie="";
	$raca = "";
	$dataNascimento = "";
	
	if (isset($_POST["id"])) $id = $_POST["id"];
	if (isset($_POST["nomeAnimal"])) $nomeAnimal = $_POST["nomeAnimal"];
	if (isset($_POST["nomeDono"])) $nomeDono = $_POST["nomeDono"];
	if (isset($_POST["idEspecie"])) $idEspecie = $_POST["idEspecie"];
	if (isset($_POST["raca"])) $raca = $_POST["raca"];
	if (isset($_POST["dataNascimento"])) $dataNascimento = $_POST["dataNascimento"];
	
	$conexao = new mysqli("localhost","root", "","petshop");

	if ($id == 0) 
	{
		$sql = $conexao->prepare("INSERT INTO cadastroanimal(nomeAnimal,nomeDono,idEspecie,raca,dataNascimento) 
		VALUES ('$nomeAnimal','$nomeDono','$idEspecie','$raca','$dataNascimento')");		
		$sql->execute();
		
	} else 
	{
		$sql = $conexao->prepare("UPDATE cadastroanimal SET nomeAnimal = '$nomeAnimal', nomeDono = '$nomeDono', 
			idEspecie = '$idEspecie',raca = '$raca',dataNascimento = '$dataNascimento' 
			WHERE id = '$id'");
		$sql->execute();
	}
	mysqli_close(conexao);
	header("location: cadastroAnimal.php");
					
?>