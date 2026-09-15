<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Controle de Acesso</title>
</head>

<body>

    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="ano_nascimento">Ano de Nascimento:</label>
        <input type="number" name="ano_nascimento" required><br>

        <button type="submit">Verificar Acesso</button>
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recebe os valores enviados pelo formulário
        $nome = $_POST['nome'];
        $anoNascimento = $_POST['ano_nascimento'];

        // Calcula a idade
        $anoAtual = date('Y');
        $idade = $anoAtual - $anoNascimento;

        // Verifica se é maior de idade
        if ($idade >= 18) {

            // Abre o arquivo de log para escrita
            $arquivo = fopen('acessos.txt', 'a');

            // Cria uma linha com os dados do usuário
            $linha = $nome . ';' . $anoNascimento . ';' . $idade . "\n";

            // Escreve a linha no arquivo
            fwrite($arquivo, $linha);

            // Fecha o arquivo
            fclose($arquivo);

            echo "<p>Acesso permitido, $nome!</p>";

        } else {

            echo "<p>Acesso negado, $nome!</p>";
        }
    }
    ?>

</body>

</html>