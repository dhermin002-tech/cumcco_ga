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
                            <th class="px-5 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Spécialité</th>
                            <th class="px-5 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Médecin</th>
                            <th class="px-5 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Date</th>
                            <th class="px-5 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Créneau</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    @php
                                        $typeLabels = ['consultation' => 'Consultation', 'urgence' => 'Urgence', 'tele' => 'Téléassistance'];
                                    @endphp
                                    <span class="inline-flex px-2.5 py-1 rounded-full text-[12px] font-semibold
                                        @if ($rdv->type === 'urgence') bg-red-50 text-urgent @else bg-navy-50 text-navy-700 @endif">
                                        {{ $typeLabels[$rdv->type] ?? $rdv->type }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-[13.5px] text-ink-soft">{{ $rdv->specialite }}</td>
                                <td class="px-5 py-4 text-[13.5px] text-ink-soft">{{ $rdv->medecin }}</td>
                                <td class="px-5 py-4 text-[13.5px] text-navy whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($rdv->date)->format('d/m/Y') }}
                                </td>
                                <td class="px-5 py-4 text-[13.5px] text-ink-soft whitespace-nowrap">{{ $rdv->creneau }}</td>
                            </tr>
                        @endforeach

                        @if ($rendezvous->isEmpty())
                            <tr>
                                <td colspan="7" class="px-5 py-10 text-center text-sm text-muted">
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