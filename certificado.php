<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCertificado.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Caveat&family=Sora:wght@600&display=swap" rel="stylesheet">
	
    <title>Seu Certificado</title>
</head>
<body>

<div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
  <div class="bg-danger p-4">
  	<h3><a href='index.php' class="text-black"> Página inicial</a> &nbsp &nbsp <a href='aluno.php' class="text-black">Veja Suas Notas</a></h3>
  </div>
</div>

<nav class="navbar navbar-danger bg-danger">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<h2 id="titulo" class="text-black shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight">Certificado</h2>

<div id="texto" class="shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight">
  <form id="formulario" class="row g-3" method="GET">
    <div>
      <label class="col-md-7" for="inputIdAluno" class="form-label">Informe o ID: </label>
      <input class="col-md-4" type="number" class="form-control" name="id" min="1" max="9999" id="inputIdAluno" placeholder="ID do aluno..." required>
    </div>
    <div>	
      <br><br><br>	
      <input id="btnChecar" type="submit" value="Checar" class="btn btn-danger">
    </div>
  </form>
</div>

<?php

    if ($_GET) {
        if (isset($_GET['id'])) {
            certificado();
    
    }}
    
function certificado()
{

    $id = $_GET['id'];
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
          $query = "SELECT id_aluno, nm_aluno FROM notas_alunos WHERE id_aluno = $id";
	        $result = mysqli_query($con, $query);
	
              if (mysqli_num_rows($result) == 0) {
              echo "<div id='texto1' class='shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight'> <h3>ID não existe no banco de dados. Revise as informações inseridas!</h3></div>";
              }
              else
              {
                  
                  echo '<script> document.getElementById("formulario").setAttribute("class", "paraEsconder"); </script>';

                  $resnome = mysqli_query ($con, "select nm_aluno from notas_alunos WHERE id_aluno = $id;");
                  $nomeArray = mysqli_fetch_array ($resnome);
                  $nome = $nomeArray[0];

                  $res2 = mysqli_query ($con, "select faltas from notas_alunos WHERE id_aluno = $id;");
                  $faltas = mysqli_fetch_array ($res2);
                  $faltas1 = intval ($faltas[0]);

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



                  echo '<div id="texto1" class="shadow-lg p-3 mb-5 bg-white rounded d-inline-flex p-2 bd-highlight"> Certificado de Conclusão

                  Este certificado atesta que o(a) Sr(a). '. $nome . ', tendo participado ativamente e demonstrado comprometimento ao longo do curso, concluiu com êxito o programa de treinamento "Linux Experts".<br><br>        
                  Detalhes do Curso:<br>        
                  Nome do Curso: Linux Experts<br>
                  Duração: 200 Horas<br>
                  Período: De 1 de julho de 2023 a 31 de agosto de 2023<br>
                  Local: Guarulhos<br><br>
                  
                  Avaliação do Desempenho:<br><br>
                  
                  Frequência: ' . 100 - ( $faltas1 * 100 / 50 ) . '%<br>
                  Nota Final: '. ($nota1 + $nota2 + $nota3 + $nota4) / 4 . '/100<br><br>
                  
                  Este certificado é concedido em reconhecimento ao comprometimento e à dedicação demonstrados por '. $nome . ' durante o curso "Linux Experts". Ao concluir com sucesso este programa de treinamento, o(a) Sr(a). ' . $nome . ' demonstrou competência nas áreas de administração e uso avançado do sistema operacional Linux.<br><br>
                  
                  Dado em Guarulhos, em 15/09/2023.<br><br>
                              
                  JALIM RHABEY ABHID TICOMIA, DIRETOR RESPONSÁVEL. CURSOS AGIOTA TECHNOLOGY.<br><br><br><br><br>
                  <input id="btnImprimir" class="btn btn-danger" type="SUBMIT"  value="Imprimir"></div>';                      
              }
      }
        
    mysqli_close ($con);  
}
    
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>