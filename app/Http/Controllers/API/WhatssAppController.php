<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatssAppController extends Controller
{
    public static function sendMessage($nama, $phone, $tanggalKunjungan, $jenisPelayanan, $tanggalKunjunganUlang = null)
{
    $message = "Halo *$nama*,\n\n" .
        "Terima kasih telah memilih layanan *$jenisPelayanan* di Pet Care kami pada tanggal *" . date('d-m-Y', strtotime($tanggalKunjungan)) . "*.\n\n";

    if ($tanggalKunjunganUlang) {
        $message .= "Sebagai pengingat, Anda dijadwalkan untuk kunjungan ulang pada tanggal *" . date('d-m-Y', strtotime($tanggalKunjunganUlang)) . "*.\n\n";
    }

    $message .= "Silakan berikan rating atau masukan Anda melalui link berikut:\n" .
        "http://localhost:8000/" . "\n\nTerima kasih 🙏.";

    $response = Http::withHeaders([
        'Authorization' => env('FONTE_TOKEN'),
    ])->post('https://api.fonnte.com/send', [
        'target' => $phone,
        'message' => $message,
    ]);

    return $response->successful();
}

}
