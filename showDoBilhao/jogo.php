<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jogo de Perguntas</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">
    <header class="header">
      <h1 class="title">Show do Bilhão</h1>
      <p class="subtitle">Responda todas as perguntas e veja sua pontuação no final!</p>
    </header>

    <main class="stage">
      <div id="questionContainer" class="question-wrap">
        <div class="question-top">
          <span id="questionNumber" class="question-number"></span>
        </div>
        <p id="questionText" class="question-text"></p>

        <div id="optionsContainer" class="options"></div>

        <div class="button-group">
          <button id="confirmButton" class="btn">Confirmar</button>
        </div>
      </div>

      <div id="resultContainer" class="text-center" style="display:none;">
        <h2>Fim do jogo!</h2>
        <p id="scoreText"></p>
        <a href="ranking.php" class="btn">Ver Ranking</a>
      </div>
    </main>
  </div>

  <script>
  let perguntas = [];
  let indiceAtual = 0;
  let pontuacao = 0;

  const questionNumber = document.getElementById('questionNumber');
  const questionText = document.getElementById('questionText'); // mantém id="questionText" no HTML
  const optionsContainer = document.getElementById('optionsContainer');
  const confirmButton = document.getElementById('confirmButton');
  const resultContainer = document.getElementById('resultContainer');
  const scoreText = document.getElementById('scoreText');
  const questionContainer = document.getElementById('questionContainer');

  // === CARREGAR PERGUNTAS ===
  async function carregarPerguntas() {
    try {
      const response = await fetch('perguntas.json?' + new Date().getTime());
      if (!response.ok) throw new Error('Erro ao carregar perguntas');
      perguntas = await response.json();
      if (!Array.isArray(perguntas) || perguntas.length === 0) {
        throw new Error('Arquivo perguntas.json vazio ou inválido');
      }
      mostrarPergunta();
    } catch (erro) {
      console.error(erro);
      questionText.textContent = "Erro ao carregar perguntas 😢";
      confirmButton.disabled = true;
    }
  }

  // === MOSTRAR PERGUNTA ===
  function mostrarPergunta() {
    const perguntaAtual = perguntas[indiceAtual];
    if (!perguntaAtual) {
      console.error("Pergunta não encontrada no índice", indiceAtual);
      return;
    }

    questionNumber.textContent = `Pergunta ${indiceAtual + 1} de ${perguntas.length}`;
    questionText.textContent = perguntaAtual.enunciado; // usa 'enunciado'

    optionsContainer.innerHTML = '';

    perguntaAtual.alternativas.forEach((textoAlternativa, index) => {
      const opcao = document.createElement('label');
      opcao.classList.add('option');
      opcao.innerHTML = `
        <input type="radio" name="resposta" value="${index}">
        <span class="label">${String.fromCharCode(65 + index)}</span>
        <span class="text">${textoAlternativa}</span>
      `;
      optionsContainer.appendChild(opcao);
    });
  }

  // === CONFIRMAR RESPOSTA ===
  confirmButton.addEventListener('click', () => {
    const selecionada = document.querySelector('input[name="resposta"]:checked');
    if (!selecionada) {
      alert('Por favor, selecione uma alternativa!');
      return;
    }

    const resposta = parseInt(selecionada.value);
    const correta = perguntas[indiceAtual].resposta;

    if (resposta === correta) {
      pontuacao += 100;
    }

    indiceAtual++;
    if (indiceAtual < perguntas.length) {
      mostrarPergunta();
    } else {
      mostrarResultado();
    }
  });

  // === RESULTADO FINAL ===
  function mostrarResultado() {
    questionContainer.style.display = 'none';
    resultContainer.style.display = 'block';
    scoreText.textContent = `Sua pontuação final foi: ${pontuacao} pontos!`;
  }

  // === INICIAR ===
  carregarPerguntas();
</script>

</body>
</html>
