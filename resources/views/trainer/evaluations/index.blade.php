@extends('templates.layout')

@section('title', 'Evaluations Management')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">Pedagogical Debriefing</h1>
            <p class="text-slate-400 mt-1 font-medium">Review submissions and assign mastery levels to learner skills.</p>
        </div>
        
        <div class="flex items-center space-x-3 bg-slate-800 p-2 rounded-2xl border border-slate-700">
            <div class="px-4 py-2 text-center border-r border-slate-700">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Pending</p>
                <p class="text-lg font-bold text-rose-500">12</p>
            </div>
            <div class="px-4 py-2 text-center">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Completed</p>
                <p class="text-lg font-bold text-emerald-500">48</p>
            </div>
        </div>
    </div>

    <!-- Filters & Selection (Requirement 3.5: Select a Brief) -->
    <div class="bg-slate-800 p-4 rounded-2xl border border-slate-700 flex flex-col md:flex-row gap-4 justify-between items-center shadow-sm">
        <div class="flex flex-col md:flex-row gap-4 w-full">
            <!-- Brief Selector -->
            <div class="relative w-full md:w-72">
                <select class="w-full bg-slate-900 border border-slate-700 text-slate-300 text-xs font-bold uppercase tracking-widest rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-600 appearance-none cursor-pointer">
                    <option>All Project Briefs</option>
                    <option>Authentication System</option>
                    <option>E-Commerce API</option>
                    <option>Portfolio Pro</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </div>
            </div>

            <!-- Class Selector -->
            <div class="relative w-full md:w-64">
                <select class="w-full bg-slate-900 border border-slate-700 text-slate-300 text-xs font-bold uppercase tracking-widest rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-600 appearance-none">
                    <option>All Classes</option>
                    <option>Fullstack JS 2025</option>
                    <option>UI/UX Design 2024</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </div>
            </div>
        </div>
        
        <div class="relative w-full md:w-64">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500 pointer-events-none">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </span>
            <input type="text" placeholder="Search learner..." class="block w-full pl-10 pr-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white text-xs outline-none focus:ring-2 focus:ring-indigo-600 transition-all placeholder:text-slate-600 font-medium">
        </div>
    </div>

    <!-- Submissions Table (SQL: livrables joined with users & briefs) -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-6 py-5">Learner (Utilisateur)</th>
                        <th class="px-6 py-5">Project (Brief)</th>
                        <th class="px-6 py-5">Submission Date</th>
                        <th class="px-6 py-5">Status</th>
                        <th class="px-6 py-5 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    
                    <!-- Row 1: Pending Evaluation -->
                    <tr class="hover:bg-slate-700/30 transition group">
                        <td class="px-6 py-6">
                            <div class="flex items-center space-x-4">
                                <img src="https://ui-avatars.com/api/?name=Sarah+Green&background=10b981&color=fff" class="w-10 h-10 rounded-xl" alt="">
                                <div>
                                    <p class="text-sm font-bold text-white tracking-tight">Sarah Green</p>
                                    <p class="text-[10px] text-slate-500 font-bold">Class: FS JS 2025</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <p class="text-sm font-bold text-slate-300">Authentication System</p>
                            <span class="text-[10px] px-2 py-0.5 bg-indigo-500/10 text-indigo-400 font-black uppercase rounded border border-indigo-500/20">INDIVIDUAL</span>
                        </td>
                        <td class="px-6 py-6">
                            <p class="text-xs text-slate-400 font-medium">Jan 18, 2026</p>
                            <p class="text-[10px] text-slate-600 italic">2 hours ago</p>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
                                <span class="text-[10px] font-black text-rose-400 uppercase tracking-widest">Waiting for correction</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-right">
                            <a href="/trainer/evaluations/evaluate" class="inline-block px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white text-[10px] font-black uppercase tracking-widest rounded-xl transition-all active:scale-95 shadow-lg shadow-indigo-600/20">
                                Start Debriefing
                            </a>
                        </td>
                    </tr>

                    <!-- Row 2: Pending Evaluation -->
                    <tr class="hover:bg-slate-700/30 transition group">
                        <td class="px-6 py-6">
                            <div class="flex items-center space-x-4">
                                <img src="https://ui-avatars.com/api/?name=Karim+Alami&background=6366f1&color=fff" class="w-10 h-10 rounded-xl" alt="">
                                <div>
                                    <p class="text-sm font-bold text-white tracking-tight">Karim Alami</p>
                                    <p class="text-[10px] text-slate-500 font-bold">Class: FS JS 2025</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <p class="text-sm font-bold text-slate-300">Authentication System</p>
                            <span class="text-[10px] px-2 py-0.5 bg-indigo-500/10 text-indigo-400 font-black uppercase rounded border border-indigo-500/20">INDIVIDUAL</span>
                        </td>
                        <td class="px-6 py-6">
                            <p class="text-xs text-slate-400 font-medium">Jan 17, 2026</p>
                            <p class="text-[10px] text-slate-600 italic">Yesterday</p>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
                                <span class="text-[10px] font-black text-rose-400 uppercase tracking-widest">Waiting for correction</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-right">
                            <a href="/trainer/evaluations/evaluate" class="inline-block px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white text-[10px] font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-indigo-600/20">
                                Start Debriefing
                            </a>
                        </td>
                    </tr>

                    <!-- Row 3: Already Evaluated -->
                    <tr class="hover:bg-slate-700/10 transition group opacity-70">
                        <td class="px-6 py-6 text-slate-500">
                            <div class="flex items-center space-x-4 grayscale group-hover:grayscale-0 transition-all">
                                <img src="https://ui-avatars.com/api/?name=Sami+Ben&background=475569&color=fff" class="w-10 h-10 rounded-xl" alt="">
                                <div>
                                    <p class="text-sm font-bold tracking-tight">Sami Benani</p>
                                    <p class="text-[10px] font-bold">Class: UI/UX 2024</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <p class="text-sm font-bold text-slate-500">Portfolio Pro</p>
                            <span class="text-[10px] px-2 py-0.5 bg-slate-700/50 text-slate-400 font-black uppercase rounded border border-slate-700">INDIVIDUAL</span>
                        </td>
                        <td class="px-6 py-6">
                            <p class="text-xs text-slate-600 font-medium">Jan 12, 2026</p>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span class="text-[10px] font-black text-emerald-500/80 uppercase tracking-widest">Evaluated</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-right">
                            <button class="px-5 py-2.5 bg-slate-900 border border-slate-700 text-slate-500 text-[10px] font-black uppercase tracking-widest rounded-xl hover:text-white transition-all">
                                View History
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-6 bg-slate-900/30 border-t border-slate-700/50 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-[11px] text-slate-500 font-bold uppercase tracking-widest italic">
                Showing 3 of 12 pending livrables
            </p>
            <div class="flex items-center space-x-2">
                <button class="px-4 py-2 bg-slate-900 border border-slate-700 rounded-xl text-slate-500 text-[10px] font-black uppercase disabled:opacity-50">Previous</button>
                <button class="px-4 py-2 bg-slate-900 border border-slate-700 rounded-xl text-indigo-400 text-[10px] font-black uppercase hover:border-indigo-500 transition">Next Page</button>
            </div>
        </div>
    </div>
</div>
@endsection