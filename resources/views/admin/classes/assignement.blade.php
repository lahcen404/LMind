@extends('templates.layout')

@section('title', 'Select Class for Enrollment')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">Assign Learners</h1>
            <p class="text-slate-400 mt-1">Step 1: Choose the class you want to manage students for.</p>
        </div>
    </div>

    <!-- Class Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Class Card 1 -->
        <div class="bg-slate-800 rounded-3xl border border-slate-700 p-8 hover:border-indigo-500/50 transition-all group shadow-xl flex flex-col justify-between">
            <div>
                <div class="w-14 h-14 bg-indigo-600/10 rounded-2xl flex items-center justify-center text-indigo-500 border border-indigo-500/20 mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white tracking-tight">Fullstack JS</h3>
                <p class="text-sm text-slate-400 mt-1 font-medium italic">Promotion: 2025/2026</p>
                
                <div class="mt-4 flex items-center space-x-2">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Active Enrollment</span>
                </div>
            </div>
            
            <div class="mt-8 pt-6 border-t border-slate-700/50 flex items-center justify-between">
                <div class="text-xs">
                    <span class="block text-white font-bold">18 Learners</span>
                    <span class="text-slate-500">currently assigned</span>
                </div>
                <a href="/classes/enroll/1" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white text-[11px] font-black uppercase tracking-widest rounded-xl transition-all active:scale-95 shadow-lg shadow-indigo-600/20">
                    Manage Roster
                </a>
            </div>
        </div>

        <!-- Class Card 2 -->
        <div class="bg-slate-800 rounded-3xl border border-slate-700 p-8 hover:border-indigo-500/50 transition-all group shadow-xl flex flex-col justify-between">
            <div>
                <div class="w-14 h-14 bg-emerald-600/10 rounded-2xl flex items-center justify-center text-emerald-500 border border-emerald-500/20 mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white tracking-tight">UI/UX Design</h3>
                <p class="text-sm text-slate-400 mt-1 font-medium italic">Promotion: 2024/2025</p>
                
                <div class="mt-4 flex items-center space-x-2">
                    <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Limited Spots</span>
                </div>
            </div>
            
            <div class="mt-8 pt-6 border-t border-slate-700/50 flex items-center justify-between">
                <div class="text-xs">
                    <span class="block text-white font-bold">28 Learners</span>
                    <span class="text-slate-500">currently assigned</span>
                </div>
                <a href="/classes/enroll/2" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white text-[11px] font-black uppercase tracking-widest rounded-xl transition-all active:scale-95 shadow-lg shadow-indigo-600/20">
                    Manage Roster
                </a>
            </div>
        </div>

    </div>
</div>
@endsection