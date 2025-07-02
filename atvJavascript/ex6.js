// Função mod2: verifica se number é divisível por 2
function mod2(number) {
  // Se number menor que 2, só é divisível se for zero
  if (number === 0) return true;
  if (number < 2) return false;

  // Recursivamente subtrai 2 até chegar em 0 ou 1
  return mod2(number - 2);
}

// Função mod: verifica se num é divisível por mod
function mod(num, modValue) {
  if (modValue === 0) throw new Error("Divisão por zero não é permitida.");

  if (num === 0) return true;
  if (num < modValue) return false;

  return mod(num - modValue, modValue);
}

// Evento do botão
function executarEx6() {
  const num = parseInt(document.getElementById("num6").value);
  const modValue = parseInt(document.getElementById("mod6").value);
  const resultado = document.getElementById("resultado6");

  if (isNaN(num) || isNaN(modValue) || modValue <= 0) {
    resultado.textContent = "Digite números válidos e mod maior que 0.";
    return;
  }

  try {
    const divisivelPor2 = mod2(num);
    const divisivelPorMod = mod(num, modValue);

    resultado.textContent = `mod2(${num}) = ${divisivelPor2}\nmod(${num}, ${modValue}) = ${divisivelPorMod}`;
  } catch (e) {
    resultado.textContent = e.message;
  }
};
