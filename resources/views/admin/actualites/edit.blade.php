<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif font-medium text-2xl text-navy leading-tight">
            Modifier l'actualité
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-[14px] shadow-[0_4px_16px_rgba(14,27,44,.06)] p-8">

                <form method="POST" action="{{ route('admin.actualites.update', $actualite) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-5">
                        <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Titre</label>
                        <input type="text" name="titre" value="{{ old('titre', $actualite->titre) }}"
                               class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[11px] text-[14.5px] text-navy hover:border-primary focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors">
                        @error('titre') <p class="text-xs text-urgent mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid sm:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Catégorie</label>
                            <input type="text" name="categorie" value="{{ old('categorie', $actualite->categorie) }}"
                                   class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[11px] text-[14.5px] text-navy hover:border-primary focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors">
                            @error('categorie') <p class="text-xs text-urgent mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Date de publication</label>
                            <input type="date" name="date_publication" value="{{ old('date_publication', \Carbon\Carbon::parse($actualite->date_publication)->format('Y-m-d')) }}"
                                   class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[11px] text-[14.5px] text-navy hover:border-primary focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors">
                            @error('date_publication') <p class="text-xs text-urgent mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Image <span class="text-muted font-normal">(facultatif, JPG/PNG)</span></label>

                        @if ($actualite->image)
                        <div class="mb-2">
                            <img src="{{ \Illuminate\Support\Str::startsWith($actualite->image, 'http') ? $actualite->image : asset('storage/' . $actualite->image) }}"
                             alt="Image actuelle" class="h-24 rounded-[8px] object-cover">
                            <p class="text-[11px] text-muted mt-1">Image actuelle — choisissez un fichier pour la remplacer</p>
                        </div>
                        @endif

                         <input type="file" name="image" accept="image/*"
                            class="w-full text-[14px] text-ink-soft file:mr-3 file:py-2 file:px-4 file:rounded-[8px] file:border-0 file:bg-primary file:text-white file:text-sm file:font-semibold file:cursor-pointer hover:file:bg-primary-600">
                            @error('image') <p class="text-xs text-urgent mt-1.5">{{ $message }}</p> @enderror
                        </div>

                    <div class="mb-5">
                        <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Extrait</label>
                        <textarea name="extrait" rows="2"
                                  class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[11px] text-[14.5px] text-navy hover:border-primary focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors resize-y">{{ old('extrait', $actualite->extrait) }}</textarea>
                        @error('extrait') <p class="text-xs text-urgent mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-[13px] font-medium text-ink-soft mb-[7px]">Contenu</label>
                        <textarea name="contenu" rows="8"
                                  class="w-full bg-paper border border-[#D8D6CF] rounded-[10px] px-4 py-[11px] text-[14.5px] text-navy hover:border-primary focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors resize-y">{{ old('contenu', $actualite->contenu) }}</textarea>
                        @error('contenu') <p class="text-xs text-urgent mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-4 pt-2">
                        <button type="submit"
                                class="bg-primary text-white px-5 py-2.5 rounded-[10px] text-sm font-semibold hover:bg-primary-600 transition-colors">
                            Enregistrer les modifications
                        </button>
                        <a href="{{ route('admin.actualites.index') }}" class="text-sm text-muted hover:text-navy transition-colors">Annuler</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>