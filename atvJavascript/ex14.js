// Função de alta ordem
function verificarNumero(numero, funcaoVerificacao) {
  return funcaoVerificacao(numero);
}

// Verificações específicas
function ehImpar(n) {
  return n % 2 !== 0;
}

function ehPrimo(n) {
  if (n <= 1) return false;
  for (let i = 2; i <= Math.sqrt(n); i++) {
    if (n % i === 0) return false;
  }
  return true;
}

function executarEx14() {
  const valor = parseInt(document.getElementById("numero14").value);
  const tipo = document.getElementById("verificacao14").value;
  const resultado = document.getElementById("resultado14");

  if (isNaN(valor)) {
    resultado.textContent = "Digite um número válido.";
    return;
  }

  let resposta;
  if (tipo === "impar") {
    resposta = verificarNumero(valor, ehImpar);
  } else if (tipo === "primo") {
    resposta = verificarNumero(valor, ehPrimo);
  }

  resultado.textContent = `Número: ${valor}\nVerificação: ${tipo}\nResultado: ${resposta ? "Sim" : "Não"}`;
}
