// resources/js/dashboard-charts.js
import Chart from 'chart.js/auto';

function initCharts() {
    // Busca el canvas del gráfico de ingresos
    const revenueChartCanvas = document.getElementById("revenueChart");

    if (revenueChartCanvas) {
        new Chart(revenueChartCanvas, {
            type: "line",
            data: {
                labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                datasets: [{
                    label: "2024",
                    tension: 0.3,
                    borderWidth: 2,
                    borderColor: "#3B82F6", // azul
                    backgroundColor: "rgba(59, 130, 246, 0.1)",
                    fill: true,
                    data: [18500, 22300, 19800, 24500, 26200, 27800, 29100, 28500, 30200, 27500, 32100, 35600],
                },
                    {
                        label: "2023",
                        tension: 0.3,
                        borderWidth: 2,
                        borderColor: "#9CA3AF", // gris
                        backgroundColor: "rgba(156, 163, 175, 0.1)",
                        fill: true,
                        data: [15800, 18600, 17500, 21900, 22400, 24100, 25800, 26900, 28100, 25300, 29800, 31200],
                    }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', initCharts);
