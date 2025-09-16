<?php
session_start();

include __DIR__ . "/../includes/menu.inc";
$usersFile = __DIR__ . "/../data/users.json";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $senha = $_POST["senha"] ?? "";

    if ($nome && $senha && file_exists($usersFile)) {
        $users = json_decode(file_get_contents($usersFile), true);

        foreach ($users as $u) {
            if ($u["nome"] === $nome && $u["senha"] === $senha) {
                $_SESSION["user"] = $u["nome"];
                header("Location: perguntas.php?id=0");
                exit;
            }
        }
        echo "Login inválido!";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Senha: <input type="password" name="senha" required><br>
    <button type="submit">Entrar</button>
</form>

<?php include __DIR__ . "/../includes/rodape.inc";?>