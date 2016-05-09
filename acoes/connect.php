$servidor = "host=localhost port=5432 dbname=academico user=postgres password=123456";
    $usuario = "postgres";
    $senha = "123456";

$conexao = pg_connect($servidor) or die ("Nao foi possivel conectar ao servidor PostGreSQL"); //caso a conexão seja efetuada com sucesso, exibe uma mensagem ao usuário