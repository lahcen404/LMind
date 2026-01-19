@extends('templates.layout')

@section('title', 'Link Skills to Brief')

@section('content')
<div class="max-w-5xl mx-auto space-y-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <a href="/trainer/briefs/1" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-xs mb-4 transition group">
                <svg class="w-3 h-3 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Back to Brief Details
            </a>
            <h1 class="text-3xl font-bold text-white tracking-tight">Target Competencies</h1>
            <p class="text-slate-400 mt-1 font-medium">Linking skills for: <span class="text-indigo-400 font-bold italic">Authentication System</span></p>
        </div>
        
        <div class="bg-slate-800 px-5 py-3 rounded-2xl border border-slate-700 flex items-center space-x-3 shadow-lg">
            <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest leading-none">Linked<br>Skills</span>
            <span class="text-2xl font-black text-white leading-none">02</span>
        </div>
    </div>

    <!-- Main Assignment Interface -->
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-8">
        <form action="/trainer/briefs/skills/update" method="POST" class="space-y-6">
            <!-- Hidden Brief ID -->
            <input type="hidden" name="brief_id" value="1">

            <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
                <!-- Search & Filter Header -->
                <div class="p-6 bg-slate-900/40 border-b border-slate-700 flex flex-col md:flex-row gap-4 justify-between items-center">
                    <h3 class="text-xs font-black text-slate-500 uppercase tracking-[0.2em] flex items-center">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full mr-3 shadow-[0_0_8px_rgba(99,102,241,0.6)]"></span>
                        Available Framework (skills table)
                    </h3>
                    <div class="relative w-full md:w-64">
                        <input type="text" placeholder="Search codes (C1...)" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2 text-xs text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all">
                    </div>
                </div>

                <!-- Skills List -->
                <div class="divide-y divide-slate-700/50 max-h-[600px] overflow-y-auto custom-scrollbar">
                    
                    <!-- Skill Item (Linked) -->
                    <label class="flex items-center p-6 hover:bg-indigo-600/[0.03] transition cursor-pointer group">
                        <div class="relative flex items-center justify-center">
                            <input type="checkbox" name="skill_ids[]" value="4" checked class="peer h-6 w-6 rounded-lg bg-slate-900 border-slate-600 text-indigo-600 focus:ring-offset-slate-800 focus:ring-indigo-600 transition-all cursor-pointer">
                            <svg class="absolute w-4 h-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <div class="ml-6 flex-grow">
                            <div class="flex items-center space-x-3">
                                <span class="text-sm font-black text-indigo-400">C4</span>
                                <div class="h-3 w-px bg-slate-700"></div>
                                <span class="text-sm font-bold text-white group-hover:text-indigo-300 transition-colors">Créer une base de données</span>
                            </div>
                            <p class="text-[11px] text-slate-500 mt-1 line-clamp-1 font-medium">Define schema, relationships, and constraints using SQL or UML.</p>
                        </div>
                        <span class="hidden group-hover:block text-[10px] font-black text-indigo-500 uppercase tracking-widest">Included</span>
                    </label>

                    <!-- Skill Item (Unlinked) -->
                    <label class="flex items-center p-6 hover:bg-slate-700/30 transition cursor-pointer group">
                        <div class="relative flex items-center justify-center">
                            <input type="checkbox" name="skill_ids[]" value="5" class="peer h-6 w-6 rounded-lg bg-slate-900 border-slate-600 text-indigo-600 focus:ring-offset-slate-800 focus:ring-indigo-600 transition-all cursor-pointer">
                            <svg class="absolute w-4 h-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <div class="ml-6 flex-grow">
                            <div class="flex items-center space-x-3">
                                <span class="text-sm font-black text-slate-400">C5</span>
                                <div class="h-3 w-px bg-slate-700"></div>
                                <span class="text-sm font-bold text-slate-300 group-hover:text-white transition-colors">Développer les composants d'accès aux données</span>
                            </div>
                            <p class="text-[11px] text-slate-500 mt-1 line-clamp-1 font-medium">Implement CRUD operations and handle data persistence layers.</p>
                        </div>
                    </label>

                    <!-- Skill Item (Linked) -->
                    <label class="flex items-center p-6 hover:bg-indigo-600/[0.03] transition cursor-pointer group">
                        <div class="relative flex items-center justify-center">
                            <input type="checkbox" name="skill_ids[]" value="6" checked class="peer h-6 w-6 rounded-lg bg-slate-900 border-slate-600 text-indigo-600 focus:ring-offset-slate-800 focus:ring-indigo-600 transition-all cursor-pointer">
                            <svg class="absolute w-4 h-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <div class="ml-6 flex-grow">
                            <div class="flex items-center space-x-3">
                                <span class="text-sm font-black text-indigo-400">C6</span>
                                <div class="h-3 w-px bg-slate-700"></div>
                                <span class="text-sm font-bold text-white group-hover:text-indigo-300 transition-colors">Développer la partie back-end d'une application</span>
                            </div>
                            <p class="text-[11px] text-slate-500 mt-1 line-clamp-1 font-medium">Business logic implementation using server-side languages (PHP, JS...).</p>
                        </div>
                    </label>

                </div>

                <!-- Footer Actions -->
                <div class="p-8 bg-slate-900/40 border-t border-slate-700 flex flex-col sm:flex-row items-center justify-between gap-6">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-slate-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <p class="text-[10px] text-slate-500 leading-relaxed max-w-xs font-medium uppercase tracking-tight">
                            Saving will update the <code class="text-slate-300">brief_skills</code> pivot table. Selected skills will appear on student evaluations for this project.
                        </p>
                    </div>
                    <button type="submit" class="w-full sm:w-auto px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/20 transition-all active:scale-95 uppercase tracking-widest text-[11px]">
                        Sync Matrix
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #4f46e5; }
</style>
@endsection