<?php
session_start();
require_once __DIR__ . '/../includes/perguntas.inc.php';
if (!isset($_SESSION['user'])) {
    $_SESSION['mensagem'] = "Você precisa logar para jogar.";
    header('Location: login.php');
    exit;
}

$questionsFile = __DIR__ . '/../data/perguntas.json';

// Determinar ID da pergunta atual (GET mostra, POST processa)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
} else {
    // POST: recebemos id, resposta selecionada e progresso
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $selected = isset($_POST['alternativa']) ? (int)$_POST['alternativa'] : null;
    $progresso = isset($_POST['progresso']) ? (int)$_POST['progresso'] : 0;

    // carregar pergunta para checar
    $pergunta = carregaPergunta($id);
    if ($pergunta === null) {
        die("Pergunta inválida.");
    }

    if ($selected === $pergunta['resposta']) {
        // acertou
        $progresso++;
        $nextId = $id + 1;
        // checar se acabou as perguntas (venceu)
        $all = Question::loadAll($questionsFile);
        if ($nextId >= count($all)) {
            // venceu — redireciona para gameover com resultado final
            // gravar cookie com último jogo
            $cookie = json_encode(['pontuacao'=>$progresso, 'data'=>date('d/m/Y H:i:s')]);
            setcookie('ultimo_jogo', $cookie, time()+60*60*24*30); // 30 dias
            header('Location: gameover.php?pontuacao='.$progresso);
            exit;
        } else {
            // avançar para próxima pergunta mostrando GET para evitar repost
            header('Location: jogo.php?id='.$nextId.'&progresso='.$progresso);
            exit;
        }
    } else {
        // errou -> gameover
        $cookie = json_encode(['pontuacao'=>$progresso, 'data'=>date('d/m/Y H:i:s')]);
        setcookie('ultimo_jogo', $cookie, time()+60*60*24*30);
        header('Location: gameover.php?pontuacao='.$progresso);
        exit;
    }
}

// Se veio por GET (mostrar pergunta)
$perg = carregaPergunta($id);
if ($perg === null) {
    echo "Pergunta não encontrada.";
    exit;
}
// progresso pode vir via GET (quando redirecionado após acerto)
$progresso = isset($_GET['progresso']) ? (int)$_GET['progresso'] : 0;
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Pergunta <?php echo $id; ?></title></head><body>
<?php include __DIR__ . '/../includes/menu.inc.php'; ?>

<h2>Pergunta <?php echo $id + 1; ?></h2>
<p><strong><?php echo htmlspecialchars($perg['enunciado']); ?></strong></p>

<form method="post">
    <?php foreach ($perg['alternativas'] as $idx => $alt): ?>
        <label>
            <input type="radio" name="alternativa" value="<?php echo $idx; ?>" required>
            <?php echo htmlspecialchars($alt); ?>
        </label><br>
    <?php endforeach; ?>

    <input type="hidden" name="id" value="<?php echo $perg['id']; ?>">
    <input type="hidden" name="progresso" value="<?php echo $progresso; ?>">
    <button type="submit">Enviar resposta</button>
</form>

<p>Progresso: <?php echo $progresso; ?> acertos.</p>

<?php include __DIR__ . '/../includes/rodape.inc.php'; ?>
</body></html>
