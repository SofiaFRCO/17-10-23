
<?php
// Recebe e remove espaços em branco à esquerda e à direita da entrada do formulário (para evitar espaços em branco no início e no fim).
$txt_usuario = trim(@$_POST['txt_usuario']);
$txt_senha = md5(trim(@$_POST['txt_senha']));

// Inicia ou continua uma sessão PHP.
@session_start();

// Define as variáveis de sessão 'usuario' e 'senha' como NULL.
$_SESSION['usuario'] = NULL;
$_SESSION['senha'] = NULL;

// Verifica se os campos 'txt_usuario' e 'txt_senha' não estão vazios e, se não estiverem, atribui seus valores às variáveis de sessão.
if ($txt_usuario && $txt_senha != '') {
    $_SESSION['usuario'] = $txt_usuario;
    $_SESSION['senha'] = $txt_senha;
}

// Define o valor da variável $host com base no servidor em que o código está sendo executado.
$host = 'localhost';
if ($_SERVER['SERVER_NAME'] != 'localhost') {
    $host = 'otherhost.mysql.com';
}

// Define variáveis para informações de banco de dados.
$db = 'stopots';
$usuario = 'root';
$senha = '';

try {
    // Tenta estabelecer uma conexão com o banco de dados usando as variáveis $host, $usuario e $senha.
    $conexao = mysqli_connect($host, $usuario, $senha);
    echo 'Conexão bem sucedida.'; // Exibe uma mensagem de sucesso se a conexão for estabelecida com êxito.
} catch (Exeption $e) {
    die ('Não foi possível conectar ao banco de dados. Erro: '.$e); // Encerra o script e exibe uma mensagem de erro em caso de falha na conexão.
}

// Abre uma segunda conexão com o banco de dados. Isso não é necessário, pois a conexão já foi estabelecida acima.
$conexao = mysqli_connect($host, $usuario, $senha);

// Seleciona o banco de dados especificado pela variável $db.
mysqli_select_db($conexao, $db);
?>
