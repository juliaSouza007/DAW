<?php
include __DIR__ . "/../includes/menu.inc";
$usersFile = __DIR__ . "/../data/users.json";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $senha = $_POST["senha"] ?? "";

    if ($nome && $senha) {
        if (!file_exists($usersFile)) {
            file_put_contents($usersFile, "[]");
        }

        $users = json_decode(file_get_contents($usersFile), true);
        if (!is_array($users)) $users = [];

        foreach ($users as $u) {
            if ($u["nome"] === $nome) {
                echo "Usuário já existe!";
                exit;
            }
        }

        $users[] = ["nome" => $nome, "senha" => $senha];
        file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));

        echo "Usuário registrado com sucesso! <a href='login.php'>Login</a>";
        exit;
    } else {
        echo "Preencha todos os campos!";
    }
}
?>

<h2>Registrar</h2>
<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Senha: <input type="password" name="senha" required><br>
    <button type="submit">Registrar</button>
</form>

<?php include __DIR__ . "/../includes/rodape.inc"; ?>
