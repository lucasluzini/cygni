  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Modelo</title>

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
                <p class="well lead">Cadastro de Cliente</p>

               <div class="container">
                  <div class="row"> <!-- div da esquerda -->
                      <!-- Text input CNPJ e Razao Social-->
                      <div class="col-sm-8 contact-form"> <!-- div da direita -->
                          <form id="contact" method="post" class="form" role="form">
                              <div class="row">
                                  <div class="col-xs-6 col-md-3 form-group">
                                  <label for="Nome">CNPJ</label>
                                      <input class="form-control" id="inputCNPJ" name="CNPJ" placeholder="CNPJ" type="text" required autofocus />
                                  </div>
                                  <div class="col-xs-4 col-md-9 form-group">
                                  <label for="Nome">Razão Social</label>
                                      <input class="form-control" id="inputrazaosocial" name="razaocosial" placeholder="Razão Social" type="text" />
                                  </div>
                              </div> <!-- fim row -->
                              <!-- Text input endereco-->
                              <div class="col-xs-4 col-md-12 form-group">
                                  <div class="controls">
                                  <label for="Nome">Endereço</label>
                                      <input class="form-control" id="inputendereco" name="endereco" placeholder="Endereço"  type="text">
                                  </div>
                              </div><!--fim control-group-->
                              <br> <!--pulando uma linha -->
                              <!-- Text input cidade e estado-->
                              <div class="row">
                                  <div class="col-xs-6 col-md-9 form-group">
                                      <label for="Nome">Cidade</label>
                                      <input class="form-control" id="inputcidade" name="cidade" placeholder="Cidade" type="text" />
                                  </div>
                                  <div class="col-xs-4 col-md-3 form-group">
                                      <label for="Nome">Estado</label>
                                      <select class="form-control"id="selectbasic" name="selectestado" >
                                          <option>Selecione</option>
                                          <option>AC</option>
                                          <option>AL</option>
                                          <option>AP</option>
                                          <option>AM</option>
                                          <option>BA</option>
                                          <option>CE</option>
                                          <option>DF</option>
                                          <option>ES</option>
                                          <option>GO</option>
                                          <option>MA</option>
                                          <option>MT</option>
                                          <option>MS</option>
                                          <option>MG</option>
                                          <option>PA</option>
                                          <option>PB</option>
                                          <option>PR</option>
                                          <option>PE</option>
                                          <option>PI</option>
                                          <option>RJ</option>
                                          <option>RN</option>
                                          <option>RS</option>
                                          <option>RO</option>
                                          <option>RR</option>
                                          <option>SC</option>
                                          <option>SP</option>
                                          <option>SE</option>
                                          <option>TO</option>
                                      </select>
                                  </div>
                                  <div class="col-xs-6 col-md-3 form-group">
                                      <label for="Nome">Telefone</label>
                                      <input class="form-control" id="inputtelefone" name="telefone" placeholder="Telefone" type="text" />
                                  </div>
                                  <div class="col-xs-4 col-md-3 form-group">
                                      <label for="Nome">Contato</label>
                                      <input class="form-control" id="inputcontato" name="contato" placeholder="Contato" type="text" />
                                  </div>
                                  <div class="col-xs-4 col-md-6 form-group">
                                      <label for="Nome">Email</label>
                                      <input class="form-control" id="inputemail" name="email" placeholder="E-mail" type="text" />
                                  </div>
                              </div><!--fim Text input cidade e estado-->
                              <div class="col-xs-4 col-md-12 form-group">
                                  <div class="controls">
                                      <label for="Nome">Mensagem</label>
                                      <textarea class="form-control" id="message" name="message" placeholder="Message" rows="5"></textarea>
                                  </div>
                              </div>
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






      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="../arquivos/bootstrap/js/jquery-2.2.3.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../arquivos/bootstrap/js/bootstrap.min.js"></script>
      <script src="../arquivos/js/menu.js"></script>
      <script src="../arquivos/js/showride.js"></script>


    </body>
  </html>