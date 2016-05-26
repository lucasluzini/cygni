<?php require "../acoes/verifica.php"; ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro de MBP</title>

    <link href="../arquivos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../arquivos/css/estilo.css" rel="stylesheet">
    <link href="../arquivos/css/3.css" rel="stylesheet">

  </head>
  <body>

    <?php  include_once("../paginas/menu.php"); ?>

    <div id="page-content-wrapper">

      <div class="page-content inset">
        <div class="row">
          <div class="col-md-12">
            <p class="well lead">Inserir movimentação de bem patrimônial</p>

            <div class="container">
              <div class="row">

                <div class="col-sm-8 contact-form"> 

                  <div class="row">


                    <?php 

                    include_once("../acoes/connect.php");

                    

                    $inputhiddennumbem=$_POST['inputhiddennumbem'];
                    $inputhiddensalaorigem=$_POST['inputhiddensalaorigem'];
                    $data = date('Y-m-d');
                    $inputlogin=$_SESSION["login"];
                    $selectsaladestino=$_POST['selectsaladestino'];


                    $sql = "insert into mbp(data, login, numbem, numsalaorigem, numsaladestino) values ('".$data."', '".$inputlogin."', ".$inputhiddennumbem.", ".$inputhiddensalaorigem.", ".$selectsaladestino.")";


                    $result = pg_query ($conexao , $sql);

                    if (pg_affected_rows($result)!=0){

                      echo "<h2>Movimentação incluída com sucesso</h2>";

                      $sql = "UPDATE bempatrimonial SET numsala = ".$selectsaladestino." WHERE numero = ".$inputhiddennumbem;
                      pg_query ($conexao , $sql);
                    }else{

                      echo "<h2>Movimentação NÃO incluída</h2>";
                    }

                    pg_close($conexao);

                    ?>

                  </div>

                  <br/><br/>

                  <form id="contact" method="post" class="form" role="form" action="../paginas/mbp.php">

                    <div class="row">
                      <div class="col-xs-12 col-md-12 form-group">
                        <!-- <a class="btn btn-primary" href="JavaScript: window.history.back();">Voltar</a> -->
                        <a class="btn btn-primary" href="../paginas/relbem.php">Voltar</a>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
            <!--
            <p class="well lead">Progração para Internet - Si5N - Senac</p> 
            -->
          </div>
        </div>
      </div>
    </div>

  </div>


  <script src="../arquivos/bootstrap/js/jquery-2.2.3.min.js"></script>
  <script src="../arquivos/bootstrap/js/bootstrap.min.js"></script>
  <script src="../arquivos/js/menu.js"></script>
  <script src="../arquivos/js/showride.js"></script>


</body>
</html>