<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" http-equiv="Content-Type" content="text/html">
	<link rel="stylesheet" href="style.css">


	<?php

	$servidor = "host=localhost port=5432 dbname=enquete user=postgres password=123456";
	$usuario = "postgres";
	$senha = "123456";

        $conexao = pg_connect($servidor) or die ("Nao foi possivel conectar ao servidor PostGreSQL"); //caso a conexão seja efetuada com sucesso, exibe uma mensagem ao usuário



        $iptHidden = $_POST['iptHidden'];




        switch ($iptHidden){




      //OPERAÇÃO INCLUIR

        	case 'opVotar':



        	print ("<title>Incluir Voto</title>
        </head>

        <body>

        	<div id=\"div-form\" class=\"estilo1\">

        	"); //final print


        	$slcNavegador=$_POST['slcNavegador'];
        	$ip = getenv("REMOTE_ADDR");
        	$ipValido = 1;


        	$result = pg_query ($conexao , "select * from votos;");


        	while ($row=pg_fetch_row($result)) {

        		if($ip == $row[0]){
        			$ipValido = 0;
        		}
        	}


        	
        	if($ipValido==1){

        		if($slcNavegador != ''){
        			$query = "insert into votos values ('".$ip."', '".$slcNavegador."');";
        			$result = pg_query ($conexao , $query);
        		}


        		if (pg_affected_rows($result)!=0){
        			echo "<center><h1>Voto incluído com sucesso</h1></center>";
        		}else{
        			echo "<center><h1>Voto NÃO incluído com sucesso</h1></center>";
        		}
        	}
        	if($ipValido==0){
        		echo "<center><h1>Voto já efetuado por este endereço IP</h1></center>";
        	}


        	print ("<p class=\"p-linha\"></p>

        		<br/>

        		<form id=\"form\" name=\"form\" method=\"post\" action=\"index.html\">
        			<button type=\"submit\" class=\"btn-index\">Página inicial</button>
        		</form>

        	</div>

    		"); //final print

        	break;


    //FINAL INCLUIR






    //OPERAÇÃO RESULTADO

        	case 'opResultado':

        	$ip = getenv("REMOTE_ADDR");


        	print ("
        		<title>Resuldado da Enquete</title>
        	</head>


        	<body>
        		<div id=\"div-form\" class=\"estilo2\">

        			<center><h1>Resuldado da Enquete</h1></center>
        			<p class=\"p-linha\"></p>

        			<br/>

        			<form id=\"form\" name=\"form\" method=\"post\" action=\"index.html\">
        				<button type=\"submit\" class=\"btn-index\">Página inicial</button>
        			</form>

        			<br/>
        			");



        	echo "<div align=center>";

        	echo "<table border=1 align=center";
        	echo "<tr><th>Chrome</th><th>Firefox</th><th>Opera</th><th>Edge</th><th>Outros</th></tr>";


        	$result = pg_query ($conexao , "select count(navegador) from votos where navegador='Chrome';");
            $row=pg_fetch_row($result);
        	echo "<td align=center>".$row[0]."</td>";

        	$result = pg_query ($conexao , "select count(navegador) from votos where navegador='Firefox';");
        	$row=pg_fetch_row($result);
        	echo "<td align=center>".$row[0]."</td>";

        	$result = pg_query ($conexao , "select count(navegador) from votos where navegador='Opera';");
        	$row=pg_fetch_row($result);
        	echo "<td align=center>".$row[0]."</td>";

        	$result = pg_query ($conexao , "select count(navegador) from votos where navegador='Edge';");
        	$row=pg_fetch_row($result);
        	echo "<td align=center>".$row[0]."</td>";

        	$result = pg_query ($conexao , "select count(navegador) from votos where navegador='Outros';");
        	$row=pg_fetch_row($result);
        	echo "<td align=center>".$row[0]."</td>";



        	echo "</table>";
        	echo "</div>";

        	echo "<br/><br/>";

        	
        	$result = pg_query ($conexao , "select * from votos order by navegador;");

        	echo "<div align=center>";

        	echo "<table border='1' align=center";
        	echo "<tr><th>Endereço IP</th><th>Escolha</th></tr>";

        	while ($row=pg_fetch_row($result)) {

        		echo "<tr align=center>";
        		echo "<td>".$row[0]."</td><td>".$row[1]."</td>";
        		echo "</tr>";

        	}

        	echo "</table>";
        	echo "</div>";
        	echo "</div>";




        	break;

    //FINAL LISTAR




}; //FINAL SWITCH





?>

<br/>

<div id="div-form" class="estilo1">
	<center><font color= #3e3e3e><h1>Lucas Luzini</h1>
		<h2>Promação Para Internet Si5 N</h2>
		<b><i>funciona melhor no Google Chrome</font></i></b>
	</center></div>
</body>
</html>