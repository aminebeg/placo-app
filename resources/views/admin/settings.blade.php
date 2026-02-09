<x-app-layout>
    <x-slot name="header">
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">{{ __('Administration') }}</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2 uppercase italic">{{ __('Paramètres Généraux') }}</h1>
        <p class="text-portal-muted text-lg">{{ __('Configuration de l\'application et de l\'entreprise.') }}</p>
    </x-slot>

    <!-- Content -->
    <div class="max-w-4xl">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            
            <!-- Company Info Section -->
            <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                <h3 class="font-display font-bold text-lg mb-6 flex items-center gap-2">
                    <x-lucide-building class="w-5 h-5 text-portal-accent" />
                    {{ __('Information Entreprise') }}
                </h3>
                
                <div class="space-y-6">
                    <!-- Company Name -->
                    <div>
                        <label class="block text-sm font-bold text-portal-muted mb-2 uppercase tracking-wide">{{ __('Nom de l\'entreprise') }}</label>
                        <input type="text" name="company_name" value="{{ $settings['company_name'] ?? '' }}" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-bold text-portal-muted mb-2 uppercase tracking-wide">{{ __('Slogan / Description') }}</label>
                        <input type="text" name="company_description" value="{{ $settings['company_description'] ?? '' }}" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="block text-sm font-bold text-portal-muted mb-2 uppercase tracking-wide">{{ __('Adresse Physique') }}</label>
                        <textarea name="company_address" rows="3" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">{{ $settings['company_address'] ?? '' }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-bold text-portal-muted mb-2 uppercase tracking-wide">{{ __('Téléphone') }}</label>
                            <input type="text" name="company_phone" value="{{ $settings['company_phone'] ?? '' }}" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-bold text-portal-muted mb-2 uppercase tracking-wide">{{ __('Email Contact') }}</label>
                            <input type="email" name="company_email" value="{{ $settings['company_email'] ?? '' }}" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Branding Section -->
            <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                <h3 class="font-display font-bold text-lg mb-6 flex items-center gap-2">
                    <x-lucide-image class="w-5 h-5 text-portal-accent" />
                    {{ __('Identité Visuelle') }}
                </h3>

                <div class="flex items-start gap-8">
                     @if(isset($settings['company_logo']) && $settings['company_logo'])
                        <div class="bg-white p-4 rounded-xl">
                            <img src="{{ Storage::url($settings['company_logo']) }}" alt="Logo" class="max-h-32 object-contain">
                        </div>
                    @endif
                    
                    <div class="flex-1">
                        <label class="block text-sm font-bold text-portal-muted mb-2 uppercase tracking-wide">{{ __('Logo Officiel') }}</label>
                        <input type="file" name="company_logo" accept="image/*" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-bold file:bg-portal-accent file:text-black hover:file:bg-white transition-all">
                        <p class="mt-2 text-xs text-portal-muted">{{ __('Format recommandé: PNG ou SVG avec fond transparent.') }}</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-portal-accent text-black font-black uppercase tracking-widest px-8 py-4 rounded-xl hover:bg-white transition-all shadow-[0_0_20px_rgba(21,128,61,0.4)] flex items-center gap-2">
                    <x-lucide-save class="w-5 h-5" />
                    {{ __('Enregistrer les modifications') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
