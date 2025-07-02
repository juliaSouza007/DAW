function bubbleSort(array, compareFn) {
  const arr = [...array]; // Evita modificar o original
  for (let i = 0; i < arr.length - 1; i++) {
    for (let j = 0; j < arr.length - 1 - i; j++) {
      if (compareFn(arr[j], arr[j + 1]) > 0) {
        [arr[j], arr[j + 1]] = [arr[j + 1], arr[j]];
      }
    }
  }
  return arr;
}

// Critérios de comparação
const criterios = {
  crescente: (a, b) => a - b,
  decrescente: (a, b) => b - a,
  crescenteImpares: (a, b) => {
    const ai = a % 2 !== 0;
    const bi = b % 2 !== 0;
    if (ai && bi) return a - b;
    if (ai) return -1;
    if (bi) return 1;
    return 0; // mantém os pares onde estão
  },
  decrescentePares: (a, b) => {
    const ap = a % 2 === 0;
    const bp = b % 2 === 0;
    if (ap && bp) return b - a;
    if (ap) return -1;
    if (bp) return 1;
    return 0; // mantém ímpares onde estão
  }
};

function executarEx12() {
  const input = document.getElementById("array12").value.trim();
  const criterioSelecionado = document.getElementById("criterio12").value;
  const resultado = document.getElementById("resultado12");

  if (!input) {
    resultado.textContent = "Digite ao menos um número.";
    return;
  }

  const array = input.split(",").map(n => Number(n.trim()));
  if (array.some(isNaN)) {
    resultado.textContent = "Verifique se todos os valores são números válidos.";
    return;
  }

  const criterio = criterios[criterioSelecionado];
  const ordenado = bubbleSort(array, criterio);

  resultado.textContent =
    `Original: [${array.join(", ")}]\nOrdenado (${criterioSelecionado}): [${ordenado.join(", ")}]`;
}
