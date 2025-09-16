<?php
session_start();
include "../includes/perguntas.inc";

// Recebe os dados do formulário
$id = $_POST["id"] ?? 0;
$resposta = $_POST["resposta"] ?? null;

// Carrega a pergunta atual
$pergunta = carregaPergunta($id);

// Inicializa contador de acertos
if (!isset($_SESSION["acertos"])) {
    $_SESSION["acertos"] = 0;
}

// Se a pergunta não existe (fim do jogo)
if (!$pergunta) {
    header("Location: gameover.php");
    exit;
}

// Verifica a resposta
if ($resposta == $pergunta["resposta"]) {
    // Acertou → incrementa contador
    $_SESSION["acertos"]++;

    // Próxima pergunta
    $prox = $id + 1;
    // Se não houver próxima pergunta, fim do jogo
    if (!carregaPergunta($prox)) {
        header("Location: gameover.php");
        exit;
    }
    header("Location: perguntas.php?id=$prox");
    exit;
} else {
    // Errou → game over
    header("Location: gameover.php");
    exit;
}
?>