<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif font-medium text-2xl text-navy leading-tight">
            Modifier un médecin
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-[14px] shadow-[0_4px_16px_rgba(14,27,44,.06)] p-8">

                <form method="POST" action="{{ route('admin.medecins.update', $medecin) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-5">
                        <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom', $medecin->nom) }}"
                               class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[11px] text-[14.5px] text-navy hover:border-primary focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors">
                        @error('nom') <p class="text-xs text-urgent mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Spécialité</label>
                        <input type="text" name="specialite" value="{{ old('specialite', $medecin->specialite) }}"
                               class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[11px] text-[14.5px] text-navy hover:border-primary focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors">
                        @error('specialite') <p class="text-xs text-urgent mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Jours / Horaires <span class="text-muted font-normal">(facultatif)</span></label>
                        <textarea name="jours_horaires" rows="3"
                                  class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[11px] text-[14.5px] text-navy hover:border-primary focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors resize-y">{{ old('jours_horaires', $medecin->jours_horaires) }}</textarea>
                        @error('jours_horaires') <p class="text-xs text-urgent mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-4 pt-2">
                        <button type="submit"
                                class="bg-primary text-white px-5 py-2.5 rounded-[10px] text-sm font-semibold hover:bg-primary-600 transition-colors">
                            Enregistrer les modifications
                        </button>
                        <a href="{{ route('admin.medecins.index') }}" class="text-sm text-muted hover:text-navy transition-colors">Annuler</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>