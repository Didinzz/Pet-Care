document.addEventListener('DOMContentLoaded', async function () {
    const ctx = document.getElementById('spiderchart').getContext('2d');

    try {
        const response = await fetch('/dashboard/spiderChart-feedback');
        const data = await response.json();

        const spiderChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Layanan', 'Fasilitas', 'Pengalaman'],
                datasets: [{
                    label: 'Rata-Rata Penilaian',
                    data: [
                        data.layanan,
                        data.fasilitas,
                        data.pengalaman
                    ],
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)'
                }]
            },
            options: {
                scale: {  // Untuk Chart.js v2.7, gunakan 'scale' bukan 'scales.r'
                    ticks: {
                        beginAtZero: true,
                        min: 0,
                        max: 5,
                        stepSize: 1,
                        showLabelBackdrop: false,
                        fontSize: 10
                    },
                    pointLabels: {
                        fontSize: 12
                    },
                    angleLines: {
                        display: true
                    }
                },
                responsive: true,
                maintainAspectRatio: true,
                legend: {  // Untuk Chart.js v2.7, 'legend' tidak di dalam 'plugins'
                    display: true,
                    position: 'top'
                },
                tooltips: {  // Untuk Chart.js v2.7, gunakan 'tooltips' bukan 'plugins.tooltip'
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return data.datasets[tooltipItem.datasetIndex].label + ': ' + 
                                   tooltipItem.yLabel;
                        }
                    }
                }
            }
        });
    } catch (error) {
        console.error('Gagal mengambil data chart:', error);
        
        // Tambahkan elemen pesan error jika chart gagal dimuat
        const chartContainer = document.getElementById('spiderchart').parentNode;
        const errorMessage = document.createElement('div');
        errorMessage.className = 'alert alert-danger mt-3';
        errorMessage.textContent = 'Gagal memuat data chart. Silakan refresh halaman.';
        chartContainer.appendChild(errorMessage);
    }
});