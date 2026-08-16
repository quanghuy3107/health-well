<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            SiteSetting::setValue($key, $value);
        }

        SiteSetting::clearCache();

        return redirect()->route('admin.settings.index')->with('success', 'Cài đặt đã được cập nhật thành công.');
    }
}
