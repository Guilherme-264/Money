const anoMin = 2000;
const anoMax = new Date().getFullYear();
let anoAtual = parseInt(window.anoAtual);

function alterarAno(delta) {
    const novoAno = anoAtual + delta;
    if (novoAno < anoMin || novoAno > anoMax) return;

    anoAtual = novoAno;
    document.getElementById('anoDisplay').textContent = anoAtual;
    document.getElementById('anoInput').value = anoAtual;

    document.getElementById('btnMenos').disabled = (anoAtual <= anoMin);
    document.getElementById('btnMais').disabled  = (anoAtual >= anoMax);

    if (window.innerWidth > 768) {
        document.getElementById('formAno').submit();
    }
}

// Event listeners fora da função
document.getElementById('btnMenos').addEventListener('click', () => alterarAno(-1));
document.getElementById('btnMais').addEventListener('click',  () => alterarAno(1));

// Estado inicial dos botões
document.getElementById('btnMenos').disabled = (anoAtual <= anoMin);
document.getElementById('btnMais').disabled  = (anoAtual >= anoMax);