@extends('templates.layout')
@section('title', '404 - Page Not Fouund')
@section('content')
    <!-- Login Container - "Little Dark" Version (Slate 800) -->
    <div class="w-full max-w-[420px] bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 overflow-hidden">
        
        <!-- Branding & Header Section -->
        <div class="p-8 pb-0 text-center">
            <!-- Project Logo Symbol using your primary Indigo color -->
            <div class="inline-flex items-center justify-center w-14 h-14 bg-indigo-600 rounded-2xl mb-6 shadow-lg">
                <span class="text-white font-black text-2xl tracking-tighter">L</span>
            </div>
            
            <h1 class="text-2xl font-bold text-white tracking-tight">Sign in to LMind</h1>
            <p class="text-slate-400 mt-1.5 text-sm font-medium">Access your learning management dashboard</p>
        </div>

        <!-- Form Section -->
        <div class="p-8">
            <!-- Simulated Error Message (Visible when $error is set in PHP) -->
            <div id="errorAlert" class="hidden mb-6 p-3.5 bg-red-900/30 border border-red-500/50 rounded-xl flex items-start space-x-3">
                <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <p class="text-red-200 text-sm font-medium leading-snug">
                    Invalid email or password. Please try again.
                </p>
            </div>

            <!-- Form Action -->
            <form action="/login" method="POST" class="space-y-5">
                
                <!-- Email Input Group -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold text-slate-300 ml-1">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-500 group-focus-within:text-indigo-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" required 
                            class="block w-full pl-11 pr-4 py-3 bg-slate-900 border border-slate-600 rounded-xl text-white focus:ring-2 focus:ring-indigo-600 focus:border-transparent outline-none transition-all placeholder:text-slate-500 text-sm" 
                            placeholder="admin@lmind.com">
                    </div>
                </div>

                <!-- Password Input Group -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center px-1">
                        <label for="password" class="block text-sm font-semibold text-slate-300">Password</label>
                        <a href="#" class="text-xs font-bold text-indigo-400 hover:text-indigo-300 transition-colors">Forgot Password?</a>
                    </div>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-500 group-focus-within:text-indigo-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required 
                            class="block w-full pl-11 pr-4 py-3 bg-slate-900 border border-slate-600 rounded-xl text-white focus:ring-2 focus:ring-indigo-600 focus:border-transparent outline-none transition-all placeholder:text-slate-500 text-sm" 
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Remember Toggle -->
                <div class="flex items-center px-1">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-indigo-600 bg-slate-900 border-slate-600 rounded focus:ring-indigo-600 cursor-pointer">
                    <label for="remember" class="ml-2.5 text-sm text-slate-400 font-medium cursor-pointer">Keep me signed in</label>
                </div>

                <!-- Primary Action Button (Indigo color) -->
                <button type="submit" 
                    class="w-full py-3.5 px-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl shadow-lg transition-all active:scale-[0.98] mt-2">
                    Sign In
                </button>
            </form>

         
    </div>

</body>
@endsection