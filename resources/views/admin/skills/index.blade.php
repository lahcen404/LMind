@extends('templates.layout')

@section('title', 'Skills Inventory')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">Skills Inventory</h1>
            <p class="text-slate-400 mt-1 font-medium">Framework organized by indexed competency codes (C1, C2, C3...).</p>
        </div>
        <div class="flex items-center space-x-3">
            <button class="bg-slate-800 hover:bg-slate-700 text-white px-5 py-2.5 rounded-xl border border-slate-700 font-bold text-xs transition uppercase tracking-widest">
                Export Matrix
            </button>
            <button class="bg-indigo-600 hover:bg-indigo-500 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg transition text-xs uppercase tracking-widest">
                + New Competency
            </button>
        </div>
    </div>

    <!-- Stats Summary -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-3">Indexed Codes</p>
            <h3 class="text-3xl font-black text-white tracking-tighter">C1 — C18</h3>
            <p class="text-xs text-indigo-400 font-bold mt-2">Active Framework</p>
        </div>
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-3">Evaluation</p>
            <h3 class="text-2xl font-black text-emerald-400 tracking-tight">Level-Based</h3>
            <p class="text-xs text-slate-500 font-medium mt-2">Acquired / Non-Acquired</p>
        </div>
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-3">Last Update</p>
            <h3 class="text-3xl font-black text-amber-500 tracking-tighter">Today</h3>
            <p class="text-xs text-slate-500 font-medium mt-2">System Sync</p>
        </div>
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-3">Total Logs</p>
            <h3 class="text-3xl font-black text-indigo-500 tracking-tighter">842</h3>
            <p class="text-xs text-slate-500 font-medium mt-2">Validation entries</p>
        </div>
    </div>

    <!-- Competency Matrix -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Category: Frontend -->
        <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
            <div class="p-6 bg-slate-900/40 border-b border-slate-700 flex items-center space-x-4">
                <div class="w-12 h-12 bg-indigo-600/10 rounded-2xl flex items-center justify-center text-indigo-500 border border-indigo-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-white tracking-tight leading-none">Frontend Development</h2>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-1.5">User Interface & Design</p>
                </div>
            </div>
            <div class="p-4 space-y-1">
                <!-- C1 -->
                <div class="flex items-center justify-between p-4 rounded-2xl hover:bg-slate-700/30 transition group border border-transparent hover:border-slate-600">
                    <div class="flex items-center space-x-6">
                        <span class="text-xs font-black text-indigo-400 w-6">C1</span>
                        <div class="h-4 w-px bg-slate-700"></div>
                        <span class="text-sm font-bold text-slate-300 group-hover:text-white transition-colors">Maquetter une application</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="p-2 text-slate-600 hover:text-indigo-400 transition-colors" title="Edit">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        </button>
                        <button class="p-2 text-slate-600 hover:text-red-500 transition-colors" title="Delete">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                </div>
                <!-- C2 -->
                <div class="flex items-center justify-between p-4 rounded-2xl hover:bg-slate-700/30 transition group border border-transparent hover:border-slate-600">
                    <div class="flex items-center space-x-6">
                        <span class="text-xs font-black text-indigo-400 w-6">C2</span>
                        <div class="h-4 w-px bg-slate-700"></div>
                        <span class="text-sm font-bold text-slate-300 group-hover:text-white transition-colors">Réaliser une interface statique et adaptable</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="p-2 text-slate-600 hover:text-indigo-400 transition-colors" title="Edit">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        </button>
                        <button class="p-2 text-slate-600 hover:text-red-500 transition-colors" title="Delete">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category: Backend -->
        <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
            <div class="p-6 bg-slate-900/40 border-b border-slate-700 flex items-center space-x-4">
                <div class="w-12 h-12 bg-purple-500/10 rounded-2xl flex items-center justify-center text-purple-500 border border-purple-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-7-6h.01M7 16h.01" /></svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-white tracking-tight leading-none">Backend & Persistence</h2>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-1.5">Logic & Data Management</p>
                </div>
            </div>
            <div class="p-4 space-y-1">
                <!-- C4 -->
                <div class="flex items-center justify-between p-4 rounded-2xl hover:bg-slate-700/30 transition group border border-transparent hover:border-slate-600">
                    <div class="flex items-center space-x-6">
                        <span class="text-xs font-black text-purple-400 w-6">C4</span>
                        <div class="h-4 w-px bg-slate-700"></div>
                        <span class="text-sm font-bold text-slate-300 group-hover:text-white transition-colors">Créer une base de données</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="p-2 text-slate-600 hover:text-purple-400 transition-colors" title="Edit">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        </button>
                        <button class="p-2 text-slate-600 hover:text-red-500 transition-colors" title="Delete">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection