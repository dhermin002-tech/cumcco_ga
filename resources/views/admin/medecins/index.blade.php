<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des médecins
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Nom</th>
                            <th class="py-2">Spécialité</th>
                            <th class="py-2">Statut</th>
                            <th class="py-2">Jours / Horaires</th>
                            <th class="py-2">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medecins as $medecin)
                            <tr class="border-b">
                                <td class="py-2">{{ $medecin->nom }}</td>
                                <td class="py-2">{{ $medecin->specialite }}</td>
                                <td class="py-2">
                                    @if ($medecin->actif)
                                        Actif
                                    @else
                                        Suspendu
                                    @endif
                                </td>
                                <td class="py-2">{{ $medecin->jours_horaires }}</td>
                                <td class="py-2">
    <form method="POST" action="{{ route('admin.medecins.toggle', $medecin) }}">
        @csrf
        @method('PATCH')
        <button type="submit" class="text-sm text-blue-600 hover:underline">
            @if ($medecin->actif)
                Suspendre
            @else
                Réactiver
            @endif
        </button>
    </form>
</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>