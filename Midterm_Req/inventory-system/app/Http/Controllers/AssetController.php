<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    public function index()
    {
        $assets = DB::table('assets')->orderBy('created_at', 'desc')->get();
    
        return view('assets.index', compact('assets'));
    }
    

    public function create()
    {
        return view('assets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'status' => 'required|string|in:in use,under maintenance',
            'note' => 'nullable|string'
        ]);

        $assetId = DB::table('assets')->insertGetId([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('maintenance_records')->insert([
            'asset_id' => $assetId,
            'status_change' => $request->status,
            'note' => $request->note,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect('/asset');
    }

    public function show($id)
    {
        $asset = DB::table('assets')->where('id', $id)->first();
    
        $history = DB::table('maintenance_records')
            ->where('asset_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('assets.show', compact('asset', 'history'));
    }

    public function edit($id)
    {
        $asset = DB::table('assets')->where('id', $id)->first();

        return view('assets.edit', compact('asset'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'status' => 'required|string|in:in use,under maintenance',
            'note' => 'nullable|string'
        ]);

        DB::table('assets')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'location' => $request->location,
                'status' => $request->status,
                'updated_at' => now(),
            ]);

        $record = DB::table('maintenance_records')
            ->where('asset_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();


        if (($record->status_change != $request->status) || ($record->note != $request->note)) {
            DB::table('maintenance_records')->insert([
            'asset_id' => $id,
            'status_change' => $request->status,
            'note' => $request->note,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
        
        return redirect('/asset');
    }

    public function destroy($id)
    {
        DB::table('assets')->where('id', $id)->delete();
        return redirect('/asset')->with('success', 'Asset removed successfully!');
    }

    public function locations()
    {
        $locations = DB::table('locations')->get();
        return view('assets.locations', compact('locations'));
    }
}
