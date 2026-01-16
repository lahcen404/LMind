@extends('templates.layout')

@section('title', 'Create New Class')

@section('content')
<div class="max-w-3xl mx-auto py-4">
    <!-- Breadcrumb / Back Navigation -->
    <a href="/classes" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-sm mb-8 transition group">
        <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Return to Class Management
    </a>

    <!-- Main Registration Card -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 shadow-2xl overflow-hidden">
        <!-- Card Header -->
        <div class="p-8 border-b border-slate-700 bg-slate-800/50">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/20">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white tracking-tight">Register Class</h1>
                    <p class="text-slate-400 text-sm font-medium mt-1 text-balance">Adding a new class promotion as defined in your UML Class Diagram.</p>
                </div>
            </div>
        </div>

        <!-- Static Form Body -->
        <!-- Added action and method for future logic -->
        <form action="/classes/store" method="POST" class="p-8 space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Nom Attribute -->
                <div class="space-y-2">
                    <label for="nom" class="block text-sm font-bold text-slate-300 ml-1 uppercase tracking-widest">Class Name (Nom)</label>
                    <input type="text" id="nom" name="nom" required placeholder="e.g. Fullstack Development" 
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-600">
                </div>

                <!-- Promotion Attribute -->
                <div class="space-y-2">
                    <label for="promotion" class="block text-sm font-bold text-slate-300 ml-1 uppercase tracking-widest">Promotion (Year)</label>
                    <input type="text" id="promotion" name="promotion" required placeholder="e.g. 2025 - 2026" 
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-600">
                </div>
            </div>

            <!-- Formateur Relationship -->
            <div class="space-y-2">
                <label for="formateur_id" class="block text-sm font-bold text-slate-300 ml-1 uppercase tracking-widest">Assigned Trainer (Formateur)</label>
                <div class="relative">
                    <select id="formateur_id" name="formateur_id" required class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all appearance-none cursor-pointer">
                        <option value="" disabled selected>Select an instructor from the personnel list...</option>
                        <!-- Fake Data as requested -->
                        <option value="1">Amine Bell (Tech Lead)</option>
                        <option value="2">Sarah Green (Senior Trainer)</option>
                        <option value="3">John Wick (Backend Expert)</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none text-slate-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end space-x-5 pt-6 border-t border-slate-700/50">
                <a href="/classes" class="px-6 py-3 text-slate-400 font-bold hover:text-white transition-colors">Cancel</a>
                <button type="submit" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/20 transition-all active:scale-95 uppercase tracking-widest text-xs">
                    Register Class
                </button>
            </div>
        </form>
    </div>

   
</div>
@endsection