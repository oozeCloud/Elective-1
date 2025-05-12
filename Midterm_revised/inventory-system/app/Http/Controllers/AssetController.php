<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Asset;
use App\Models\Location;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AssetController extends Controller
{
    public function index()
    {
        $locations = DB::table('locations')->get();
        return view('assets.locations', compact('locations'));
    }

    public function showLogin(){
        return view('assets.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/asset')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('/asset/login');
    }

    public function create($id)
    {
        $location = Location::where('id', $id)->first();
        return view('assets.create', compact('location'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required',
            'status' => 'required|string|in:in use,under maintenance',
            'note' => 'nullable|string',
            'owner' => 'required|string',
        ]);

        $asset = Asset::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'status' => $request->status,
            'owner' => $request->owner,
        ]);

        Maintenance::create([
            'asset_id' => $asset->id,
            'status_change' => $request->status,
            'note' => $request->note,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect("/locations/$request->location/view")->with('success', 'Asset added successfully!');
    }

    public function show($id)
    {
        $asset = Asset::where('id', $id)->first();
    
        $history = Maintenance::
            where('asset_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('assets.show', compact('asset', 'history'));
    }

    public function edit($id)
    {
        $asset = DB::table('assets')->where('id', $id)->first();
        $maintenance = Maintenance::where('asset_id', $id)->first();
        return view('assets.edit', compact('asset', 'maintenance'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:in use,under maintenance',
            'note' => 'nullable|string'
        ]);
        $asset = Asset::where('id', $id)->first();
        Asset::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        $record = Maintenance::where('asset_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();
    
        if (($record->status_change != $request->status) || ($record->note != $request->note)) {
            Maintenance::create([
                'asset_id' => $id,
                'status_change' => $request->status,
                'note' => $request->note,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
        return redirect("/locations/$asset->location/view")->with('success', 'Asset updated successfully!');
    }

    public function destroy($id, $locationId)
    {
        Asset::where('id', $id)->delete();
        Location::where('id', $locationId)->first();
        return redirect("/locations/$locationId/view")->with('success', 'Asset succesfully deleted');
    }

    public function locations()
    {
        $locations = DB::table('locations')->get();
        return view('assets.locations', compact('locations'));
    }

    public function storeLocation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'in_charge' => 'required|string|max:255',
        ]);

        Location::create([
            'name' => $request->name,
            'address' => $request->address,
            'in_charge' => $request->in_charge,
        ]);

        return redirect('/locations')->with('success', 'Location added successfully!');
    }

    public function addLocation(){
        return view('assets.add_location');
    }

    public function viewLocation($id){
        $assets = Asset::where('location', $id)->get();
        $location = Location::where('id', $id)->first();
        return view('assets.view_location', compact('assets', 'location'));
    }

    public function editLocation($id)
    {
        $location = Location::findOrFail($id);
        return view('assets.edit_location', compact('location'));
    }

    public function updateLocation(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'in_charge' => 'required|string|max:255',
        ]);

        $location = Location::findOrFail($id);
        $location->update([
            'name' => $request->name,
            'address' => $request->address,
            'in_charge' => $request->in_charge,
        ]);

        return redirect('/locations')->with('success', 'Location updated successfully!');
    }

    public function destroyLocation($id)
    {
        $location = Location::findOrFail($id);

        $assets = Asset::where('location', $id)->get();
        foreach ($assets as $asset) {
            Maintenance::where('asset_id', $asset->id)->delete();
        }

        Asset::where('location', $id)->delete();

        $location->delete();

        return redirect('/locations')->with('success', 'Location and all associated assets and maintenance records deleted successfully!');
    }

    public function editAccount()
    {
        return view('assets.my_account');
    }

    public function updateAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/locations')->with('success', 'Account updated successfully!');
    }
}
