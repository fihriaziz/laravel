<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use Illuminate\Http\Request;

class BonusPembayaranController extends Controller
{
    public function getAll() {
        $bonuses = Bonus::all();

        if(!$bonuses) {
            return response()->json([
                'message' => 'not found',
            ], 404);
        }

        return response()->json([
            'message' => 'success',
            'data' => $bonuses
        ], 200);
    }

    public function store(Request $request)
     {
        $bonus = Bonus::create([
            'pembayaran' => $request->pembayaran,
            'presentasiA' => $request->presentasiA,
            'presentasiB' => $request->presentasiB,
            'presentasiC' => $request->presentasiC,
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $bonus
        ], 201);
    }

    public function show($id) {
        $bonus = Bonus::find($id);
        if(!$bonus) {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }

        return response()->json([
            'message' => 'success',
            'data' => $bonus
        ], 200);
    }

    public function destroy($id) {
        $bonus = Bonus::find($id);
        if(!$bonus) {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }

        return response()->json([
            'message' => 'success',
            'data' => $bonus
        ], 200);
    }
}
