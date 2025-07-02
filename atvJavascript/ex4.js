function executarEx4() {
  console.clear();
  for (let i = 1; i <= 100; i++) {
    if (i % 3 === 0 && i % 5 === 0) {
      console.log("FizzBuzz");
    } else if (i % 3 === 0) {
      console.log("Fizz");
    } else if (i % 5 === 0) {
      console.log("Buzz");
    } else {
      console.log(i);
    }
  }
  const resultado = document.getElementById("resultado4");
  resultado.textContent = "Executado com sucesso! Veja o console do navegador (F12).";
}
