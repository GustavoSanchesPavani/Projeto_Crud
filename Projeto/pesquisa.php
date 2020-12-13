<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilo.css" >

    <title>Pesquisar</title>
  </head>
  <body>

    <?php
  
        $pesquisa = $_POST['busca'] ?? '';

      include "conexao.php";

      $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

      $dados = mysqli_query($conn, $sql);

      ?>

  	<div class="container">
  		<div class="row">
  			<div class="col">
  			   <h1>Pesquisar</h1>

           <nav class="navbar navbar-light bg-light">
             <form class="form-inline" action="pesquisa.php" method="POST">
               <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Search" name="busca">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
             </form>
           </nav>
           <table class="table table-hover">
             <thead>
               <tr>
                 <th scope="col">Foto</th>
                 <th scope="col">Nome</th>
                 <th scope="col">Email</th>
                 <th scope="col">Senha</th>
                 <th scope="col">Funções</th>
               </tr>
             </thead>
             <tbody>

              <?php

      while ($linha = mysqli_fetch_assoc($dados) ) {
        $cod_pessoa = $linha['cod_pessoa'];
        $nome = $linha['nome'];
        $email = $linha['email'];
        $senha = $linha['senha'];
        $foto = $linha['foto'];
       
        echo "<tr>
                <td><img src='img/$foto' class='lista_foto'</td>
                <th scope='row'>$nome</th>
                 <td>$email</td>
                 <td>$senha</td>
                 <td width=150px>
                     <a href = 'cadastro_edit.php?id=$cod_pessoa' class ='btn btn-success btn-sm'>Editar</a>
                     <a href = '#' class ='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#excluir' 
                     onclick=" .'"' ."pegar_dados($cod_pessoa, '$nome')".'"'.">Excluir</a>
                 </td>
               </tr>";
             }
         ?>
           <!-- onclick="pegar_dados($id, '$nome')" -->
             
             </tbody>
           </table>
  			   
           <a href="index.php" class="btn btn-info">Voltar para o inicio</a>
  			</div>
  		</div>
  	</div>

    <div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span arial-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="excluir_script.php" method="POST">
        <p>Deseja realmente excluir <b id="nome_pessoa">Nome da pessoa</b>?</p> 
      </div>
      <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
           <input type="hidden" name="nome" id="nome_pessoa_1" value="">
           <input type="hidden" name="id" id="cod_pessoa" value="">
           <button type="submit" class="btn btn-danger" data-bs-dismiss="Sim">Sim</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  
    <script type="text/javascript">
      function pegar_dados(id, nome) {
        document.getElementById('nome_pessoa').innerHTML = nome;
        document.getElementById('cod_pessoa').value = id;
        document.getElementById('nome_pessoa_1').value = nome;
      }
    </script>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


  </body>
</html>