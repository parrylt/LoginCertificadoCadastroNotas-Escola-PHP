<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAluno.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Caveat&family=Sora:wght@600&display=swap" rel="stylesheet">
    <title>Área dos Alunos</title>
</head>

<body>

<div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
  <div class="bg-danger p-4">
  <h3><a href='index.php' class="text-black"> Página Inicial</a></h3>
  </div>
</div>

<nav class="navbar navbar-danger bg-danger">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<h2 id="titulo" class="text-black shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight">Veja suas notas aqui</h2>	 

<div id="texto" class="shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight">
	<form class="row g-3" action="checar_notas.php" method="POST">
    <div>
      <label class="col-md-5" for="inputId" class="form-label">Informe o ID:</label>
      <input class="col-md-6" type="number" class="form-control" id="inputId" name="id" min="0" max="9999" placeholder="ID...">
    </div>

    <div>
      <label class="col-md-5  text-danger" class="form-label">&nbsp &nbsp OU</label>
    </div>

    <div>
      <label class="col-md-5" for="inputNome" class="form-label">Informe Nome Completo:</label>
      <input class="col-md-6" type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome Completo...">
    </div>
    <div>	
      <br><br><br>	
      <button id="btnChecar" type="submit" value="Checar" class="btn btn-danger">Checar</button>
    </div>
	</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>