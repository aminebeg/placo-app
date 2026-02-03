<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Register') }} - MyFix Portal</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Unbounded:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-portal-bg text-portal-text min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-2xl">
        <div class="text-center mb-10">
            <div class="flex items-center justify-center gap-4 font-display font-bold text-2xl tracking-tight mb-2 uppercase">
                <img src="/images/logo-myfix.png" alt="MyFix Logo" class="h-12 w-auto">
                <span>MYFIX <small class="bg-portal-accent text-white px-1.5 py-0.5 rounded text-[0.6rem] align-middle ms-1 font-bold">PRO</small></span>
            </div>
            <p class="text-portal-muted">{{ __('Create your professional account') }}</p>
        </div>

        <div class="bg-portal-sidebar border border-portal-border rounded-xl p-8 shadow-2xl">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
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

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('First Name') }}</label>
                        <input type="text" name="first_name" required autofocus class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Last Name') }}</label>
                        <input type="text" name="last_name" required class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Company / Organization') }}</label>
                    <input type="text" name="company" class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                </div>

                <div>
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Business Email') }}</label>
                    <input type="email" name="email" required class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Password') }}</label>
                        <input type="password" name="password" required class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2">{{ __('Confirm Password') }}</label>
                        <input type="password" name="password_confirmation" required class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                    </div>
                </div>

                <button type="submit" class="w-full bg-portal-accent text-black font-bold py-3.5 rounded-lg hover:bg-white transition-colors flex items-center justify-center gap-2">
                    {{ __('Create Account') }} <x-lucide-user-plus class="w-4 h-4" />
                </button>
            </form>
        </div>
        
        <p class="text-center text-sm mt-8">
            <span class="text-portal-muted">{{ __('Already have an account?') }}</span>
            <a href="{{ route('login') }}" class="text-portal-accent font-bold hover:underline ml-1 tracking-tight">{{ __('Sign In') }}</a>
        </p>
    </div>
</body>
</html>
