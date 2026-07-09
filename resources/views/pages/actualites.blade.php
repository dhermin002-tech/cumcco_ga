{{-- PAGE ACTUALITÉS — resources/views/pages/actualites.blade.php  ·  route /actualites
     Les articles viennent maintenant de la base (table actualites), gérés via l'admin. --}}
<x-layouts.app title="Actualités — CUMC-CO">

    {{-- Bandeau de tête --}}
    <section class="bg-navy text-white py-16 lg:py-20">
        <div class="mx-auto max-w-[1440px] px-7 lg:px-14">
            <p class="text-xs font-semibold tracking-[1.4px] uppercase text-primary-300 mb-3">Le centre en mouvement</p>
            <h1 class="font-serif font-medium text-[34px] lg:text-[48px] leading-[1.1] tracking-tight">Actualités &amp; prévention</h1>
            <p class="text-base lg:text-lg text-white/70 mt-4 max-w-2xl">
                Conseils santé, campagnes de prévention, nouveaux équipements et annonces du CUMC-CO.
            </p>
        </div>
    </section>

    <section class="py-16 lg:py-24 bg-paper">
        <div class="mx-auto max-w-[1440px] px-7 lg:px-14">

            {{-- 1) PRÉPARATION DES DONNÉES : le premier article = la une, les autres = la liste --}}
            @php
                $vedette = $articles->first();
                $autres  = $articles->slice(1);
            @endphp

            @if ($articles->isEmpty())
                <p class="text-center text-muted py-16">Aucune actualité publiée pour le moment.</p>
            @else

                {{-- 2) ARTICLE VEDETTE (le plus récent, mis en avant) --}}
                <a href="{{ route('actualites.show', $vedette) }}" class="group grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-16 lg:mb-20">
                    @if ($vedette->image)
                        <div class="rounded-[18px] overflow-hidden aspect-[16/10]">
                            <img src="{{ $vedette->image }}" alt="{{ $vedette->titre }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                    @else
                        <div class="rounded-[18px] overflow-hidden aspect-[16/10] bg-navy-50 flex items-center justify-center">
                            <span class="text-navy-500 text-sm">CUMC-CO</span>
                        </div>
                    @endif
                    <div>
                        <div class="flex items-center gap-3 mb-4 text-[12px]">
                            <span class="font-semibold px-2.5 py-[3px] rounded-full bg-primary-50 text-primary-700 uppercase tracking-wide">{{ $vedette->categorie }}</span>
                            <span class="text-muted">{{ \Carbon\Carbon::parse($vedette->date_publication)->translatedFormat('d F Y') }}</span>
                        </div>
                        <h2 class="font-serif font-medium text-[28px] lg:text-[38px] leading-[1.12] tracking-tight text-navy mb-4 group-hover:text-primary-700 transition-colors">
                            {{ $vedette->titre }}
                        </h2>
                        <p class="text-base text-ink-soft leading-relaxed mb-5 max-w-xl">{{ $vedette->extrait }}</p>
                        <span class="text-sm font-semibold text-primary-600">Lire l'article →</span>
                    </div>
                </a>

                {{-- 3) LISTE DES AUTRES ARTICLES --}}
                <div class="border-t border-[#E8E6E0]">
                    @foreach ($autres as $a)
                    <a href="{{ route('actualites.show', $a) }}" class="group flex flex-col sm:flex-row gap-5 sm:gap-7 py-7 border-b border-[#E8E6E0]">
                            {{-- vignette à gauche --}}
                            @if ($a->image)
                                <div class="sm:w-56 shrink-0 rounded-[12px] overflow-hidden aspect-[16/10]">
                                    <img src="{{ $a->image }}" alt="{{ $a->titre }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                <div class="sm:w-56 shrink-0 rounded-[12px] overflow-hidden aspect-[16/10] bg-navy-50 flex items-center justify-center">
                                    <span class="text-navy-500 text-xs">CUMC-CO</span>
                                </div>
                            @endif
                            {{-- texte à droite --}}
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2 text-[12px]">
                                    <span class="font-semibold px-2.5 py-[3px] rounded-full bg-primary-50 text-primary-700 uppercase tracking-wide">{{ $a->categorie }}</span>
                                    <span class="text-muted">{{ \Carbon\Carbon::parse($a->date_publication)->translatedFormat('d F Y') }}</span>
                                </div>
                                <h3 class="font-serif font-medium text-[21px] leading-snug text-navy mb-2 group-hover:text-primary-700 transition-colors">{{ $a->titre }}</h3>
                                <p class="text-[14px] text-muted leading-relaxed max-w-2xl">{{ $a->extrait }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>

            @endif

        </div>
    </section>

</x-layouts.app>