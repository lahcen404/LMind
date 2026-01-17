@extends('templates.layout')

@section('title', 'Sprint Details')

@section('content')
<div class="space-y-8">
    <!-- Page Header & Breadcrumb -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <a href="/sprints" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-xs mb-4 transition group">
                <svg class="w-3 h-3 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Back to Sprints
            </a>
            <div class="flex items-center space-x-3">
                <span class="flex items-center justify-center w-10 h-10 bg-indigo-600 rounded-xl text-white font-black text-sm shadow-lg shadow-indigo-600/20">01</span>
                <h1 class="text-3xl font-bold text-white tracking-tight">Introduction to Logic</h1>
            </div>
            <p class="text-slate-400 mt-2 font-medium">Class: <span class="text-indigo-400">Fullstack Web Development 2025</span></p>
        </div>
        
        <div class="flex items-center space-x-3">
            <button class="bg-slate-800 hover:bg-slate-700 text-slate-300 px-5 py-2.5 rounded-xl border border-slate-700 font-bold text-xs transition uppercase tracking-widest">
                Edit Sprint
            </button>
            <button class="bg-indigo-600 hover:bg-indigo-500 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg transition text-xs uppercase tracking-widest">
                Add Brief to Sprint
            </button>
        </div>
    </div>

    <!-- Sprint Meta Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Timeframe</p>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-slate-400">Start Date</p>
                    <p class="text-lg font-bold text-white">Jan 10, 2026</p>
                </div>
                <div class="h-8 w-px bg-slate-700"></div>
                <div class="text-right">
                    <p class="text-xs text-slate-400">End Date</p>
                    <p class="text-lg font-bold text-white">Jan 24, 2026</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Progress Pool</p>
            <div class="flex items-end justify-between">
                <div>
                    <p class="text-3xl font-black text-white leading-none">64%</p>
                    <p class="text-[10px] text-indigo-400 font-bold uppercase mt-2">Overall Completion</p>
                </div>
                <div class="w-24 h-2 bg-slate-900 rounded-full overflow-hidden mb-1">
                    <div class="bg-indigo-500 h-full w-[64%]"></div>
                </div>
            </div>
        </div>

        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Assigned Items</p>
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-amber-500/10 rounded-2xl flex items-center justify-center text-amber-500 border border-amber-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                </div>
                <div>
                    <p class="text-xl font-bold text-white">03 Briefs</p>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Linked Projects</p>
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
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-6 py-5">Brief Title</th>
                        <th class="px-6 py-5">Niveau</th>
                        <th class="px-6 py-5">Submissions</th>
                        <th class="px-6 py-5 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    <!-- Static Brief Row 1 -->
                    <tr class="hover:bg-slate-700/30 transition group">
                        <td class="px-6 py-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-slate-900 border border-slate-700 rounded-xl flex items-center justify-center text-indigo-400 group-hover:border-indigo-500/50 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-white group-hover:text-indigo-400 transition-colors tracking-tight">Algorithm Fundamentals</p>
                                    <p class="text-[10px] text-slate-500">PHP, Variables, Conditionals</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <span class="px-2 py-0.5 bg-emerald-500/10 text-emerald-400 text-[10px] font-black uppercase tracking-widest rounded border border-emerald-500/20">Beginner</span>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex items-center space-x-2">
                                <div class="flex -space-x-2">
                                    <div class="w-6 h-6 rounded-full bg-slate-700 border border-slate-800"></div>
                                    <div class="w-6 h-6 rounded-full bg-indigo-600 border border-slate-800 flex items-center justify-center text-[8px] font-bold">+18</div>
                                </div>
                                <span class="text-[10px] text-slate-500 font-bold uppercase tracking-tighter">Turned in</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-right">
                            <button class="text-slate-500 hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Static Brief Row 2 -->
                    <tr class="hover:bg-slate-700/30 transition group">
                        <td class="px-6 py-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-slate-900 border border-slate-700 rounded-xl flex items-center justify-center text-indigo-400 group-hover:border-indigo-500/50 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" /></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-white group-hover:text-indigo-400 transition-colors tracking-tight">Database Schema Design</p>
                                    <p class="text-[10px] text-slate-500">UML, PostgreSQL, relationships</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <span class="px-2 py-0.5 bg-blue-500/10 text-blue-400 text-[10px] font-black uppercase tracking-widest rounded border border-blue-500/20">Intermediate</span>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex items-center space-x-2">
                                <div class="flex -space-x-2">
                                    <div class="w-6 h-6 rounded-full bg-indigo-600 border border-slate-800 flex items-center justify-center text-[8px] font-bold">+5</div>
                                </div>
                                <span class="text-[10px] text-slate-500 font-bold uppercase tracking-tighter">Turned in</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-right">
                            <button class="text-slate-500 hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection