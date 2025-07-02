function deepEquals(obj1, obj2) {
  if (obj1 === obj2) return true;

  if (typeof obj1 !== "object" || typeof obj2 !== "object" || obj1 == null || obj2 == null) {
    return false;
  }

  const chaves1 = Object.keys(obj1);
  const chaves2 = Object.keys(obj2);

  if (chaves1.length !== chaves2.length) return false;

  for (let chave of chaves1) {
    if (!chaves2.includes(chave)) return false;
    if (!deepEquals(obj1[chave], obj2[chave])) return false;
  }

  return true;
}

function executarEx11() {
  const input1 = document.getElementById("obj1").value.trim();
  const input2 = document.getElementById("obj2").value.trim();
  const resultado = document.getElementById("resultado11");

  try {
    const obj1 = JSON.parse(input1);
    const obj2 = JSON.parse(input2);

    const iguais = deepEquals(obj1, obj2);

    resultado.textContent = iguais
      ? "Os objetos são iguais (deepEquals)."
      : "Os objetos são diferentes.";
  } catch (e) {
    resultado.textContent = "Erro ao interpretar JSON: " + e.message;
  }
}
