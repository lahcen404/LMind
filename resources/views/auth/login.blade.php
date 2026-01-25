@extends('templates.layout')

@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center p-4">
    <div class="w-full max-w-[420px] bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 overflow-hidden">
        
        <div class="p-8 pb-4 text-center">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-indigo-600 rounded-xl mb-6 shadow-lg">
                <span class="text-white font-black text-2xl tracking-tighter">L</span>
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Sign in to LMind</h1>
            <p class="text-slate-400 mt-2 text-sm font-medium">Enter your details to manage your learning journey</p>
        </div>

        <div class="p-8 pt-4">
           
            @if(isset($_SESSION['errors']['login']))
            <div class="mb-6 p-4 bg-red-900/30 border border-red-500/50 rounded-xl text-red-200 text-sm font-medium">
                {{ $_SESSION['errors']['login'] }}
            </div>
            @endif

            <form action="/login" method="POST" class="space-y-6">
                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold text-slate-300 ml-1">Email Address</label>
                    <input type="email" id="email" name="email" 
                        
                        class="w-full px-4 py-3 bg-slate-900 border {{ isset($_SESSION['errors']['email']) ? 'border-red-500' : 'border-slate-600' }} rounded-xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-500 text-sm" 
                        placeholder="admin@lmind.com">
                    @if(isset($_SESSION['errors']['email']))
                    <p class="text-red-400 text-[10px] font-bold">{{ $_SESSION['errors']['email'] }}</p>
                    @endif

                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center px-1">
                        <label for="password" class="block text-sm font-semibold text-slate-300">Password</label>
                        <a href="#" class="text-xs font-bold text-indigo-400 hover:text-indigo-300 transition-colors">Forgot?</a>
                    </div>
                    <input type="password" id="password" name="password" 
                        class="w-full px-4 py-3 bg-slate-900 border {{ isset($_SESSION['errors']['password']) ? 'border-red-500' : 'border-slate-600' }} rounded-xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-500 text-sm" 
                        placeholder="••••••••">
                    @if(isset($_SESSION['errors']['password']))
                    <p class="text-red-400 text-[10px] font-bold">{{ $_SESSION['errors']['password'] }}</p>
                    @endif
       
                </div>

                <button type="submit" 
                    class="w-full py-3.5 px-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl shadow-lg transition-all active:scale-[0.98]">
                    Login
                </button>
            </form>

            <div class="mt-10 pt-6 border-t border-slate-700 text-center">
                <p class="text-sm text-slate-500 font-medium">
                    Need an account? 
                    <a href="#" class="text-indigo-400 font-bold hover:underline underline-offset-4 ml-1">Contact Admin</a>
                </p>
            </div>
        </div>
    </div>
</div>


@php 
    unset($_SESSION['errors']); 
@endphp

@endsection