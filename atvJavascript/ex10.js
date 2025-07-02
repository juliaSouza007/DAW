function toList(array) {
  let list = null;
  for (let i = array.length - 1; i >= 0; i--) {
    list = {
      value: array[i],
      rest: list
    };
  }
  return list;
}

function executarEx10() {
  const input = document.getElementById("array10").value.trim();
  const resultado = document.getElementById("resultado10");

  if (input === "") {
    resultado.textContent = "Digite pelo menos um valor.";
    return;
  }

  const array = input.split(",").map(v => v.trim());
  const lista = toList(array);

  resultado.textContent = JSON.stringify(lista, null, 2);
}
