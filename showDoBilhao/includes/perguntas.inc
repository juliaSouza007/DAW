<?php
function carregaPergunta($id) {
    $file = __DIR__ . "/../data/perguntas.json";
    if (!file_exists($file)) return null;

    $perguntas = json_decode(file_get_contents($file), true);
    if (!is_array($perguntas)) return null;

    return $perguntas[$id] ?? null;
}
?>