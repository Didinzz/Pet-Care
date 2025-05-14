fetch('/jenis-layanan-chart')
    .then(response => response.json())
    .then(chartData => {

        var ctx = document.getElementById("myChart3").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: chartData.data,
                    backgroundColor: [
                        '#FF5733',
                        '#33FF57',
                        '#3357FF',
                        '#FF33A1',
                        '#33FFA1',
                        '#A133FF',
                        '#FFA133',
                    ],
                    label: 'Dataset 1'
                }],
                labels: chartData.labels,
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
            }
        });
    })


