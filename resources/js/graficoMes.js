import Chart from 'chart.js/auto';
document.addEventListener('DOMContentLoaded', () => {

    const graficoCanvas = document.getElementById('grafico');
    if (!graficoCanvas) return;

    const label = JSON.parse(graficoCanvas.dataset.labels);
    const data = JSON.parse(graficoCanvas.dataset.data);

    function esscolherCor(valor){
        return valor >= 0 ? 'rgba(45, 230, 39)' : 'rgba(247, 49, 73)';

    }
    const coresFundo = data.map((valor) =>
        esscolherCor(valor)
    );

    const ctx = graficoCanvas.getContext('2d');
    new Chart(ctx, {
        type: 'bar', 
        data: {
        labels: label,
        datasets: [{
            label: 'gastos (R$)',
            data: data,
            borderWidth: 1,
            backgroundColor: coresFundo
        }]
        },
  

    });
});
