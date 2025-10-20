<?php
if (isset($_POST['notas'])) {
    // Recebe as notas e transforma em array
    $notas = explode(',', $_POST['notas']);
    $notas = array_map('floatval', $notas);

    // Calcula a média
    $soma = 0;
    foreach ($notas as $nota) {
        $soma += $nota;
    }
    $media = $soma / count($notas);

    // Define o conceito
    if ($media >= 9) {
        $conceito = "Aprovado com conceito A";
    } elseif ($media >= 7) {
        $conceito = "Aprovado com conceito B";
    } elseif ($media >= 5) {
        $conceito = "Recuperação";
    } else {
        $conceito = "Reprovado";
    }

    // Mostra o resultado
    echo "Média: $media<br>";
    echo "Conceito: $conceito";
} else {
    echo "Nenhuma nota enviada.";
}
?>
