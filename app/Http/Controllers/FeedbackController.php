<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Owner;
use App\Models\Pet;
use App\Models\RiwayatKunjungan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    public function dashboard()
    {
        $totalFeedback = Feedback::count();
        $avgRating = DB::table('feedback')->selectRaw('ROUND((AVG(q1_rating + q2_rating + q3_rating + q4_rating + q5_rating + q6_rating + q7_rating + q8_rating + q9_rating + q10_rating + q11_rating + q12_rating)/12), 1) as avg_rating')->value('avg_rating');

        $feedbackToday = DB::table('feedback')
            ->whereDate('tanggal_berkunjung', today())
            ->count();


        return view('pages.admin.Feedback.Dashboard', compact('totalFeedback', 'avgRating', 'feedbackToday'));
    }

    public function spiderChartFeedback()
    {
        $layananAvg = DB::selectOne('SELECT AVG((q1_rating + q2_rating + q3_rating + q4_rating + q5_rating)/5) as avg FROM feedback')->avg;

        $fasilitasAvg = DB::selectOne('SELECT AVG((q6_rating + q7_rating + q8_rating + q9_rating)/4) as avg FROM feedback')->avg;

        $pengalamanAvg = DB::selectOne('SELECT AVG((q10_rating + q11_rating + q12_rating)/3) as avg FROM feedback')->avg;

        return response()->json([
            'layanan' => round($layananAvg, 1),
            'fasilitas' => round($fasilitasAvg, 1),
            'pengalaman' => round($pengalamanAvg, 1),
        ]);
    }


    public function feedbackTable()
    {
        $feedback = Feedback::all()->map(function ($item) {
            $item->layanan = round(collect([
                $item->q1_rating,
                $item->q2_rating,
                $item->q3_rating,
                $item->q4_rating,
                $item->q5_rating
            ])->avg(), 1);

            $item->fasilitas = round(collect([
                $item->q6_rating,
                $item->q7_rating,
                $item->q8_rating,
                $item->q9_rating
            ])->avg(), 1);

            $item->pengalaman = round(collect([
                $item->q10_rating,
                $item->q11_rating,
                $item->q12_rating
            ])->avg(), 1);

            return $item;
        });
        return view('pages.admin.Feedback.Feedback', compact('feedback'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'contact' => 'required|email',
                'visit_date' => 'required|date',
                'comments' => 'nullable|string',

                // Validasi rating
                'q1_rating' => 'required|integer|min:1|max:5',
                'q2_rating' => 'required|integer|min:1|max:5',
                'q3_rating' => 'required|integer|min:1|max:5',
                'q4_rating' => 'required|integer|min:1|max:5',
                'q5_rating' => 'required|integer|min:1|max:5',
                'q6_rating' => 'required|integer|min:1|max:5',
                'q7_rating' => 'required|integer|min:1|max:5',
                'q8_rating' => 'required|integer|min:1|max:5',
                'q9_rating' => 'required|integer|min:1|max:5',
                'q10_rating' => 'required|integer|min:1|max:5',
                'q11_rating' => 'required|integer|min:1|max:5',
                'q12_rating' => 'required|integer|min:1|max:5',
            ]);

            $feedback = Feedback::create([
                'name' => $request->name,
                'kontak' => $request->contact,
                'tanggal_berkunjung' => $request->visit_date,
                'komentar' => $request->comments,

                'q1_rating' => $request->q1_rating,
                'q2_rating' => $request->q2_rating,
                'q3_rating' => $request->q3_rating,
                'q4_rating' => $request->q4_rating,
                'q5_rating' => $request->q5_rating,
                'q6_rating' => $request->q6_rating,
                'q7_rating' => $request->q7_rating,
                'q8_rating' => $request->q8_rating,
                'q9_rating' => $request->q9_rating,
                'q10_rating' => $request->q10_rating,
                'q11_rating' => $request->q11_rating,
                'q12_rating' => $request->q12_rating,
            ]);

            return response()->json([
                'message' => 'Feedback berhasil disimpan.',
                'data' => $feedback
            ], 201);
        } catch (\Exception $e) {
            // Log error dan kembalikan response yang informatif
            Log::error('Feedback submission error: ' . $e->getMessage());

            return response()->json([
                'message' => 'Gagal menyimpan feedback',
                'error' => $e->getMessage()
            ], 422);
        }
    }
}
