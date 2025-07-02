function min(a, b) {
  return a < b ? a : b;
}

function max(a, b) {
  return a > b ? a : b;
}

function executarEx5() {
  const a = parseFloat(document.getElementById("numA").value);
  const b = parseFloat(document.getElementById("numB").value);
  const resultado = document.getElementById("resultado5");

  if (isNaN(a) || isNaN(b)) {
    resultado.textContent = "Por favor, digite dois números válidos.";
    return;
  }

  resultado.textContent = `min(${a}, ${b}) = ${Math.min(a, b)}\nmax(${a}, ${b}) = ${Math.max(a, b)}`;
}
