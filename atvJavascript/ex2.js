function executarEx2() {
  const tamanho = parseInt(document.getElementById("linhas2").value);
  const resultado = document.getElementById("resultado2");
  resultado.textContent = "";

  if (isNaN(tamanho) || tamanho <= 0) {
    resultado.textContent = "Digite um número válido maior que 0.";
    return;
  }

  for (let linha = 0; linha < tamanho; linha++) {
    let linhaTexto = " ";
    for (let coluna = 0; coluna < tamanho; coluna++) {
      if ((linha + coluna) % 2 === 0) {
        linhaTexto += "#";
      } else {
        linhaTexto += " ";
      }
    }
    resultado.textContent += linhaTexto + "\n";
  }
}
