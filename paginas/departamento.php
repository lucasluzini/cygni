<?php require "../acoes/verifica.php"; ?>

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

  <?php include_once("../paginas/menu.php"); ?>




  <div id="page-content-wrapper">

    <div class="page-content inset">
      <div class="row">
        <div class="col-md-12">
          <p class="well lead">Cadastro de departamento</p>

          <div class="container">
            <div class="row">

              <div class="col-sm-8 contact-form">
                <form id="contact" method="post" class="form" role="form" role="form" data-toggle="validator" action="../acoes/caddepartamento.php">
                  <div class="row">

                    <div class="col-xs-6 col-md-6 form-group">
                      <label for="Nome">Sigla</label>
                      <input class="form-control" id="inputsigla" name="inputsigla" placeholder="" type="text" maxlength="5" required="Preencha este campo"/>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-xs-6 col-md-6 form-group">
                      <label for="Nome">Nome</label>
                      <input class="form-control" id="inputnome" name="inputnome" placeholder="" type="text"  maxlength="30" required="Preencha este campo"/>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-xs-6 col-md-6 form-group">
                      <label for="Nome">Responsável</label>
                      <input class="form-control" id="inputresponsavel" name="inputresponsavel" placeholder="" type="text"  maxlength="50" required="Preencha este campo"/>
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
            <!--
            <p class="well lead">Progração para Internet - Si5N - Senac</p> 
          -->
        </div>
      </div>
    </div>
  </div>
  <br/><br/>

<div class="container">

  <div class="panel panel-primary">
    <div class="panel-heading">
    <h3 class="panel-title">Lista de departamentos </h3>
    </div>
    
    <div class="panel-body" >
  <?php

            include_once("../acoes/connect.php");


            print("      
                        
                   <div class=\"table-responsive col-md-12\">
                    <table class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">
                      <thead>
                        <tr>
                          <th>Sigla</th>
                          <th>Nome</th>
                          <th>Responsável</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>

                        ");

                        //$sql = "select * from sala";
            $sql = "SELECT * FROM departamento";
            $resultado = pg_query ($conexao , $sql);


            while ($linha=pg_fetch_array($resultado)) {
              echo "<tr>";
              echo "<td>".$linha[sigla]."</td>";
              echo "<td>".$linha[nome]."</td>";
              echo "<td>".$linha[responsavel]."</td>";

              echo "<td>";
              //echo "<a class=\"btn btn-success btn-xs\" href=\"view.html\">Visualizar</a>";
              //echo "<a>  </a>";
              //echo "<a class=\"btn btn-warning btn-xs\" href=\"edit.html\">Editar</a>";
              

              //echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/editdepartamento.php\">";
              //  echo "<input id=\"inputhidden\" name=\"inputhidden\" type=\"hidden\" value=\"";
              //  echo $linha[sigla];
              //  echo "\"/>";
              //echo "<button class=\"btn btn-warning btn-xs\" type=\"submit\">Editar</button>";
              //echo "</form>";

              //echo "<a>  </a>";

              echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/excluidepartamento.php\" onsubmit=\"return confirm('Você tem certeza que deseje excluir o departamento?')\">";
                echo "<input id=\"iptexcluir\" name=\"iptexcluir\" type=\"hidden\" value=\"";
                echo $linha[sigla];
                echo "\"/>";
              echo "<button class=\"btn btn-danger btn-xs\" type=\"submit\">Excluir</button>";
              echo "</form>";
         

              //echo "<a class=\"btn btn-info btn-xs\" href=\"edit.html\">MBP</a>";
              //echo "<a>  </a>";
              //echo "<a class=\"btn btn-danger btn-xs\"  href=\"#\" data-toggle=\"modal\" data-target=\"#delete-modal\">Excluir</a>";
              echo "</td>";
              echo "</tr>";
            };


            pg_close($conexao);
?>
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