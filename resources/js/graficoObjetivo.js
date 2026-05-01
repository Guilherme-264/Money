import Chart from 'chart.js/auto';
document.addEventListener('DOMContentLoaded', () => {

    const graficoCanvas = document.getElementById('grafico');
    if (!graficoCanvas) return;

    const label = JSON.parse(graficoCanvas.dataset.labels);
    const data = JSON.parse(graficoCanvas.dataset.data);
    const destino = JSON.parse(graficoCanvas.dataset.destino);
    
    function gerarCor(destino, index, total) {
        const hue = destino == 0 ? 0 : 130;
        const lightness = 35 + (index / total) * 35;
        return `hsl(${hue}, 70%, ${lightness}%)`;
    }

    const coresFundo = destino.map((d, i) =>
        gerarCor(d, i, destino.length)
    );

    const ctx = graficoCanvas.getContext('2d');

    new Chart(ctx, {
        type: 'doughnut', 
        data: {
        labels: label,
        datasets: [{
            label: 'gastos (R$)',
            data: data,
            borderWidth: 1,
            backgroundColor: coresFundo
        }]
        },
        options: {
        scales: {
        }
        }

        // window.graficoData.labels
    });
});    
