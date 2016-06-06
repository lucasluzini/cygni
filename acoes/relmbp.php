<?php require "../acoes/verifica.php"; ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Relatório de MBP</title>

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

           $rdlistarmbp=$_POST['rdlistarmbp'];


           switch ($rdlistarmbp){









            case 'todos':

            echo "<p class=\"well lead\">Lista de MBP: Todos</p>";

            print("      
              <div class=\"container\">
                <div id=\"main\" class=\"container-fluid\">
                 <div id=\"list\" class=\"row\">
                        <form id=\"contact\" method=\"post\" class=\"form\" role=\"form\" action=\"../paginas/relmbp.php\">
                          <div class=\"row\">
                            <div class=\"col-xs-12 col-md-12 form-group\">
                              <button class=\"btn btn-primary\" type=\"submit\">Voltar</button>
                            </div>
                          </div>
                        </form>


<div class=\"container\">
<div class=\"panel panel-primary\">
<div class=\"panel-body\">


                   <div class=\"table-responsive col-md-12\">
                    <table class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">
                      <thead>
                        <tr>
                          <th>Número</th>
                          <th>Data</th>
                          <th>Login</th>
                          <th>Patrimônio</th>
                          <th>Sala de origem</th>
                          <th>Sala de destino</th>
                        </tr>
                      </thead>
                      <tbody>

                        ");

                        //$sql = "select * from sala";
            $sql = "SELECT * FROM mbp ORDER BY data";
            $result = pg_query ($conexao , $sql);



            while ($row=pg_fetch_row($result)) {
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              $novaData = date("d/m/Y", strtotime($row[1]));
              echo "<td>".$novaData."</td>";
              echo "<td>".$row[2]."</td>";
              echo "<td>".$row[3]."</td>";
              $temp = pg_fetch_row(pg_query ($conexao, "SELECT p.nome, s.sigladpto FROM predio p INNER JOIN sala s ON p.codigo=s.codpredio WHERE s.numero = ".$row[4]));
              echo "<td>".$temp[0]." - ".$temp[1]."</td>";
              $temp = pg_fetch_row(pg_query ($conexao, "SELECT p.nome, s.sigladpto FROM predio p INNER JOIN sala s ON p.codigo=s.codpredio WHERE s.numero = ".$row[5]));
              echo "<td>".$temp[0]." - ".$temp[1]."</td>";

              echo "<td>";
           
              echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/excluimbp1.php\" onsubmit=\"return confirm('Você tem certeza que deseje excluir a MBP ?')\">";
              echo "<input id=\"iptexcluir\" name=\"iptexcluir\" type=\"hidden\" value=\"";
              echo $row[0];
              echo "\"/>";
              echo "<button class=\"btn btn-danger btn-xs\" type=\"submit\">Excluir</button>";
              echo "</form>";
        
              echo "</td>";
              echo "</tr>";
            };



            break;

















            case 'numero':


            $inputnumero=$_POST['inputnumero'];

            
            echo "<p class=\"well lead\">Lista de MBP do patrimônio: ".$inputnumero."</p>";

            print("      
              <div class=\"container\">
                <div id=\"main\" class=\"container-fluid\">
                 <div id=\"list\" class=\"row\">
                        <form id=\"contact\" method=\"post\" class=\"form\" role=\"form\" action=\"../paginas/relmbp.php\">
                          <div class=\"row\">
                            <div class=\"col-xs-12 col-md-12 form-group\">
                              <button class=\"btn btn-primary\" type=\"submit\">Voltar</button>
                            </div>
                          </div>
                        </form>


<div class=\"container\">
<div class=\"panel panel-primary\">
<div class=\"panel-body\">
                        
                   <div class=\"table-responsive col-md-12\">
                    <table class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">
                      <thead>
                        <tr>
                          <th>Número</th>
                          <th>Data</th>
                          <th>Login</th>
                          <th>Patrimônio</th>
                          <th>Sala de origem</th>
                          <th>Sala de destino</th>
                        </tr>
                      </thead>
                      <tbody>

                        ");

                        //$sql = "select * from sala";
            $sql = "SELECT * FROM mbp WHERE numbem = ".$inputnumero;
            $result = pg_query ($conexao , $sql);



            while ($row=pg_fetch_row($result)) {
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              $novaData = date("d/m/Y", strtotime($row[1]));
              echo "<td>".$novaData."</td>";
              echo "<td>".$row[2]."</td>";
              echo "<td>".$row[3]."</td>";
              $temp = pg_fetch_row(pg_query ($conexao, "SELECT p.nome, s.sigladpto FROM predio p INNER JOIN sala s ON p.codigo=s.codpredio WHERE s.numero = ".$row[4]));
              echo "<td>".$temp[0]." - ".$temp[1]."</td>";
              $temp = pg_fetch_row(pg_query ($conexao, "SELECT p.nome, s.sigladpto FROM predio p INNER JOIN sala s ON p.codigo=s.codpredio WHERE s.numero = ".$row[5]));
              echo "<td>".$temp[0]." - ".$temp[1]."</td>";

              echo "<td>";
           
              echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/excluimbp1.php\" onsubmit=\"return confirm('Você tem certeza que deseje excluir a MBP ?')\">";
              echo "<input id=\"iptexcluir\" name=\"iptexcluir\" type=\"hidden\" value=\"";
              echo $row[0];
              echo "\"/>";
              echo "<button class=\"btn btn-danger btn-xs\" type=\"submit\">Excluir</button>";
              echo "</form>";
        
              echo "</td>";
              echo "</tr>";
            };




            break;









          };


          ?>

















        </tbody>
      </table>

      


    </div></div></div></div>

    <form id="contact" method="post" class="form" role="form" action="../paginas/relmbp.php">

        <div class="row">
          <div class="col-xs-12 col-md-12 form-group">
            <button class="btn btn-primary" type="submit">Voltar</button>
          </div>
        </div>
      </form>

  </div> <!-- /#list -->


</div>  <!-- /#main -->

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

<?php pg_close($conexao); ?>
</body>
</html>