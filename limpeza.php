<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="../css/estilo.css">

    <title>Armazém Granel - Produtos</title>
    <link rel="icon" href="../img/logoOficial.png" class="navbar-brand">
  </head>
  <body>
    <div id="fundoTodos">
      <header> <!--inicio header-->
        <nav class="navbar navbar-expand-md navbar-light navbar-transparente"> <!--inicio nav-->
          <div class="container"> <!--inicio container-->
            <img src="../img/logoOficial.png" width="100">

            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">  <!--inicio button-->
              <i class="fas fa-bars text-white"></i>
            </button> <!--final button-->

            <div class="collapse navbar-collapse" id="nav-principal"> <!-- inicio div collapse-->

              <ul class="navbar-nav ml-auto"> <!--inicio ul-->
                <li class="nav-item">
                  <a href="index.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                  <a href="sobreNos.html" class="nav-link">Sobre nós</a>
                </li>
                <li class="nav-item">
                  <a href="categorias.html" class="nav-link navAtivo">Produtos</a>
                </li>
                <li class="nav-item">
                  <a href="embalagens.php" class="nav-link">Embalagens</a>
                </li>
                <li class="nav-item">
                  <a href="cartões.html" class="nav-link">Cartões</a>
                </li>
              
                <li class="nav-item">
                  <a href="contato.html" class="nav-link">Contato</a>
                </li>

                <li class="nav-item divisor">
                
                </li>
                <li class="nav-item">
                  <a href="login.html" class="nav-link navAtivo">Login</a>
                </li>
                <li class="nav-item">
                  <a href="cadastro.html" class="nav-link ">Cadastrar</a>
                </li>



              </ul> <!--final ul-->

            </div> <!--final div collapse-->

          </div> <!--final container-->

        </nav> <!--final nav-->

      </header> <!--final header-->

      <section id="homeProdutos">
        <div class="container containerCustom clearfix">
          <div class="container2 clearfix">
            
          
                <h2>Limpeza</h2>

            <!-- inicio abacate -->

            <?php 	

                  session_start();

                  include_once '../Banco.php';


                      $result = mysqli_query($con,"SELECT * FROM tb_limpeza ORDER BY nome_limpeza");

                      
                        while($dados = mysqli_fetch_array($result)){
                        $NomeLimpeza = $dados['nome_limpeza'];
                        $valorLimpeza  = $dados['valor_limpeza'];
                        $imgLimpeza = $dados['img_limpeza'];
                        
                      
                ?>
            
                  <div class="produtos">
                    <div class="row">
                      <div class="col">
                        <img src="../imgProdutos/<?php echo $imgLimpeza?>" class="imgCustomProdutos">
                      </div>
                      
                      <div class="col">
                        
                          <form action="produtos.php" method="post">
                            <input class="form-control customInput d-none" type="text" value="<?php echo $imgLimpeza?>" name="img" ReadOnly>
                            <input class="form-control customInput" type="text" value="<?php echo $NomeLimpeza?>" name="nomeProduto" ReadOnly>
                            <input class="form-control customInput" type="text" value="R$ <?php echo $valorLimpeza?>" name="valor" ReadOnly>
                            <input class="form-control customInput" type="number" placeholder="Quantidade" name="quantidade" width="200">
                            <span class="customSpan">350 ml</span>
                            <input class="form-control customInput d-none" type="text" value="350 ml" name="tipo" ReadOnly>
                            <input class="form-control customInput d-none" type="text" value="" name="tamanho" ReadOnly>
                            <input class="form-control customInput d-none" type="text" value="limpeza" name="pagina" ReadOnly>
                            <button class="btn btn-info customInput" type="submit" name="btn-adicionar" id="botaoAdicionar">Adicionar ao carrinho</button>
                          </form>
                      </div>
                      
                    </div>
                  </div>

                <?php }
                 ?>


            <!-- final abacate -->


            
            

            
            
            
          </div>
        </div>
      </section>
    </div>



    <footer>
      <div class="container">
        <div class="row">
          <div class="mt-3">
            <span>
              &copy; Copyright - 2020 | Armazém Granel - Pedro Esteves
          </span>
          </div>
        </div>
      </div>
    </footer>

    













    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>