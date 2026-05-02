<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Click;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class AffiliateController extends Controller
{
    /**
     * Xử lý link cloaking và chuyển hướng khách hàng.
     */
    public function redirect(Request $request, $slug)
    {
        // 1. Tìm campaign theo slug và lưu vào Redis cache 1 giờ (3600 giây)
        $campaign = Cache::remember("campaign_{$slug}", 3600, function () use ($slug) {
            return Campaign::where('slug', $slug)->firstOrFail();
        });

        // 2. Tạo Click ID duy nhất (UUID)
        $clickId = (string) Str::uuid();

        // 3. Lưu thông tin click vào database
        Click::create([
            'campaign_id' => $campaign->id,
            'click_id'    => $clickId,
            'ip_address'  => $request->ip(),
            'gclid'       => $request->query('gclid'), // Lấy gclid từ Google Ads nếu có
            'user_agent'  => $request->userAgent(),
        ]);

        // 4. Xây dựng URL đích kèm tham số subid
        // Kiểm tra xem URL đích đã có dấu ? chưa để nối tham số cho đúng
        $separator = str_contains($campaign->target_url, '?') ? '&' : '?';
        $redirectUrl = $campaign->target_url . $separator . 'subid=' . $clickId;

        // 5. Redirect sang trang Affiliate (ngoài hệ thống)
        return redirect()->away($redirectUrl);
    }
}
