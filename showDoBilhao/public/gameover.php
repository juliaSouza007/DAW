<?php
session_start();
$acertos = $_SESSION["acertos"] ?? 0;
?>

<h2>Game Over!</h2>
<p>Você acertou <?php echo $acertos; ?> perguntas.</p>
<a href="index.php">Voltar</a>
