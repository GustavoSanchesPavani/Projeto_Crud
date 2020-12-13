<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Alteração de Dados</title>
  </head>
  <body>


      <?php

      include "conexao.php";
      $id = $_GET['id'] ?? '';
      $sql ="SELECT * FROM pessoas WHERE cod_pessoa = $id";

      $dados = mysqli_query($conn, $sql);
      $linha = mysqli_fetch_assoc($dados);
?>

  	<div class="container">

  		<div class="row">

  			<div class="col">

  			   <h1>Cadastro</h1>

  			   <form action="edit_script.php" method="POST">

  			   	<div class="mb-3">
  			   	   <label for="nome">Nome Completo</label>
  			   	   <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome']; ?>">
  			   	 </div>

  			   	 	<div class="mb-3">
  			   	   <label for="email">Email</label>
  			   	   <input type="email" class="form-control" name="email" value="<?php echo $linha['email']; ?>">
  			   	 </div>

  			   	 	<div class="mb-3">
  			   	   <label for="senha">Senha</label>
  			   	   <input type="text" class="form-control" name="senha" value="<?php echo $linha['senha']; ?>">
  			   	 </div>

  			   	 	<div class="mb-3">
  			   	   <input type="submit" class="btn btn-success" value="Salvar Alterações" >
               <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa']; ?>">
  			   	 </div>

  			   </form>

           <a href="index.php" class="btn btn-info">Voltar para o inicio</a>

  			</div>
  		</div>
  	</div>


   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


  </body>
</html>