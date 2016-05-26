<?php require "../acoes/verifica.php"; ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar patrimônio</title>

    <link href="../arquivos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../arquivos/css/estilo.css" rel="stylesheet">
    <link href="../arquivos/css/3.css" rel="stylesheet">
    
  </head>
  <body>

    <?php include_once("../paginas/menu.php"); ?>
    <?php include_once("../acoes/connect.php"); ?>

    <?php 

    $inputhidden=$_POST['inputhidden'];

    $row=pg_fetch_row(pg_query ($conexao , "SELECT b.numero, b.descricao, b.nrnotafiscal, b.dtnotafiscal, b.valor, b.fornecedor, b.situacao, c.nome, p.nome, s.sigladpto, s.numero, c.codigo
                                            FROM bempatrimonial b 
                                            INNER JOIN categoria c 
                                            ON b.codcat=codigo 
                                            INNER JOIN sala s 
                                            ON b.numsala=s.numero 
                                            INNER JOIN predio p 
                                            ON s.codpredio=p.codigo 
                                            WHERE b.numero=".$inputhidden)); 

    ?>



    <div id="page-content-wrapper">

      <div class="page-content inset">
        <div class="row">
          <div class="col-md-12">
            <p class="well lead">Editar patrimônio: <?php echo $row[0];?></p>

            <div class="container">
              <div class="row"> 

                <div class="col-sm-8 contact-form">
                  <form id="contact" method="post" class="form" role="form" action="../acoes/upbem.php">
                    <div class="row">
                      <div class="col-xs-4 col-md-12 form-group">
                        <label for="Nome">Descrição</label>
                        <input class="form-control" id="inputdescricao" name="inputdescricao" <?php echo "value=\"".$row[1]."\"";?> type="text"/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-6 col-md-4 form-group">
                        <label for="Nome">Número da nota fiscal</label>
                        <input class="form-control" id="inputnumeronotafiscal" name="inputnumeronotafiscal" <?php echo "value=\"".$row[2]."\"";?> type="number"/>
                      </div>
                      <div class="col-xs-6 col-md-4 form-group">
                        <label for="Nome">Data da nota fiscal</label>
                        <input class="form-control" id="inputdatanotafiscal" name="inputdatanotafiscal" <?php echo "value=\"".$row[3]."\"";?> type="date"/>
                      </div>
                      <div class="col-xs-6 col-md-4 form-group">
                        <label for="Nome">Valor</label>
                        <input class="form-control" id="inputvalor" name="inputvalor" type="number" step="0.01" <?php echo "value=\"".$row[4]."\"";?>/>
                      </div>
                    </div>

                    



                    <div class="row">
                      <div class="col-xs-6 col-md-8 form-group">
                        <label for="Nome">Fornecedor</label>
                        <input class="form-control" id="inputfornecedor" name="inputfornecedor" <?php echo "value=\"".$row[5]."\"";?> type="text"/>
                      </div>


                      <div class="col-xs-4 col-md-4 form-group">
                        <label for="Nome">Situação</label>
                        <select class="form-control" id="selectsituacao" name="selectsituacao" required="Preencha este campo" />
                          <?php 
                            switch($row[6]){

                              case 'e':
                                echo "<option value=\"e\">Em uso</option>";
                                echo "<option value=\"m\">Manutenção</option>";
                                echo "<option value=\"i\">Inutilizado</option>";
                              break;

                              case 'm':
                                echo "<option value=\"m\">Manutenção</option>";
                                echo "<option value=\"e\">Em uso</option>";
                                echo "<option value=\"i\">Inutilizado</option>";
                              break;

                              case 'i':
                                echo "<option value=\"i\">Inutilizado</option>";
                                echo "<option value=\"e\">Em uso</option>";
                                echo "<option value=\"m\">Manutenção</option>";
                              break;


                            };
                          ?>

                        </select>
                      </div>


                      <div class="col-xs-4 col-md-6 form-group">
                        <label for="Nome">Categoria</label>
                        <select class="form-control"id="selectcategoria" name="selectcategoria" required="Preencha este campo">
                          <option <?php echo "value=\"".$row[11]."\"";?> > <?php echo $row[7];?> </option>
                          <?php
                          $result = pg_query ($conexao , "select * from categoria order by nome;");
                              while ($row1=pg_fetch_row($result)) {
                                echo "<option value=\"".$row1[0]."\">".$row1[1]."</option>";
                              }
                          ?>
                        </select>
                      </div>
                      <div class="col-xs-4 col-md-6 form-group">
                        <label for="Nome">Sala</label> <i>Movimentar somente na opção MBP</i>
                        <input class="form-control" id="inputsala" name="inputsala" <?php echo "value=\"".$row[8]." - ".$row[9]."\"";?> type="text" readonly="readonly"/>
                      </div>
                      <div class="clearfix">
                      </div>
                    </div>
                    <br />

                    <input type="hidden" id="inputnumbem" name="inputnumbem" <?php echo "value=\"".$row[0]."\"";?>>
                    
                    <div class="row">
                      <div class="col-xs-12 col-md-12 form-group">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <!-- <button class="btn btn-primary" type="submit">Limpar</button> -->
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