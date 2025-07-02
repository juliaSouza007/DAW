function reverseArray(array) {
  const resultado = [];
  for (let i = array.length - 1; i >= 0; i--) {
    resultado.push(array[i]);
  }
  return resultado;
}

function executarEx9() {
  const input = document.getElementById("array9").value.trim();
  const resultado = document.getElementById("resultado9");

  if (input === "") {
    resultado.textContent = "Digite pelo menos um valor.";
    return;
  }

  const original = input.split(",").map(item => item.trim());
  const invertido = reverseArray(original);

  resultado.textContent = `Original: [${original.join(", ")}]\nReverso: [${invertido.join(", ")}]`;
}
