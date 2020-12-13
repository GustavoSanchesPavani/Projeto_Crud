<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Alteração de Cadastro</title>
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  		<?php
        include "conexao.php";
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //$sql = "INSERT INTO `pessoas`( `nome`, `email`, `senha`) VALUES ('$nome','$email','$senha')";

        $sql = "UPDATE `pessoas` set `nome` = '$nome', `email` = '$email', `senha` = '$senha' WHERE cod_pessoa = $id";

        if (mysqli_query($conn, $sql)) {
            mensagem("$nome alterado com sucesso!", 'success');
        } else 
          mensagem("$nome NÃO alterado!", 'danger');
      ?>
      <hr>
      <a href="index.php" class="btn btn-primary">Voltar</a>
  		</div>
  	</div>


   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


  </body>
</html>