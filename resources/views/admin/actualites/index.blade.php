<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif font-medium text-2xl text-navy leading-tight">
            Gestion des actualités
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
                <p class="text-sm text-muted">{{ $actualites->count() }} actualité(s)</p>
                <a href="{{ route('admin.actualites.create') }}"
                   class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2.5 rounded-[10px] text-sm font-semibold hover:bg-primary-600 transition-colors">
                    + Nouvelle actualité
                </a>
            </div>

            <div class="bg-white rounded-[14px] shadow-[0_4px_16px_rgba(14,27,44,.06)] overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-paper border-b border-[#E8E6E0]">
                            <th class="px-6 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Titre</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Catégorie</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted">Date</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold tracking-[0.8px] uppercase text-muted text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actualites as $actualite)
                            <tr class="border-b border-[#F0EFEB] hover:bg-paper/60 transition-colors">
                                <td class="px-6 py-4 text-[14.5px] font-medium text-navy">{{ $actualite->titre }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-2.5 py-1 rounded-full bg-navy-50 text-navy-700 text-[12px] font-semibold">
                                        {{ $actualite->categorie }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-[13.5px] text-ink-soft whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($actualite->date_publication)->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-4">
                                        <a href="{{ route('admin.actualites.edit', $actualite) }}"
                                           class="text-[13px] font-medium text-navy hover:text-primary-700 transition-colors">Modifier</a>

                                        <form method="POST" action="{{ route('admin.actualites.destroy', $actualite) }}"
                                              onsubmit="return confirm('Supprimer cette actualité ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-[13px] font-medium text-urgent hover:opacity-70 transition-opacity">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @if ($actualites->isEmpty())
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-sm text-muted">
                                    Aucune actualité publiée pour l'instant.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>