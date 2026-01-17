@extends('templates.layout')


@section('title', 'Manage Sprints')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">Sprints</h1>
            <p class="text-slate-400 mt-1 font-medium">Plan and monitor time-boxed development cycles for your promotions.</p>
        </div>
        <button class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-indigo-600/20 transition-all active:scale-95 flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
            <span>Create New Sprint</span>
        </button>
    </div>

    <!-- Filters & Summary -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <div class="lg:col-span-3 bg-slate-800 p-4 rounded-2xl border border-slate-700 flex flex-col sm:flex-row gap-4 justify-between items-center">
            <div class="relative w-full sm:w-96">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </span>
                <input type="text" placeholder="Search by name or order..." class="block w-full pl-10 pr-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white text-xs outline-none focus:ring-2 focus:ring-indigo-600 transition-all">
            </div>
            <div class="flex space-x-2">
                <select class="bg-slate-900 border border-slate-700 text-slate-400 text-[10px] font-black uppercase tracking-widest rounded-xl px-4 py-2.5 outline-none focus:ring-2 focus:ring-indigo-600">
                    <option>All Classes</option>
                    <option>Fullstack JS 2025</option>
                    <option>UI/UX Design 2024</option>
                </select>
            </div>
        </div>
        <div class="bg-slate-800 border border-slate-700 p-4 rounded-2xl flex items-center justify-between">
            <div>
                <p class="text-[10px] text-slate-500 font-black uppercase tracking-widest">Global Order</p>
                <p class="text-xl font-bold text-white tracking-tighter">03 Sprints</p>
            </div>
            <div class="w-10 h-10 bg-indigo-600/10 rounded-xl flex items-center justify-center border border-indigo-500/20">
                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
            </div>
        </div>
    </div>

    <!-- Sprints Table -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-6 py-5">Order</th>
                        <th class="px-6 py-5">Sprint Details</th>
                        <th class="px-6 py-5">Class / Promotion</th>
                        <th class="px-6 py-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    
                    <!-- Order: 1 -->
                    <tr class="hover:bg-slate-700/30 transition group">
                        <td class="px-6 py-6">
                            <span class="flex items-center justify-center w-8 h-8 bg-indigo-600/10 border border-indigo-500/20 rounded-lg text-indigo-400 font-black text-xs">01</span>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-indigo-600/20 rounded-xl flex items-center justify-center text-indigo-400 border border-indigo-500/10">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-white tracking-tight">Introduction to Logic</p>
                                    <p class="text-[10px] text-slate-500 font-medium">Jan 10 - Jan 24</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-xs text-slate-400 font-bold uppercase tracking-wider">
                            Fullstack JS 2025
                        </td>
                        <td class="px-6 py-6 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <button class="p-2 text-slate-500 hover:text-white transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></button>
                                <button class="p-2 text-slate-500 hover:text-red-400 transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                            <button class="text-slate-500 hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Order: 2 -->
                    <tr class="hover:bg-slate-700/30 transition group">
                        <td class="px-6 py-6">
                            <span class="flex items-center justify-center w-8 h-8 bg-slate-900 border border-slate-700 rounded-lg text-slate-500 font-black text-xs">02</span>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-slate-700/50 rounded-xl flex items-center justify-center text-slate-500 border border-slate-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-white tracking-tight">Database Architecture</p>
                                    <p class="text-[10px] text-slate-500 font-medium">Feb 01 - Feb 15</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-xs text-slate-400 font-bold uppercase tracking-wider">
                            Fullstack JS 2025
                        </td>
                        <td class="px-6 py-6 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <button class="p-2 text-slate-500 hover:text-white transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></button>
                                <button class="p-2 text-slate-500 hover:text-red-400 transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection