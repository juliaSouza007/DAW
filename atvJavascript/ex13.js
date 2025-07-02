// Função principal de criptografia (alta ordem)
function criptografar(texto, funcaoCriterio) {
  return funcaoCriterio(texto);
}

// Cifra de César
function cifraDeCesar(texto, deslocamento = 3) {
  const deslocaLetra = (char, base) =>
    String.fromCharCode(((char.charCodeAt(0) - base + deslocamento) % 26) + base);

  let resultado = "";

  for (let char of texto) {
    if (char >= "A" && char <= "Z") {
      resultado += deslocaLetra(char, 65);
    } else if (char >= "a" && char <= "z") {
      resultado += deslocaLetra(char, 97);
    } else {
      resultado += char; // mantém espaços, pontuação etc
    }
  }

  return resultado;
}

function executarEx13() {
  const texto = document.getElementById("texto13").value;
  const deslocamento = parseInt(document.getElementById("chave13").value);
  const resultado = document.getElementById("resultado13");

  if (!texto || isNaN(deslocamento)) {
    resultado.textContent = "Preencha o texto e o deslocamento.";
    return;
  }

  const mensagemCriptografada = criptografar(texto, (t) => cifraDeCesar(t, deslocamento));
  resultado.textContent = `Texto original: ${texto}\nTexto criptografado (César +${deslocamento}): ${mensagemCriptografada}`;
}
