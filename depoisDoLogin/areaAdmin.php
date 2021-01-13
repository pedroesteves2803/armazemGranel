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

    <title>Armazém Granel - Contato</title>
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
                    <a href="logout.php" class="nav-link">Sair</a>
                  </li>


              </ul> <!--final ul-->

            </div> <!--final div collapse-->

          </div> <!--final container-->

        </nav> <!--final nav-->

      </header> <!--final header-->

      <section id="homePesquisa">
        <div class="container containerCustom">
            <div class="row">
                <div class="col-sm-12"> 
                  <form>
                  <div class="input-group customPesquisa">
                    <input class="form-control customPesquisa" type="text" placeholder="Codigo" name="codigo">
                    <button class="btn btn-info customPesquisa" type="submit" name="btn-buscar" id="botaoBuscar"><i class="fas fa-search"></i> Buscar</button>
                  </div>
                  </form>
                </div>

                <div class="col-sm-12">
                    <h2>Produtos pedidos</h2>

                <?php 	

                  session_start();

                  include_once '../Banco.php';

                  if(isset($_GET['btn-buscar'])){
                      $codigo = filter_input(INPUT_GET, 'codigo');

                      if(empty($codigo)){
                        echo "<script type= text/javascript language= javascript>
                        alert('Por favor, informe um codigo');
                        location.href='areaAdmin.php';
                        </script>";

                      }
                      else{

                        $result = mysqli_query($con,"SELECT * FROM tb_produtosUsuariosConfirmado WHERE id_usuario =$codigo");

                        $sql = "SELECT nome_usuario ,email_usuario, telefone FROM tb_usuario 
                        WHERE id_usuario =$codigo";                        

                        $result2 = mysqli_query($con, $sql);
                        $dados2 = mysqli_fetch_array($result2);

                        $_SESSION['idConcluido'] =  $codigo;
                        $nome  = $dados2['nome_usuario'];
                        $telefone    = $dados2['telefone'];
                        $email  = $dados2['email_usuario'];
                        $Total = 0;
                        
                          while($dados = mysqli_fetch_array($result)){
                          $nomeProduto    = $dados['nome_produto'];
                          $valorProduto  = $dados['valor_produto'];
                          $quantidadeProduto  = $dados['quantidade'];
                          $tamanho  = $dados['tamanho_produto'];
                          $img  = $dados['img_produto'];
                          $tipo  = $dados['tipo'];


                          $valorSubstituido = str_replace([','],'.', $valorProduto);
                          $valorTirarR = str_replace(['R$'],'', $valorSubstituido);
                          $muntiplicacao = $valorTirarR * $quantidadeProduto;                    
                          $Total = $Total+$muntiplicacao;


                          
                          

                          // echo $Total;
                          
                          
                          
                          
                      ?>

                          <div class="produtos">
                            <div class="row">
                              <div class="col">
                                <img src="../imgProdutos/<?php echo $img?>" class="imgCustomProdutos">
                              </div>
                              
                              <div class="col">
                                
                                  <form action="produtos.php" method="post">
                                    <input class="form-control customInput" type="text" value="<?php echo $nomeProduto?>" name="img" ReadOnly>
                                    <input class="form-control customInput" type="text" value="<?php echo $valorProduto?>" name="nomeProduto" ReadOnly>
                                    <input class="form-control customInput" type="text" value="Quantidade: <?php echo $quantidadeProduto?>" name="valor" ReadOnly>
                                    <input class="form-control customInput" type="text" value="Tamanho: <?php if(empty($tamanho)){
                                        echo "Não contem tamanho";
                                      }
                                      else{
                                        echo $tamanho;
                                      }
                                    ?>" name="valor" ReadOnly>
                                    <input class="form-control customInput" type="text" value="<?php echo $tipo?>" name="valor" ReadOnly>
                                  </form>
                              </div>
                              
                            </div>
                          </div>

                          
                      <?php
                          
                        }
                      }


                    }
                    ?>
                  
                </div> 
            </div>
        </div>
      </section>

      <section>
        <div class="container containerCustom">
          <div class="row">
            <div class="col-sm-12">                                                    

              <div class="divbtnSalvar">
              <input class="form-control customValorTotalSalvar" type="text" value="Nome : <?php if(empty($nome)){
                    echo " ";
                  }
                  else{
                    
                    echo $nome;
                  }
                ?>" name="valor" ReadOnly>
                <input class="form-control customValorTotalSalvar" type="text" value="Telefone : <?php if(empty($telefone)){
                    echo " ";
                  }
                  else{
                    
                    echo $telefone;
                  }
                ?>" name="valor" ReadOnly>
                <input class="form-control customValorTotalSalvar" type="text" value="Email : <?php if(empty($email)){
                    echo " ";
                  }
                  else{
                    echo $email;
                  }
                ?>" name="valor" ReadOnly>    
                <input class="form-control customValorTotal" type="text" value="Valor Total R$ <?php if(empty($Total)){
                    echo " ";
                  }
                  else{
                    echo $Total;
                  }?>" name="valor" ReadOnly>

                <form action="Concluido.php" method="post">
                    <button class="btn btn-info customInput custombtnEnviar" type="submit" name="btn-enviar" id="botaoenviar">Enviado</button>                   
                </form> 
              </div>
            </div>
          </div>
        </div>
      </section>



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