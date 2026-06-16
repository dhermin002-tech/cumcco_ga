{{-- PRÉSENTATION CLINIQUE --}}
<section id="about" class="py-16 lg:py-24 bg-white">
    <div class="mx-auto max-w-[1440px] px-7 lg:px-14 grid lg:grid-cols-2 gap-9 lg:gap-16 items-center">
 
        {{-- ─── Colonne photo + badge flottant ─── --}}
        <div class="relative rounded-[22px] overflow-hidden aspect-[4/3] shadow-[0_8px_24px_rgba(14,27,44,.12)]">
            <img src="https://images.unsplash.com/photo-1538108149393-fbbd81895907?auto=format&fit=crop&w=900&q=70"
                 alt="Établissement CUMC-CO" class="w-full h-full object-cover block">
            {{-- badge --}}
            <div class="absolute bottom-5 left-5 bg-white rounded-[14px] px-5 py-3.5 flex items-center gap-3 shadow-[0_8px_24px_rgba(14,27,44,.12)]">
                <span class="font-serif font-medium text-[30px] text-primary-600 leading-none">15+</span>
                <span class="text-xs text-muted leading-snug">praticiens<br>à votre écoute</span>
            </div>
        </div>
 
        {{-- ─── Colonne texte ─── --}}
        <div>
            <p class="text-xs font-semibold tracking-[1.4px] uppercase text-primary-600 mb-4">La Clinique</p>
            <h2 class="font-serif font-medium text-[32px] lg:text-[40px] leading-[1.14] tracking-tight text-navy mb-5">
                Un établissement agréé au service des familles gabonaises
            </h2>
            <p class="text-base leading-[1.7] text-ink-soft mb-4">
                Situé au cœur de Libreville, le Centre d'Urgence Médico-Chirurgical
                Clotilde Okinda conjugue plateau technique moderne et accompagnement
                humain. Notre vocation : soulager d'abord, prévenir toujours.
            </p>
            <p class="text-base leading-[1.7] text-ink-soft mb-4">
                Agréé par le Ministère de la Santé du Gabon, le CUMC-CO accueille
                les patients en français et en anglais, 24 heures sur 24.
            </p>
 
            {{-- Liste à puces "✓" --}}
            <ul class="mt-6 flex flex-col gap-3.5">
                <li class="flex items-start gap-3 text-[15px] text-ink">
                    <span class="w-6 h-6 rounded-[6px] shrink-0 bg-primary-50 text-primary-600 flex items-center justify-center text-[13px] font-bold">✓</span>
                    Urgences ouvertes 24h/24, 7j/7
                </li>
                <li class="flex items-start gap-3 text-[15px] text-ink">
                    <span class="w-6 h-6 rounded-[6px] shrink-0 bg-primary-50 text-primary-600 flex items-center justify-center text-[13px] font-bold">✓</span>
                    Bloc chirurgical et maternité sur site
                </li>
                <li class="flex items-start gap-3 text-[15px] text-ink">
                    <span class="w-6 h-6 rounded-[6px] shrink-0 bg-primary-50 text-primary-600 flex items-center justify-center text-[13px] font-bold">✓</span>
                    Laboratoire et pharmacie intégrés
                </li>
                <li class="flex items-start gap-3 text-[15px] text-ink">
                    <span class="w-6 h-6 rounded-[6px] shrink-0 bg-primary-50 text-primary-600 flex items-center justify-center text-[13px] font-bold">✓</span>
                    Dossier patient synchronisé OpenClinic GA
                </li>
            </ul>
        </div>
    </div>
</section>
