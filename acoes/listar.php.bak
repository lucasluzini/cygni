<!DOCTYPE html>
<html>
<head>
  <title>Lista de alunos</title>
  <meta charset="UTF-8" http-equiv="Content-Type" content="text/html">
  <link rel="stylesheet" href="style.css">
</head>


<body>
  <div id="div-form" class="estilo2">

    <center><h1>Lista de alunos</h1></center>
    <p class="p-linha"></p>

    <br/>

    <form id="form" name="form" method="post" action="index.html">
      <button type="submit" class="btn-index">Página inicial</button>
    </form>

    <br/>



    <?php



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

?>


</div>

<br/>

<div id="div-form" class="estilo1">
  <center><font color= #3e3e3e><h1>Lucas Luzini</h1>
    <h2>Promação Para Internet Si5 N</h2>
    <b><i>funciona melhor no Google Chrome</font></i></b>
  </center></div>
</body>
</html>