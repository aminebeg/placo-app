<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Global Accesoires</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Unbounded:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-portal-bg text-portal-text min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-10">
            <div class="flex items-center justify-center gap-3 font-display font-bold text-2xl tracking-tight mb-2">
                <span>GLOBAL <span class="text-portal-accent">ACCESOIRES</span> <small class="bg-portal-accent text-black px-1.5 py-0.5 rounded textxs align-middle ml-1">B2B</small></span>
            </div>
            <p class="text-portal-muted">{{ __('Secure Access for Authorized Personnel') }}</p>
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

                <button type="submit" class="w-full bg-portal-accent text-black font-bold py-3.5 rounded-lg hover:bg-white transition-colors flex items-center justify-center gap-2">
                    {{ __('Access Portal') }} <x-lucide-arrow-right class="w-4 h-4 ml-2" />
                </button>
            </form>
        </div>
        
        <p class="text-center text-xs text-portal-muted mt-8 opacity-50">&copy; {{ date('Y') }} Placo Algerie. {{ __('All rights reserved.') }}</p>
    </div>
</body>
</html>
