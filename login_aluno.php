<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLogin.css">
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

<h2 id="titulo" class="text-black shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight">Login</h2>

<div id="texto" class="shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight">

	<form class="row g-3" method="GET">
	<div>
		<label class="col-md-5" for="inputEmail" class="form-label">E-mail: </label>
		<input class="col-md-6" type="email" class="form-control" name="email" id="inputEmail" placeholder="E-mail" required>
	</div>
	<div>
		<label class="col-md-5" for="inputSenha" class="form-label">Senha</label>
		<input class="col-md-6" type="password" class="form-control" name="senha" id="inputSenha" placeholder="Senha" required>
	</div>
		<div>	
			<br><br><br>	
		<button id="btnLoginAluno" type="submit" class="btn btn-danger" formvalidate>Login</button>
		</div>
	</form>
</div>


<?php

    if ($_GET) {
        if (isset($_GET['email'])) {
            login();
    
    }}
    
function login()
{

    $email= $_GET['email'];
    $host = "localhost:3306";
    $user = "root";
    $pass = "";
    $base = "curso_linux";
    $con = mysqli_connect ($host, $user, $pass, $base);

        if (!$con) {
            die("A Conexão falhou: " . mysqli_connect_error());
        }
        else
        {
            if ($email != '')
            {
        
                $teste = "SELECT * FROM loginAluno WHERE email = '$email';";
                $testeCon = mysqli_query($con, $teste);
         
                if (mysqli_num_rows($testeCon) === 0) 
                {
                echo "<script type='text/javascript'>alert ('E-mail e/ou Senha incorretos ou não cadastrados. Tente novamente.');</script>";
                } 
                else
                {
                    header('Location: aluno.php');
                    exit;
                }
            }
        }
        mysqli_close ($con);
}


?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>