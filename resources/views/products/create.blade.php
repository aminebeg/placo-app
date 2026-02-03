<x-app-layout>
    <x-slot name="header">
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">Technical Catalog</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2">Initialize New Asset</h1>
        <p class="text-portal-muted text-lg">Define the specifications for a new catalog entry.</p>
    </x-slot>

    <div class="bg-portal-sidebar border border-portal-border rounded-xl p-8 max-w-4xl">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Basic Information -->
            <div class="space-y-6">
                <h3 class="font-display font-bold text-lg border-b border-portal-border pb-2 mb-4">Core Specifications</h3>
                
                <div class="mb-6">
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">Product Image</label>
                    <input type="file" name="image" class="w-full bg-white/5 border border-portal-border rounded-lg p-2 text-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-portal-accent file:text-black hover:file:bg-white transition-colors">
                </div>
                
                <div class="grid grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">Name (EN)</label>
                        <input type="text" name="name_en" required class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-2.5 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted text-sm font-medium">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">Name (FR)</label>
                        <input type="text" name="name_fr" required class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-2.5 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted text-sm font-medium">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">Name (AR)</label>
                        <input type="text" name="name_ar" dir="rtl" required class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-2.5 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted text-sm font-medium">
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-2 space-y-2">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">Category</label>
                        <select name="category_id" class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-2.5 text-white focus:border-portal-accent focus:ring-0 text-sm font-medium">
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" class="bg-portal-sidebar">{{ $category->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">Unit Price (DA)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-portal-muted font-mono">DA</span>
                            <input type="number" step="0.01" name="price" required class="w-full bg-white/5 border border-portal-border rounded-lg pl-8 pr-4 py-2.5 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted text-sm font-mono font-bold">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical Details -->
            <div class="space-y-6">
                <h3 class="font-display font-bold text-lg border-b border-portal-border pb-2 mb-4">Technical Data</h3>
                
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">Description (EN)</label>
                        <textarea name="description_en" rows="3" class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-2.5 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted text-sm"></textarea>
                    </div>
                </div>
                               <div class="space-y-2">
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">Inventory Status</label>
                    <div class="flex items-center gap-6 bg-white/5 border border-portal-border rounded-xl p-4 w-fit">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="in_stock" value="1" checked class="text-portal-accent focus:ring-portal-accent bg-transparent border-portal-border">
                            <span class="text-sm font-medium">In Stock</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="in_stock" value="0" class="text-portal-accent focus:ring-portal-accent bg-transparent border-portal-border">
                            <span class="text-sm font-medium text-portal-muted">Lead Time Required</span>
                        </label>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">Technical Sheet URL (PDF)</label>
                    <div class="relative">
                        <x-lucide-link class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-portal-muted" />
                        <input type="url" name="technical_sheet_url" placeholder="https://factory.com/specs/product.pdf" class="w-full bg-white/5 border border-portal-border rounded-xl pl-12 pr-4 py-2.5 text-white focus:border-portal-accent focus:ring-0 text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">Unit Weight (kg)</label>
                        <input type="number" step="0.001" name="weight_kg" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-2.5 text-white focus:border-portal-accent focus:ring-0 text-sm font-mono">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider">Pieces per Bundle</label>
                        <input type="number" name="pieces_per_bundle" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-2.5 text-white focus:border-portal-accent focus:ring-0 text-sm font-mono">
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="flex items-center justify-end gap-4 pt-6 border-t border-portal-border">
                <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 rounded-xl font-bold text-sm text-portal-muted hover:text-white hover:bg-white/5 transition-colors">Discard</a>
                <button type="submit" class="bg-portal-accent text-black px-6 py-3 rounded-xl font-bold text-sm hover:bg-white transition-colors flex items-center gap-2">
                    <x-lucide-save class="w-4 h-4" /> Save Asset
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
