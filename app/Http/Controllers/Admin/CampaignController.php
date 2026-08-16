<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::withCount('clicks')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:campaigns',
            'target_url' => 'required|url|max:2000',
        ]);

        Campaign::create($validated);

        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign đã được tạo thành công.');
    }

    public function edit(string $id)
    {
        $campaign = Campaign::withCount('clicks')->findOrFail($id);
        return view('admin.campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, string $id)
    {
        $campaign = Campaign::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:campaigns,slug,' . $id,
            'target_url' => 'required|url|max:2000',
        ]);

        $campaign->update($validated);

        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign đã được cập nhật.');
    }

    public function destroy(string $id)
    {
        Campaign::findOrFail($id)->delete();
        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign đã được xóa.');
    }
}
