function transformarString(texto, funcaoTransformacao) {
  let resultado = "";
  for (let char of texto) {
    resultado += funcaoTransformacao(char);
  }
  return resultado;
}

const vogais = "aeiouAEIOU";

const transformacoes = {
  vogaisMaiusculas: (c) =>
    vogais.includes(c) ? c.toUpperCase() : c,
  consoantesMaiusculas: (c) =>
    /[a-zA-Z]/.test(c) && !vogais.includes(c) ? c.toUpperCase() : c,
  vogaisMinusculas: (c) =>
    vogais.includes(c) ? c.toLowerCase() : c,
  consoantesMinusculas: (c) =>
    /[a-zA-Z]/.test(c) && !vogais.includes(c) ? c.toLowerCase() : c
};

function executarEx15() {
  const texto = document.getElementById("texto15").value;
  const tipo = document.getElementById("transformacao15").value;
  const resultado = document.getElementById("resultado15");

  if (!texto) {
    resultado.textContent = "Digite um texto para transformar.";
    return;
  }

  const funcao = transformacoes[tipo];
  const textoTransformado = transformarString(texto, funcao);

  resultado.textContent = `Original: ${texto}\nTransformado: ${textoTransformado}`;
}
