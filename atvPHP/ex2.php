<?php
if (isset($_POST['numero'])) {
    $numero = intval($_POST['numero']); // converte para inteiro

    if ($numero <= 0) {
        echo "Erro: digite um número inteiro positivo.";
    } else {
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo "$numero x $i = $resultado<br>";
        }
    }
} else {
    echo "Nenhum número enviado.";
}
?>
