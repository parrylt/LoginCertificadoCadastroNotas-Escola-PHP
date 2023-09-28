<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styleProfessor.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Caveat&family=Sora:wght@600&display=swap" rel="stylesheet">
	<title>Área do Professor</title>
</head>

<body>

<div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
  <div class="bg-primary p-4">
  	<h3><a href='index.php' class="text-black"> Página Inicial</a> &nbsp &nbsp <a href='verNotas.php' class="text-black">Ver Notas</a></h3>
  </div>
</div>

<nav class="navbar navbar-danger bg-primary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<h2 id="titulo" class="text-black shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight">Cadastre as notas do aluno</h2>

<div id="texto" class="shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight">

	<form class="row g-3" action="valida_cadastro.php" method="POST">
	<div>
		<label class="col-md-5" for="inputIdAluno" class="form-label">ID do aluno: </label>
		<input class="col-md-6" type="number" class="form-control" name="id" min="1" max="9999" id="inputIdAluno" placeholder="ID do aluno..." required>
	</div>
	<div>
		<label class="col-md-5" for="inputNome" class="form-label">Nome do aluno</label>
		<input class="col-md-6" type="text" class="form-control" name="nome" id="inputNome" placeholder="Nome do aluno..." required>
	</div>
	<div>
		<label class="col-md-5" for="inputNota1" class="form-label">Nota 1:</label>
		<input class="col-md-6" type="number" class="form-control" name="nota1" min="1" max="100" id="inputNota1" placeholder="Nota 1..." required>
	</div>
	<div>
		<label class="col-md-5" for="inputNota2" class="form-label">Nota 2:</label>
		<input class="col-md-6" type="number" class="form-control" name="nota2" min="1" max="100" id="inputNota2" placeholder="Nota 2..." required>
	</div>
	<div>
		<label class="col-md-5" for="inputNota3" class="form-label">Nota 3:</label>
		<input class="col-md-6" type="number" class="form-control" name="nota3" min="1" max="100" id="inputNota3" placeholder="Nota 3..." required>
	</div>
	<div>
		<label class="col-md-5" for="inputNota4" class="form-label">Nota 4:</label>
		<input class="col-md-6" type="number" class="form-control" name="nota4" min="1" max="100" id="inputNota4" placeholder="Nota 4..." required>
	</div>
	<div>
		<label class="col-md-5" for="inputFaltas" class="form-label">Quantidade de faltas:</label>
		<input class="col-md-6" type="number" class="form-control" name="faltas" min="0" max="50" id="inputFaltas" placeholder="Quantidade de faltas..." required>
	</div>
		<div>	
			<br><br><br>	
		<button id="btnCadastrar" type="submit" value="Cadastrar" class="btn btn-primary" formvalidate>Cadastrar</button>
		</div>
	</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>