  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro de Patrimonio</title>

    <link href="../arquivos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../arquivos/css/estilo.css" rel="stylesheet">
    <link href="../arquivos/css/3.css" rel="stylesheet">
    
  </head>
  <body>

    <?php include_once("../paginas/menu.html"); ?>



    <div id="page-content-wrapper">

      <div class="page-content inset">
        <div class="row">
          <div class="col-md-12">
            <p class="well lead">Cadastro de patrimônio</p>

            <div class="container">
              <div class="row"> 

                <div class="col-sm-8 contact-form">
                  <form id="contact" method="post" class="form" role="form">
                    <div class="row">
                      <div class="col-xs-6 col-md-3 form-group">
                        <label for="Nome">Número</label>
                        <input class="form-control" id="inputnumero" name="inputnumero" placeholder="" type="text" />
                      </div>
                      <div class="col-xs-4 col-md-9 form-group">
                        <label for="Nome">Descrição</label>
                        <input class="form-control" id="inputdescricao" name="inputdescricao" placeholder="" type="text" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-6 col-md-4 form-group">
                        <label for="Nome">Número da nota fiscal</label>
                        <input class="form-control" id="inputnumeronotafiscal" name="inputnumeronotafiscal" placeholder="" type="text" />
                      </div>
                      <div class="col-xs-6 col-md-4 form-group">
                        <label for="Nome">Data da nota fiscal</label>
                        <input class="form-control" id="inputdatanotafiscal" name="inputdatanotafiscal" placeholder="" type="text" />
                      </div>
                      <div class="col-xs-6 col-md-4 form-group">
                        <label for="Nome">Valor</label>
                        <input class="form-control" id="inputvalor" name="inputvalor" placeholder="" type="text" />
                      </div>
                    </div>

                    



                    <div class="row">
                      <div class="col-xs-6 col-md-8 form-group">
                        <label for="Nome">Fornecedor</label>
                        <input class="form-control" id="inputfornecedor" name="inputfornecedor" placeholder="" type="text" />
                      </div>
                      <div class="col-xs-4 col-md-4 form-group">
                        <label for="Nome">Situação</label>
                        <select class="form-control"id="selectsituacao" name="selectsituacao" >
                          <option>Selecione</option>
                          <option>Ativo</option>
                          <option>Inativo</option>
                          <option>Manutenção</option>
                        </select>
                      </div>
                      <div class="col-xs-4 col-md-3 form-group">
                        <label for="Nome">Categoria</label>
                        <select class="form-control"id="selectcategoria" name="selectcategoria" >
                          <option>Selecione</option>
                          <option>Eletrônicos</option>
                          <option>Imóveis</option>
                          <option>Monitor</option>
                        </select>
                      </div>
                      <div class="col-xs-4 col-md-3 form-group">
                        <label for="Nome">Número da sala</label>
                        <input class="form-control" id="inputnumsala" name="inputnumsala" placeholder="" type="text" />
                      </div>
                      <div class="clearfix">
                      </div>
                    </div>
                    <br />
                    
                    <div class="row">
                      <div class="col-xs-12 col-md-12 form-group">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <button class="btn btn-primary" type="submit">Limpar</button>

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