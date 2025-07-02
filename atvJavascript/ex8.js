function range(min, max, i = 1) {
  const resultado = [];

  if (i <= 0) throw new Error("Intervalo deve ser maior que 0.");

  if (min <= max) {
    for (let n = min; n <= max; n += i) {
      resultado.push(n);
    }
  } else {
    // Caso min > max, gera array decrescente
    for (let n = min; n >= max; n -= i) {
      resultado.push(n);
    }
  }

  return resultado;
}

function executarEx8() {
  const min = parseInt(document.getElementById("min8").value);
  const max = parseInt(document.getElementById("max8").value);
  const incInput = document.getElementById("inc8").value;
  const resultado = document.getElementById("resultado8");

  const inc = incInput === "" ? 1 : parseInt(incInput);

  if (isNaN(min) || isNaN(max) || isNaN(inc)) {
    resultado.textContent = "Por favor, preencha todos os campos corretamente.";
    return;
  }

  try {
    const intervalo = range(min, max, inc);
    resultado.textContent = intervalo.join(", ");
  } catch (e) {
    resultado.textContent = e.message;
  }
};
