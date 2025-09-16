<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . "/../includes/menu.inc";
include "../includes/perguntas.inc";

$id = $_GET["id"] ?? 0;
$pergunta = carregaPergunta($id);

if (!$pergunta) {
    echo "<h2>Parabéns, você terminou o jogo!</h2>";
    echo "<a href='index.php'>Voltar ao início</a>";
    exit;
}
?>

<h2>Pergunta <?php echo $id + 1; ?></h2>
<p><?php echo $pergunta["enunciado"]; ?></p>

<form method="POST" action="verifica.php">
    <?php foreach ($pergunta["alternativas"] as $i => $alt): ?>
        <label>
            <input type="radio" name="resposta" value="<?php echo $i; ?>" required>
            <?php echo $alt; ?>
        </label><br>
    <?php endforeach; ?>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button type="submit">Responder</button>
</form>

<?php include __DIR__ . "/../includes/rodape.inc"; ?>