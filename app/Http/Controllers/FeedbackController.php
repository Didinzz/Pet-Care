<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
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
