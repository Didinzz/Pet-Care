<?php

namespace App\Http\Controllers;

use App\Models\RiwayatKunjungan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatKunjunganChartController extends Controller
{
    /**
     * Mendapatkan data untuk chart berdasarkan periode
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getChartData(Request $request)
    {
        $period = $request->input('period', 'mingguan'); // mingguan, month, year

        switch ($period) {
            case 'mingguan':
                return $this->getWeeklyData();
            case 'bulanan':
                return $this->getMonthlyData();
            case 'tahunan':
                return $this->getYearlyData();
            default:
                return $this->getWeeklyData();
        }
    }

    /**
     * Data kunjungan untuk satu minggu terakhir
     */
    private function getWeeklyData()
    {
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $visits = RiwayatKunjungan::select(
            DB::raw('DATE(tanggal_kunjungan) as date'),
            DB::raw('DAYNAME(tanggal_kunjungan) as day_name'),
            DB::raw('COUNT(*) as total')
        )
            ->whereBetween('tanggal_kunjungan', [$startDate, $endDate])
            ->groupBy('date', 'day_name')
            ->orderBy('date')
            ->get();

        $dayMapping = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu'
        ];

        $labels = [];
        $data = [];

        // Siapkan label dan data awal (default 0)
        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->addDays($i);
            $formattedDate = $date->format('Y-m-d');
            $total = 0;

            if ($visit = $visits->firstWhere('date', $formattedDate)) {
                $total = (int) $visit->total;
            }

            $data[$formattedDate] = $total;
            $labels[] = $dayMapping[$date->format('l')] . ": {$total}";
        }

        // Isi data berdasarkan hasil query
        foreach ($visits as $visit) {
            $data[$visit->date] = (int) $visit->total;
        }

        return response()->json([
            'labels' => array_values($labels),
            'data' => array_values($data)
        ]);
    }


    /**
     * Data kunjungan untuk satu bulan terakhir, per minggu
     */
    private function getMonthlyData()
    {
        $startDate = Carbon::now()->subWeeks(3)->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();

        $visits = RiwayatKunjungan::select(
            DB::raw('YEARWEEK(tanggal_kunjungan, 1) as year_week'),
            DB::raw('MIN(tanggal_kunjungan) as start_date'),
            DB::raw('COUNT(*) as total')
        )
            ->whereBetween('tanggal_kunjungan', [$startDate, $endDate])
            ->groupBy('year_week')
            ->orderBy('year_week')
            ->get();

        $labels = [];
        $dataMap = [];

        // Inisialisasi data untuk 4 minggu terakhir
        for ($i = 3; $i >= 0; $i--) {
            $weekStart = Carbon::now()->subWeeks($i)->startOfWeek();
            $weekEnd = Carbon::now()->subWeeks($i)->endOfWeek();
            $label = $weekStart->format('d M') . ' - ' . $weekEnd->format('d M');

            $yearWeek = $weekStart->format('oW'); // o = ISO year, W = ISO week
            $labels[] = $label;
            $dataMap[$yearWeek] = 0;
        }

        // Masukkan data kunjungan ke dalam map
        foreach ($visits as $visit) {
            $weekKey = Carbon::parse($visit->start_date)->format('oW');
            if (isset($dataMap[$weekKey])) {
                $dataMap[$weekKey] = (int) $visit->total;
            }
        }

        return response()->json([
            'labels' => array_values($labels),
            'data' => array_values($dataMap)
        ]);
    }


    /**
     * Data kunjungan untuk satu tahun terakhir, per bulan
     */
    private function getYearlyData()
    {
        $startDate = Carbon::now()->subMonths(11)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $visits = RiwayatKunjungan::select(
            DB::raw('YEAR(tanggal_kunjungan) as year'),
            DB::raw('MONTH(tanggal_kunjungan) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->whereBetween('tanggal_kunjungan', [$startDate, $endDate])
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Nama bulan dalam bahasa Indonesia
        $monthNames = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        // Siapkan label dan data map
        $labels = [];
        $dataMap = [];

        // Buat key per bulan dalam format YYYY-MM
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $key = $date->format('Y-m');
            $labels[] = $monthNames[$date->month - 1] . ' ' . $date->year;
            $dataMap[$key] = 0;
        }

        // Masukkan data dari query ke dalam map
        foreach ($visits as $visit) {
            $key = sprintf('%04d-%02d', $visit->year, $visit->month);
            if (isset($dataMap[$key])) {
                $dataMap[$key] = (int) $visit->total;
            }
        }

        return response()->json([
            'labels' => array_values($labels),
            'data' => array_values($dataMap)
        ]);
    }
}
