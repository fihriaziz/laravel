<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use Ballen\Distical\Calculator as DistanceCalculator;
use Ballen\Distical\Entities\LatLong;
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

    public function update(Request $request, $id) {
        $bonus = Bonus::findOrFail($id);

        if(!$bonus) {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }

        $bonus->update([
            'pembayaran' => $request->pembayaran,
            'presentasiA' => $request->presentasiA,
            'presentasiB' => $request->presentasiB,
            'presentasiC' => $request->presentasiC,
        ]);

        return response()->json([
            'message' => 'updated success',
            'data' => $bonus
        ], 201);
    }

    public function destroy($id) {
        $bonus = Bonus::findOrFail($id);
        if(!$bonus) {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }

        $bonus->delete();
        return response()->json([
            'message' => 'success',
            'data' => $bonus
        ], 200);
    }

    public function calculator() {
        $ipswich = new LatLong('52.5083', '4.7519');
        $london = new LatLong('51.509865', '-0.118092');

        $getDistanceCalculator = new DistanceCalculator($ipswich, $london);
        $distance = $getDistanceCalculator->get();

        echo "Distance: " . $distance . " km";
    }
}
