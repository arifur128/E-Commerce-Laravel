<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $shippingCharge = Setting::get('shipping_charge', 0);
        return view('admin.settings.index', compact('shippingCharge'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'shipping_charge' => 'required|numeric|min:0',
        ]);

        Setting::set('shipping_charge', $request->shipping_charge);

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}