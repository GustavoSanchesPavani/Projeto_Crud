<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilo.css" >

    <title>Cadastro</title>
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  		<?php
        include "conexao.php";

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $foto = $_FILES['foto'];
        $nome_foto = mover_foto($foto);

        $sql = "INSERT INTO `pessoas`( `nome`, `email`, `senha`, `foto`) VALUES ('$nome','$email','$senha', '$nome_foto')";

        if (mysqli_query($conn, $sql)) {

            mensagem("$nome cadastrado com sucesso!", 'success');
        } else 
          mensagem("$nome NÃO cadastrado !", 'danger');
      ?>
      <hr>
      <a href="index.php" class="btn btn-primary">Voltar</a>
  		</div>
  	</div>


   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


  </body>
</html>