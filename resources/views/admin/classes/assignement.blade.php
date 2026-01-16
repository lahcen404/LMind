@extends('templates.layout')

@section('title', 'Manage Assignments')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">Brief Assignments</h1>
            <p class="text-slate-400 mt-1">Distribute project briefs to classes and set delivery deadlines.</p>
        </div>
        <button class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-indigo-600/20 transition-all active:scale-95 flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
            <span>Assign New Brief</span>
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Column: Assignment Form (Static) -->
        <div class="lg:col-span-1">
            <div class="bg-slate-800 rounded-2xl border border-slate-700 shadow-xl overflow-hidden sticky top-8">
                <div class="p-6 border-b border-slate-700 bg-slate-800/50">
                    <h2 class="text-lg font-bold text-white">Quick Assign</h2>
                    <p class="text-xs text-slate-500 mt-1 font-medium">Link a brief to an entire promotion.</p>
                </div>
                <form class="p-6 space-y-5" onsubmit="return false;">
                    <!-- Select Brief -->
                    <div class="space-y-2">
                        <label class="block text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Select Brief</label>
                        <select class="block w-full px-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-white text-sm focus:ring-2 focus:ring-indigo-600 outline-none transition-all appearance-none cursor-pointer">
                            <option value="" disabled selected>Choose a project...</option>
                            <option>Authentication System (PHP)</option>
                            <option>E-Commerce UI Kit (Figma)</option>
                            <option>Real-time Chat (Node.js)</option>
                        </select>
                    </div>

                    <!-- Select Class -->
                    <div class="space-y-2">
                        <label class="block text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Target Class</label>
                        <select class="block w-full px-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-white text-sm focus:ring-2 focus:ring-indigo-600 outline-none transition-all appearance-none cursor-pointer">
                            <option value="" disabled selected>Choose a promotion...</option>
                            <option>Fullstack JS 2025</option>
                            <option>UI/UX Design 2024</option>
                            <option>Data Science Batch A</option>
                        </select>
                    </div>

                    <!-- Deadline -->
                    <div class="space-y-2">
                        <label class="block text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Delivery Deadline</label>
                        <input type="date" class="block w-full px-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-white text-sm focus:ring-2 focus:ring-indigo-600 outline-none transition-all">
                    </div>

                    <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-xl shadow-lg transition-all active:scale-95 uppercase tracking-widest text-xs mt-2">
                        Confirm Assignment
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Column: Recent Assignments List -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Filters -->
            <div class="bg-slate-800 p-4 rounded-2xl border border-slate-700 flex flex-col sm:flex-row gap-4 justify-between items-center">
                <div class="relative w-full sm:w-64">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </span>
                    <input type="text" placeholder="Search assignments..." class="block w-full pl-9 pr-4 py-2 bg-slate-900 border border-slate-700 rounded-xl text-white text-xs outline-none focus:ring-1 focus:ring-indigo-500">
                </div>
                <div class="flex space-x-2">
                    <span class="px-3 py-1 bg-slate-900 border border-indigo-500/30 text-indigo-400 text-[10px] font-bold uppercase rounded-lg">All</span>
                    <span class="px-3 py-1 bg-slate-900 border border-slate-700 text-slate-500 text-[10px] font-bold uppercase rounded-lg">Pending</span>
                    <span class="px-3 py-1 bg-slate-900 border border-slate-700 text-slate-500 text-[10px] font-bold uppercase rounded-lg">Active</span>
                </div>
            </div>

            <!-- Table of active assignments -->
            <div class="bg-slate-800 rounded-2xl border border-slate-700 overflow-hidden shadow-xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-900/50 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">
                                <th class="px-6 py-4">Assigned Brief</th>
                                <th class="px-6 py-4">Assigned To</th>
                                <th class="px-6 py-4">Deadline</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700/50">
                            <!-- Fake Row 1 -->
                            <tr class="hover:bg-slate-700/30 transition group">
                                <td class="px-6 py-5">
                                    <div>
                                        <p class="text-sm font-bold text-white">Authentication System</p>
                                        <p class="text-[10px] text-indigo-400 font-bold uppercase tracking-wider mt-0.5">PHP / PostgreSQL</p>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs text-slate-300 font-semibold">Fullstack JS 2025</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex flex-col">
                                        <span class="text-xs text-slate-300 font-medium">Jan 28, 2026</span>
                                        <span class="text-[10px] text-red-400 font-bold mt-0.5">12 Days left</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <button class="p-2 text-slate-500 hover:text-white transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </td>
                            </tr>
                            <!-- Fake Row 2 -->
                            <tr class="hover:bg-slate-700/30 transition group">
                                <td class="px-6 py-5">
                                    <div>
                                        <p class="text-sm font-bold text-white">E-Commerce UI Kit</p>
                                        <p class="text-[10px] text-indigo-400 font-bold uppercase tracking-wider mt-0.5">Figma / UX</p>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs text-slate-300 font-semibold">UI/UX Design 2024</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex flex-col">
                                        <span class="text-xs text-slate-300 font-medium">Feb 05, 2026</span>
                                        <span class="text-[10px] text-slate-500 font-bold mt-0.5">Upcoming</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <button class="p-2 text-slate-500 hover:text-white transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection