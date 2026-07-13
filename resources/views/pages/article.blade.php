{{-- PAGE ARTICLE --}}
<x-layouts.app title="{{ $article->titre }} — CUMC-CO">

    <section class="bg-navy text-white py-14 lg:py-16">
        <div class="mx-auto max-w-[820px] px-7 lg:px-8">
            <a href="{{ route('actualites') }}" class="inline-flex items-center gap-2 text-[13px] text-primary-300 hover:text-white transition-colors mb-6">
                ← Retour aux actualités
            </a>
            <div class="flex items-center gap-3 mb-4 text-[12px]">
                <span class="font-semibold px-2.5 py-[3px] rounded-full bg-primary-50 text-primary-700 uppercase tracking-wide">{{ $article->categorie }}</span>
                <span class="text-white/60">{{ \Carbon\Carbon::parse($article->date_publication)->translatedFormat('d F Y') }}</span>
            </div>
            <h1 class="font-serif font-medium text-[30px] lg:text-[44px] leading-[1.12] tracking-tight">{{ $article->titre }}</h1>
        </div>
    </section>

    <section class="py-14 lg:py-20 bg-paper">
        <div class="mx-auto max-w-[820px] px-7 lg:px-8">

            @if ($article->imageUrl())
                <div class="rounded-[18px] overflow-hidden aspect-[16/9] mb-10">
                    <img src="{{ $article->imageUrl() }}" alt="{{ $article->titre }}" class="w-full h-full object-cover">
                </div>
            @endif

            <p class="text-lg lg:text-xl text-ink-soft leading-relaxed font-medium mb-8">{{ $article->extrait }}</p>

            <div class="text-[16px] text-ink-soft leading-[1.8] whitespace-pre-line">{{ $article->contenu }}</div>

            <div class="mt-12 pt-8 border-t border-[#E8E6E0]">
                <a href="{{ route('actualites') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-primary-600 hover:text-primary-700 transition-colors">
                    ← Retour aux actualités
                </a>
            </div>

        </div>
    </section>

</x-layouts.app>