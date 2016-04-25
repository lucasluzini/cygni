<?php
	session_start();
	if (isset($_SESSION['usuario'])){
		header('location: index.php');
	}else{
		if (isset($_POST['txtLogin']) && isset($_POST['txtSenha'])){
			$login = $_POST['txtLogin'];
			$senha= $_POST['txtSenha'];
			$stringCon = "host=localhost dbname=patrimonio user=postgres password=root";
			$con = pg_connect($stringCon) or die("Problema!!!");
			$sql = "SELECT login, nome FROM usuario "
				. " WHERE login = '" . $login . "' "
				. " AND senha = '" . md5($senha) . "'";
			$result = pg_query($con, $sql);
			if (pg_num_rows($result)){ 
				$linha = pg_fetch_array($result);
				$_SESSION['usuario'] = $linha['login'];
				$_SESSION['nome_usuario'] = $linha['nome'];
				header('Location: index.php');
			}else{
				echo "<p>Usuário inexistente!!!</p>";
			}
		}
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Tela de entrada no sistema</title>
    <link rel="stylesheet" href="css/bootstrap.css"/>

  </head>

  <body>
    <h1>Login</h1>
    <p>Informe suas credenciais de entrada</p>
    <form name=frmLogin method="POST">
	<label for="txtLogin">Login: </label>
	<input type="text" name="txtLogin" id="txtLogin" value="" required />
	<label for="txtSenha">Senha: </label>
	<input type="password" name="txtSenha" id="txtSenha" value="" required />
	<br/>
	<br/>
	<input type="submit" value="Acessar" name="btnAcessar" id="btnAcessar" />
    </form>
  </body>

</html>

