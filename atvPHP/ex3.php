<?php
if (isset($_POST['opcao'])) {
    $opcao = intval($_POST['opcao']);

    switch ($opcao) {
        case 1:
            echo "Números pares de 1 a 20:<br>";
            for ($i = 1; $i <= 20; $i++) {
                if ($i % 2 == 0) {
                    echo $i . " ";
                }
            }
            break;

        case 2:
            echo "Números ímpares de 1 a 20:<br>";
            $i = 1;
            while ($i <= 20) {
                if ($i % 2 != 0) {
                    echo $i . " ";
                }
                $i++;
            }
            break;

        case 3:
            echo "Saindo do sistema...";
            break;

        default:
            echo "Opção inválida.";
            break;
    }
} else {
    echo "Nenhuma opção selecionada.";
}
?>
