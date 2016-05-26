  <?php require "../acoes/verifica.php"; ?>
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

    <?php include_once("../paginas/menu.php"); ?>


    

    <div id="page-content-wrapper">
     
      <div class="page-content inset">
        <div class="row">
          <div class="col-md-12">
            <p class="well lead">Cadastro de categoria</p>

            <div class="container">
              <div class="row">

                <div class="col-sm-8 contact-form">
                  <form id="contact" method="post" class="form" role="form" action="../acoes/cadcategoria.php">
                    <div class="row">
                      <div class="col-xs-6 col-md-3 form-group">
                        <label for="Nome">Nome</label>
                        <input class="form-control" id="inputnome" name="inputnome" placeholder="" type="text" required="Preencha este campo" />
                      </div>
                      <div class="col-xs-4 col-md-9 form-group">
                        <label for="Nome">Descrição</label>
                        <input class="form-control" id="inputdescricao" name="inputdescricao" placeholder="" type="text" required="Preencha este campo" />
                      </div>
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
    
  </div>
			<div class="container">

		  <div class="panel panel-primary">
			<div class="panel-heading">
			<h3 class="panel-title">Lista de Categorias</h3>
			</div>
			<div class="panel-body">







		  <?php

					include_once("../acoes/connect.php");


					print("      
								
								   <div class=\"table-responsive col-md-12\">
									<table class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">
									  <thead>
										<tr>
									
										  <th>Nome</th>
										  <th>Descrição</th>
										  <th>Ações</th>
										</tr>
									  </thead>
									  <tbody>

										");


					$sql = "SELECT * FROM categoria";
					$resultado = pg_query ($conexao , $sql);


					while ($linha=pg_fetch_array($resultado)) {
					  echo "<tr>";
					  echo "<td>".$linha[nome]."</td>";
					  echo "<td>".$linha[descricao]."</td>";

					  echo "<td>";
					 
					  echo "<form style=\"display: inline-block;\" method=\"post\" action=\"../acoes/excluicategoria.php\" onsubmit=\"return confirm('Você tem certeza que deseje excluir o categoria ?')\">";
						echo "<input id=\"iptexcluir\" name=\"iptexcluir\" type=\"hidden\" value=\"";
						echo $linha[sigla];
						echo "\"/>";
					  echo "<button class=\"btn btn-danger btn-xs\" type=\"submit\">Excluir</button>";
					  echo "</form>";
				
					  echo "</td>";
					  echo "</tr>";
					};


					pg_close($conexao);
		?>
		</div>





  <script src="../arquivos/bootstrap/js/jquery-2.2.3.min.js"></script>
  <script src="../arquivos/bootstrap/js/bootstrap.min.js"></script>
  <script src="../arquivos/js/menu.js"></script>
  <script src="../arquivos/js/showride.js"></script>


</body>
</html>