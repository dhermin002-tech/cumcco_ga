<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouter un médecin
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('admin.medecins.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom') }}"
                               class="w-full border border-gray-300 rounded-md px-3 py-2">
                        @error('nom') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Spécialité</label>
                        <input type="text" name="specialite" value="{{ old('specialite') }}"
                               class="w-full border border-gray-300 rounded-md px-3 py-2">
                        @error('specialite') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jours / Horaires (facultatif)</label>
                        <textarea name="jours_horaires" rows="3"
                                  class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('jours_horaires') }}</textarea>
                        @error('jours_horaires') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-3 mt-6">
                        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md">
                            Ajouter
                        </button>
                        <a href="{{ route('admin.medecins.index') }}" class="text-gray-600">Annuler</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>