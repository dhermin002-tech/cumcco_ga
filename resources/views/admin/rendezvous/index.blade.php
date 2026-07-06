<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif font-medium text-2xl text-navy leading-tight">
            Demandes de rendez-vous
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

            <div class="mb-5">
                <p class="text-sm text-muted">{{ $rendezvous->count() }} demande(s) de rendez-vous</p>
            </div>

            <div class="bg-white rounded-[14px] shadow-[0_4px_16px_rgba(14,27,44,.06)] overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-paper border-b border-[#E8E6E0]">
                            <th class="px-5 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Patient</th>
                            <th class="px-5 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Contact</th>
                            <th class="px-5 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Type</th>
                            <th class="px-5 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Médecin / Spécialité</th>
                            <th class="px-5 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Date</th>
                            <th class="px-5 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Créneau</th>
                            <th class="px-5 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Statut</th>
                            <th class="px-5 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $typeLabels = ['consultation' => 'Consultation', 'urgence' => 'Urgence', 'tele' => 'Téléassistance'];
                            $statutLabels = ['en_attente' => 'En attente', 'accepte' => 'Accepté', 'refuse' => 'Refusé', 'annule' => 'Annulé'];
                            $statutClasses = [
                                'en_attente' => 'bg-amber-50 text-amber-700',
                                'accepte'    => 'bg-primary-50 text-primary-700',
                                'refuse'     => 'bg-red-50 text-urgent',
                                'annule'     => 'bg-gray-100 text-gray-500',
                            ];
                        @endphp
                        @foreach ($rendezvous as $rdv)
                            <tr class="border-b border-[#F0EFEB] hover:bg-paper/60 transition-colors align-top">
                                <td class="px-5 py-4 text-[14px] font-medium text-navy whitespace-nowrap">
                                    {{ $rdv->prenom }} {{ $rdv->nom }}
                                </td>
                                <td class="px-5 py-4 text-[13px] text-ink-soft">
                                    <div>{{ $rdv->telephone }}</div>
                                    <div class="text-muted">{{ $rdv->email }}</div>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex px-2.5 py-1 rounded-full text-[12px] font-semibold
                                        @if ($rdv->type === 'urgence') bg-red-50 text-urgent @else bg-navy-50 text-navy-700 @endif">
                                        {{ $typeLabels[$rdv->type] ?? $rdv->type }}
                                    </span>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="text-[14px] font-medium text-navy">{{ $rdv->medecin }}</div>
                                    <div class="text-[12.5px] text-muted">{{ $rdv->specialite }}</div>
                                </td>
                                <td class="px-5 py-4 text-[13.5px] text-navy whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($rdv->date)->format('d/m/Y') }}
                                </td>
                                <td class="px-5 py-4 text-[13.5px] text-ink-soft whitespace-nowrap">{{ $rdv->creneau }}</td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[12px] font-semibold {{ $statutClasses[$rdv->statut] ?? 'bg-gray-100 text-gray-500' }}">
                                        {{ $statutLabels[$rdv->statut] ?? $rdv->statut }}
                                    </span>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center justify-end gap-3 whitespace-nowrap">
                                        @if ($rdv->statut !== 'accepte')
                                            <form method="POST" action="{{ route('admin.rendezvous.statut', $rdv->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="statut" value="accepte">
                                                <button type="submit" class="text-[13px] font-medium text-primary-600 hover:text-primary-700 transition-colors">Accepter</button>
                                            </form>
                                        @endif

                                        @if ($rdv->statut !== 'refuse')
                                            <form method="POST" action="{{ route('admin.rendezvous.statut', $rdv->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="statut" value="refuse">
                                                <button type="submit" class="text-[13px] font-medium text-urgent hover:opacity-70 transition-opacity">Refuser</button>
                                            </form>
                                        @endif

                                        @if ($rdv->statut !== 'annule')
                                            <form method="POST" action="{{ route('admin.rendezvous.statut', $rdv->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="statut" value="annule">
                                                <button type="submit" class="text-[13px] font-medium text-muted hover:text-navy transition-colors">Annuler</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @if ($rendezvous->isEmpty())
                            <tr>
                                <td colspan="8" class="px-5 py-10 text-center text-sm text-muted">
                                    Aucune demande de rendez-vous pour l'instant.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-5">
                {{ $rendezvous->links() }}
            </div>

        </div>
    </div>
</x-app-layout>