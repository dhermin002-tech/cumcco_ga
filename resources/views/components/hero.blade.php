{{-- HERO --}}
<section id="hero" class="grid lg:grid-cols-2 lg:min-h-[760px] bg-paper">
    {{-- ─── Colonne gauche --}}
    <div class="flex flex-col justify-center px-7 py-14 lg:px-[72px] lg:py-20">
        <p class="text-xs font-semibold tracking-[1.4px] uppercase text-primary-600 mb-5">
            Avant tout soulager — Prévenir que guérir
        </p>
        <h1 class="font-serif font-medium text-4xl lg:text-[62px] leading-[1.07] tracking-tight text-navy mb-6">
            Une médecine<br><em class="text-primary">d'excellence,</em> au cœur<br>de Libreville.
        </h1>
        <p class="text-lg leading-relaxed text-ink-soft max-w-[480px] mb-8">
            Le Centre d'Urgence Médico-Chirurgical Clotilde Okinda accompagne
            les familles gabonaises 24 heures sur 24, sept jours sur sept —
            urgences, chirurgie, maternité, pédiatrie et plus encore.
        </p>
        <div class="flex flex-wrap gap-3.5 mb-11">
            <a href="#prendre-rdv" class="btn btn-primary">Prendre rendez-vous en ligne</a>
            <a href="#specialites" class="btn btn-secondary">Nos spécialités</a>
        </div>
        {{-- KPIs --}}
        <div class="flex flex-wrap gap-10 pt-7 border-t border-[#D8D6CF]">
            <div>
                <div class="font-serif font-medium text-[34px] leading-none text-navy">8</div>
                <div class="text-xs text-muted mt-1.5">Spécialités médicales</div>
            </div>
            <div>
                <div class="font-serif font-medium text-[34px] leading-none text-navy">24/7</div>
                <div class="text-xs text-muted mt-1.5">Urgences ouvertes</div>
            </div>
            <div>
                <div class="font-serif font-medium text-[34px] leading-none text-navy">FR · EN</div>
                <div class="text-xs text-muted mt-1.5">Accueil bilingue</div>
            </div>
        </div>
    </div>
    {{-- Colonne droite --}}
    <div class="relative flex items-center justify-center p-10 overflow-hidden bg-[#0d3354] min-h-[480px] lg:min-h-0">
        <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=1400&q=70"
             alt="" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-[linear-gradient(150deg,rgba(13,51,84,0.92)_0%,rgba(26,74,117,0.78)_55%,rgba(31,138,99,0.45)_100%)]"></div>
        <div class="relative z-10 w-[340px] max-w-full bg-white rounded-[22px] overflow-hidden shadow-[0_24px_60px_rgba(14,27,44,.22)]">
            <div class="flex items-center gap-2 bg-primary text-white px-[22px] py-[18px]">
                <span class="text-sm">✺</span>
                <span class="text-xs font-semibold tracking-wider uppercase">Rendez-vous express</span>
            </div>
            <div class="p-[22px]">
                <p class="text-[13px] text-muted mb-3.5">Prochain créneau disponible aujourd'hui</p>
                <div class="bg-primary-50 border border-primary-100 rounded-[10px] px-[18px] py-4 mb-4">
                    <div class="text-[15px] font-semibold text-navy">Médecine générale</div>
                    <div class="font-serif font-medium text-[22px] text-primary-700 mt-1">
                        14h30 <small class="font-sans font-normal text-[13px] text-muted">· Dr Mavoungou</small>
                    </div>
                </div>
                <a href="{{ url('/') }}?{{ http_build_query(['specialite' => 'Médecine générale', 'creneau' => '14h – 16h', 'medecin' => 'Dr Mavoungou']) }}#prendre-rdv"
                   class="btn btn-primary w-full justify-center">Réserver ce créneau</a>
            </div>
            <div class="flex items-center gap-2 px-[22px] py-3.5 bg-paper border-t border-[#E8E6E0] text-xs text-muted">
                <span class="w-[7px] h-[7px] rounded-full bg-primary shrink-0"></span>
                Établissement agréé · Ministère de la Santé · Gabon
            </div>
        </div>
    </div>
</section>