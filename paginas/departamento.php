  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Cadastro de departamento</title>

      <link href="../arquivos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="../arquivos/css/estilo.css" rel="stylesheet">
      <link href="../arquivos/css/3.css" rel="stylesheet">

    </head>
    <body>

    <?php include_once("../paginas/menu.html"); ?>


            
        <!-- Page content -->
        <div id="page-content-wrapper">
          <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
              <div class="row">
                <div class="col-md-12">
                <p class="well lead">Cadastro de departamento</p>

               <div class="container">
                  <div class="row"> <!-- div da esquerda -->
                      <!-- Text input CNPJ e Razao Social-->
                      <div class="col-sm-8 contact-form"> <!-- div da direita -->
                          <form id="contact" method="post" class="form" role="form" role="form" data-toggle="validator">
                              <div class="row">
                                  <div class="col-xs-6 col-md-6 form-group">
                                  <label for="Nome">Nome</label>
                                      <input class="form-control" id="inputnome" name="inputnome" placeholder="" type="text" required/>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-xs-6 col-md-6 form-group">
                                  <label for="Nome">Sigla</label>
                                      <input class="form-control" id="inputsigla" name="inputsigla" placeholder="" type="text" />
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-xs-6 col-md-6 form-group">
                                  <label for="Nome">Responsável</label>
                                      <input class="form-control" id="inputresponsavel" name="inputresponsavel" placeholder="" type="text" />
                                  </div>
                                  <div class="clearfix"></div>
                              </div> <!-- fim row -->
                              <!-- Text input endereco-->
                              
                              <br />
                              
                              <div class="row">
                                  <div class="col-xs-12 col-md-12 form-group">
                                      <button class="btn btn-primary" type="submit">Salvar</button>
                                      <button class="btn btn-primary" type="submit">Limpar</button>
                                     <!--<button class="btn btn-primary pull-right" type="submit">Enviar</button>-->
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