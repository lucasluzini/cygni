  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link href="../arquivos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../arquivos/css/estilo.css" rel="stylesheet">
    <link href="../arquivos/css/3.css" rel="stylesheet">

  </head>
  <body>

    

    <div id="page-content-wrapper">

      <div class="page-content inset">
        <div class="row">
          <div class="col-md-12">
            <p class="well lead">Login</p>

            <div class="container">
              <div class="row">

                <div class="col-sm-8 contact-form"> 

                  <div class="row">


                    <?php 
                    // Conexão com o banco de dados 
                    require "../acoes/connect.php"; 

                    // Inicia sessões 
                    session_start(); 

                    // Recupera o login 
                    $login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE; 
                    // Recupera a senha, a criptografando em MD5 
                    $senha = isset($_POST["password"]) ? md5(trim($_POST["password"])) : FALSE; 



                    // Usuário não forneceu a senha ou o login 
                    if(!$login || !$senha) 
                    { 
                      echo "<h2>Você deve digitar sua senha e login!</h2>"; 

                    }else{

                    /** 
                    * Executa a consulta no banco de dados. 
                    * Caso o número de linhas retornadas seja 1 o login é válido, 
                    * caso 0, inválido. 
                    */ 
                    $sql = "SELECT * FROM usuario WHERE login = '" . $login."'"; 


                    $result_id = pg_query ($conexao , $sql); 
                    $total = pg_affected_rows($result_id); 

                    // Caso o usuário tenha digitado um login válido o número de linhas será 1.. 
                    if($total) 
                    { 
                    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 
                      $dados = pg_fetch_row($result_id); 


                    // Agora verifica a senha 
                      if(!strcmp($senha, $dados[2])) 
                      { 
                    // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
                        $_SESSION["login"]= $dados[0]; 
                        $_SESSION["nome"] = stripslashes($dados[1]); 
                        $_SESSION["nivel"]= $dados[3];
                        
                        header("Location: ../paginas/index.php"); 

                      } 
                    // Senha inválida 
                      else 
                      { 
                        echo "<h2>Senha inválida!</h2>"; 

                      } 
                    } 
                    // Login inválido 
                    else 
                    { 
                      echo "<h2>O login fornecido por você é inexistente!</h2>"; 

                    } 
                  }
                    ?>

                  </div>

                  <br/><br/>

                  <form id="contact" method="post" class="form" role="form" action="../login.php">

                    <div class="row">
                      <div class="col-xs-12 col-md-12 form-group">
                        <a class="btn btn-primary" href="../login.php">Voltar</a>
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