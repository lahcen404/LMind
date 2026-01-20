@extends('templates.layout')

@section('title', 'Manage Users')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">User Management</h1>
            <p class="text-slate-400 mt-1 font-medium">Manage accounts, permissions, and roles for the entire LMind platform.</p>
        </div>
        <a href="/admin/users/create" class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-indigo-600/20 transition-all active:scale-95 flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" /></svg>
            <span>Add New User</span>
        </a>
    </div>

    <!-- Quick Stats & Role Filters -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-slate-800 p-5 rounded-2xl border border-slate-700 shadow-sm hover:border-indigo-500/50 transition cursor-pointer group">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1 group-hover:text-indigo-400">Total Personnel</p>
            <h3 class="text-2xl font-bold text-white">{{@count($users)}}</h3>
        </div>
        <div class="bg-slate-800 p-5 rounded-2xl border border-slate-700 shadow-sm hover:border-purple-500/50 transition cursor-pointer group">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1 group-hover:text-purple-400">Trainers</p>
            <h3 class="text-2xl font-bold text-white">12</h3>
        </div>
        <div class="bg-slate-800 p-5 rounded-2xl border border-slate-700 shadow-sm hover:border-emerald-500/50 transition cursor-pointer group">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1 group-hover:text-emerald-400">Students</p>
            <h3 class="text-2xl font-bold text-white">124</h3>
        </div>
        <div class="bg-slate-800 p-5 rounded-2xl border border-slate-700 shadow-sm hover:border-amber-500/50 transition cursor-pointer group">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1 group-hover:text-amber-400">Admins</p>
            <h3 class="text-2xl font-bold text-white">06</h3>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="bg-slate-800 p-4 rounded-2xl border border-slate-700 flex flex-col md:flex-row gap-4 justify-between items-center">
        <div class="relative w-full md:w-96">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500 pointer-events-none">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </span>
            <input type="text" placeholder="Search by name, email or ID..." class="block w-full pl-10 pr-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white text-xs outline-none focus:ring-2 focus:ring-indigo-600 transition-all placeholder:text-slate-600 font-medium">
        </div>
        <div class="flex items-center space-x-2 w-full md:w-auto">
            <select class="bg-slate-900 border border-slate-700 text-slate-400 text-[10px] font-black uppercase tracking-widest rounded-xl px-4 py-2.5 outline-none focus:ring-2 focus:ring-indigo-600 flex-grow md:flex-grow-0">
                <option>Sort by: Newest</option>
                <option>Sort by: Name (A-Z)</option>
                <option>Sort by: Role</option>
            </select>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-6 py-5">Full Name & ID</th>
                        <th class="px-6 py-5">Email Address</th>
                        <th class="px-6 py-5">System Role</th>
                        <th class="px-6 py-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    <!-- Static Admin User -->
                     @foreach($users as $user)
                    <tr class="hover:bg-slate-700/30 transition group">
                        <td class="px-6 py-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-500 font-black text-xs">A</div>
                                <div>
                                    <p class="text-sm font-bold text-white tracking-tight">{{$user->getFullName()}}</p>
                                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-tighter">ID: #{{$user->getId()}}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-sm text-slate-300 font-medium">{{$user->getEmail()}}</td>
                        <td class="px-6 py-6">
                            <span class="px-2.5 py-1 bg-amber-500/10 text-amber-500 text-[10px] font-black uppercase tracking-widest rounded-md border border-amber-500/20">{{$user->getRole()->value}}</span>
                        </td>
                        <td class="px-6 py-6 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="/admin/users/edit?id={{ $user->getId() }}" class="p-2 text-slate-500 hover:text-indigo-400 transition-colors" title="Update User">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                </a>
                                <a href="/admin/users/delete?id={{ $user->getId() }}"
                                onclick="return confirm('Are you sure to Delete User !!??')"
                                class="p-2 text-slate-500 hover:text-red-400 transition-colors" title="Delete User">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

        <!-- Pagination -->
        <div class="p-6 bg-slate-900/30 border-t border-slate-700/50 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-[11px] text-slate-500 font-bold uppercase tracking-widest italic">Showing 3 of 142 registered users</p>
            <div class="flex items-center space-x-2">
                <button class="px-4 py-2 bg-slate-900 border border-slate-700 rounded-xl text-slate-500 text-[10px] font-black uppercase disabled:opacity-50 cursor-not-allowed">Previous</button>
                <button class="px-4 py-2 bg-slate-900 border border-slate-700 rounded-xl text-indigo-400 text-[10px] font-black uppercase hover:border-indigo-500 transition">Next Page</button>
            </div>
        </div>
    </div>
</div>
@endsection