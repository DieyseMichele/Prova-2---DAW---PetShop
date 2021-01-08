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
	
		$especies = $conexao->query("SELECT * FROM cadastroespecie;");
	
		$id = 0;
		$descricao = "";
	
	
		if (isset($_GET["id"])) 
		{
		
			$id = $_GET["id"];
			
			$dados = $conexao->query("SELECT * FROM cadastroespecie WHERE id = " . $id);
		
			$especie = $dados->fetch_assoc();
		
			$descricao = $especie["descricao"];
		
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
			<h3>Cadastro de Espécie</h3>
			<a class="btn btn-info flutuarEsquerda" href="../index.html" role="button">Página Inicial</a>
			<a class="btn btn-info flutuarDireita" href="../animal/cadastroAnimal.php" role="button">Cadastro de Animal</a>
		</div>
		
		<div class="container">
			<div class="col-12" id="formularioCadastro">
				<form action="conexaoEspecie.php" method="POST" target="" >
					<div class="row col-12" >
					
						<div class="col-6 form-group">
							<label for="descricao" class="control-label">Descrição da Espécie: </label>
							<input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" required value="<?=$descricao;?>">
						</div>
						
						<div class="col-3 form-group"><br/>
							<input type="hidden" name="id" value="<?=$id;?>" />
							<input id="botao-enviar" type="submit" class="btn btn-success" value="Salvar"></input>
							<a href="cadastroEspecie.php" class="btn btn-primary btn-bottom">Novo</a>
						</div>
						
					</div>				
				</form>
				
				<h3>Espécies Cadastradas</h3>		
				
				<table class="table " id="dados">
					<thead>
						<tr>
							<div class="col-12 row form-group"> 
								<input type="text" id="pesquisar" placeholder="Pesquisar..." class="form-control" onkeyup="pesquisa($(this).val());" />									
							</div>
						</tr>
						<tr>
							<th>Descrição:</th>
							<th>Editar</th>
							<th>Excluir</th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						while ($especie = $especies->fetch_assoc()) {
					?>
						<tr>
							<td class="pesquisar"><?=$especie["descricao"];?></td>
							
							<td>
								<a href="cadastroEspecie.php?id=<?=$especie["id"];?>" class="btn btn-warning">
									Editar
								</a>
							</td>
							<td>
								<a href="excluirEspecie.php?id=<?=$especie["id"];?>" class="btn btn-danger" onclick="return confirm('Tem certeza?');">
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