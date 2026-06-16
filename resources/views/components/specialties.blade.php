@php
    $specialites = [
        ['slug' => 'general', 'titre' => 'Médecine générale',
         'desc'  => 'Consultations, suivi et orientation pour tous les âges.',
         'img'   => 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=800&q=70',
         'longdesc' => "Premier point de contact pour toute la famille, le service de médecine générale assure consultations, suivi des maladies chroniques, bilans de santé et orientation vers nos spécialistes lorsque c'est nécessaire.",
         'feats' => ['Consultations sans rendez-vous possibles', 'Suivi des maladies chroniques (diabète, hypertension)', 'Certificats médicaux et vaccinations', 'Orientation vers les spécialistes du centre'],
         'docs'  => '5 médecins généralistes',
         'hours' => 'Lun–Sam · 07h–19h'],

        ['slug' => 'maternite', 'titre' => 'Maternité',
         'desc'  => 'Suivi de grossesse, accouchement et soins néonataux.',
         'img'   => 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?auto=format&fit=crop&w=800&q=70',
         'longdesc' => "Notre service de maternité accompagne les futures mamans de la conception jusqu'aux soins du nouveau-né, dans un environnement sécurisé et chaleureux, avec une équipe disponible 24h/24.",
         'feats' => ['Suivi de grossesse complet', "Salle d'accouchement équipée", 'Soins néonataux et prématurés', 'Consultations post-natales et allaitement'],
         'docs'  => '3 gynécologues · 6 sages-femmes',
         'hours' => 'Garde 24h/24 · 7j/7'],

        ['slug' => 'chirurgie', 'titre' => 'Chirurgie',
         'desc'  => 'Bloc opératoire moderne pour interventions programmées et urgentes.',
         'img'   => 'https://images.unsplash.com/photo-1551190822-a9333d879b1f?auto=format&fit=crop&w=800&q=70',
         'longdesc' => "Doté d'un bloc opératoire moderne, le service de chirurgie prend en charge les interventions programmées comme les urgences chirurgicales, avec une équipe d'anesthésie présente en permanence.",
         'feats' => ['Chirurgie générale et viscérale', 'Interventions programmées et urgentes', 'Bloc opératoire aux normes', 'Suivi post-opératoire personnalisé'],
         'docs'  => '4 chirurgiens · 2 anesthésistes',
         'hours' => 'Programmé Lun–Ven · Urgences 24h/24'],

        ['slug' => 'pediatrie', 'titre' => 'Pédiatrie',
         'desc'  => 'Soins attentifs dédiés aux nourrissons et aux enfants.',
         'img'   => 'https://images.unsplash.com/photo-1581056771107-24ca5f033842?auto=format&fit=crop&w=800&q=70',
         'longdesc' => "Le service de pédiatrie veille sur la santé des enfants, du nourrisson à l'adolescent, avec des consultations adaptées, un suivi de la croissance et la prise en charge des urgences pédiatriques.",
         'feats' => ['Suivi de croissance et vaccinations', 'Consultations nourrissons et enfants', 'Urgences pédiatriques', 'Conseils aux parents'],
         'docs'  => '3 pédiatres',
         'hours' => 'Lun–Sam · 08h–18h'],

        ['slug' => 'urgence', 'titre' => "Médecine d'urgence",
         'desc'  => 'Accueil et prise en charge des urgences 24h/24, 7j/7.',
         'img'   => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?auto=format&fit=crop&w=800&q=70',
         'longdesc' => "Le service des urgences accueille et stabilise les patients à toute heure, avec un tri rapide à l'arrivée, une équipe de garde permanente et un accès direct au bloc opératoire et au laboratoire.",
         'feats' => ['Accueil et tri 24h/24, 7j/7', 'Salle de déchocage équipée', 'Accès direct au bloc et au laboratoire', 'Équipe de garde permanente'],
         'docs'  => 'Équipe de garde pluridisciplinaire',
         'hours' => '24h/24 · 7j/7'],

        ['slug' => 'labo', 'titre' => 'Laboratoire',
         'desc'  => 'Analyses biologiques et bilans avec résultats rapides.',
         'img'   => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=800&q=70',
         'longdesc' => "Le laboratoire d'analyses médicales réalise sur place les bilans sanguins, examens biologiques et tests de dépistage, avec des résultats rapides transmis directement à votre médecin.",
         'feats' => ['Bilans sanguins complets', 'Tests de dépistage (paludisme, VIH, hépatites)', 'Résultats rapides, souvent le jour même', 'Prélèvements sans rendez-vous'],
         'docs'  => '2 biologistes · 4 techniciens',
         'hours' => 'Lun–Sam · 07h–18h'],

        ['slug' => 'radio', 'titre' => 'Radiologie',
         'desc'  => 'Imagerie médicale : radiographie, échographie, scanner.',
         'img'   => 'https://images.unsplash.com/photo-1516069677018-378515003435?auto=format&fit=crop&w=800&q=70',
         'longdesc' => "Le service d'imagerie médicale réalise radiographies, échographies et examens scanner pour accompagner le diagnostic, avec une interprétation rapide par nos radiologues.",
         'feats' => ['Radiographie numérique', 'Échographie générale et obstétricale', 'Scanner', 'Compte-rendu rapide par un radiologue'],
         'docs'  => '2 radiologues · 3 manipulateurs',
         'hours' => 'Lun–Sam · 07h30–18h · Urgences 24h/24'],

        ['slug' => 'ophtalmo', 'titre' => 'Ophtalmologie',
         'desc'  => 'Consultations, dépistage et soins de la vue pour tous.',
         'img'   => 'https://images.unsplash.com/photo-1632054225741-e071804dfc58?q=80&w=1748&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
         'longdesc' => "Le service d'ophtalmologie assure consultations, mesures de la vue, dépistage du glaucome et de la cataracte, ainsi que le suivi des pathologies oculaires pour adultes et enfants.",
         'feats' => ['Examens de la vue et prescriptions', 'Dépistage glaucome et cataracte', 'Suivi des pathologies oculaires', 'Consultations adultes et enfants'],
         'docs'  => '2 ophtalmologues',
         'hours' => 'Lun–Ven · 08h–17h'],
    ];
