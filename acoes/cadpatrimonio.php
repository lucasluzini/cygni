  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro de patrimônio</title>

    <link href="../arquivos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../arquivos/css/estilo.css" rel="stylesheet">
    <link href="../arquivos/css/3.css" rel="stylesheet">

  </head>
  <body>

    <?php  include_once("../paginas/menu.html"); ?>

    <div id="page-content-wrapper">

      <div class="page-content inset">
        <div class="row">
          <div class="col-md-12">
            <p class="well lead">Cadastro de patrimônio</p>

            <div class="container">
              <div class="row">

                <div class="col-sm-8 contact-form"> 

                  <div class="row">


                    <?php 

                    include_once("../acoes/connect.php");

                    $inputdescricao=$_POST['inputdescricao'];
                    $inputnumeronotafiscal=$_POST['inputnumeronotafiscal'];
                    $inputdatanotafiscal=$_POST['inputdatanotafiscal'];
                    $inputfornecedor=$_POST['inputfornecedor'];
                    $inputvalor=$_POST['inputvalor'];
                    $selectsituacao=$_POST['selectsituacao'];
                    $selectcategoria=$_POST['selectcategoria'];
                    $selectsala=$_POST['selectsala'];

                    $sql = "insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('".$inputdescricao."', ".$inputnumeronotafiscal.", '".$inputdatanotafiscal."', '".$inputfornecedor."', ".$inputvalor.", '".$selectsituacao."', ".$selectcategoria.", ".$selectsala.")";


                    $result = pg_query ($conexao , $sql);


                    if (pg_affected_rows($result)!=0){

                      echo "<h2>Patrimônio incluído com sucesso</h2>";
                    }else{

                      echo "<h2>Patrimônio NÃO incluído</h2>";
                    }

                    pg_close($conexao);

                    ?>

                  </div>

                  <br/><br/>

                  <form id="contact" method="post" class="form" role="form" action="../paginas/patrimonio.php">

                    <div class="row">
                      <div class="col-xs-12 col-md-12 form-group">
                        <button class="btn btn-primary" type="submit">Voltar</button>
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


</body>
</html>