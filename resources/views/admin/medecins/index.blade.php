<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif font-medium text-2xl text-navy leading-tight">
            Gestion des médecins
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-5 rounded-[10px] bg-primary-50 border border-primary-100 px-5 py-3.5 text-sm text-navy flex items-center gap-3">
                    <span class="w-5 h-5 rounded-full bg-primary text-white flex items-center justify-center text-[11px] font-bold shrink-0">✓</span>
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex items-center justify-between mb-5">
                <p class="text-sm text-muted">{{ $medecins->count() }} médecin(s) affiché(s)</p>
                <a href="{{ route('admin.medecins.create') }}"
                   class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2.5 rounded-[10px] text-sm font-semibold hover:bg-primary-600 transition-colors">
                    + Ajouter un médecin
                </a>
            </div>

            {{-- Barre de filtres --}}
            <form method="GET" action="{{ route('admin.medecins.index') }}" class="bg-white rounded-[14px] shadow-[0_4px_16px_rgba(14,27,44,.06)] p-4 mb-5 flex flex-wrap items-end gap-4">
                <div>
                    <label class="block text-[12px] font-medium text-ink-soft mb-1">Rechercher</label>
                    <input type="text" name="recherche" value="{{ request('recherche') }}" placeholder="Nom du médecin…"
                           class="bg-paper border border-[#D8D6CF] rounded-[10px] px-3 py-2 text-[14px] text-navy hover:border-primary focus:border-primary outline-none transition-colors">
                </div>

                <div>
                    <label class="block text-[12px] font-medium text-ink-soft mb-1">Statut</label>
                    <select name="statut" class="bg-paper border border-[#D8D6CF] rounded-[10px] px-3 py-2 text-[14px] text-navy cursor-pointer hover:border-primary outline-none">
                        <option value="">Tous</option>
                        <option value="actif" @selected(request('statut') === 'actif')>Actifs</option>
                        <option value="suspendu" @selected(request('statut') === 'suspendu')>Suspendus</option>
                    </select>
                </div>

                <div>
                    <label class="block text-[12px] font-medium text-ink-soft mb-1">Spécialité</label>
                    <select name="specialite" class="bg-paper border border-[#D8D6CF] rounded-[10px] px-3 py-2 text-[14px] text-navy cursor-pointer hover:border-primary outline-none">
                        <option value="">Toutes</option>
                        @foreach ($specialites as $spec)
                            <option value="{{ $spec }}" @selected(request('specialite') === $spec)>{{ $spec }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-[10px] text-sm font-semibold hover:bg-primary-600 transition-colors">Filtrer</button>
                    <a href="{{ route('admin.medecins.index') }}" class="text-sm text-muted hover:text-navy transition-colors">Réinitialiser</a>
                </div>
            </form>

            <div class="bg-white rounded-[14px] shadow-[0_4px_16px_rgba(14,27,44,.06)] overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-paper border-b border-[#E8E6E0]">
                            <th class="px-6 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Nom</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Spécialité</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Statut</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Jours / Horaires</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medecins as $medecin)
                            <tr class="border-b border-[#F0EFEB] hover:bg-paper/60 transition-colors">
                                <td class="px-6 py-4 text-[14.5px] font-medium text-navy">{{ $medecin->nom }}</td>
                                <td class="px-6 py-4 text-[14px] text-ink-soft">{{ $medecin->specialite }}</td>
                                <td class="px-6 py-4">
                                    @if ($medecin->actif)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-primary-50 text-primary-700 text-[12px] font-semibold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>Actif
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-red-50 text-urgent text-[12px] font-semibold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-urgent"></span>Suspendu
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-[13.5px] text-muted">{{ $medecin->jours_horaires }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-4">
                                        <a href="{{ route('admin.medecins.edit', $medecin) }}"
                                           class="text-[13px] font-medium text-navy hover:text-primary-700 transition-colors">Modifier</a>

                                        <form method="POST" action="{{ route('admin.medecins.toggle', $medecin) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-[13px] font-medium text-primary-600 hover:text-primary-700 transition-colors">
                                                @if ($medecin->actif) Suspendre @else Réactiver @endif
                                            </button>
                                        </form>

                                        @if (auth()->user()->role === 'admin')
                                            <form method="POST" action="{{ route('admin.medecins.destroy', $medecin) }}"
                                                  onsubmit="return confirm('Supprimer ce médecin ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-[13px] font-medium text-urgent hover:opacity-70 transition-opacity">Supprimer</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @if ($medecins->isEmpty())
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-sm text-muted">
                                    Aucun médecin ne correspond aux critères.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>