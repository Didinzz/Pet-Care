fetch('/dashboard/jenis-layanan-chart')
    .then(response => response.json())
    .then(chartData => {

        var ctx = document.getElementById("myChart3").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: chartData.data,
                    backgroundColor: chartData.labels.map(() => '#' + ((Math.random() * 0xffffff) << 0).toString(16)),
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


