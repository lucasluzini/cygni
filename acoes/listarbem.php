  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lista de patrimônio</title>

    <link href="../arquivos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../arquivos/css/estilo.css" rel="stylesheet">
    <link href="../arquivos/css/3.css" rel="stylesheet">

  </head>
  <body>

    <?php  include_once("../paginas/menu.html"); ?>
    <?php include_once("../acoes/connect.php"); ?>




    <div id="page-content-wrapper">

      <div class="page-content inset">
        <div class="row">
          <div class="col-md-12">


             <?php

             $rdlistarbem=$_POST['rdlistarbem'];



             switch ($rdlistarbem){

              case 'sala':

              $selectsala=$_POST['selectsala'];
              
              $row=pg_fetch_row(pg_query ($conexao , "select s.sigladpto, p.nome from sala s inner join predio p on s.codpredio=p.codigo where s.numero=".$selectsala." order by p.nome;"));

          

              echo "<p class=\"well lead\">Lista de patrimônio da Sala: ".$row[0]." - Unidade ".$row[1]."</p>";

 print("      <div class=\"container\">

              <div id=\"main\" class=\"container-fluid\">



               <div id=\"list\" class=\"row\">
                 <div class=\"table-responsive col-md-12\">
                  <table class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Header 1</th>
                        <th>Header 2</th>
                        <th>Header 3</th>
                        <th class=\"actions\">Ações</th>
                      </tr>
                    </thead>
                    <tbody>

");













                        $sql = "select * from sala";
                        $result = pg_query ($conexao , $sql);



                        while ($row=pg_fetch_row($result)) {
                          echo "<tr>";
                          echo "<td>".$row[0]."</td>";
                          echo "<td>".$row[1]."</td>";
                          echo "<td>".$row[2]."</td>";
                          echo "<td>".$row[3]."</td>";
                          echo "<td class=\"actions\">";
                          echo "<a class=\"btn btn-success btn-xs\" href=\"view.html\">Visualizar</a>";
                          echo "<a>  </a>";
                          echo "<a class=\"btn btn-warning btn-xs\" href=\"edit.html\">Editar</a>";
                          echo "<a>  </a>";
                          echo "<a class=\"btn btn-danger btn-xs\"  href=\"#\" data-toggle=\"modal\" data-target=\"#delete-modal\">Excluir</a>";
                          echo "</td>";
                          echo "</tr>";
                        };



                        break;

                        case 'predio':
                        break;

                        case 'situacao':
                        break;


                      };


                      ?>


                    </tbody>
                  </table>

                  <form id="contact" method="post" class="form" role="form" action="../paginas/listarbem.php">

                    <div class="row">
                      <div class="col-xs-12 col-md-12 form-group">
                        <button class="btn btn-primary" type="submit">Voltar</button>
                      </div>
                    </div>
                  </form>


                </div>

              </div> <!-- /#list -->


            </div>  <!-- /#main -->

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