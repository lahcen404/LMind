@extends('templates.layout')
@section('title', '404 - Page Not Found')
@section('content')

<div class="min-h-[60vh] flex items-center justify-center text-center px-4"><div class="max-w-lg"><!-- Iconic 404 Illustration --><div class="relative inline-block mb-8"><h1 class="text-9xl font-black text-slate-800 tracking-tighter">404</h1><div class="absolute inset-0 flex items-center justify-center"><p class="text-2xl font-bold text-indigo-500 bg-slate-900 px-4 uppercase tracking-widest">Lost in Space</p></div></div>    <h2 class="text-3xl font-bold text-white mb-4">Oops! Page not found.</h2>
    <p class="text-slate-400 text-lg mb-10 leading-relaxed">
        The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
    </p>

    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
        <a href="/" class="w-full sm:w-auto px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg transition-all active:scale-95">
            Back to Home
        </a>
        <button onclick="window.history.back()" class="w-full sm:w-auto px-8 py-3 bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold rounded-xl border border-slate-700 transition-all active:scale-95">
            Go Back
        </button>
    </div>

    <!-- Helpful links for a user -->
    <div class="mt-16 pt-8 border-t border-slate-800">
        <p class="text-slate-500 text-sm">
            Need help? <a href="#" class="text-indigo-400 hover:underline font-semibold ml-1">Contact Support</a>
        </p>
    </div>
</div>
</div>

@endsection