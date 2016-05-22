<?php require "../acoes/verifica.php"; ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Relatório de patrimônios</title>

    <link href="../arquivos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../arquivos/css/estilo.css" rel="stylesheet">
    <link href="../arquivos/css/3.css" rel="stylesheet">

  </head>
  <body>

    <?php  include_once("../paginas/menu.php"); ?>
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

            $row=pg_fetch_row(pg_query ($conexao , "SELECT s.sigladpto, p.nome 
              FROM sala s 
              INNER JOIN predio p 
              ON s.codpredio=p.codigo 
              WHERE s.numero=".$selectsala));



            echo "<p class=\"well lead\">Lista de patrimônio da sala: ".$row[0]." - Unidade ".$row[1]."</p>";

            print("      
              <div class=\"container\">
                <div id=\"main\" class=\"container-fluid\">
                 <div id=\"list\" class=\"row\">
                        <form id=\"contact\" method=\"post\" class=\"form\" role=\"form\" action=\"../paginas/relbem.php\">
                          <div class=\"row\">
                            <div class=\"col-xs-12 col-md-12 form-group\">
                              <button class=\"btn btn-primary\" type=\"submit\">Voltar</button>
                            </div>
                          </div>
                        </form>
                   <div class=\"table-responsive col-md-12\">
                    <table class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">
                      <thead>
                        <tr>
                          <th>Número</th>
                          <th>Descrição</th>
                          <th>Situação</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>

                        ");

                        //$sql = "select * from sala";
            $sql = "SELECT b.numero, b.descricao, b.situacao 
            FROM bempatrimonial b 
            INNER JOIN sala s 
            ON b.numsala = s.numero
            WHERE s.numero=".$selectsala;
            $result = pg_query ($conexao , $sql);



            while ($row=pg_fetch_row($result)) {
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>";

              switch($row[2]){
                case 'e':
                echo "Em Uso";
                break;
                case 'm':
                echo "Em Manutenção";
                break;
                case 'i':
                echo "Inutilizado";
                break;
              };

              echo"</td>";
              echo "<td>";
              //echo "<a class=\"btn btn-success btn-xs\" href=\"view.html\">Visualizar</a>";
              //echo "<a>  </a>";
              //echo "<a class=\"btn btn-warning btn-xs\" href=\"edit.html\">Editar</a>";
              
              echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/mbppatrimonio.php\">";
                echo "<input id=\"inputhidden\" name=\"inputhidden\" type=\"hidden\" value=\"";
                echo $row[0];
                echo "\"/>";
              echo "<button class=\"btn btn-info btn-xs\" type=\"submit\">MBP</button>";
              echo "</form>";

              echo "<a>  </a>";

              echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/editbem.php\">";
                echo "<input id=\"inputhidden\" name=\"inputhidden\" type=\"hidden\" value=\"";
                echo $row[0];
                echo "\"/>";
              echo "<button class=\"btn btn-warning btn-xs\" type=\"submit\">Editar</button>";
              echo "</form>";
         

              //echo "<a class=\"btn btn-info btn-xs\" href=\"edit.html\">MBP</a>";
              //echo "<a>  </a>";
              //echo "<a class=\"btn btn-danger btn-xs\"  href=\"#\" data-toggle=\"modal\" data-target=\"#delete-modal\">Excluir</a>";
              echo "</td>";
              echo "</tr>";
            };



            break;

















            case 'predio':


            $selectpredio=$_POST['selectpredio'];

            $row=pg_fetch_row(pg_query ($conexao , "SELECT nome 
              FROM predio
              WHERE codigo=".$selectpredio));



            echo "<p class=\"well lead\">Lista de patrimônio do prédio: ".$row[0]."</p>";

            print("      <div class=\"container\">

              <div id=\"main\" class=\"container-fluid\">



               <div id=\"list\" class=\"row\">
                        <form id=\"contact\" method=\"post\" class=\"form\" role=\"form\" action=\"../paginas/relbem.php\">
                          <div class=\"row\">
                            <div class=\"col-xs-12 col-md-12 form-group\">
                              <button class=\"btn btn-primary\" type=\"submit\">Voltar</button>
                            </div>
                          </div>
                        </form>
                 <div class=\"table-responsive col-md-12\">
                  <table class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">
                    <thead>
                      <tr>
                        <th>Número</th>
                        <th>Descrição</th>
                        <th>Situação</th>
                        <th>Sigla do Departamento</th>
                        <th class=\"actions\">Ações</th>
                      </tr>
                    </thead>
                    <tbody>

                      ");



                        //$sql = "select * from sala";
            $sql = "SELECT b.numero, b.descricao, b.situacao, d.nome 
            FROM bempatrimonial b 
            INNER JOIN sala s 
            ON b.numsala = s.numero 
            INNER JOIN departamento d 
            ON s.sigladpto = d.sigla
            INNER JOIN predio p
            ON s.codpredio = p.codigo
            WHERE p.codigo=".$selectpredio."
            ORDER BY b.codcat";
            $result = pg_query ($conexao , $sql);



            while ($row=pg_fetch_row($result)) {
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>";

              switch($row[2]){
                case 'e':
                echo "Em Uso";
                break;
                case 'm':
                echo "Em Manutenção";
                break;
                case 'i':
                echo "Inutilizado";
                break;
              };

              echo"</td>";
              echo "<td>".$row[3]."</td>";
              echo "<td class=\"actions\">";
              //echo "<a class=\"btn btn-success btn-xs\" href=\"view.html\">Visualizar</a>";
              //echo "<a>  </a>";
              //echo "<a class=\"btn btn-warning btn-xs\" href=\"edit.html\">Editar</a>";
              echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/mbppatrimonio.php\">";
                echo "<input id=\"inputhidden\" name=\"inputhidden\" type=\"hidden\" value=\"";
                echo $row[0];
                echo "\"/>";
              echo "<button class=\"btn btn-info btn-xs\" type=\"submit\">MBP</button>";
              echo "</form>";

              echo "<a>  </a>";

              echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/editbem.php\">";
                echo "<input id=\"inputhidden\" name=\"inputhidden\" type=\"hidden\" value=\"";
                echo $row[0];
                echo "\"/>";
              echo "<button class=\"btn btn-warning btn-xs\" type=\"submit\">Editar</button>";
              echo "</form>";
              //echo "<a class=\"btn btn-info btn-xs\" href=\"edit.html\">MBP</a>";
              //echo "<a>  </a>";
              //echo "<a class=\"btn btn-danger btn-xs\"  href=\"#\" data-toggle=\"modal\" data-target=\"#delete-modal\">Excluir</a>";
              echo "</td>";
              echo "</tr>";
            };




            break;
















            case 'situacao':



            $selectsituacao=$_POST['selectsituacao'];


            echo "<p class=\"well lead\">Lista de patrimônio: ";

            switch($selectsituacao){
              case 'e':
              echo "Em Uso";
              break;
              case 'm':
              echo "Em Manutenção";
              break;
              case 'i':
              echo "Inutilizado";
              break;
            };
            echo "</p>";

            print("      <div class=\"container\">

              <div id=\"main\" class=\"container-fluid\">



               <div id=\"list\" class=\"row\">
                        <form id=\"contact\" method=\"post\" class=\"form\" role=\"form\" action=\"../paginas/relbem.php\">
                          <div class=\"row\">
                            <div class=\"col-xs-12 col-md-12 form-group\">
                              <button class=\"btn btn-primary\" type=\"submit\">Voltar</button>
                            </div>
                          </div>
                        </form>
                 <div class=\"table-responsive col-md-12\">
                  <table class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">
                    <thead>
                      <tr>
                        <th>Número</th>
                        <th>Descrição</th>
                        <th>Situação</th>
                        <th>Departamento</th>
                        <th>Prédio</th>
                        <th class=\"actions\">Ações</th>
                      </tr>
                    </thead>
                    <tbody>

                      ");



                        //$sql = "select * from sala";
            $sql = "SELECT b.numero, b.descricao, b.situacao, d.nome, p.nome 
            FROM bempatrimonial b 
            INNER JOIN sala s 
            ON b.numsala = s.numero 
            INNER JOIN departamento d 
            ON s.sigladpto = d.sigla
            INNER JOIN predio p
            ON s.codpredio = p.codigo
            WHERE b.situacao='".$selectsituacao."' ORDER BY b.codcat";

            $result = pg_query ($conexao , $sql);

            while ($row=pg_fetch_row($result)) {
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>";

              switch($row[2]){
                case 'e':
                echo "Em Uso";
                break;
                case 'm':
                echo "Em Manutenção";
                break;
                case 'i':
                echo "Inutilizado";
                break;
              };

              echo"</td>";
              echo "<td>".$row[3]."</td>";
              echo "<td>".$row[4]."</td>";
              echo "<td class=\"actions\">";
              //echo "<a class=\"btn btn-success btn-xs\" href=\"view.html\">Visualizar</a>";
              //echo "<a>  </a>";
              //echo "<a class=\"btn btn-warning btn-xs\" href=\"edit.html\">Editar</a>";
              echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/mbppatrimonio.php\">";
                echo "<input id=\"inputhidden\" name=\"inputhidden\" type=\"hidden\" value=\"";
                echo $row[0];
                echo "\"/>";
              echo "<button class=\"btn btn-info btn-xs\" type=\"submit\">MBP</button>";
              echo "</form>";

              echo "<a>  </a>";

              echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/editbem.php\">";
                echo "<input id=\"inputhidden\" name=\"inputhidden\" type=\"hidden\" value=\"";
                echo $row[0];
                echo "\"/>";
              echo "<button class=\"btn btn-warning btn-xs\" type=\"submit\">Editar</button>";
              echo "</form>";
              //echo "<a class=\"btn btn-info btn-xs\" href=\"edit.html\">MBP</a>";
              //echo "<a>  </a>";
              //echo "<a class=\"btn btn-danger btn-xs\"  href=\"#\" data-toggle=\"modal\" data-target=\"#delete-modal\">Excluir</a>";
              echo "</td>";
              echo "</tr>";
            };




            break;



















            case 'numero':






            $inputnumero=$_POST['inputnumero'];


            echo "<p class=\"well lead\">Lista de patrimônio: ".$inputnumero."</p>";

            print("      
              <div class=\"container\">

                <div id=\"main\" class=\"container-fluid\">



               <div id=\"list\" class=\"row\">
               <form id=\"contact\" method=\"post\" class=\"form\" role=\"form\" action=\"../paginas/relbem.php\">
                          <div class=\"row\">
                            <div class=\"col-xs-12 col-md-12 form-group\">
                              <button class=\"btn btn-primary\" type=\"submit\">Voltar</button>
                            </div>
                          </div>
                        </form>
                 <div class=\"table-responsive col-md-12\">
                  <table class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">
                    <thead>
                      <tr>
                        <th>Número</th>
                        <th>Descrição</th>
                        <th>Situação</th>
                        <th>Departamento</th>
                        <th>Prédio</th>
                        <th class=\"actions\">Ações</th>
                      </tr>
                    </thead>
                    <tbody>

                        ");

                        //$sql = "select * from sala";
           $sql = "SELECT b.numero, b.descricao, b.situacao, d.nome, p.nome 
            FROM bempatrimonial b 
            INNER JOIN sala s 
            ON b.numsala = s.numero 
            INNER JOIN departamento d 
            ON s.sigladpto = d.sigla
            INNER JOIN predio p
            ON s.codpredio = p.codigo
            WHERE b.numero=".$inputnumero;

            $result = pg_query ($conexao , $sql);

            while ($row=pg_fetch_row($result)) {
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>";

              switch($row[2]){
                case 'e':
                echo "Em Uso";
                break;
                case 'm':
                echo "Em Manutenção";
                break;
                case 'i':
                echo "Inutilizado";
                break;
              };

              echo"</td>";
              echo "<td>".$row[3]."</td>";
              echo "<td>".$row[4]."</td>";
              echo "<td class=\"actions\">";
              //echo "<a class=\"btn btn-success btn-xs\" href=\"view.html\">Visualizar</a>";
              //echo "<a>  </a>";
              //echo "<a class=\"btn btn-warning btn-xs\" href=\"edit.html\">Editar</a>";
              echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/mbppatrimonio.php\">";
                echo "<input id=\"inputhidden\" name=\"inputhidden\" type=\"hidden\" value=\"";
                echo $row[0];
                echo "\"/>";
              echo "<button class=\"btn btn-info btn-xs\" type=\"submit\">MBP</button>";
              echo "</form>";

              echo "<a>  </a>";

              echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/editbem.php\">";
                echo "<input id=\"inputhidden\" name=\"inputhidden\" type=\"hidden\" value=\"";
                echo $row[0];
                echo "\"/>";
              echo "<button class=\"btn btn-warning btn-xs\" type=\"submit\">Editar</button>";
              echo "</form>";
              //echo "<a class=\"btn btn-info btn-xs\" href=\"edit.html\">MBP</a>";
              //echo "<a>  </a>";
              //echo "<a class=\"btn btn-danger btn-xs\"  href=\"#\" data-toggle=\"modal\" data-target=\"#delete-modal\">Excluir</a>";
              echo "</td>";
              echo "</tr>";
            };

          



            break;







          };


          ?>
























        </tbody>
      </table>

      


    </div>

    <form id="contact" method="post" class="form" role="form" action="../paginas/relbem.php">

        <div class="row">
          <div class="col-xs-12 col-md-12 form-group">
            <button class="btn btn-primary" type="submit">Voltar</button>
          </div>
        </div>
      </form>

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