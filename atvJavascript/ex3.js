function executarEx3() {
  const palavra = document.getElementById("palavra3").value.trim();
  const resultado = document.getElementById("resultado3");

  if (palavra === "") {
    resultado.textContent = "Digite uma palavra para verificar.";
    return;
  }

  const normalizada = palavra.normalize("NFD").replace(/[^\w]/g, '').toLowerCase();
  const invertida = normalizada.split("").reverse().join("");

  if (normalizada === invertida) {
    resultado.textContent = `"${palavra}" é um palíndromo!`;
  } else {
    resultado.textContent = `"${palavra}" não é um palíndromo.`;
  }
}
