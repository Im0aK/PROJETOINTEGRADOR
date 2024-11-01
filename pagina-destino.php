<?php
// Exibir erros para facilitar o debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conecta ao banco de dados
include('conectadb.php');

// Verifica se a conexão foi estabelecida corretamente
if (!$link) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Inicializa as variáveis
$email_existe = false;
$email = ''; // Variável para manter o e-mail se o formulário for enviado

// Verifica se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $email = mysqli_real_escape_string($link, $_POST['email']);
    
    // Verifica se o e-mail já existe no banco de dados
    $query = "SELECT * FROM tb_formulario WHERE form_email = '$email'";
    $result = mysqli_query($link, $query);
    
    if (mysqli_num_rows($result) > 0) {
        // Se o e-mail já existir, altera a variável para true
        $email_existe = true;
    } else {
        // Se o e-mail não existir, continua a receber os outros dados do formulário
        $nome = mysqli_real_escape_string($link, $_POST['nome']);
        $idade = (int)$_POST['idade']; // Certifique-se de que é um inteiro
        $genero = mysqli_real_escape_string($link, $_POST['genero']);
        $nascimento = mysqli_real_escape_string($link, $_POST['nascimento']);
        $telefone = mysqli_real_escape_string($link, $_POST['telefone']);

        // Insere os dados no banco de dados
        $sql = "INSERT INTO tb_formulario (form_nome, form_idade, form_genero, form_datanascimento, form_email, form_telefone)
                VALUES ('$nome', $idade, '$genero', '$nascimento', '$email', '$telefone')";

        if (mysqli_query($link, $sql)) {
            // Redireciona para a página de download após o cadastro
            header('Location: pagina-download.php');
            exit;
        } else {
            echo "Erro ao inserir dados: " . mysqli_error($link);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nasa.css">
    <title>Cadastro - Missão Espacial</title>
</head>
<body>
    <div class="container">
        <div class="form-nasa">
            <h1>Cadastro para a Missão Espacial</h1>
            <p>Insira seus dados para iniciar a jornada de um astronauta!</p>
            <form method="POST" action="" id="formCadastro">
                <label>Nome Completo:</label>
                <input type="text" name="nome" required>

                <label>Idade:</label>
                <input type="number" name="idade" required>

                <label>Gênero:</label>
                <select name="genero" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>

                <label>Data de Nascimento:</label>
                <input type="date" name="nascimento" required>

                <label>Email:</label>
                <input type="email" name="email" id="email" required value="<?php echo htmlspecialchars($email); ?>">

                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" required 
                 placeholder="(XX) XXXXX-XXXX" 
                pattern="\(\d{2}\) \d{5}-\d{4}" 
                title="Formato: (XX) XXXXX-XXXX"
                maxlength="15" required>

                <button type="submit" <?php if ($email_existe) echo 'disabled'; ?>>Iniciar Jornada</button>
                <?php if ($email_existe): ?>
                    <p id="emailErro" style="color: red;">Este e-mail já está cadastrado. Por favor, insira um e-mail diferente.</p>
                    <button type="button" onclick="clearEmail()">Trocar Email</button>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <script>
        // Função para limpar o campo de e-mail
        function clearEmail() {
            document.getElementById('email').value = ''; // Limpa o campo de e-mail
            document.querySelector('button[type="submit"]').disabled = false; // Habilita o botão de envio
            document.getElementById('emailErro').style.display = 'none'; // Esconde a mensagem de erro
        }

        // formatar numero 
        document.getElementById('telefone').addEventListener('input', function (e) {
            let input = e.target.value;

            // Remove todos os caracteres que não são números
            input = input.replace(/\D/g, '');

            // Formata o número
            if (input.length > 10) {
                input = input.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3'); // Formato para 11 dígitos
            } else if (input.length > 5) {
                input = input.replace(/(\d{2})(\d{5})/, '($1) $2'); // Formato para 10 dígitos
            } else if (input.length > 2) {
                input = input.replace(/(\d{2})/, '($1) '); // Formato para 2 dígitos
            }

            // Atualiza o campo de entrada com o valor formatado
            e.target.value = input;
        });

        // Limpa a mensagem de erro ao modificar o campo de e-mail
        document.getElementById('email').addEventListener('input', function () {
            document.getElementById('emailErro').style.display = 'none'; // Esconde a mensagem de erro ao digitar
        });
    </script>
</body>
</html>
