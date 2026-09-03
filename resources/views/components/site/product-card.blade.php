@props(['product'])

<article class="group flex h-full min-w-0 flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_8px_30px_rgba(15,23,42,0.06)] transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-[0_18px_45px_rgba(15,118,110,0.13)]">
    <a href="{{ route('product.detail', $product->slug) }}" class="relative block aspect-[4/3] overflow-hidden bg-gradient-to-br from-slate-50 to-emerald-50/40">
        @if(($product->discount_percentage ?? 0) > 0)
            <span class="absolute left-4 top-4 z-10 rounded-full bg-[#ef4444] px-3 py-1.5 text-[10px] font-bold uppercase tracking-wide text-white shadow-sm">Save {{ $product->discount_percentage }}%</span>
        @endif
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" loading="lazy" class="h-full w-full object-contain p-5 transition duration-500 group-hover:scale-105">
    </a>
    <div class="flex flex-1 flex-col p-5">
        <p class="mb-2 text-[11px] font-bold uppercase tracking-[0.16em] text-[#047857]">{{ $product->category_label ?? $product->category }}</p>
        <h3 class="mb-3 min-h-[3.6rem] line-clamp-2 text-xl font-bold leading-[1.15] tracking-[-0.02em] text-slate-950">
            <a href="{{ route('product.detail', $product->slug) }}" class="transition hover:text-[#047857]">{{ $product->name }}</a>
        </h3>
        <div class="mb-3 flex items-center gap-2 text-xs">
            <span class="tracking-wide text-amber-500">★★★★★</span>
            <span class="font-semibold text-slate-500">{{ number_format($product->star_rating ?? 0, 1) }}/5</span>
        </div>
        <p class="mb-5 line-clamp-3 text-sm leading-6 text-slate-600">{{ $product->description }}</p>
        <p class="mt-auto text-lg font-bold text-slate-950">{{ $product->price }}</p>
        <div class="mt-5 grid grid-cols-2 gap-2 border-t border-slate-100 pt-4 text-[11px] font-bold uppercase tracking-wide">
            <a href="{{ $product->affiliate_link }}" target="_blank" rel="nofollow noopener" class="rounded-lg bg-[#10b981] px-2 py-3 text-center text-white transition hover:bg-[#047857]">Shop now ↗</a>
            <a href="{{ route('product.detail', $product->slug) }}" class="rounded-lg border border-slate-200 px-2 py-3 text-center text-slate-700 transition hover:border-emerald-300 hover:text-[#047857]">Read review</a>
        </div>
    </div>
</article>
