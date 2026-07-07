{{-- PRISE DE RENDEZ-VOUS --}}
@props(['medecins' => []])
<section id="prendre-rdv" class="py-16 lg:py-24 bg-paper scroll-mt-[88px]">
    <div class="mx-auto max-w-[1440px] px-7 lg:px-14">

        <div class="max-w-[600px] mx-auto text-center mb-12">
            <p class="text-xs font-semibold tracking-[1.4px] uppercase text-primary-600 mb-3.5">Prise de rendez-vous</p>
            <h2 class="font-serif font-medium text-[32px] lg:text-[42px] leading-[1.12] tracking-tight text-navy mb-4">
                Réservez votre consultation en quelques secondes
            </h2>
            <p class="text-base leading-relaxed text-ink-soft">
                Une équipe pluridisciplinaire répond à toutes vos urgences médicales et chirurgicales.
                Confirmation immédiate, synchronisée avec OpenClinic GA.
            </p>
        </div>

        <div class="max-w-[760px] mx-auto bg-white rounded-[22px] overflow-hidden shadow-[0_8px_24px_rgba(14,27,44,.12)]">

            <div class="bg-primary text-white px-9 py-6">
                <div class="text-[11px] font-semibold tracking-[1.5px] uppercase opacity-85">Prise de rendez-vous</div>
                <div class="text-xl font-semibold mt-1">Que souhaitez-vous réserver ?</div>
            </div>

            <div class="px-9 py-8">

                @if (session('success'))
                    <div class="mb-6 rounded-[10px] bg-primary-50 border border-primary-100 px-5 py-4 text-sm text-navy flex items-start gap-3">
                        <span class="w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-[13px] font-bold shrink-0">✓</span>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('rdv.store') }}"
                    x-data="{
                            tab: 'consultation',
                            dateMinUrgence: '{{ date('Y-m-d') }}',
                            dateMinNormal: '{{ date('Y-m-d', strtotime('+3 days')) }}'
                             }">
                    @csrf
                    <input type="hidden" name="type" :value="tab">

                    {{-- ONGLETS DYNAMIQUES --}}
                    <div class="grid grid-cols-3 bg-navy-50 rounded-[10px] p-1 gap-1 mb-6">
                        <button type="button" @click="tab = 'consultation'"
                                :class="tab === 'consultation' ? 'bg-white text-navy shadow-[0_1px_2px_rgba(14,27,44,.06)] font-semibold' : 'text-muted font-medium'"
                                class="py-3 rounded-[6px] text-center text-sm flex items-center justify-center gap-2 cursor-pointer transition">
                            <span class="text-base">◉</span> Consultation
                        </button>
                        <button type="button" @click="tab = 'urgence'"
                                :class="tab === 'urgence' ? 'bg-white text-navy shadow-[0_1px_2px_rgba(14,27,44,.06)] font-semibold' : 'text-muted font-medium'"
                                class="py-3 rounded-[6px] text-center text-sm flex items-center justify-center gap-2 cursor-pointer transition">
                            <span class="text-base">✚</span> Urgence
                        </button>
                        <button type="button" @click="tab = 'tele'"
                                :class="tab === 'tele' ? 'bg-white text-navy shadow-[0_1px_2px_rgba(14,27,44,.06)] font-semibold' : 'text-muted font-medium'"
                                class="py-3 rounded-[6px] text-center text-sm flex items-center justify-center gap-2 cursor-pointer transition">
                            <span class="text-base">◈</span> Téléassistance
                        </button>
                    </div>

                    {{-- ─────── INFOS PATIENT ─────── --}}
                    <p class="text-[11px] font-semibold tracking-[1.2px] uppercase text-muted mb-3">Vos informations</p>
                    <div class="grid sm:grid-cols-2 gap-[18px] mb-[18px]">
                        <div>
                            <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Nom</label>
                            <input type="text" name="nom" value="{{ old('nom') }}"
                                   class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[13px] text-[14.5px] text-navy hover:border-primary transition-colors">
                            @error('nom') <p class="text-xs text-urgent mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Prénom</label>
                            <input type="text" name="prenom" value="{{ old('prenom') }}"
                                   class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[13px] text-[14.5px] text-navy hover:border-primary transition-colors">
                            @error('prenom') <p class="text-xs text-urgent mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Téléphone</label>
                            <input type="tel" name="telephone" value="{{ old('telephone') }}"
       pattern="[0-9+\s().\-]+" title="Chiffres, +, espaces, tirets et parenthèses uniquement"
                                   class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[13px] text-[14.5px] text-navy hover:border-primary transition-colors">
                            @error('telephone') <p class="text-xs text-urgent mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[13px] text-[14.5px] text-navy hover:border-primary transition-colors">
                            @error('email') <p class="text-xs text-urgent mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- ─────── INFOS MÉDICALES ─────── --}}
                    <p class="text-[11px] font-semibold tracking-[1.2px] uppercase text-muted mb-3">Votre rendez-vous</p>
                    <div class="grid sm:grid-cols-2 gap-[18px] mb-[18px]">
                        <div>
                            <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Spécialité</label>
                            <div class="relative">
                                <select name="specialite"
                                        class="appearance-none w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[13px] text-[14.5px] text-navy cursor-pointer hover:border-primary transition-colors">
                                    <option value="Médecine générale" @selected(request('specialite') == 'Médecine générale')>Médecine générale</option>
                                    <option value="Maternité" @selected(request('specialite') == 'Maternité')>Maternité</option>
                                    <option value="Chirurgie" @selected(request('specialite') == 'Chirurgie')>Chirurgie</option>
                                    <option value="Pédiatrie" @selected(request('specialite') == 'Pédiatrie')>Pédiatrie</option>
                                    <option value="Médecine d'urgence" @selected(request('specialite') == "Médecine d'urgence")>Médecine d'urgence</option>
                                    <option value="Laboratoire" @selected(request('specialite') == 'Laboratoire')>Laboratoire</option>
                                    <option value="Radiologie" @selected(request('specialite') == 'Radiologie')>Radiologie</option>
                                    <option value="Ophtalmologie" @selected(request('specialite') == 'Ophtalmologie')>Ophtalmologie</option>
                                </select>
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[#9AA6B8] text-xs pointer-events-none">▾</span>
                            </div>
                            @error('specialite') <p class="text-xs text-urgent mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Médecin</label>
                            <div class="relative">
                                <select name="medecin" class="appearance-none w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[13px] text-[14.5px] text-navy cursor-pointer hover:border-primary transition-colors">
                                    <option value="indifferent">Tous les praticiens disponibles</option>
                                    @foreach ($medecins as $medecin)
                                        <option value="{{ $medecin->nom }}" @selected(request('medecin') == $medecin->nom)>{{ $medecin->nom }}</option>
                                    @endforeach
                                </select>
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[#9AA6B8] text-xs pointer-events-none">▾</span>
                            </div>
                            @error('medecin') <p class="text-xs text-urgent mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Date</label>
                            <input type="date" name="date" value="{{ old('date') }}"
                                   :min="tab === 'urgence' ? dateMinUrgence : dateMinNormal" max="{{ date('Y-m-d', strtotime('+30 days')) }}"
                                   class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[12px] text-[14.5px] text-navy cursor-pointer hover:border-primary transition-colors">
                            @error('date') <p class="text-xs text-urgent mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Créneau horaire</label>
                            <div class="relative">
                                <select name="creneau"
                                        class="appearance-none w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[13px] text-[14.5px] text-navy cursor-pointer hover:border-primary transition-colors">
                                    <option value="08h – 10h" @selected(request('creneau') == '08h – 10h')>08h – 10h</option>
                                    <option value="10h – 12h" @selected(request('creneau') == '10h – 12h')>10h – 12h</option>
                                    <option value="14h – 16h" @selected(request('creneau') == '14h – 16h')>14h – 16h</option>
                                    <option value="16h – 18h" @selected(request('creneau') == '16h – 18h')>16h – 18h</option>
                                </select>
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[#9AA6B8] text-xs pointer-events-none">▾</span>
                            </div>
                            @error('creneau') <p class="text-xs text-urgent mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    
                    <div class="mb-[18px]">
                        <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Motif (facultatif)</label>
                        <textarea name="motif" rows="3"
                                  class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[13px] text-[14.5px] text-navy hover:border-primary transition-colors resize-y">{{ old('motif') }}</textarea>
                        @error('motif') <p class="text-xs text-urgent mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-full justify-center text-[15px] py-4 mt-2">
                        Réserver ce créneau →
                    </button>
                </form>
            </div>

            <div class="flex items-center justify-center gap-2 p-4 bg-paper border-t border-[#E8E6E0] text-[12.5px] text-muted">
                <span class="w-[7px] h-[7px] rounded-full bg-primary"></span>
                Confirmation immédiate · Synchronisé avec OpenClinic GA
            </div>
        </div>
    </div>
</section>