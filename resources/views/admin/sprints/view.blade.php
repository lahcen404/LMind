@extends('templates.layout')

@section('title', 'Sprint Details')

@section('content')
<div class="space-y-8">
    <!-- Page Header & Breadcrumb -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <!-- back to list -->
            <a href="/admin/sprints" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-xs mb-4 transition group">
                <svg class="w-3 h-3 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Back to Sprints
            </a>
            <div class="flex items-center space-x-3">
                <span class="flex items-center justify-center w-10 h-10 bg-indigo-600 rounded-xl text-white font-black text-sm shadow-lg shadow-indigo-600/20">
                    {{$sprint->getOrderSprint() }}
                </span>
                <h1 class="text-3xl font-bold text-white tracking-tight">{{ $sprint->getName() }}</h1>
            </div>
            <p class="text-slate-400 mt-2 font-medium">Class: <span class="text-indigo-400">{{ $sprint->getClassName() }}</span></p>
        </div>
        
        <div class="flex items-center space-x-3">
            <a href="/admin/sprints/edit?id={{ $sprint->getId() }}" class="bg-slate-800 hover:bg-slate-700 text-slate-300 px-5 py-2.5 rounded-xl border border-slate-700 font-bold text-xs transition uppercase tracking-widest">
                Edit Sprint
            </a>
            <button class="bg-indigo-600 hover:bg-indigo-500 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg transition text-xs uppercase tracking-widest">
                Add Brief to Sprint
            </button>
        </div>
    </div>

    <!-- Sprint Meta Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Duration Card -->
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Sprint Duration</p>
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-indigo-600/10 rounded-2xl flex items-center justify-center text-indigo-500 border border-indigo-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <div>
                    <p class="text-xl font-bold text-white">{{ $sprint->getDuration() }} Days</p>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Total Timeframe</p>
                </div>
            </div>
        </div>

        <!-- Completion Card (Simulation) -->
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Class Progress</p>
            <div class="flex items-end justify-between">
                <div>
                    <p class="text-3xl font-black text-white leading-none">0%</p>
                    <p class="text-[10px] text-indigo-400 font-bold uppercase mt-2">Completion Rate</p>
                </div>
                <div class="w-24 h-2 bg-slate-900 rounded-full overflow-hidden mb-1">
                    <div class="bg-indigo-500 h-full w-[0%]"></div>
                </div>
            </div>
        </div>

        <!-- Briefs Count Card -->
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Linked Resources</p>
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-amber-500/10 rounded-2xl flex items-center justify-center text-amber-500 border border-amber-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                </div>
                <div>
                    <p class="text-xl font-bold text-white">00 Briefs</p>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Active Projects</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sprint Content: Briefs List -->
    <div class="space-y-4">
        <div class="flex items-center justify-between px-2">
            <h2 class="text-sm font-black text-white uppercase tracking-[0.2em] flex items-center">
                <span class="w-1.5 h-1.5 bg-indigo-500 rounded-full mr-3 shadow-[0_0_8px_rgba(99,102,241,0.8)]"></span>
                Associated Briefs
            </h2>
        </div>

        <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/50 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">
                            <th class="px-6 py-5">Brief Title</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-6 py-5">Submissions</th>
                            <th class="px-6 py-5 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-500 italic text-sm">
                                No briefs have been associated with this sprint yet.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection