<x-app-layout>
    <x-slot name="header">
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">Technical Catalog</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2">Initialize New Asset</h1>
        <p class="text-portal-muted text-lg">Define the specifications for a new catalog entry.</p>
    </x-slot>

    <div class="max-w-4xl">
        <div class="bg-portal-sidebar border border-portal-border rounded-xl p-8">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Basic Information -->
                <div class="space-y-6">
                    <h3 class="font-display font-bold text-lg border-b border-portal-border pb-2 mb-6 flex items-center gap-2">
                        <x-lucide-box class="w-5 h-5 text-portal-accent" />
                        {{ __('Core Specifications') }}
                    </h3>
                    
                    <div class="mb-6">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Product Image') }}</label>
                        <input type="file" name="image" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-portal-accent file:text-black hover:file:bg-white transition-all">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">{{ __('Name (EN)') }}</label>
                            <input type="text" name="name_en" required class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm font-medium">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">{{ __('Name (FR)') }}</label>
                            <input type="text" name="name_fr" required class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm font-medium">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">{{ __('Name (AR)') }}</label>
                            <input type="text" name="name_ar" dir="rtl" required class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm font-medium">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2 space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">{{ __('Category') }}</label>
                            <select name="category_id" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all text-sm font-medium cursor-pointer">
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}" class="bg-portal-sidebar">{{ $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">{{ __('Unit Price (DA)') }}</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-portal-muted font-mono text-sm">DA</span>
                                <input type="number" step="0.01" name="price" required class="w-full bg-white/5 border border-portal-border rounded-xl pl-10 pr-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm font-mono font-bold">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">{{ __('Status') }}</label>
                        <select name="status" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all text-sm font-medium cursor-pointer">
                            <option value="active" class="bg-portal-sidebar">{{ __('Actif - Visible pour les clients') }}</option>
                            <option value="draft" class="bg-portal-sidebar">{{ __('Brouillon - En cours de préparation') }}</option>
                            <option value="archived" class="bg-portal-sidebar">{{ __('Archivé - Masqué du catalogue') }}</option>
                        </select>
                    </div>
                </div>

                <!-- Technical Details -->
                <div class="space-y-6">
                    <h3 class="font-display font-bold text-lg border-b border-portal-border pb-2 mb-6 flex items-center gap-2">
                        <x-lucide-file-text class="w-5 h-5 text-portal-accent" />
                        {{ __('Technical Data') }}
                    </h3>
                    
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">{{ __('Description (EN)') }}</label>
                            <textarea name="description_en" rows="4" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm">{{ old('description_en') }}</textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">{{ __('Description (FR)') }}</label>
                            <textarea name="description_fr" rows="4" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm">{{ old('description_fr') }}</textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">{{ __('Description (AR)') }}</label>
                            <textarea name="description_ar" rows="4" dir="rtl" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm">{{ old('description_ar') }}</textarea>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-1">
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">{{ __('Unit Weight (kg)') }}</label>
                            <input type="number" step="0.001" name="weight_kg" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all text-sm font-mono">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">{{ __('Pieces per Bundle') }}</label>
                            <input type="number" name="pieces_per_bundle" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all text-sm font-mono">
                        </div>
                    </div>
                </div>

                <!-- Action Bar -->
                <div class="flex items-center justify-end gap-4 pt-6 border-t border-portal-border">
                    <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 rounded-xl font-bold text-sm text-portal-muted hover:text-white hover:bg-white/5 transition-colors">{{ __('Discard') }}</a>
                    <button type="submit" class="bg-portal-accent text-black px-6 py-3 rounded-xl font-bold text-sm hover:bg-white transition-colors flex items-center gap-2 shadow-[0_0_20px_rgba(21,128,61,0.4)]">
                        <x-lucide-save class="w-4 h-4" /> {{ __('Save Asset') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
