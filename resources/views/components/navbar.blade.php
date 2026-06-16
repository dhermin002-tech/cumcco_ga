{{-- NAVIGATION  --}}
<nav class="bg-white border-b border-[#E8E6E0] sticky top-0 z-50">
    <div class="mx-auto max-w-[1440px] px-7 lg:px-14 h-20 flex items-center">

        <a href="{{ url('/') }}" class="flex items-center gap-3 shrink-0">
            <img src="{{ asset('images/logo-cumc.jpg') }}" alt="Logo CUMC-CO" class="w-[54px] h-[54px] object-contain">
            <span class="flex flex-col leading-tight">
                <span class="font-serif font-semibold text-xl text-navy tracking-tight">CUMC-CO</span>
                <span class="font-medium text-[9.5px] tracking-wide text-muted uppercase mt-0.5">Centre Médico-Chirurgical</span>
            </span>
        </a>

        <div class="hidden lg:flex gap-[22px] mx-auto px-8">
            <a href="{{ url('/') }}#about" class="text-sm text-ink-soft hover:text-primary-600 transition-colors">La Clinique</a>
            <a href="{{ url('/') }}#specialites" class="text-sm text-ink-soft hover:text-primary-600 transition-colors">Nos Spécialités</a>
            <a href="{{ url('/') }}#horaires" class="text-sm text-ink-soft hover:text-primary-600 transition-colors">Horaires &amp; Services</a>
            <a href="{{ route('infos') }}" class="text-sm text-ink-soft hover:text-primary-600 transition-colors">Informations Patients</a>
            <a href="{{ route('actualites') }}" class="text-sm text-ink-soft hover:text-primary-600 transition-colors">Actualités</a>
            <a href="#contact" class="text-sm text-ink-soft hover:text-primary-600 transition-colors">Contact</a>
        </div>

        <a href="{{ url('/') }}#prendre-rdv" class="btn btn-primary btn-nav ml-auto lg:ml-0">Prendre rendez-vous</a>
    </div>
</nav>