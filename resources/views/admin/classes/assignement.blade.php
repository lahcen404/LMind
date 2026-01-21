@extends('templates.layout')

@section('title', 'Select Class for Enrollment')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight text-balance">Assign Learners to Promotion</h1>
            <p class="text-slate-400 mt-1 font-medium italic">Step 1: Choose the class you want to manage students for.</p>
        </div>
        
        <div class="flex items-center space-x-2 bg-slate-800 p-2 rounded-2xl border border-slate-700 shadow-xl">
            <div class="px-4 py-2 text-center">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest leading-none mb-1">Active Promotions</p>
                <p class="text-xl font-bold text-indigo-400 tracking-tighter">{{ count($classes) }}</p>
            </div>
        </div>
    </div>

    <!-- Dynamic Class Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        @forelse($classes as $class)
            <!-- Class Card -->
            <div class="bg-slate-800 rounded-[2rem] border border-slate-700 p-8 hover:border-indigo-500/50 transition-all group shadow-xl flex flex-col justify-between">
                <div>
                    <div class="w-16 h-16 bg-indigo-600/10 rounded-2xl flex items-center justify-center text-indigo-500 border border-indigo-500/20 mb-8 group-hover:bg-indigo-600 group-hover:text-white transition-all shadow-inner">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-white tracking-tight leading-tight group-hover:text-indigo-400 transition-colors">
                        {{ $class->getName() }}
                    </h3>
                    <p class="text-sm text-slate-400 mt-2 font-medium italic">
                        Promotion: <span class="text-slate-200">{{ $class->getPromotion() }}</span>
                    </p>
                    
                    <div class="mt-6 flex items-center space-x-2">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse shadow-[0_0_8px_rgba(16,185,129,0.6)]"></span>
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Live Enrollment</span>
                    </div>
                </div>
                
                <div class="mt-10 pt-6 border-t border-slate-700/50 flex items-center justify-between">
                    <div class="text-xs">
                        <p class="text-slate-500 font-bold uppercase tracking-tighter mb-0.5">Trainer Assigned</p>
                        <p class="text-white font-bold">{{ $class->getTrainerName() }}</p>
                    </div>
                    
                    {{-- Updated route to lead to the actual assignment workspace --}}
                    <a href="/admin/classes/assignment?id={{ $class->getId() }}" 
                       class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white text-[11px] font-black uppercase tracking-widest rounded-xl transition-all active:scale-95 shadow-lg shadow-indigo-600/20">
                        Manage Roster
                    </a>
                </div>
            </div>
        @empty
            <!-- Empty State if no classes exist -->
            <div class="col-span-full py-24 text-center bg-slate-800/50 rounded-[3rem] border border-slate-700 border-dashed">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-900 rounded-full mb-6 text-slate-600">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                </div>
                <h3 class="text-xl font-bold text-white">No active promotions found</h3>
                <p class="text-slate-500 mt-2">You need to create a class before you can assign learners.</p>
                <a href="/admin/classes/create" class="mt-8 inline-block text-indigo-400 font-bold hover:underline text-sm uppercase tracking-widest">Create First Class →</a>
            </div>
        @endforelse

    </div>
</div>

<style>
    .group:hover {
        transform: translateY(-4px);
    }
</style>
@endsection