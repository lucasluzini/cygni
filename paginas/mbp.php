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

    <?php include_once("../paginas/menu.html"); ?>
    <?php include_once("../acoes/connect.php"); ?>


    

    <div id="page-content-wrapper">

      <div class="page-content inset">
        <div class="row">
          <div class="col-md-12">
            <p class="well lead">Inserir movimentação de bem patrimônial</p>

            <div class="container">
              <div class="row">

                <div class="col-sm-8 contact-form"> 
                  <form id="contact" method="post" class="form" role="form" action="../acoes/cadmbp.php">
                    <div class="row">
                      <div class="col-xs-4 col-md-6 form-group">
                        <label for="Nome">Data</label>
                        <input class="form-control" id="inputdata" name="inputdata" placeholder="" type="date" required="Preencha este campo"/>
                      </div>
                      <div class="clearfix"></div>



                    <div class="col-xs-4 col-md-6 form-group">
                        <label for="Nome">Login</label>
                        <input class="form-control" id="inputlogin" name="inputlogin" placeholder="" type="text" required="Preencha este campo"/>
                      </div>
                      <div class="clearfix"></div>

                    <div class="col-xs-4 col-md-6 form-group">
                        <label for="Nome">Número do patrimônio</label>
                        <input class="form-control" id="inputnumbem" name="inputnumbem" placeholder="" type="text" required="Preencha este campo"/>
                      </div>
                      <div class="clearfix"></div>


                    <div class="row">
                      <div class="col-xs-6 col-md-6 form-group">
                        <label for="Nome">Sala de origem</label>
                        <select class="form-control" id="selectsalaorigem" name="selectsalaorigem" required="required">
                          <option>Selecione</option>

                          <?php
                          $result = pg_query ($conexao , "select s.numero, s.sigladpto, p.nome from sala s inner join predio p on s.codpredio=p.codigo order by p.nome;");
                              while ($row=pg_fetch_row($result)) {
                                echo "<option value=\"".$row[0]."\">".$row[2]." - ".$row[1]." - ".$row[0]."</option>";
                              }
                          ?>

                        </select>
                      </div>
                      <div class="clearfix"></div>

                      <div class="col-xs-4 col-md-6 form-group">
                        <label for="Nome">Sala de destino</label>
                        <select class="form-control" id="selectsaladestino" name="selectsaladestino" required="required">
                          <option>Selecione</option>

                          <?php
                          $result = pg_query ($conexao , "select s.numero, s.sigladpto, p.nome from sala s inner join predio p on s.codpredio=p.codigo order by p.nome;");
                              while ($row=pg_fetch_row($result)) {
                                echo "<option value=\"".$row[0]."\">".$row[2]." - ".$row[1]." - ".$row[0]."</option>";
                              }
                          ?>

                        </select>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <br />
                    
                    <div class="row">
                      <div class="col-xs-12 col-md-12 form-group">
                        <button class="btn btn-primary" type="submit">Salvar</button>
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


</body>
</html>