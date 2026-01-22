@extends('templates.layout')

@section('title', 'Skills Inventory')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">Skills Inventory</h1>
            <p class="text-slate-400 mt-1 font-medium">Global framework of competency codes and technical descriptions.</p>
        </div>
        <div class="flex items-center space-x-3">
            <button class="bg-slate-800 hover:bg-slate-700 text-white px-5 py-2.5 rounded-xl border border-slate-700 font-bold text-xs transition uppercase tracking-widest">
                Export Matrix
            </button>
            <a href="/admin/skills/create" class="bg-indigo-600 hover:bg-indigo-500 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg transition text-xs uppercase tracking-widest flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                <span>New Competency</span>
            </a>
        </div>
    </div>

    <!-- Stats Summary -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-3">Total Skills</p>
            <h3 class="text-3xl font-black text-white tracking-tighter">{{ count($skills) }}</h3>
        </div>
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl opacity-60">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-3">Evaluation</p>
            <h3 class="text-2xl font-black text-slate-400 tracking-tight">Standard</h3>
        </div>
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl opacity-60">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-3">Sync Status</p>
            <h3 class="text-3xl font-black text-emerald-500 tracking-tighter">Live</h3>
        </div>
        <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl opacity-60">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-3">Last Update</p>
            <h3 class="text-3xl font-black text-white tracking-tighter">Today</h3>
        </div>
    </div>


    <!-- Simple Competency Table -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-8 py-5 w-24">Code</th>
                        <th class="px-8 py-5">Competency Details</th>
                        <th class="px-8 py-5">Category</th>
                        <th class="px-8 py-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($skills as $skill)
                        <tr class="hover:bg-slate-700/30 transition group">
                            <td class="px-8 py-6">
                                <span class="text-sm font-black text-indigo-400">{{ $skill->getCode() }}</span>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-sm font-bold text-white group-hover:text-indigo-400 transition-colors tracking-tight">
                                    {{ $skill->getDescription() }}
                                </p>
                            </td>
                            <td class="px-8 py-6">
                                <span class="px-2.5 py-1 bg-slate-900 border border-slate-700 rounded-lg text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                    {{ $skill->getCategory()->value }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="/admin/skills/edit?id={{ $skill->getId() }}" class="p-2 text-slate-500 hover:text-indigo-400 transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                    </a>
                                    <a href="/admin/skills/delete?id={{ $skill->getId() }}" 
                                       onclick="return confirm('Are you sure you want to delete this skill?')"
                                       class="p-2 text-slate-500 hover:text-red-500 transition-colors" title="Delete">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-20 text-center text-slate-500 italic text-sm">
                                No competencies have been added to the framework yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Table Footer -->
        <div class="p-6 bg-slate-900/30 border-t border-slate-700/50">
            <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest italic text-center">
                Synchronized with Professional Certification Standards
            </p>
        </div>
    </div>
</div>
@endsection