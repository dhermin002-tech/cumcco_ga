<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des médecins
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 rounded-md bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4">
                    <a href="{{ route('admin.medecins.create') }}"
                       class="bg-gray-800 text-white px-4 py-2 rounded-md text-sm">+ Ajouter un médecin</a>
                </div>

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
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('admin.medecins.edit', $medecin) }}"
                                           class="text-sm text-gray-700 hover:underline">Modifier</a>

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

                                        @if (auth()->user()->role === 'admin')
                                            <form method="POST" action="{{ route('admin.medecins.destroy', $medecin) }}"
                                                  onsubmit="return confirm('Supprimer ce médecin ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm text-red-600 hover:underline">Supprimer</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>