{{-- PAGE INFORMATIONS PATIENTS--}}
<x-layouts.app title="Informations Patients — CUMC-CO">

    {{-- Bandeau de tête de page --}}
    <section class="bg-navy text-white py-16 lg:py-20">
        <div class="mx-auto max-w-[1440px] px-7 lg:px-14">
            <p class="text-xs font-semibold tracking-[1.4px] uppercase text-primary-300 mb-3">Espace patients</p>
            <h1 class="font-serif font-medium text-[34px] lg:text-[48px] leading-[1.1] tracking-tight">Informations patients</h1>
            <p class="text-base lg:text-lg text-white/70 mt-4 max-w-2xl">
                Tout ce qu'il faut savoir avant votre venue : démarches d'admission,
                documents à apporter, assurances acceptées et réponses aux questions fréquentes.
            </p>
        </div>
    </section>

    {{-- Démarches d'admission : 4 étapes numérotées --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="mx-auto max-w-[1440px] px-7 lg:px-14">
            <div class="max-w-[600px] mb-12">
                <p class="text-xs font-semibold tracking-[1.4px] uppercase text-primary-600 mb-3.5">Admission</p>
                <h2 class="font-serif font-medium text-[30px] lg:text-[38px] leading-[1.14] tracking-tight text-navy">
                    Votre parcours en 4 étapes
                </h2>
            </div>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @php
                    $etapes = [
                        ['n' => '1', 't' => 'Prise de rendez-vous', 'd' => 'En ligne, par téléphone ou directement à l\'accueil du centre.'],
                        ['n' => '2', 't' => 'Accueil & enregistrement', 'd' => 'Présentez-vous 15 minutes avant avec vos documents et votre pièce d\'identité.'],
                        ['n' => '3', 't' => 'Consultation', 'd' => 'Le praticien vous reçoit, examine votre situation et établit son diagnostic.'],
                        ['n' => '4', 't' => 'Suivi & sortie', 'd' => 'Ordonnance, orientation éventuelle et planification du prochain rendez-vous.'],
                    ];
                @endphp
                @foreach ($etapes as $e)
                    <div class="rounded-[14px] border border-[#E8E6E0] p-6 bg-paper">
                        <div class="w-11 h-11 rounded-full bg-primary text-white font-serif font-medium text-xl flex items-center justify-center mb-4">{{ $e['n'] }}</div>
                        <h3 class="font-semibold text-navy text-[16px] mb-2">{{ $e['t'] }}</h3>
                        <p class="text-[13.5px] text-muted leading-relaxed">{{ $e['d'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Documents requis + assurances : deux colonnes --}}
    <section class="py-16 lg:py-24 bg-paper">
        <div class="mx-auto max-w-[1440px] px-7 lg:px-14 grid lg:grid-cols-2 gap-10">

            <div class="bg-white rounded-[14px] border border-[#E8E6E0] p-8">
                <h2 class="font-serif font-medium text-[26px] text-navy mb-5">Documents à apporter</h2>
                <ul class="flex flex-col gap-3.5">
                    @foreach (['Pièce d\'identité (CNI ou passeport)', 'Carte CNAMGS ou carte de mutuelle', 'Carnet de santé ou dossier médical', 'Ordonnances et examens antérieurs', 'Moyen de paiement (espèces, mobile money)'] as $doc)
                        <li class="flex items-start gap-3 text-[15px] text-ink">
                            <span class="w-6 h-6 rounded-[6px] shrink-0 bg-primary-50 text-primary-600 flex items-center justify-center text-[13px] font-bold">✓</span>
                            {{ $doc }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-white rounded-[14px] border border-[#E8E6E0] p-8">
                <h2 class="font-serif font-medium text-[26px] text-navy mb-5">Assurances acceptées</h2>
                <p class="text-[14px] text-muted leading-relaxed mb-5">
                    Le CUMC-CO pratique le tiers payant avec les principaux organismes. Le détail de votre
                    prise en charge est confirmé lors de l'enregistrement.
                </p>
                <div class="flex flex-wrap gap-2.5">
                    @foreach (['CNAMGS', 'Ascoma', 'NSIA Assurances', 'OGAR', 'Sanlam', 'Mutuelles d\'entreprise'] as $assu)
                        <span class="text-[13px] font-medium px-3.5 py-2 rounded-full bg-primary-50 text-primary-700">{{ $assu }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ : accordéon Alpine (clic pour ouvrir/fermer) --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="mx-auto max-w-[760px] px-7 lg:px-0">
            <div class="text-center mb-12">
                <p class="text-xs font-semibold tracking-[1.4px] uppercase text-primary-600 mb-3.5">Questions fréquentes</p>
                <h2 class="font-serif font-medium text-[30px] lg:text-[38px] leading-[1.14] tracking-tight text-navy">Vous vous demandez peut-être…</h2>
            </div>

            @php
                $faq = [
                    ['q' => 'Faut-il un rendez-vous pour être reçu ?', 'r' => 'Les urgences sont accessibles à toute heure sans rendez-vous. Pour une consultation classique, la prise de rendez-vous est recommandée pour réduire l\'attente.'],
                    ['q' => 'Acceptez-vous la CNAMGS ?', 'r' => 'Oui, le CUMC-CO est conventionné CNAMGS et pratique le tiers payant. Pensez à apporter votre carte à jour.'],
                    ['q' => 'Quels sont les horaires des urgences ?', 'r' => 'Le service des urgences est ouvert 24h/24 et 7j/7, y compris les dimanches et jours fériés.'],
                    ['q' => 'Comment récupérer mes résultats d\'analyses ?', 'r' => 'Les résultats sont disponibles à l\'accueil du laboratoire, souvent le jour même, et peuvent être transmis à votre médecin traitant.'],
                ];
            @endphp

            <div class="flex flex-col gap-3">
                @foreach ($faq as $item)
                    <div x-data="{ open: false }" class="border border-[#E8E6E0] rounded-[12px] overflow-hidden bg-white">
                        <button type="button" @click="open = !open"
                                class="w-full flex items-center justify-between gap-4 px-5 py-4 text-left">
                            <span class="font-semibold text-[15.5px] text-navy">{{ $item['q'] }}</span>
                            {{-- la flèche pivote quand c'est ouvert (:class + rotate) --}}
                            <span class="text-primary-600 text-lg shrink-0 transition-transform" :class="open && 'rotate-45'">+</span>
                        </button>
                        {{-- x-show : affiche le contenu seulement si open est vrai --}}
                        <div x-show="open" x-collapse class="px-5 pb-4 text-[14.5px] text-ink-soft leading-relaxed">
                            {{ $item['r'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-layouts.app>