@extends('templates.layout')

@section('title', 'Trainer Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">Instructor Hub</h1>
            <p class="text-slate-400 mt-1">Hello, <span class="text-indigo-400 font-bold">Amine Bell</span>. Monitor your classes and evaluate project progress.</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="/trainer/briefs" class="bg-indigo-600 hover:bg-indigo-500 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg shadow-indigo-600/20 transition-all active:scale-95 flex items-center space-x-2 text-xs uppercase tracking-widest">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
                <span>Assign New Brief</span>
            </a>
        </div>
    </div>

    <!-- Trainer Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- My Students -->
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 bg-indigo-600/10 rounded-xl flex items-center justify-center text-indigo-500 border border-indigo-500/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                </div>
            </div>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">My Students</p>
            <h3 class="text-2xl font-bold text-white mt-1">42 <span class="text-xs text-slate-500 font-medium">Active</span></h3>
        </div>

        <!-- Ongoing Briefs -->
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 bg-amber-500/10 rounded-xl flex items-center justify-center text-amber-500 border border-amber-500/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                </div>
            </div>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Active Briefs</p>
            <h3 class="text-2xl font-bold text-white mt-1">03 <span class="text-xs text-slate-500 font-medium italic">Across 2 Classes</span></h3>
        </div>

        <!-- Pending Corrections -->
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl border-l-4 border-l-rose-500/50">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 bg-rose-500/10 rounded-xl flex items-center justify-center text-rose-500 border border-rose-500/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                </div>
                <span class="flex h-2 w-2 rounded-full bg-rose-500 animate-ping"></span>
            </div>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">To Evaluate</p>
            <h3 class="text-2xl font-bold text-rose-400 mt-1">12 <span class="text-xs text-slate-500 font-medium">Submissions</span></h3>
        </div>

        <!-- Current Sprint -->
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 bg-emerald-500/10 rounded-xl flex items-center justify-center text-emerald-500 border border-emerald-500/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
            </div>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Sprint Status</p>
            <h3 class="text-lg font-bold text-white mt-1 italic tracking-tight">Backend Focus</h3>
            <p class="text-[10px] text-emerald-500 font-bold mt-1 uppercase tracking-widest">Ends in 4 Days</p>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Assigned Classes -->
        <div class="lg:col-span-2 space-y-6">
            <div class="flex items-center justify-between px-2">
                <h2 class="text-sm font-black text-white uppercase tracking-[0.2em] flex items-center">
                    <span class="w-2 h-2 bg-indigo-500 rounded-full mr-3"></span>
                    My Classes
                </h2>
                <a href="/trainer/classes" class="text-[10px] font-black text-indigo-400 hover:text-indigo-300 uppercase tracking-widest">View Roster</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Class Card 1 -->
                <div class="bg-slate-800 rounded-3xl border border-slate-700 p-6 hover:border-indigo-500/50 transition-all group shadow-xl">
                    <div class="flex justify-between items-start mb-6">
                        <div class="p-3 bg-slate-900 rounded-2xl border border-slate-700 group-hover:bg-indigo-600 transition-colors">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                        </div>
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest bg-slate-900 px-2 py-1 rounded">24 Students</span>
                    </div>
                    <h4 class="text-lg font-bold text-white">Fullstack JS 2025</h4>
                    <p class="text-xs text-slate-500 mt-1">Current Brief: <span class="text-indigo-400 font-medium italic underline">Auth System</span></p>
                    
                    <div class="mt-6 pt-6 border-t border-slate-700/50 flex items-center justify-between">
                        <div class="flex -space-x-2">
                            <div class="w-6 h-6 rounded-full bg-slate-600 border border-slate-800"></div>
                            <div class="w-6 h-6 rounded-full bg-slate-700 border border-slate-800"></div>
                            <div class="w-6 h-6 rounded-full bg-slate-800 border border-slate-800 flex items-center justify-center text-[8px] font-bold text-slate-400">+22</div>
                        </div>
                        <a href="/trainer/classes/1" class="text-xs font-bold text-white hover:text-indigo-400 transition">Dashboard →</a>
                    </div>
                </div>

                <!-- Class Card 2 -->
                <div class="bg-slate-800 rounded-3xl border border-slate-700 p-6 hover:border-indigo-500/50 transition-all group shadow-xl">
                    <div class="flex justify-between items-start mb-6">
                        <div class="p-3 bg-slate-900 rounded-2xl border border-slate-700 group-hover:bg-indigo-600 transition-colors">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h14a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest bg-slate-900 px-2 py-1 rounded">18 Students</span>
                    </div>
                    <h4 class="text-lg font-bold text-white">UI/UX Design Master</h4>
                    <p class="text-xs text-slate-500 mt-1">Current Brief: <span class="text-indigo-400 font-medium italic underline">Portfolio Pro</span></p>
                    
                    <div class="mt-6 pt-6 border-t border-slate-700/50 flex items-center justify-between">
                        <div class="flex -space-x-2">
                            <div class="w-6 h-6 rounded-full bg-slate-600 border border-slate-800"></div>
                            <div class="w-6 h-6 rounded-full bg-slate-800 border border-slate-800 flex items-center justify-center text-[8px] font-bold text-slate-400">+16</div>
                        </div>
                        <a href="/trainer/classes/2" class="text-xs font-bold text-white hover:text-indigo-400 transition">Dashboard →</a>
                    </div>
                </div>
            </div>

            <!-- Recent Submissions Feed -->
            <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
                <div class="p-6 border-b border-slate-700 flex justify-between items-center bg-slate-900/20">
                    <h3 class="text-sm font-black text-white uppercase tracking-widest">Recent Submissions</h3>
                    <button class="text-indigo-400 text-[10px] font-black uppercase hover:underline">Grade All</button>
                </div>
                <div class="divide-y divide-slate-700/50">
                    <!-- Submission Row 1 -->
                    <div class="p-5 flex items-center justify-between hover:bg-slate-700/30 transition group">
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <img src="https://ui-avatars.com/api/?name=Karim+Alami&background=6366f1&color=fff" class="w-10 h-10 rounded-xl" alt="">
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-slate-800 rounded-full"></div>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-white tracking-tight">Karim Alami</p>
                                <p class="text-[10px] text-slate-500 font-medium">Brief: <span class="text-slate-300">Auth System</span> • FS JS 2025</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="text-[10px] text-slate-500 font-bold italic">2 hours ago</span>
                            <button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white text-[10px] font-black uppercase tracking-widest rounded-xl transition shadow-lg shadow-indigo-600/10">Evaluate</button>
                        </div>
                    </div>

                    <!-- Submission Row 2 -->
                    <div class="p-5 flex items-center justify-between hover:bg-slate-700/30 transition group">
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <img src="https://ui-avatars.com/api/?name=Sami+Benani&background=10b981&color=fff" class="w-10 h-10 rounded-xl" alt="">
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-slate-800 rounded-full"></div>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-white tracking-tight">Sami Benani</p>
                                <p class="text-[10px] text-slate-500 font-medium">Brief: <span class="text-slate-300">Portfolio Pro</span> • UI/UX Design</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="text-[10px] text-slate-500 font-bold italic">5 hours ago</span>
                            <button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white text-[10px] font-black uppercase tracking-widest rounded-xl transition shadow-lg shadow-indigo-600/10">Evaluate</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div class="space-y-6">
            <!-- Briefs Shortcuts -->
            <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
                <h3 class="text-[11px] font-black text-white uppercase tracking-[0.2em] mb-6 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    Briefs Toolkit
                </h3>
                <ul class="space-y-4">
                    <li>
                        <a href="/trainer/briefs/create" class="flex items-center justify-between p-3 bg-slate-900/50 border border-slate-700 rounded-2xl hover:border-indigo-500/50 transition group">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-lg bg-indigo-600/10 flex items-center justify-center text-indigo-500 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                </div>
                                <span class="text-xs font-bold text-slate-300">Create Brief</span>
                            </div>
                            <svg class="w-3 h-3 text-slate-600 group-hover:text-indigo-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </a>
                    </li>
                    <li>
                        <a href="/trainer/briefs" class="flex items-center justify-between p-3 bg-slate-900/50 border border-slate-700 rounded-2xl hover:border-indigo-500/50 transition group">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-lg bg-amber-600/10 flex items-center justify-center text-amber-500 group-hover:bg-amber-600 group-hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" /></svg>
                                </div>
                                <span class="text-xs font-bold text-slate-300">My Library</span>
                            </div>
                            <svg class="w-3 h-3 text-slate-600 group-hover:text-amber-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Sprint Timeline -->
            <div class="bg-indigo-600 rounded-3xl p-6 shadow-xl relative overflow-hidden group">
                <div class="relative z-10">
                    <h4 class="text-white font-black text-xs uppercase tracking-widest mb-4">Upcoming Deadline</h4>
                    <p class="text-2xl font-bold text-white tracking-tight leading-tight mb-2">Jan 22, 2026</p>
                    <p class="text-indigo-100 text-[10px] font-medium leading-relaxed mb-6 opacity-80 uppercase tracking-widest">End of Sprint #04: Database Master</p>
                    <div class="h-1.5 w-full bg-indigo-900 rounded-full overflow-hidden">
                        <div class="h-full bg-white w-3/4 shadow-[0_0_10px_rgba(255,255,255,0.5)]"></div>
                    </div>
                </div>
                <div class="absolute -right-6 -bottom-6 text-white/10 group-hover:text-white/20 transition-all transform group-hover:scale-110">
                    <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection