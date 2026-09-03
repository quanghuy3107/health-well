@props(['post'])

<article class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_8px_30px_rgba(15,23,42,0.05)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_45px_rgba(15,118,110,0.11)]">
    <a href="{{ route('blog.show', $post->slug) }}" class="block aspect-[16/10] overflow-hidden bg-slate-100">
        <img src="{{ asset($post->image) }}" alt="{{ $post->image_alt ?? $post->title }}" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
    </a>
    <div class="p-6">
        <p class="mb-2 text-[11px] font-bold uppercase tracking-[0.16em] text-[#047857]">{{ $post->category ?? 'Review' }}</p>
        <h3 class="mb-3 line-clamp-2 text-2xl font-bold leading-[1.15] tracking-[-0.025em] text-slate-950">
            <a href="{{ route('blog.show', $post->slug) }}" class="transition hover:text-[#047857]">{{ $post->title }}</a>
        </h3>
        <p class="mb-5 line-clamp-3 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p>
        <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wide text-[#047857]">Read more <span aria-hidden="true">→</span></a>
    </div>
</article>
