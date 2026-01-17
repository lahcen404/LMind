@extends('templates.layout')

@section('title', 'Manage Class Roster')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <!-- Link back to Step 1 -->
            <a href="/classes/select-enrollment" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-xs mb-4 transition group">
                <svg class="w-3 h-3 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Step 1: Choose Different Class
            </a>
            <h1 class="text-3xl font-bold text-white tracking-tight">Step 2: Manage Roster</h1>
            <p class="text-slate-400 mt-1 font-medium">
                Assigning learners to <span class="text-indigo-400 font-bold tracking-wide">Fullstack Web Development</span> 
                <span class="text-slate-600 mx-2">|</span> 
                Promotion: <span class="text-slate-200">2025/2026</span>
            </p>
        </div>
        
        <!-- Summary Stat -->
        <div class="bg-slate-800 px-6 py-4 rounded-2xl border border-slate-700 shadow-xl flex items-center space-x-4">
            <div class="text-right">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest leading-none mb-1">Roster Size</p>
                <p class="text-xl font-bold text-white tracking-tighter">18 <span class="text-xs text-slate-500 font-medium">Learners</span></p>
            </div>
            <div class="w-10 h-10 rounded-full bg-indigo-600/20 flex items-center justify-center">
                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
        
        <!-- Panel A: Unassigned Pool (Learners with no class) -->
        <div class="space-y-4">
            <div class="flex items-center justify-between px-2">
                <h2 class="text-xs font-black text-slate-500 uppercase tracking-[0.2em] flex items-center">
                    <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3"></span>
                    Unassigned Pool
                </h2>
                <span class="text-[10px] text-slate-500 font-medium italic">Available students</span>
            </div>

            <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
                <div class="p-4 bg-slate-900/40 border-b border-slate-700">
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500 group-focus-within:text-indigo-500 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        </span>
                        <input type="text" placeholder="Search available students..." class="block w-full pl-10 pr-4 py-3 bg-slate-900 border border-slate-700 rounded-2xl text-white text-xs outline-none focus:ring-2 focus:ring-indigo-600 transition-all">
                    </div>
                </div>

                <!-- Available List (Fake Data) -->
                <div class="max-h-[500px] overflow-y-auto divide-y divide-slate-700/50 custom-scrollbar">
                    <div class="p-5 flex items-center justify-between hover:bg-indigo-600/5 transition group">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-700 flex items-center justify-center font-bold text-slate-500">KA</div>
                            <div>
                                <p class="text-sm font-bold text-white group-hover:text-indigo-400">Karim Alami</p>
                                <p class="text-[10px] text-slate-500">karim.alami@student.com</p>
                            </div>
                        </div>
                        <button type="button" class="px-4 py-2 bg-slate-900 hover:bg-indigo-600 text-slate-400 hover:text-white border border-slate-700 hover:border-indigo-500 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">
                            Assign
                        </button>
                    </div>

                    <div class="p-5 flex items-center justify-between hover:bg-indigo-600/5 transition group">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-700 flex items-center justify-center font-bold text-slate-500">SB</div>
                            <div>
                                <p class="text-sm font-bold text-white group-hover:text-indigo-400">Sami Benani</p>
                                <p class="text-[10px] text-slate-500">sami.ben@student.com</p>
                            </div>
                        </div>
                        <button type="button" class="px-4 py-2 bg-slate-900 hover:bg-indigo-600 text-slate-400 hover:text-white border border-slate-700 hover:border-indigo-500 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">
                            Assign
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel B: Class Roster (Students in this class) -->
        <div class="space-y-4">
            <div class="flex items-center justify-between px-2">
                <h2 class="text-xs font-black text-white uppercase tracking-[0.2em] flex items-center">
                    <span class="w-1.5 h-1.5 bg-indigo-500 rounded-full mr-3 shadow-[0_0_8px_rgba(99,102,241,0.8)]"></span>
                    Class Roster
                </h2>
                <span class="text-[10px] text-indigo-400 font-black uppercase tracking-widest border-b border-indigo-500/30 pb-0.5">Assigned to this class</span>
            </div>

            <div class="bg-slate-800 rounded-3xl border border-indigo-500/20 shadow-2xl overflow-hidden">
                <div class="p-4 bg-indigo-600/[0.03] border-b border-slate-700">
                    <p class="text-[10px] text-slate-500 font-medium italic">Learners here belong exclusively to this promotion.</p>
                </div>

                <div class="max-h-[500px] overflow-y-auto divide-y divide-slate-700/50 custom-scrollbar">
                    <!-- Enrolled Learner 1 -->
                    <div class="p-5 flex items-center justify-between hover:bg-red-500/[0.02] transition group">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center font-bold text-white shadow-lg shadow-indigo-600/20">YO</div>
                            <div>
                                <p class="text-sm font-bold text-white tracking-tight">Yassine Omar</p>
                                <p class="text-[10px] text-slate-400 font-medium">yassine.o@student.com</p>
                            </div>
                        </div>
                        <button type="button" class="p-2.5 bg-slate-900 border border-slate-700 rounded-xl text-slate-500 hover:text-red-400 hover:border-red-500/50 transition-all shadow-sm" title="Remove from class">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                </div>

                <div class="p-6 bg-slate-900/40 border-t border-slate-700 flex justify-end">
                    <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/20 transition-all active:scale-95 uppercase tracking-widest text-[10px]">
                        Save Roster Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #4f46e5; }
</style>
@endsection