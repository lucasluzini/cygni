  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro de prédio</title>

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
            <p class="well lead">Cadastro de prédio</p>

            <div class="container">
              <div class="row">

                <div class="col-sm-8 contact-form"> 

                  <div class="row">


                    <?php 

                    include_once("../acoes/connect.php");

                    $inputnome=$_POST['inputnome'];
                    $inputendereco=$_POST['inputendereco'];


                    $result = pg_query ($conexao , "insert into predio(nome, endereco) values ('".$inputnome."', '".$inputendereco."')");


                    if (pg_affected_rows($result)!=0){

                      echo "<h2>Prédio incluído com sucesso</h2>";
                    }else{

                      echo "<h2>Prédio NÃO incluído com sucesso</h2>";
                    }

                    ?>

                  </div>

                  <br/><br/>

                  <form id="contact" method="post" class="form" role="form" action="../paginas/predio.php">

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