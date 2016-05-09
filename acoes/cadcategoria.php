<!DOCTYPE html>
<html>
<head>
  <title>Resultado da inclusão</title>
  <meta charset="UTF-8" http-equiv="Content-Type" content="text/html">
  <link rel="stylesheet" href="style.css">
</head>


<body>


  <div id="div-form" class="estilo1">


    <?php

    include_once("connect.php");

$iptMatricula=$_POST['iptMatricula'];
$iptNome=$_POST['iptNome'];
$iptDataNasc=$_POST['iptDataNasc'];
$slcSexo=$_POST['slcSexo'];
$iptRenda=$_POST['iptRenda'];

if($iptRenda==""){
  $iptRenda=0;
}

$iptRenda = str_replace( ".", "", $iptRenda);
$iptRenda = str_replace(",", ".", $iptRenda);


if($iptMatricula != '' && $iptNome != '' && $iptDataNasc != '' && $slcSexo != ''){
  $result = pg_query ($conexao , "insert into aluno values ('".$iptMatricula."', '".$iptNome."', '".$iptDataNasc."', '".$slcSexo."', '".$iptRenda."')");
}

if (pg_affected_rows($result)!=0){
  //echo "<script language=javascript>alert( 'Aluno exluído corretamente.' );</script>";
  echo "<center><h1>Aluno incluído com sucesso</h1></center>";
}else{
  //echo "<script language=javascript>alert( 'Aluno NÃO exluído corretamente.' );</script>";
  echo "<center><h1>Aluno NÃO incluído com sucesso</h1></center>";
}

?>

<p class="p-linha"></p>


<br/>

<form id="form" name="form" method="post" action="incluiraluno.html">
  <button type="submit" class="btn-index">Incluir outro aluno</button>
</form>

<br/>

<form id="form" name="form" method="post" action="listaralunos.php">
  <button type="submit" class="btn-index">Listar alunos</button>
</form>

<br/>

<form id="form" name="form" method="post" action="index.html">
  <button type="submit" class="btn-index">Página inicial</button>
</form>



</div>

<br/>

<div id="div-form" class="estilo1">
  <center><font color= #3e3e3e><h1>Lucas Luzini</h1>
    <h2>Promação Para Internet Si5 N</h2>
    <b><i>funciona melhor no Google Chrome</font></i></b>
  </center></div>
</body>
</html>