@endphp

<section id="specialites" class="py-16 lg:py-24 bg-paper"
         x-data="{ open: null }"
         x-init="$watch('open', v => document.body.style.overflow = v ? 'hidden' : '')">
    <div class="mx-auto max-w-[1440px] px-7 lg:px-14">

        
        <div class="max-w-[600px] mx-auto text-center mb-12">
            <p class="text-xs font-semibold tracking-[1.4px] uppercase text-primary-600 mb-3.5">Nos spécialités</p>
            <h2 class="font-serif font-medium text-[32px] lg:text-[40px] leading-[1.14] tracking-tight text-navy mb-4">
                Une prise en charge complète, sous un même toit
            </h2>
            <p class="text-base leading-relaxed text-ink-soft">
                Huit pôles médicaux et chirurgicaux pour répondre à tous les besoins de votre famille.
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach ($specialites as $spe)

                {{--  LA CARTE  --}}
                <div class="group bg-white rounded-[14px] overflow-hidden shadow-[0_1px_2px_rgba(14,27,44,.06)] hover:shadow-[0_8px_24px_rgba(14,27,44,.12)] hover:-translate-y-1 transition cursor-pointer">
                    <div class="h-40 overflow-hidden">
                        <img src="{{ $spe['img'] }}" alt="{{ $spe['titre'] }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-5">
                        <h3 class="font-serif font-medium text-[19px] text-navy mb-1.5">{{ $spe['titre'] }}</h3>
                        <p class="text-[13px] text-muted leading-[1.55]">{{ $spe['desc'] }}</p>
                        <button type="button" @click="open = '{{ $spe['slug'] }}'"
                                class="inline-block mt-3 text-[13px] font-semibold text-primary-600 hover:text-primary-700">
                            En savoir plus →
                        </button>
                    </div>
                </div>
              

                {{-- LA MODALE --}}
                <div x-cloak x-show="open === '{{ $spe['slug'] }}'"
                     x-transition.opacity.duration.200ms
                     @keydown.escape.window="open = null"
                     @click.self="open = null"
                     class="fixed inset-0 z-[100] flex items-center justify-center bg-navy/60 backdrop-blur-sm p-4">

                    <div class="bg-white rounded-[22px] w-full max-w-[560px] max-h-[90vh] overflow-y-auto shadow-[0_24px_60px_rgba(14,27,44,.22)]">

                      
                        <div class="relative h-48">
                            <img src="{{ $spe['img'] }}" alt="{{ $spe['titre'] }}" class="w-full h-full object-cover">
                            <button type="button" @click="open = null" aria-label="Fermer"
                                    class="absolute top-4 right-4 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-navy font-semibold cursor-pointer">✕</button>
                        </div>

                        <div class="p-6 lg:p-8">
                            <p class="text-xs font-semibold tracking-[1.4px] uppercase text-primary-600 mb-2">Spécialité</p>
                            <h3 class="font-serif font-medium text-[26px] text-navy mb-3">{{ $spe['titre'] }}</h3>
                        
                            <p class="text-[15px] leading-relaxed text-ink-soft mb-5">{{ $spe['longdesc'] }}</p>

                            <ul class="space-y-2 mb-6">
                                @foreach ($spe['feats'] as $feat)
                                    <li class="flex items-start gap-2.5 text-[14px] text-ink-soft">
                                        <span class="text-primary-600 font-bold">✓</span>{{ $feat }}
                                    </li>
                                @endforeach
                            </ul>

                            <div class="grid grid-cols-2 gap-4 border-t border-gray-100 pt-5 mb-6">
                                <div>
                                    <p class="text-[11px] uppercase tracking-wider text-muted mb-1">Praticiens</p>
                                    <p class="text-[14px] font-semibold text-navy">{{ $spe['docs'] }}</p>
                                </div>
                                <div>
                                    <p class="text-[11px] uppercase tracking-wider text-muted mb-1">Horaires</p>
                                    <p class="text-[14px] font-semibold text-navy">{{ $spe['hours'] }}</p>
                                </div>
                            </div>

                            <a href="#prendre-rdv" @click="open = null"
                               class="inline-flex items-center gap-2 rounded-[10px] bg-primary-600 hover:bg-primary-700 text-white font-semibold text-[14.5px] px-6 py-3 shadow-[0_8px_24px_rgba(45,174,126,.30)] transition">
                                Prendre rendez-vous
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>