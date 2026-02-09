<x-app-layout>
    <x-slot name="header">
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">{{ __('Mon Profil') }}</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2">{{ __('Mettre a jour mes informations') }}</h1>
        <p class="text-portal-muted text-lg">{{ __('Votre numero de telephone est obligatoire pour que nous puissions vous appeler.') }}</p>
    </x-slot>

    <div class="max-w-4xl">
        <div class="bg-portal-sidebar border border-portal-border rounded-xl p-8">
            <form action="{{ route('profile.update') }}" method="POST" class="space-y-8">
                @csrf
                @method('PATCH')

                <div class="space-y-6">
                    <!-- Informations Personnelles -->
                    <div>
                        <h3 class="font-display font-bold text-lg border-b border-portal-border pb-2 mb-6 flex items-center gap-2">
                             <x-lucide-user class="w-5 h-5 text-portal-accent" />
                            {{ __('Informations Personnelles') }}
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Prénom') }}</label>
                                <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" required class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                                @error('first_name')<p class="text-red-400 text-xs mt-2">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Nom') }}</label>
                                <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" required class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                                @error('last_name')<p class="text-red-400 text-xs mt-2">{{ $message }}</p>@enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Email') }}</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                                @error('email')<p class="text-red-400 text-xs mt-2">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-display font-bold text-lg border-b border-portal-border pb-2 mb-6 flex items-center gap-2 mt-6">
                            <x-lucide-building class="w-5 h-5 text-portal-accent" />
                            {{ __('Informations Professionnelles') }}
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Entreprise') }}</label>
                                <input type="text" name="company" value="{{ old('company', $user->company) }}" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                                @error('company')<p class="text-red-400 text-xs mt-2">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Téléphone') }}</label>
                                <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" required class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                                @error('phone')<p class="text-red-400 text-xs mt-2">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-display font-bold text-lg border-b border-portal-border pb-2 mb-6 flex items-center gap-2 mt-6">
                            <x-lucide-lock class="w-5 h-5 text-portal-accent" />
                            {{ __('Sécurité') }}
                            <span class="text-xs font-normal text-portal-muted normal-case ml-2">({{ __('Laisser vide pour ne pas changer') }})</span>
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Nouveau mot de passe') }}</label>
                                <input type="password" name="password" autocomplete="new-password" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                                @error('password')<p class="text-red-400 text-xs mt-2">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Confirmer le mot de passe') }}</label>
                                <input type="password" name="password_confirmation" autocomplete="new-password" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-end gap-4 pt-6 border-t border-portal-border">
                    @if($user->phone)
                        <a href="tel:{{ preg_replace('/\s+/', '', $user->phone) }}" class="bg-white/5 border border-portal-border text-white px-6 py-3 rounded-xl font-bold hover:bg-white/10 transition-colors text-sm">
                            {{ __('Appeler ce numéro') }}
                        </a>
                    @endif
                    <button type="submit" class="bg-portal-accent text-black font-black uppercase tracking-widest px-6 py-3 rounded-xl hover:bg-white transition-all text-sm shadow-[0_0_20px_rgba(21,128,61,0.4)] flex items-center gap-2">
                        <x-lucide-save class="w-4 h-4" />
                        {{ __('Enregistrer les modifications') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
