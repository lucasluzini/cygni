<?php require "../acoes/verifica.php"; ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Relatório de MBP</title>

    <link href="../arquivos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../arquivos/css/estilo.css" rel="stylesheet">
    <link href="../arquivos/css/3.css" rel="stylesheet">

      <script language="javascript">



    function opentodos() {
      document.getElementById('divnumero').style.display="none";
      document.getElementById('inputnumero').value = "";
    }


    function opennumero() {
      document.getElementById('divnumero').style.display="block";

    }


    </script>
    
  </head>
  <body>

    <?php include_once("../paginas/menu.php"); ?>
    <?php include_once("../acoes/connect.php"); ?>



    <div id="page-content-wrapper">

      <div class="page-content inset">
        <div class="row">
          <div class="col-md-12">
            <p class="well lead">Relatório de MBP</p>

            <div class="container">
              <div class="row"> 

                <div class="col-sm-8 contact-form">
                  <form id="contact" method="post" class="form" role="form" action="../acoes/relmbp.php">

              

                    <div class="col-xs-4 col-md-6 form-group">
                    <label>Listar MBP por: </label>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">


                    <div class="col-xs-4 col-md-2 form-group">
                    <input name="rdlistarmbp" id="rdtodos" type="radio" value="todos" onclick="opentodos();"/>Todos
                    </div>
                    
                    <div class="col-xs-4 col-md-4 form-group">
                    <input name="rdlistarmbp" id="rdnumero" type="radio" value="numero" onclick="opennumero();"/>Número de patrimônio
                    </div>
                    <div class="clearfix"></div>


                    <br>



                      <div id="divnumero" style="display: none;">
                      <div class="col-xs-4 col-md-6 form-group">
                          <label for="Nome">Digite o número</label>
                          <input class="form-control" id="inputnumero" name="inputnumero" type="number">
                      </div>
                      <div class="clearfix"></div>
                      </div>



                   

                    </div>
                    <br />
                    
                    <div class="row">
                      <div class="col-xs-12 col-md-12 form-group">
                        <button class="btn btn-primary" type="submit">Listar</button>
                        <!-- <button class="btn btn-primary" type="submit">Limpar</button> -->
 
                      </div>
                    </div>
                  </form>
                </div> 
              </div> 
            </div>
            <p class="well lead">Progração para Internet - Si5N - Senac</p> 
          </div>
        </div>
      </div>
    </div>
    
  </div>






  <script src="../arquivos/bootstrap/js/jquery-2.2.3.min.js"></script>
  <script src="../arquivos/bootstrap/js/bootstrap.min.js"></script>
  <script src="../arquivos/js/menu.js"></script>
  <script src="../arquivos/js/showride.js"></script>



<?php pg_close($conexao); ?>
</body>
</html>