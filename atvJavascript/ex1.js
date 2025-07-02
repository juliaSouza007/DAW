function executarEx1() {
  const linhas = parseInt(document.getElementById("linhas1").value);
  const resultado = document.getElementById("resultado1");
  resultado.textContent = "";

  if (isNaN(linhas) || linhas <= 0) {
    resultado.textContent = "Digite um número válido maior que 0.";
    return;
  }

  let forma = "##";
  for (let i = 0; i < linhas; i++) {
    resultado.textContent += forma + "\n";
    forma += "#";
  }
}
