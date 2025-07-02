function criarMatriz(linhas, colunas, funcaoMatricial) {
  const matriz = [];
  for (let i = 0; i < linhas; i++) {
    const linha = [];
    for (let j = 0; j < colunas; j++) {
      linha.push(funcaoMatricial(i, j));
    }
    matriz.push(linha);
  }
  return matriz;
}

// Funções matriciais
const funcoes = {
  soma: (i, j) => i + j,
  produto: (i, j) => i * j,
  identidade: (i, j) => (i === j ? 1 : 0),
  divisaoQuadrado: (i, j) => (i * i) / (j + 1),
  comparacao: (i, j) => (i > j ? 1 : (i < j ? 5 : 0))
};

function executarEx16() {
  const linhas = parseInt(document.getElementById("linhas16").value);
  const colunas = parseInt(document.getElementById("colunas16").value);
  const tipo = document.getElementById("funcao16").value;
  const resultado = document.getElementById("resultado16");

  if (isNaN(linhas) || isNaN(colunas) || linhas <= 0 || colunas <= 0) {
    resultado.textContent = "Informe valores válidos para linhas e colunas.";
    return;
  }

  const funcao = funcoes[tipo];
  const matriz = criarMatriz(linhas, colunas, funcao);

  const texto = matriz.map(linha => linha.map(v => v.toFixed(2)).join("\t")).join("\n");
  resultado.textContent = texto;
}
