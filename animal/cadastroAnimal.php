<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<meta name = "viewport" content="width=device-width, initial-scale=1.0">
		<title> PetShop </title>
		<script src="../js/jquery.js" defer></script>
		<link rel = "stylesheet" href = "../css/bootstrap.css"/>
		<link rel = "stylesheet" href = "../css/custom.css"/> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
	</head>
	
	<?php
	
		$conexao = new mysqli("localhost", "root", "", "petshop");
	
		$animais = $conexao->query("SELECT * FROM cadastroanimal;");
	
		$id = 0;
		$nomeAnimal = "";
		$nomeDono = "";
		$idEspecie="";
		$raca = "";
		$dataNascimento = "";
		
	
	
		if (isset($_GET["id"])) 
		{
		
			$id = $_GET["id"];
			
			$dados = $conexao->query("SELECT * FROM cadastroanimal WHERE id = " . $id);
		
			$animal = $dados->fetch_assoc();
		
			$nomeAnimal = $animal["nomeAnimal"];
			$nomeDono = $animal["nomeDono"];
			$idEspecie = $animal["idEspecie"];
			$raca = $animal["raca"];
			$dataNascimento = $animal["dataNascimento"];
			
		
		}

	?>
	
	<body>
		<div class ="col-12 row" id="cabecalho">
			<div class="col-4">
			</div>
			<div class="col-4" id="logo" align="center">
				<img src= "../img/iconLogo.svg" alt="Logotipo do PetShop" title="PetShop" ></br>					
				<h6><span>Pet</span>Shop</h6>			
			</div>
			<div class="col-4" id="icones" align="right">
				<a href="https://www.instagram.com/" target="_blank"><img src= "../img/instagram.svg"></a>
				<a href="https://www.facebook.com/" target="_blank"><img src= "../img/facebook.svg"></a>
				<a href="https://web.whatsapp.com/" target="_blank"><img src= "../img/whatsapp.svg"></a>
				<a href="https://twitter.com/" target="_blank"><img src= "../img/twitter.svg"></a>
			</div>
			
		<div class="col-12 titulo">		
			<h3>Cadastro de Animal</h3>
			<a class="btn btn-info flutuarEsquerda" href="../especie/cadastroEspecie.php" role="button">Cadastro de Especie</a>
			<a class="btn btn-info flutuarDireita" href=" ../index.html" role="button">Página Inicial</a>
		</div>
		
		<div class="container">
			<div class="col-12" id="formularioCadastro">
				<form action="conexaoAnimal.php" method="POST" target="" >
					<div class="row col-12" >
					
						<div class="col-3 form-group">
							<label for="nomeAnimal" class="control-label">Nome do Animal: </label>
							<input type="text" class="form-control" id="nomeAnimal" name="nomeAnimal" placeholder="Nome do Animal" required value="<?=$nomeAnimal;?>">
						</div>
						<div class="col-3 form-group">
							<label for="nomeDono" class="control-label">Nome do Dono: </label>
							<input type="text" class="form-control" id="nomeDono" name="nomeDono" placeholder="Nome do dono" required value="<?=$nomeDono;?>">
						</div>
						
						<div class="col-2 form-group">
							<label for="idEspecie" class="control-label">Espécie: </label>
							<select id="idEspecie" name="idEspecie" class="form-control">
								<option value="">Selecione</option>
								<?php
									$especies = $conexao->query("SELECT * FROM cadastroespecie;");
									while($especie = $especies->fetch_assoc()){
								?>
										<option value="<?php echo $especie['id'];?>">
											<?php
												echo $especie['descricao'];
											?>
										</option><?php
									}
									?>
							</select>
						</div>	
						
						<div class="col-2 form-group">
							<label for="raca" class="control-label">Raça: </label>
							<input type="text" class="form-control" id="raca" name="raca" placeholder="Raça" required value="<?=$raca;?>">
						</div>
						<div class="col-2 form-group">
							<label for="dataNascimento" class="control-label">Data de Nascimento: </label>
							<input type="date" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="Data de Nascimento" required value="<?=$dataNascimento;?>">
						</div>
						
						<div class="col-3 form-group"><br/>
							<input type="hidden" name="id" value="<?=$id;?>" />
							<input id="botao-enviar" type="submit" class="btn btn-success" value="Salvar"></input>
							<a href="cadastroAnimal.php" class="btn btn-primary btn-bottom">Novo</a>
						</div>
						
					</div>				
				</form>
				
				<h3>Animais Cadastrados</h3>		
				
				<table class="table " id="dados">
					<thead>
						<tr>
							<div class="col-12 row form-group"> 
								<input type="text" id="pesquisar" placeholder="Pesquisar..." class="form-control" onkeyup="pesquisa($(this).val());" />									
							</div>
						</tr>
						<tr>
							<th>Nome do Animal:</th>
							<th>Nome do Dono:</th>
							<th>ID da Espécie:</th>
							<th>Raça:</th>
							<th>Data de Nascimento:</th>
							<th>Editar</th>
							<th>Excluir</th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						while ($animal = $animais->fetch_assoc()) {
					?>
						<tr>
							<td class="pesquisar"><?=$animal["nomeAnimal"];?></td>
							<td class="pesquisar"><?=$animal["nomeDono"];?></td>
							<td class="pesquisar"><?=$animal["idEspecie"];?></td>
							<td class="pesquisar"><?=$animal["raca"];?></td>
							<td class="pesquisar"><?=$animal["dataNascimento"];?></td>
							
							<td>
								<a href="cadastroAnimal.php?id=<?=$animal["id"];?>" class="btn btn-warning">
									Editar
								</a>
							</td>
							<td>
								<a href="excluirAnimal.php?id=<?=$animal["id"];?>" class="btn btn-danger" onclick="return confirm('Tem certeza?');">
									Excluir
								</a>
							</td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>			
			</div>
			<a class="btn btn-info" href="../index.html" role="button">Página Inicial</a>
		</div>	
		
		<div class="footer">
			<p>Desenvolvido por Dieyse Leal
				<br>dieysemichele@gmail.com</p>
			<div class="col-12" id="iconesFoot" align="right">
				<a href="https://www.instagram.com/" target="_blank"><img src= "../img/instagram.svg"></a>
				<a href="https://www.facebook.com/" target="_blank"><img src= "../img/facebook.svg"></a>
				<a href="https://web.whatsapp.com/" target="_blank"><img src= "../img/whatsapp.svg"></a>
				<a href="https://twitter.com/" target="_blank"><img src= "../img/twitter.svg"></a>
			</div>		
		</div>
	</body>
	<script>
		
		function pesquisa(texto) {
			
			texto = texto.trim().toLowerCase();
			
			$("table#dados tbody tr").each(function() {
				
				var tr = $(this);
				var mostrar = false;
				
				$("td.pesquisar", tr).each(function() {
					
					var texto_td = $(this).html().trim().toLowerCase();
					
					if (texto_td.includes(texto)) {
						mostrar = true;
					}
					
				});
				
				if (mostrar) {
					$(this).show();
				} else {
					$(this).hide();
				}
				
			});
			
		}			
		
	</script>
</html>
<?php
	
	mysqli_close($conexao);
	
?>