<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - MyFix Portal</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Unbounded:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-portal-bg text-portal-text min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-10">
            <div class="flex flex-col items-center justify-center gap-2 font-display font-bold text-2x tracking-tight mb-2 uppercase group">
                <div class="w-12 h-12 bg-portal-accent rounded-xl flex items-center justify-center text-black shadow-lg shadow-portal-accent/20 mb-2 transition-transform group-hover:scale-110">
                    <x-lucide-building-2 class="w-7 h-7" />
                </div>
                <div class="flex flex-col leading-[0.9]">
                    <span class="text-white text-2xl font-black tracking-tighter">{{ __('GLOBAL') }}</span>
                    <span class="text-portal-accent text-sm font-bold tracking-[0.3em] ms-0.5">{{ __('ACCESSOIRES') }}</span>
                </div>
            </div>
            <p class="text-portal-muted text-xs uppercase tracking-widest mt-4">{{ __('Accès Sécurisé • Portail Partenaire') }}</p>
        </div>

        <div class="bg-portal-sidebar border border-portal-border rounded-xl p-8 shadow-2xl">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                @if ($errors->any())
                    <div class="bg-red-500/10 border border-red-500/20 text-red-500 rounded-lg p-3 text-sm font-medium">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Email Address') }}</label>
                    <div class="relative">
                        <x-lucide-mail class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-portal-muted" />
                        <input type="email" name="email" required autofocus class="w-full bg-white/5 border border-portal-border rounded-lg pl-10 pr-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Password') }}</label>
                    <div class="relative">
                        <x-lucide-lock class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-portal-muted" />
                        <input type="password" name="password" required class="w-full bg-white/5 border border-portal-border rounded-lg pl-10 pr-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                    </div>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="remember" class="rounded border-portal-border bg-white/5 text-portal-accent focus:ring-portal-accent transition-all">
                        <span class="text-xs font-medium text-portal-muted group-hover:text-white transition-colors">{{ __('Remember Me') }}</span>
                    </label>
                    <a href="#" class="text-xs font-medium text-portal-accent hover:text-white transition-colors">{{ __('Forgot Password?') }}</a>
                </div>

                <button type="submit" class="w-full bg-portal-accent text-black font-bold py-3.5 rounded-lg hover:bg-white transition-colors flex items-center justify-center gap-2">
                    {{ __('Access Portal') }} <x-lucide-arrow-right class="w-4 h-4 ml-2" />
                </button>
            </form>
        </div>
        
        <p class="text-center text-xs text-portal-muted mt-8 opacity-50">&copy; {{ date('Y') }} SARL Global Accessoires. {{ __('All rights reserved.') }}</p>
    </div>
</body>
</html>
