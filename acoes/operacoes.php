<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" http-equiv="Content-Type" content="text/html">
  <link rel="stylesheet" href="style.css">


  <?php

  $iptHidden = $_POST['iptHidden'];

    switch ($iptHidden){




      //OPERAÇÃO INCLUIR

      case 'opIncluir':

      print ("<title>Incluir aluno</title>
    </head>

    <body>

      <div id=\"div-form\" class=\"estilo1\">

        "); //final print


        $servidor = "host=localhost port=5432 dbname=academico user=postgres password=123456";
        $usuario = "postgres";
        $senha = "123456";

        $conexao = pg_connect($servidor) or die ("Nao foi possivel conectar ao servidor PostGreSQL"); //caso a conexão seja efetuada com sucesso, exibe uma mensagem ao usuário


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
      echo "<center><h1>Aluno incluído com sucesso</h1></center>";
    }else{
      echo "<center><h1>Aluno NÃO incluído com sucesso</h1></center>";
    }


    print ("<p class=\"p-linha\"></p>

    <br/>

    <form id=\"form\" name=\"form\" method=\"post\" action=\"incluiraluno.html\">
      <button type=\"submit\" class=\"btn-index\">Incluir outro aluno</button>
    </form>

    <br/>

    <form id=\"form\" name=\"form\" method=\"post\" action=\"index.html\">
      <button type=\"submit\" class=\"btn-index\">Página inicial</button>
    </form>

    </div>

    "); //final print

    break;


    //FINAL INCLUIR





    //OPERAÇÃO EXCLUIR

    case 'opExcluir':



print ("
 <title>Excluir aluno</title>

</head>

<body>
  <div id=\"div-form\" class=\"estilo1\">
  ");


    $servidor = "host=localhost port=5432 dbname=academico user=postgres password=123456";
    $usuario = "postgres";
    $senha = "123456";

$conexao = pg_connect($servidor) or die ("Nao foi possivel conectar ao servidor PostGreSQL"); //caso a conexão seja efetuada com sucesso, exibe uma mensagem ao usuário

$iptMatricula=$_POST['iptMatricula'];


  $result = pg_query ($conexao , "delete from aluno where matricula=".$iptMatricula);

if (pg_affected_rows($result)!=0){
  echo "<center><h1>Aluno excluído com sucesso</h1></center>";
}else{
  echo "<center><h1>Aluno NÃO excluído com sucesso</h1></center>";
}


print ("
<p class=\"p-linha\"></p>

<br/>

<form id=\"form\" name=\"form\" method=\"post\" action=\"exluiraluno.html\">
  <button type=\"submit\" class=\"btn-index\">Excluir outro aluno</button>
</form>

<br/>

<form id=\"form\" name=\"form\" method=\"post\" action=\"index.html\">
  <button type=\"submit\" class=\"btn-index\">Página inicial</button>
</form>



</div>

");




    break;

    //FINAL EXCLUIR






    //OPERAÇÃO LISTAR

    case 'opListar':



print ("
<title>Lista de alunos</title>
</head>


<body>
  <div id=\"div-form\" class=\"estilo2\">

    <center><h1>Lista de alunos</h1></center>
    <p class=\"p-linha\"></p>

    <br/>

    <form id=\"form\" name=\"form\" method=\"post\" action=\"index.html\">
      <button type=\"submit\" class=\"btn-index\">Página inicial</button>
    </form>

    <br/>
    ");


    $servidor = "host=localhost port=5432 dbname=academico user=postgres password=123456";
    $usuario = "postgres";
    $senha = "123456";

$conexao = pg_connect($servidor) or die ("Nao foi possivel conectar ao servidor PostGreSQL"); //caso a conexão seja efetuada com sucesso, exibe uma mensagem ao usuário


$rdOrdem=$_POST['rdOrdem'];
//falta configurar as ordenações

if($rdOrdem==''){
  $rdOrdem="nome";
}

$result = pg_query ($conexao , "select * from aluno order by ".$rdOrdem);

echo "<div align=center>";

echo "<table border='1' align=center";
echo "<tr><th>Matrícula</th><th>Nome</th><th>Data de nascimento</th><th>Sexo</th><th>Renda</th></tr>";

while ($row=pg_fetch_row($result)) {

  $novaData = date("d/m/Y", strtotime($row[2]));
  $novaRenda = number_format($row[4], 2, ",", ".");

  echo "<tr align=center>";
  echo "<td>".$row[0]."</td><td>".$row[1]."</td><td>".$novaData."</td><td>".$row[3]."</td><td align=right>"."R$ ".$novaRenda."</td>";
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