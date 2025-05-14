<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisLayananChartController extends Controller
{
    public function getJenisLayananChart()
    {
        $data = DB::table('riwayat_kunjungans')
            ->select(DB::raw('jenis_layanan, count(*) as total'))
            ->groupBy('jenis_layanan')
            ->get();

            $labels = $data->pluck('jenis_layanan');
            $values = $data->pluck('total');

            return response()->json([
                'labels' => $labels,
                'data' => $values
            ]);
    }
}
