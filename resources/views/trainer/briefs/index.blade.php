@extends('templates.layout')

@section('title', 'Briefs Library')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">Briefs Library</h1>
            <p class="text-slate-400 mt-1 font-medium text-sm">Manage and browse all project definitions in the system.</p>
        </div>
        <a href="/trainer/briefs/create" class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-indigo-600/20 transition-all active:scale-95 flex items-center space-x-2 w-fit text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
            <span>Create New Brief</span>
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-slate-800 p-4 rounded-2xl border border-slate-700 flex flex-col md:flex-row gap-4 justify-between items-center shadow-sm">
        <div class="relative w-full md:w-96">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500 pointer-events-none">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </span>
            <input type="text" placeholder="Search by title or description..." class="block w-full pl-10 pr-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white text-xs outline-none focus:ring-2 focus:ring-indigo-600 transition-all placeholder:text-slate-600 font-medium">
        </div>
        <div class="flex items-center space-x-2 w-full md:w-auto">
            <select class="bg-slate-900 border border-slate-700 text-slate-400 text-[10px] font-black uppercase tracking-widest rounded-xl px-4 py-2.5 outline-none focus:ring-2 focus:ring-indigo-600 flex-grow md:flex-grow-0">
                <option value="">All Types</option>
                <option value="INDIVIDUAL">INDIVIDUAL</option>
                <option value="COLLECTIVE">COLLECTIVE</option>
            </select>
        </div>
    </div>


    <!-- Brief Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        @forelse($briefs as $brief)
            <!-- Dynamic Brief Card -->
            <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden hover:border-indigo-500/50 transition-all group shadow-xl flex flex-col h-full">
                <div class="p-6 flex-grow">
                    <div class="flex justify-between items-start mb-4">
                        <span class="px-2.5 py-1 bg-indigo-500/10 text-indigo-400 text-[10px] font-black uppercase tracking-widest rounded-md border border-indigo-500/20">
                            {{ $brief->getType()->value }}
                        </span>
                        <div class="flex items-center text-slate-500 space-x-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span class="text-[10px] font-bold uppercase">{{ $brief->getDuration() }}H</span>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-white group-hover:text-indigo-400 transition-colors tracking-tight line-clamp-1">
                        {{ $brief->getTitle() }}
                    </h3>
                    <p class="text-slate-400 text-sm mt-3 line-clamp-3 leading-relaxed">
                        {{ $brief->getDescription() }}
                    </p>
                    
                    <div class="mt-6 flex items-center justify-between border-t border-slate-700/50 pt-5">
                        <div class="flex items-center space-x-2">
                            @if($brief->getSprintId())
                                <div class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></div>
                                <span class="text-[10px] text-slate-500 font-bold uppercase tracking-tighter">
                                    {{ $brief->getSprintName() ?? 'Sprint Assigned' }}
                                </span>
                            @else
                                <div class="w-1.5 h-1.5 rounded-full bg-slate-600"></div>
                                <span class="text-[10px] text-slate-600 font-bold uppercase tracking-tighter italic">Library Pool</span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="bg-slate-900/40 px-6 py-4 flex items-center justify-between border-t border-slate-700/50">
                    <div class="flex flex-col space-y-1">
                        <a href="/trainer/briefs/details?id={{ $brief->getId() }}" class="text-xs font-bold text-indigo-400 hover:text-indigo-300 transition flex items-center">
                            View Details
                            <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </a>
                        <!-- NEW: ASSIGN TO CLASS LINK -->
                        <a href="/trainer/briefs/assign?brief_id={{ $brief->getId() }}" class="text-[10px] font-black uppercase text-emerald-400 hover:text-emerald-300 transition-colors tracking-widest">
                            Assign to Class →
                        </a>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <!-- Manage Skills Link -->
                        <a href="/trainer/briefs/skills?id={{ $brief->getId() }}" class="p-2 text-slate-500 hover:text-indigo-400 transition" title="Manage Skills">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
                        </a>
                        <!-- Edit Link -->
                        <a href="/trainer/briefs/edit?id={{ $brief->getId() }}" class="p-2 text-slate-500 hover:text-indigo-400 transition" title="Edit Brief">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        </a>
                        <!-- Delete Link -->
                        <a href="/trainer/briefs/delete?id={{ $brief->getId() }}" 
                           onclick="return confirm('Permanently delete this project brief?')"
                           class="p-2 text-slate-500 hover:text-red-400 transition" title="Delete Brief">
                             <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <!-- Empty State -->
            <div class="col-span-full flex flex-col items-center justify-center py-20 bg-slate-800 rounded-3xl border border-slate-700 border-dashed">
                <div class="w-16 h-16 bg-slate-900 rounded-2xl flex items-center justify-center text-slate-700 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                </div>
                <p class="text-slate-400 font-medium">No project briefs found in the library.</p>
                <a href="/trainer/briefs/create" class="mt-4 text-indigo-400 font-bold hover:underline text-xs uppercase tracking-widest">Create Your First Brief →</a>
            </div>
        @endforelse

    </div>
</div>
@endsection