@extends('templates.layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">System Overview</h1>
            <p class="text-slate-400 mt-1">Welcome back, Administrator. Here's what's happening today.</p>
        </div>
        <div class="flex items-center space-x-3">
            <button class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-2 rounded-xl border border-slate-700 font-semibold transition text-sm">
                Generate Report
            </button>
            <button class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-xl font-semibold shadow-lg transition text-sm">
                + New Class
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <span class="text-green-400 text-xs font-bold">+12%</span>
            </div>
            <p class="text-slate-400 text-sm font-medium">Total Users</p>
            <h3 class="text-2xl font-bold text-white mt-1">{{count($users)}}</h3>
        </div>

        <!-- Card 2 -->
        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                </div>
                <span class="text-slate-400 text-xs font-bold">Stable</span>
            </div>
            <p class="text-slate-400 text-sm font-medium">Active Classes</p>
            <h3 class="text-2xl font-bold text-white mt-1">{{count($classes )}}</h3>
        </div>

        <!-- Card 3 -->
        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                </div>
                <span class="text-red-400 text-xs font-bold">Action Needed</span>
            </div>
            <p class="text-slate-400 text-sm font-medium">Pending Briefs</p>
            <h3 class="text-2xl font-bold text-white mt-1">--</h3>
        </div>

        <!-- Card 4 -->
        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                </div>
                <span class="text-green-400 text-xs font-bold">+5%</span>
            </div>
            <p class="text-slate-400 text-sm font-medium">Completion Rate</p>
            <h3 class="text-2xl font-bold text-white mt-1">--</h3>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Activities Table -->
        <div class="lg:col-span-2 bg-slate-800 rounded-2xl border border-slate-700 overflow-hidden shadow-sm">
            <div class="p-6 border-b border-slate-700 flex justify-between items-center">
                <h3 class="text-lg font-bold text-white">Latest Enrollments</h3>
                <a href="/admin/users" class="text-indigo-400 text-xs font-bold hover:underline">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/50">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">User</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Role</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @foreach($users as $user)
                        <tr class="hover:bg-slate-700/30 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-[10px] font-bold text-white">
                                        --
                                    </div>
                                    <span class="text-sm font-semibold text-white">{{$user->getFullName()}}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-400">{{$user->getRole()->value}}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-green-500/10 text-green-400 text-[10px] font-bold uppercase tracking-wider rounded-md border border-green-500/20">Active</span>
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Tips/Actions Sidebar -->
        <div class="space-y-6">
            <div class="bg-indigo-600 p-6 rounded-2xl shadow-xl relative overflow-hidden">
                <div class="relative z-10">
                    <h4 class="text-white font-bold text-lg mb-2">Pro Tip!</h4>
                    <p class="text-indigo-100 text-sm leading-relaxed mb-4">You can now assign multiple trainers to a single class via the Classes panel.</p>
                    <a href="#" class="inline-block bg-white text-indigo-600 px-4 py-2 rounded-lg text-xs font-black shadow-lg">LEARN MORE</a>
                </div>
                <!-- Decorative SVG -->
                <svg class="absolute -right-4 -bottom-4 w-32 h-32 text-indigo-500/30" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
            </div>

            <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700">
                <h4 class="text-white font-bold mb-4">Quick Links</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="/users" class="flex items-center space-x-3 text-slate-400 hover:text-white transition group text-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-indigo-500"></span>
                            <span>Manage All Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="/classes" class="flex items-center space-x-3 text-slate-400 hover:text-white transition group text-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-indigo-500"></span>
                            <span>Configure Classes</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 text-slate-400 hover:text-white transition group text-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-indigo-500"></span>
                            <span>System Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection