<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleChecarNotas.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Caveat&family=Sora:wght@600&display=swap" rel="stylesheet">
    
    <title>Suas Notas</title>
    </head>
<body>

<div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
  <div class="bg-danger p-4">
  	<h3><a href='index.php' class="text-black"> Página Inicial</a> &nbsp &nbsp <a href='aluno.php' class="text-black">Veja suas notas</a></h3>
  </div>
</div>

<nav class="navbar navbar-danger bg-danger">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<h2 id="titulo" class="text-black shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight">Notas</h2>

<?php

    $id = $_POST['id'];
	$nome = $_POST['nome'];
    $host = "localhost:3306";
    $user = "root";
    $pass = "";
    $base = "curso_linux";
    $con = mysqli_connect ($host, $user, $pass, $base);

if (!$con) 
{
    die("<div id='texto1' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'> <h3>A Conexão falhou: </h3></div>" . mysqli_connect_error());
}
else
{

    if ($id != '')
    {

        $teste = "SELECT * FROM notas_alunos WHERE id_aluno = $id";
        $testeCon = mysqli_query($con, $teste);
 
        if (mysqli_num_rows($testeCon) === 0) 
        {
        echo "<div id='texto1' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'> <h3>ID não encontrado no banco de dados. </br>Tente novamente!</h3></div>";
        } 
        else
        {
        
            $res = mysqli_query ($con, "select * from notas_alunos WHERE id_aluno = $id;");

            echo "<div id='texto' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'><style> table,th,td{padding: 10px; border: 1px solid black; border-collapse: collapse; text-align: center;}</style>
            <table><tr><th>ID do Aluno</th><th>Nome do Aluno</th><th>1º Nota</th><th>2º Nota</th><th>3º Nota</th><th>4º Nota</th><th>Número de Faltas</th></tr></div>";

                while ($escrever = mysqli_fetch_array ($res))
                {
                    echo "</td><td>" . $escrever ['id_aluno'] . "</td><td>" . $escrever['nm_aluno'] . "</td><td>" . $escrever ['nota1'] . "</td><td>" . $escrever ['nota2'] . "</td><td>" . $escrever ['nota3'] . "</td><td>" . $escrever ['nota4'] . "</td><td>" . $escrever ['faltas'] . "</td><tr>";
                }   

            $res2 = mysqli_query ($con, "select faltas from notas_alunos WHERE id_aluno = $id;");
            $faltas = mysqli_fetch_array ($res2);
            $faltas1 = intval ($faltas[0]);

                if ($faltas1 >= 13)
                {

                echo "<div id='texto2' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'> <h3>Infelizmente, você recebeu uma reprovação por falta.<br><br>Sua frequência foi de " . 100 - ( $faltas1 * 100 / 50 ) . '%. </br> Adeus!</h3></div> ' ;
                }
                else if ($faltas1 < 13)
                {
                
                $resnota1 = mysqli_query ($con, "select nota1 from notas_alunos WHERE id_aluno = $id;");
                $nota1Array = mysqli_fetch_array ($resnota1);
                $nota1 = intval ($nota1Array[0]);

                $resnota2 = mysqli_query ($con, "select nota2 from notas_alunos WHERE id_aluno = $id;");
                $nota2Array = mysqli_fetch_array ($resnota2);
                $nota2 = intval ($nota2Array[0]);

                $resnota3 = mysqli_query ($con, "select nota3 from notas_alunos WHERE id_aluno = $id;");
                $nota3Array = mysqli_fetch_array ($resnota3);
                $nota3 = intval ($nota3Array[0]);

                $resnota4 = mysqli_query ($con, "select nota4 from notas_alunos WHERE id_aluno = $id;");
                $nota4Array = mysqli_fetch_array ($resnota4);
                $nota4 = intval ($nota4Array[0]);
        
                    if ( ($nota1 + $nota2 + $nota3 + $nota4) / 4 <= 80)
                    {
                        echo  "<div id='texto3' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'> <h3>Infelizmente, você recebeu uma reprovação por nota ruim. <br>Aliás, sua frequência foi de " . 100 - ( $faltas1 * 100 / 50 ) . '%. </br> Adeus! </h3></div>';
                    }
                    else if ( ($nota1 + $nota2 + $nota3 + $nota4) / 4 > 80)
                    {
                        $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
                        echo "<div id='texto2' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'> <h3>Meus parabéns, Você conseguiu. </br> Clique no botão abaixo para ver o seu certificado!</br>Aliás, sua frequência foi de " . 100 - ( $faltas1 * 100 / 50 ) . '%.</h3></div>';
                        echo "<div class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight' id='txtCert'<h1><a href='certificado.php' class='text-danger'>Ver meu certificado</a></h1></div>";
                    }
                }
        }
    }
    else
    {

    $teste = "SELECT * FROM notas_alunos WHERE nm_aluno = '$nome'";
    $testeCon = mysqli_query($con, $teste);
 
        if (mysqli_num_rows($testeCon) === 0) 
        {
        echo "<div id='texto1' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'> <h3>Aluno não encontrado no banco de dados. </br> Tente novamente!</h3></div>";
        } 
        else
        {
        $res = mysqli_query ($con, "select * from notas_alunos WHERE nm_aluno = '$nome';");
        echo "<div id='texto' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'><style> table,th,td{padding: 10px; border: 1px solid black; border-collapse: collapse; text-align: center;}</style>
        <table><tr><th>ID do Aluno</th><th>Nome do Aluno</th><th>1º Nota</th><th>2º Nota</th><th>3º Nota</th><th>4º Nota</th><th>Número de Faltas</th></tr></div>";

            while ($escrever = mysqli_fetch_array ($res))
            {
                echo "</td><td>" . $escrever ['id_aluno'] . "</td><td>" . $escrever['nm_aluno'] . "</td><td>" . $escrever ['nota1'] . "</td><td>" . $escrever ['nota2'] . "</td><td>" . $escrever ['nota3'] . "</td><td>" . $escrever ['nota4'] . "</td><td>" . $escrever ['faltas'] . "</td><tr>";
            }

            $res2 = mysqli_query ($con, "select faltas from notas_alunos WHERE nm_aluno = '$nome';");
            $faltas = mysqli_fetch_array ($res2);
            $faltas1 = intval ($faltas[0]);
            
            if ($faltas1 > 10)
            {
                echo "<div id='texto3' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'> <h3>Infelizmente, você recebeu uma reprovação por falta.<br>Sua frequência foi de " . 100 - ( $faltas1 * 100 / 50 ) . '%. </h3><br></div>';  
            }
            else if ($faltas1 < 10)
            {
                $resnota1 = mysqli_query ($con, "select nota1 from notas_alunos WHERE nm_aluno = '$nome';");
                $nota1Array = mysqli_fetch_array ($resnota1);
                $nota1 = intval ($nota1Array[0]);

                $resnota2 = mysqli_query ($con, "select nota2 from notas_alunos WHERE nm_aluno = '$nome';");
                $nota2Array = mysqli_fetch_array ($resnota2);
                $nota2 = intval ($nota2Array[0]);

                $resnota3 = mysqli_query ($con, "select nota3 from notas_alunos WHERE nm_aluno = '$nome';");
                $nota3Array = mysqli_fetch_array ($resnota3);
                $nota3 = intval ($nota3Array[0]);

                $resnota4 = mysqli_query ($con, "select nota4 from notas_alunos WHERE nm_aluno = '$nome';");
                $nota4Array = mysqli_fetch_array ($resnota4);
                $nota4 = intval ($nota4Array[0]);
        
                if ( ($nota1 + $nota2 + $nota3 + $nota4) / 4 <= 80)
                {
                    echo  "<div id='texto3' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'> <h3>" . $nome .", infelizmente, você recebeu uma reprovação por nota ruim.<br>Aliás, sua frequência foi de " . 100 - ( $faltas1 * 100 / 50 ) . "%. <br>Adeus!</h3></div>";
                }
                else if ( ($nota1 + $nota2 + $nota3 + $nota4) / 4 > 80)
                {
                    $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
                    echo "<div id='texto2' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'> <h3>Meus parabéns, " . $nome . ". Você conseguiu. </br> Clique no botão abaixo para ver o seu certificado!</br>Aliás, sua frequência foi de " . 100 - ( $faltas1 * 100 / 50 ) . '%.</h3></div>';
                    echo "<div class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight' id='txtCertNome' <h1><a href='certificado.php' class='text-danger'>Ver meu certificado</a></h1></div>";
                
                }
            }
        }   
    }
}



    echo "</table>";
    echo "</br></br>";

    mysqli_close ($con);

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>