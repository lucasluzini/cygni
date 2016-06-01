<?php require "../acoes/verifica.php"; ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Excluir sala</title>

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
            <p class="well lead">Excluir sala</p>

            <div class="container">
              <div class="row">

                <div class="col-sm-8 contact-form"> 

                  <div class="row">


                    <?php 

                    include_once("../acoes/connect.php");
                      $iptexcluir=$_POST['iptexcluir'];

                      $sql = "SELECT * FROM bempatrimonial WHERE numsala=".$iptexcluir;
                      $result = pg_query ($conexao , $sql);

                      
                      $linha=pg_fetch_array($result);
                      

                      if($linha[numero]!=null){
                        echo "<h4>SALA nao pode ser excluída porque existem bempatrimonial relacionando a ela, exclua os bempatrimonias primeiro.</h4>";
                      }else{

                    $sql = "DELETE FROM sala WHere numero=".$iptexcluir;
                    $result = pg_query ($conexao , $sql);
                                        

                    if (pg_affected_rows($result)!=0){

                      echo "<h2>Sala excluído com sucesso</h2>";
                    }else{

                      echo "<h2> sala NÃO excluída</h2><br><br>";

                      echo "<h4>Causa: </h4>";

    				          echo pg_last_error();
                    }
                  }
                    pg_close($conexao);

                    ?>

                  </div>

                  <br/><br/>

                  <form id="contact" method="post" class="form" role="form" action="../paginas/sala.php">

                    <div class="row">
                      <div class="col-xs-12 col-md-12 form-group">
                        <button class="btn btn-primary" type="submit">Voltar</button>
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