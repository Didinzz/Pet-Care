"use strict";

// Inisialisasi Chart
var ctx = document.getElementById("myChart2").getContext('2d');
var visitChart;
// Variabel global untuk chart
var visitChart;

// Fungsi untuk memuat data chart
function loadVisitChart(period) {
    // Request data dari server
    fetch(`/dashboard/riwayat-kunjungan-chart?period=${period}`)
        .then(response => response.json())
        .then(chartData => {
            // Jika chart sudah ada, hancurkan terlebih dahulu
            if (visitChart) {
                visitChart.destroy();
            }

            // Buat chart baru
            var ctx = document.getElementById("myChart2").getContext('2d');
            visitChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: 'Kunjungan Pelanggan',
                        data: chartData.data,
                        borderWidth: 2,
                        backgroundColor: '#60a5fa',
                        borderColor: 'transparent',
                        borderWidth: 0,
                        pointBackgroundColor: '#999',
                        pointRadius: 1
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    tooltips: {
                        bodyFontSize: 12,      // Ukuran font isi tooltip
                        titleFontSize: 13,     // Ukuran font judul tooltip
                        displayColors: true,  // Menyembunyikan kotak warna
                        padding: 8,
                        },
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    drawBorder: false,
                                    color: '#f2f2f2',
                                },
                                ticks: {
                                    beginAtZero: false,
                                    stepSize: 2
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: false
                                }
                            }]
                        },
                    }
                });
        })
        .catch(error => {
            console.error('Error loading chart data:', error);
        });
}

// Tunggu halaman selesai dimuat
document.addEventListener('DOMContentLoaded', function () {
    // Tambahkan event listener untuk tombol periode
    const periodButtons = document.querySelectorAll('.card-header-action .btn');

    // Tambahkan event listener untuk setiap tombol
    periodButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            // Hapus kelas active dari semua tombol
            periodButtons.forEach(btn => btn.classList.remove('active'));

            // Tambahkan kelas active ke tombol yang diklik
            this.classList.add('active');

            // Ambil periode dari teks tombol (Week, Month, Year)
            let period = this.textContent.trim().toLowerCase();

            console.log(period);

            // Pastikan period hanya berisi opsi yang valid
            if (!['mingguan', 'bulanan', 'tahunan'].includes(period)) {
                period = 'mingguan'; // Default fallback
            }

            // Muat chart dengan periode yang dipilih
            loadVisitChart(period);
        });
    });

    // Cari tombol dengan kelas active atau gunakan tombol pertama
    const activeButton = document.querySelector('.card-header-action .btn.active') ||
        document.querySelector('.card-header-action .btn');

    if (activeButton) {
        // Ambil periode dari tombol aktif
        let activePeriod = activeButton.textContent.trim().toLowerCase();

        // Pastikan period hanya berisi opsi yang valid
        if (!['mingguan', 'bulanan', 'tahunan'].includes(activePeriod)) {
            activePeriod = 'mingguan'; // Default fallback
        }

        // Muat chart dengan periode aktif
        loadVisitChart(activePeriod);
    } else {
        // Fallback ke data m jika tidak ada tombol aktif
        loadVisitChart('mingguan');
    }
});
