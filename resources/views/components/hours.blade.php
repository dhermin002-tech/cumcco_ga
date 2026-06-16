{{-- HORAIRES & TARIFICATION --}}
<section id="horaires" class="py-16 lg:py-24 bg-white scroll-mt-[88px]">
    <div class="mx-auto max-w-[1440px] px-7 lg:px-14">

        
        <div class="max-w-[600px] mx-auto text-center mb-12">
            <p class="text-xs font-semibold tracking-[1.4px] uppercase text-primary-600 mb-3.5">Horaires &amp; Tarification</p>
            <h2 class="font-serif font-medium text-[32px] lg:text-[40px] leading-[1.14] tracking-tight text-navy mb-4">
                Des équipes à votre service, jour et nuit
            </h2>
            <p class="text-base leading-relaxed text-ink-soft">
                Le CUMC-CO reste ouvert toute l'année. Les consultations de nuit, le dimanche
                et les jours fériés relèvent du service de garde, à tarification majorée.
            </p>
        </div>

        
        <div class="grid lg:grid-cols-2 gap-6">

            {{-- ─── Carte JOUR (blanche) ─── --}}
            <div class="rounded-[14px] p-8 border border-[#E8E6E0] bg-white shadow-[0_1px_2px_rgba(14,27,44,.06)]">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-11 h-11 rounded-[10px] flex items-center justify-center text-xl shrink-0 bg-primary-50 text-primary-600">☀</div>
                    <div>
                        <div class="font-serif font-medium text-[22px] leading-tight text-navy">Horaires de jour</div>
                        <span class="inline-block mt-1 text-[11px] font-semibold tracking-wide uppercase px-2.5 py-[3px] rounded-full bg-primary-50 text-primary-700">Tarif normal</span>
                    </div>
                </div>
                <div class="flex justify-between items-center py-[11px] text-[14.5px] border-b border-[#EDEBE4]">
                    <span class="opacity-85">Lundi – Vendredi</span><span class="font-semibold">07h00 – 19h00</span>
                </div>
                <div class="flex justify-between items-center py-[11px] text-[14.5px] border-b border-[#EDEBE4]">
                    <span class="opacity-85">Samedi</span><span class="font-semibold">08h00 – 17h00</span>
                </div>
                <div class="flex justify-between items-center py-[11px] text-[14.5px] border-b border-[#EDEBE4]">
                    <span class="opacity-85">Dimanche</span><span class="text-urgent font-semibold">Service de garde</span>
                </div>
                <div class="flex justify-between items-center py-[11px] text-[14.5px]">
                    <span class="opacity-85">Consultations sur RDV</span><span class="font-semibold">07h30 – 18h00</span>
                </div>
            </div>

            {{-- ─── Carte GARDE (foncée) ─── --}}
            <div class="rounded-[14px] p-8 border border-navy bg-navy text-white">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-11 h-11 rounded-[10px] flex items-center justify-center text-xl shrink-0 bg-white/10 text-primary-300">☾</div>
                    <div>
                        <div class="font-serif font-medium text-[22px] leading-tight text-white">Service de garde</div>
                        <span class="inline-block mt-1 text-[11px] font-semibold tracking-wide uppercase px-2.5 py-[3px] rounded-full bg-[#E8A33C] text-[#4A2E00]">Tarif majoré</span>
                    </div>
                </div>
                <div class="flex justify-between items-center py-[11px] text-[14.5px] border-b border-white/10">
                    <span class="opacity-85">Nuit (Lun – Sam)</span><span class="font-semibold text-primary-300">19h00 – 07h00</span>
                </div>
                <div class="flex justify-between items-center py-[11px] text-[14.5px] border-b border-white/10">
                    <span class="opacity-85">Dimanche</span><span class="font-semibold text-primary-300">24h / 24</span>
                </div>
                <div class="flex justify-between items-center py-[11px] text-[14.5px] border-b border-white/10">
                    <span class="opacity-85">Jours fériés</span><span class="font-semibold text-primary-300">24h / 24</span>
                </div>
                <div class="flex justify-between items-center py-[11px] text-[14.5px]">
                    <span class="opacity-85">Urgences</span><span class="font-semibold text-primary-300">7j/7 · 24h/24</span>
                </div>
            </div>
        </div>

        {{-- Note d'info en bas --}}
        <div class="mt-6 rounded-[10px] bg-primary-50 border border-primary-100 px-[22px] py-[18px] flex gap-3.5 items-start text-sm text-ink-soft leading-relaxed">
            <span class="w-7 h-7 rounded-[6px] shrink-0 bg-primary text-white flex items-center justify-center text-[15px] font-bold">i</span>
            <div>
                <strong class="text-navy">Tarification de garde.</strong> Les consultations effectuées de nuit (19h–07h),
                le dimanche et les jours fériés sont facturées au tarif de garde. Les jours fériés nationaux sont
                intégralement comptés comme des périodes de garde. Le détail des tarifs est affiché à l'accueil
                et communiqué lors de la prise de rendez-vous.
            </div>
        </div>
        
    </div>
</section>