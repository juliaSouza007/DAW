function countChars(frase, c) {
  let contador = 0;
  for (let i = 0; i < frase.length; i++) {
    if (frase[i] === c) contador++;
  }
  return contador;
}

function executarEx7() {
  const frase = document.getElementById("frase7").value;
  const c = document.getElementById("char7").value;
  const resultado = document.getElementById("resultado7");

  if (c.length !== 1) {
    resultado.textContent = "Digite exatamente um caractere para contar.";
    return;
  }

  const total = countChars(frase, c);
  resultado.textContent = `O caractere "${c}" aparece ${total} vez(es) na frase.`;
};
