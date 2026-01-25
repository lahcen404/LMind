@extends('templates.layout')

@section('title', $brief->getTitle())

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    <!-- Header with Back Link -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <a href="/trainer/briefs" class="text-indigo-400 hover:underline text-xs font-bold mb-2 inline-block">← Back to Briefs Library</a>
            <h1 class="text-4xl font-bold text-white tracking-tight">{{ $brief->getTitle() }}</h1>
        </div>
    </div>

    <!-- Main Brief Details Card -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 shadow-2xl overflow-hidden">
        <!-- Type Badge and Duration -->
        <div class="p-8 bg-slate-900/40 border-b border-slate-700 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <span class="px-3.5 py-1.5 bg-indigo-500/10 text-indigo-400 text-[10px] font-black uppercase tracking-widest rounded-md border border-indigo-500/20">
                    {{ $brief->getType()->value }}
                </span>
                <div class="flex items-center text-slate-400 space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span class="text-sm font-bold">{{ $brief->getDuration() }} Hours</span>
                </div>
            </div>
            @if($brief->getSprintId())
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></div>
                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">
                        {{ $brief->getSprintName() ?? 'Sprint Assigned' }}
                    </span>
                </div>
            @endif
        </div>

        <!-- Description Section -->
        <div class="p-8 border-b border-slate-700">
            <h2 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Description</h2>
            <p class="text-slate-300 leading-relaxed text-base">
                {{ $brief->getDescription() }}
            </p>
        </div>

        <!-- Linked Skills Section -->
        <div class="p-8 border-b border-slate-700">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xs font-black text-slate-400 uppercase tracking-widest">Required Competencies</h2>
                <span class="text-[10px] text-slate-500 font-bold bg-slate-900/50 px-2.5 py-1 rounded-lg">{{ count($linkedSkills) }} Skills</span>
            </div>
            @if(count($linkedSkills) > 0)
                <div class="space-y-2">
                    @foreach($linkedSkills as $skill)
                        <div class="flex items-center space-x-4 p-4 bg-slate-900/40 rounded-xl border border-slate-700/50 hover:border-indigo-500/30 transition">
                            <div class="w-2 h-2 rounded-full bg-emerald-500 flex-shrink-0"></div>
                            <div class="flex-grow">
                                <div class="flex items-center space-x-2">
                                    <span class="text-xs font-black text-indigo-400 bg-indigo-500/10 px-2 py-1 rounded border border-indigo-500/20">{{ $skill->getCode() }}</span>
                                    <span class="text-sm font-semibold text-slate-200">{{ $skill->getDescription() }}</span>
                                </div>
                                <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-1">{{ $skill->getCategory()->value }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-slate-500 italic text-sm">No competencies linked yet.</p>
            @endif
        </div>

        <!-- Action Buttons -->
        <div class="p-8 bg-slate-900/40 border-t border-slate-700 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center space-x-2 text-[10px] text-slate-500 font-medium uppercase tracking-tight">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Use the buttons below to manage this project brief</span>
            </div>
            <div class="flex items-center space-x-3 w-full md:w-auto">
                <a href="/trainer/briefs/skills?id={{ $brief->getId() }}" class="flex-1 md:flex-none px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all active:scale-95 text-sm flex items-center justify-center space-x-2 shadow-lg shadow-indigo-600/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
                    <span>Manage Skills</span>
                </a>
                <a href="/trainer/briefs/edit?id={{ $brief->getId() }}" class="flex-1 md:flex-none px-6 py-3 bg-slate-700 hover:bg-slate-600 text-white font-bold rounded-xl transition-all active:scale-95 text-sm flex items-center justify-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                    <span>Edit Brief</span>
                </a>
                <a href="/trainer/briefs/delete?id={{ $brief->getId() }}" 
                   onclick="return confirm('Permanently delete this project brief and all its associations?')"
                   class="flex-1 md:flex-none px-6 py-3 bg-red-600/20 hover:bg-red-600/30 text-red-400 font-bold rounded-xl transition-all active:scale-95 text-sm flex items-center justify-center space-x-2 border border-red-600/30">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    <span>Delete</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection