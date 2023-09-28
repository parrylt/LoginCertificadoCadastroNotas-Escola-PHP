<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styleValidaCadastro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Caveat&family=Sora:wght@600&display=swap" rel="stylesheet">
    

<div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
  <div class="bg-primary p-4">
  	<h3><a href='index.php' class="text-black"> Página inicial</a> &nbsp &nbsp <a href='professor.php' class="text-black">Cadastro de Notas</a></h3>
  </div>
</div>

<nav class="navbar navbar-danger bg-primary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

    <title>Área do Professor</title>
</head>
<body>

<?php

    $id = $_POST['id'];
    $nome = $_POST['nome'];
	$nota1 = $_POST['nota1'];
	$nota2 = $_POST['nota2'];
	$nota3 = $_POST['nota3'];
	$nota4 = $_POST['nota4'];
	$faltas = $_POST['faltas'];
	$host  = "localhost:3306";
	$user  = "root";
	$pass  = "";
    $base  = "curso_linux";
	$con   = mysqli_connect($host, $user, $pass, $base);
	
if (!$con) {
	die("A Conexão falhou: " . mysqli_connect_error());
}
else
{
	$query = "SELECT id_aluno, nm_aluno FROM notas_alunos WHERE id_aluno = $id OR nm_aluno = '$nome'; ";
	$result = mysqli_query($con, $query);
	
	if (mysqli_num_rows($result) > 0) {
		echo "<div id='texto1' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'> <h3>ID e/ou nome já existe no banco de dados. Revise as informações de cadastro!</h3></div>";
	}
	else
	{
		$res = mysqli_query($con,"INSERT INTO notas_alunos (id_aluno, nm_aluno, nota1, nota2, nota3, nota4, faltas) VALUES($id,'$nome','$nota1','$nota2','$nota3','$nota4','$faltas')"); 
		echo ("<div id='texto2' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'> <h2>Cadastro realizada com sucesso!</h2></div>");

		$res2 = mysqli_query($con,"SELECT * FROM notas_alunos;");
		echo '<div id="texto" class="shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight">';

		echo "<style> table,th,td{padding: 10px; border: 1px solid black; border-collapse: collapse; text-align: center;}</style>
		<table><tr><th>ID do Aluno</th><th>Nome do Aluno</th><th>1º Nota</th><th>2º Nota</th><th>3º Nota</th><th>4º Nota</th><th>Número de Faltas</th></tr>";

		while($escrever=mysqli_fetch_array($res2))
		{
		echo "</td><td>" . $escrever['id_aluno'] . "</td><td>" . $escrever['nm_aluno'] . "</td><td>". $escrever['nota1'] . "</td><td>". $escrever['nota2'] . "</td><td>". $escrever['nota3'] . "</td><td>". $escrever['nota4'] . "</td><td>". $escrever['faltas'] . "</td></tr>";
		}
    }
}

echo "</table>";

echo "</br></br>";
mysqli_close($con);
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
