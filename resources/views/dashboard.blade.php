<x-app-layout>
    <x-slot name="header">
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">{{ __('Operational Overview') }}</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2">{{ __('Welcome back, :name', ['name' => auth()->user()->first_name]) }}</h1>
        <p class="text-portal-muted text-lg">{{ __("Here's what's happening today.") }}</p>
    </x-slot>

    <div class="flex flex-col xl:grid xl:grid-cols-3 gap-8">
        <!-- Main Activity -->
        <div class="xl:col-span-2 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                 <div class="portal-card relative overflow-hidden group hover:border-portal-accent/50">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity transform group-hover:scale-110 duration-500">
                        <x-lucide-file-text class="w-16 h-16 text-portal-accent" />
                    </div>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 rounded-lg bg-portal-accent/10 text-portal-accent">
                            <x-lucide-file-text class="w-6 h-6" />
                        </div>
                    </div>
                    <div>
                        <div class="text-[0.6rem] font-extrabold text-portal-muted uppercase tracking-[0.2em] mb-1">{{ __('Active Orders') }}</div>
                        <div class="text-3xl font-display font-bold text-white tracking-tight flex items-baseline gap-2">
                             3 <span class="text-xs font-bold text-portal-muted uppercase">{{ __('Orders') }}</span>
                        </div>
                        <div class="mt-4 flex items-center gap-2">
                            <div class="flex-1 h-1.5 bg-white/5 rounded-full overflow-hidden">
                                <div class="h-full bg-portal-accent w-2/3 rounded-full shadow-[0_0_10px_rgba(197,160,89,0.5)]"></div>
                            </div>
                            <span class="text-[0.65rem] font-bold text-portal-accent">66%</span>
                        </div>
                    </div>
                </div>

                <div class="portal-card relative overflow-hidden group hover:border-portal-accent/50">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity transform group-hover:scale-110 duration-500">
                        <x-lucide-shopping-cart class="w-16 h-16 text-portal-accent" />
                    </div>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 rounded-lg bg-blue-500/10 text-blue-500">
                            <x-lucide-shopping-cart class="w-6 h-6" />
                        </div>
                    </div>
                    <div>
                        <div class="text-[0.6rem] font-extrabold text-portal-muted uppercase tracking-[0.2em] mb-1">{{ __('Requisition List') }}</div>
                        <div class="text-3xl font-display font-bold text-white tracking-tight flex items-baseline gap-2">
                            12 <span class="text-xs font-bold text-portal-muted uppercase">{{ __('Items') }}</span>
                        </div>
                        <div class="text-[0.65rem] font-bold text-blue-500 mt-2 flex items-center gap-1.5">
                            <x-lucide-zap class="w-3 h-3" /> {{ __('Ready for PO generation') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="portal-card !p-0 overflow-hidden">
                <div class="p-6 border-b border-portal-border flex items-center justify-between bg-white/5">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-portal-accent animate-pulse"></div>
                        <h2 class="font-display font-bold text-base">{{ __('Procurement Activity') }}</h2>
                    </div>
                    <select class="bg-transparent border-none text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider focus:ring-0 cursor-pointer">
                        <option>Last 7 Days</option>
                        <option>Last 30 Days</option>
                    </select>
                </div>
                <div class="p-8">
                    <div class="flex items-end justify-between h-48 gap-2">
                        @php $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']; @endphp
                        @foreach($days as $day)
                            <div class="flex-1 flex flex-col items-center gap-3 group">
                                <div class="w-full relative flex flex-col justify-end h-32">
                                    <div class="absolute inset-0 bg-portal-accent/5 rounded-t-lg scale-x-75 opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                                    <div class="bg-gradient-to-t from-portal-accent to-portal-accent/60 w-full rounded-t-lg transition-all duration-500 group-hover:shadow-[0_0_15px_rgba(197,160,89,0.3)] shadow-inner" style="height: {{ rand(20, 100) }}%"></div>
                                </div>
                                <span class="text-[0.6rem] font-extrabold text-portal-muted uppercase tracking-wider group-hover:text-white transition-colors">{{ $day }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Side Panel -->
        <div class="space-y-6">
            <div class="portal-card">
                 <h3 class="text-[0.65rem] font-extrabold text-portal-muted uppercase tracking-[0.2em] mb-6">{{ __('Quick Links') }}</h3>
                 <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-1 gap-3">
                    <a href="{{ route('products.index') }}" class="flex items-center justify-between p-4 rounded-xl bg-white/5 border border-white/5 hover:border-portal-accent/30 hover:bg-portal-accent/5 transition-all group">
                        <div class="flex items-center gap-3 text-sm font-bold">
                            <x-lucide-package-plus class="w-4 h-4 text-portal-accent" /> {{ __('Browse Catalog') }}
                        </div>
                        <x-lucide-arrow-right class="w-4 h-4 text-portal-muted group-hover:text-portal-accent transition-all rtl:rotate-180" />
                    </a>
                    <a href="{{ route('orders.index') }}" class="flex items-center justify-between p-4 rounded-xl bg-white/5 border border-white/5 hover:border-portal-accent/30 hover:bg-portal-accent/5 transition-all group">
                        <div class="flex items-center gap-3 text-sm font-bold">
                            <x-lucide-history class="w-4 h-4 text-portal-accent" /> {{ __('Order History') }}
                        </div>
                        <x-lucide-arrow-right class="w-4 h-4 text-portal-muted group-hover:text-portal-accent transition-all rtl:rotate-180" />
                    </a>
                 </div>
            </div>

            <div class="portal-card glass-panel relative overflow-hidden">
                <div class="absolute -bottom-8 -right-8 w-24 h-24 bg-portal-accent/10 rounded-full blur-2xl"></div>
                <h3 class="text-[0.65rem] font-extrabold text-portal-muted uppercase tracking-[0.2em] mb-4">{{ __('Support Center') }}</h3>
                <p class="text-xs text-portal-muted mb-6 leading-relaxed">
                    {{ __('Need technical assistance or have questions about logistics?') }}
                </p>
                <button class="w-full py-3 bg-white/5 border border-white/10 rounded-xl text-xs font-bold hover:bg-white/10 transition-all flex items-center justify-center gap-2">
                    <x-lucide-message-square class="w-4 h-4" /> {{ __('Contact Specialist') }}
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
