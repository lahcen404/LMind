@extends('templates.layout')

@section('title', 'Brief Details')

@section('content')
<div class="space-y-8">
    <!-- Header & Quick Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <a href="/trainer/briefs" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-xs mb-4 transition group">
                <svg class="w-3 h-3 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Library
            </a>
            <div class="flex items-center space-x-4">
                <h1 class="text-3xl font-bold text-white tracking-tight">Authentication System</h1>
                <span class="px-3 py-1 bg-indigo-500/10 text-indigo-400 text-[10px] font-black uppercase tracking-widest rounded-full border border-indigo-500/20">
                    INDIVIDUAL
                </span>
            </div>
            <p class="text-slate-400 mt-2 font-medium italic text-xs">Database Mapping: briefs.id #142</p>
        </div>
        
        <div class="flex items-center space-x-3">
            <!-- New Button: Link Skills -->
            <a href="/trainer/briefs/skills/142" class="bg-indigo-600 hover:bg-indigo-500 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg shadow-indigo-600/20 transition-all active:scale-95 flex items-center space-x-2 text-xs uppercase tracking-widest">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
                <span>Manage Skills</span>
            </a>

            <button class="bg-slate-800 hover:bg-slate-700 text-slate-300 px-5 py-2.5 rounded-xl border border-slate-700 font-bold text-xs transition uppercase tracking-widest">
                Edit Brief
            </button>
            
            <button class="bg-rose-600/10 hover:bg-rose-600 text-rose-500 hover:text-white px-4 py-2.5 rounded-xl border border-rose-500/20 font-bold text-xs transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
            </button>
        </div>
    </div>

    <!-- Brief Meta Info (From SQL Schema) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Duration Info -->
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Time Allowance</p>
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-amber-500/10 rounded-2xl flex items-center justify-center text-amber-500 border border-amber-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <div>
                    <p class="text-xl font-bold text-white">48 Hours</p>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Total Duration</p>
                </div>
            </div>
        </div>

        <!-- Sprint Assignment -->
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Assigned Sprint</p>
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-indigo-600/10 rounded-2xl flex items-center justify-center text-indigo-500 border border-indigo-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-white">Sprint 01: Basics</p>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Order: #1</p>
                </div>
            </div>
        </div>

        <!-- Submission Status -->
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Evaluation Progress</p>
            <div class="flex items-end justify-between">
                <div>
                    <p class="text-3xl font-black text-emerald-400 leading-none">18/24</p>
                    <p class="text-[10px] text-slate-500 font-bold uppercase mt-2">Learners Submitted</p>
                </div>
                <div class="w-20 h-1.5 bg-slate-900 rounded-full overflow-hidden mb-1">
                    <div class="bg-emerald-500 h-full w-[75%]"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content: Description & Skills -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Project Requirements (description) -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
                <div class="p-6 border-b border-slate-700 bg-slate-900/20">
                    <h3 class="text-sm font-black text-white uppercase tracking-widest">Project Requirements</h3>
                </div>
                <div class="p-8 text-slate-300 leading-relaxed text-sm space-y-4">
                    <p>Develop a robust authentication system using pure PHP. The project focuses on session management, secure password hashing (using <code>password_hash</code>), and prevention of SQL Injection.</p>
                    <h4 class="text-white font-bold uppercase tracking-tighter text-xs mt-6">Deliverables Expected:</h4>
                    <ul class="list-disc list-inside space-y-2 text-slate-400">
                        <li>GitHub Repository URL</li>
                        <li>SQL Schema export for the Users table</li>
                        <li>Working demonstration of Login/Registration</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Associated Skills (brief_skills relationship) -->
        <div class="space-y-6">
            <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-[11px] font-black text-white uppercase tracking-[0.2em] flex items-center">
                        <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>
                        Target Competencies
                    </h3>
                    <!-- Small shortcut to manage -->
                    <a href="/trainer/briefs/skills/142" class="text-indigo-400 hover:text-indigo-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
                    </a>
                </div>
                <div class="space-y-3">
                    <!-- Skill Item 1 -->
                    <div class="flex items-center p-3 bg-slate-900/50 border border-slate-700 rounded-2xl group">
                        <span class="text-xs font-black text-indigo-400 w-8">C4</span>
                        <div class="h-4 w-px bg-slate-700 mx-3"></div>
                        <span class="text-[11px] font-bold text-slate-300">Créer une base de données</span>
                    </div>
                    <!-- Skill Item 2 -->
                    <div class="flex items-center p-3 bg-slate-900/50 border border-slate-700 rounded-2xl group">
                        <span class="text-xs font-black text-purple-400 w-8">C6</span>
                        <div class="h-4 w-px bg-slate-700 mx-3"></div>
                        <span class="text-[11px] font-bold text-slate-300">Développer la partie backend</span>
                    </div>
                </div>
            </div>

            <!-- Context Info -->
            <div class="bg-indigo-600 rounded-3xl p-6 shadow-xl relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-white/80 text-[10px] font-black uppercase tracking-widest mb-1">Creation Date</p>
                    <p class="text-xl font-bold text-white">Jan 12, 2026</p>
                </div>
                <svg class="absolute -right-4 -bottom-4 w-24 h-24 text-indigo-500/30" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
            </div>
        </div>
    </div>
</div>
@endsection