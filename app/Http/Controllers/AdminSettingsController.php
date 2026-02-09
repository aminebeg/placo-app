<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'company_logo']);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        if ($request->hasFile('company_logo')) {
            $path = $request->file('company_logo')->store('public/settings');
            // Remove 'public/' from path to make it accessible via storage link
            $path = str_replace('public/', '', $path);
            
            Setting::updateOrCreate(
                ['key' => 'company_logo'],
                ['value' => $path]
            );
        }

        return redirect()->back()->with('success', __('Settings updated successfully.'));
    }
}
