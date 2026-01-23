@extends('templates.layout')

@section('title', 'Create Brief')

@section('content')
<div class="max-w-4xl mx-auto py-4">
    <!-- Breadcrumb -->
    <a href="/trainer/briefs" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-xs mb-8 transition group">
        <svg class="w-3 h-3 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Briefs Library
    </a>



    <div class="bg-slate-800 rounded-3xl border border-slate-700 shadow-2xl overflow-hidden">
        <!-- Header -->
        <div class="p-8 border-b border-slate-700 bg-slate-800/50 flex items-center space-x-5">
            <div class="w-14 h-14 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg text-white">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-white tracking-tight">New Project Brief</h1>
                <p class="text-slate-400 text-sm font-medium mt-1 uppercase tracking-widest">Register a new pedagogical project</p>
            </div>
        </div>

        <form action="/trainer/briefs/store" method="POST" class="p-8 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Title -->
                <div class="space-y-2">
                    <label for="title" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Project Title</label>
                    <input type="text" id="title" name="title" required placeholder="e.g. Authentication System" 
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-600">
                </div>

                <!-- Dynamic Sprint Selection -->
                <div class="space-y-2">
                    <label for="sprint_id" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Assigned Sprint</label>
                    <div class="relative group">
                        <select id="sprint_id" name="sprint_id" class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white text-sm focus:ring-2 focus:ring-indigo-600 outline-none appearance-none cursor-pointer">
                            <option value="">No Sprint (Library Only)</option>
                            @foreach($sprints as $sprint)
                                <option value="{{ $sprint->getId() }}">
                                    {{ $sprint->getName() }} ({{ $sprint->getClassName() }})
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none text-slate-500 group-focus-within:text-indigo-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Duration -->
                <div class="space-y-2">
                    <label for="duration" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Total Duration (Hours)</label>
                    <input type="number" id="duration" name="duration" required placeholder="e.g. 48" 
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all font-bold">
                </div>

                <!-- Type Selection -->
                <div class="space-y-2">
                    <label for="type" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Collaboration Type</label>
                    <div class="relative group">
                        <select id="type" name="type" required class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white text-sm focus:ring-2 focus:ring-indigo-600 outline-none appearance-none">
                            <option value="INDIVIDUAL">INDIVIDUAL</option>
                            <option value="COLLECTIVE">COLLECTIVE</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none text-slate-500 group-focus-within:text-indigo-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <label for="description" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Project Description & Requirements</label>
                <textarea id="description" name="description" rows="6" required placeholder="Detailed outline of deliverables, user stories, and constraints..." 
                    class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all resize-none text-sm leading-relaxed"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end space-x-5 pt-6 border-t border-slate-700/50">
                <a href="/trainer/briefs" class="px-6 py-3 text-slate-500 font-bold hover:text-white transition-colors uppercase tracking-widest text-[10px]">Cancel</a>
                <button type="submit" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/20 transition-all active:scale-95 uppercase tracking-widest text-[11px]">
                    Register Brief
                </button>
            </div>
        </form>
    </div>
</div>
@endsection