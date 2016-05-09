  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Cadastro de categoria</title>

      <link href="../arquivos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="../arquivos/css/estilo.css" rel="stylesheet">
      <link href="../arquivos/css/3.css" rel="stylesheet">
      
    </head>
    <body>

    <?php  include_once("../paginas/menu.html"); ?>

    <div id="page-content-wrapper">
          <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
              <div class="row">
                <div class="col-md-12">
                <p class="well lead">Cadastro de categoria</p>

               <div class="container">
                  <div class="row"> <!-- div da esquerda -->
                      <!-- Text input CNPJ e Razao Social-->
                      <div class="col-sm-8 contact-form"> <!-- div da direita -->
                      <form id="contact" method="post" class="form" role="form" action="../paginas/categoria.php">
                      <div class="row">


    <?php 

    include_once("../acoes/connect.php");

    $inputnome=$_POST['inputnome'];
    $inputdescricao=$_POST['inputdescricao'];


  $result = pg_query ($conexao , "insert into categoria(nome, descricao) values ('".$inputnome."', '".$inputdescricao."')");


if (pg_affected_rows($result)!=0){
  //echo "<script language=javascript>alert( 'Aluno exluído corretamente.' );</script>";
  echo "<h1>Categoria incluído com sucesso</h1>";
}else{
  //echo "<script language=javascript>alert( 'Aluno NÃO exluído corretamente.' );</script>";
  echo "<h1>Categoria NÃO incluído com sucesso</h1>";
}

?>

                          </div>

                          <br/><br/>
                              <div class="row">
                                  <div class="col-xs-12 col-md-12 form-group">
                                      <button class="btn btn-primary" type="submit">Voltar</button>
                                  </div>
                              </div>
                        </form>

</div> <!-- fim div da direita -->
                  </div> <!-- fim div da esquerda -->
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