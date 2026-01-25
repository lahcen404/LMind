@extends('templates.layout')

@section('title', 'Assign Project to Class')

@section('content')
<div class="max-w-5xl mx-auto space-y-10">
    <!-- Breadcrumb & Header -->
    <div>
        <a href="/trainer/briefs" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-xs mb-4 transition group">
            <svg class="w-3 h-3 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Project Library
        </a>
        <h1 class="text-3xl font-bold text-white tracking-tight">Distribute Project</h1>
        <p class="text-slate-400 mt-1 font-medium italic">
            Assigning: <span class="text-indigo-400 font-bold underline">{{ $brief->getTitle() }}</span>
        </p>
    </div>


    <!-- STEP 1: Select Target Promotion -->
    <section class="space-y-4">
        <h2 class="text-xs font-black text-indigo-400 uppercase tracking-[0.2em] flex items-center px-1">
            <span class="w-6 h-6 rounded-full bg-indigo-600/20 flex items-center justify-center text-[10px] mr-3 border border-indigo-500/20">1</span>
            Select Target Promotion
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($classes as $class)
                @php 
                    $isActive = (isset($selectedClassId) && $selectedClassId === $class->getId()); 
                @endphp
                <a href="/trainer/briefs/assign?brief_id={{ $brief->getId() }}&class_id={{ $class->getId() }}" 
                   class="p-6 rounded-2xl border transition-all group shadow-sm 
                   {{ $isActive ? 'bg-indigo-600 border-indigo-500 shadow-indigo-600/20' : 'bg-slate-800 border-slate-700 hover:border-slate-600' }}">
                    <p class="text-[10px] font-black uppercase tracking-widest {{ $isActive ? 'text-indigo-200' : 'text-slate-500' }}">Promotion</p>
                    <h3 class="text-lg font-bold mt-1 {{ $isActive ? 'text-white' : 'text-slate-200' }}">{{ $class->getName() }}</h3>
                    <p class="text-xs mt-1 {{ $isActive ? 'text-indigo-100' : 'text-slate-500' }} italic font-medium">{{ $class->getPromotion() }}</p>
                </a>
            @endforeach
        </div>
    </section>

    @if(isset($selectedClassId) && $selectedClassId)
    <!-- STEP 2: Configure Delivery Sprint -->
    <section class="animate-in fade-in slide-in-from-bottom-4 duration-500">
        <form action="/trainer/briefs/assign/store" method="POST" class="bg-slate-800 rounded-[2.5rem] border border-slate-700 shadow-2xl overflow-hidden">
            <input type="hidden" name="brief_id" value="{{ $brief->getId() }}">
            
            <div class="p-8 border-b border-slate-700 bg-slate-900/20 flex items-center justify-between">
                <h2 class="text-xs font-black text-emerald-400 uppercase tracking-[0.2em] flex items-center">
                    <span class="w-6 h-6 rounded-full bg-emerald-600/20 flex items-center justify-center text-[10px] mr-3 border border-emerald-500/20">2</span>
                    Select Distribution Sprint
                </h2>
                <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Publishing Workspace</span>
            </div>

            <div class="p-10 space-y-6">
                <div class="space-y-3">
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">Target Cycle for this promotion</label>
                    <div class="relative group">
                        <select name="sprint_id" required class="w-full bg-slate-900 border border-slate-700 text-white text-sm rounded-2xl px-6 py-5 outline-none focus:ring-2 focus:ring-indigo-600 appearance-none cursor-pointer">
                            <option value="">Choose a sprint cycle...</option>
                            @foreach($sprints as $sprint)
                                <option value="{{ $sprint->getId() }}">
                                    Sprint #{{ $sprint->getOrderSprint() }}: {{ $sprint->getName() }} ({{ $sprint->getDuration() }} Days)
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-6 pointer-events-none text-slate-500 group-focus-within:text-indigo-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </div>
                    <p class="text-[10px] text-slate-500 italic ml-1">Assigning this brief will make it visible to all students in the selected class.</p>
                </div>
            </div>

            <div class="p-10 bg-slate-900/40 border-t border-slate-700 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-start space-x-3 max-w-sm">
                    <div class="bg-indigo-600/20 p-2 rounded-lg mt-0.5">
                        <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <p class="text-[10px] text-slate-500 leading-relaxed font-medium uppercase tracking-tight">
                        Confirmation will immediately publish this technical brief. Students can begin tracking requirements and preparing submissions.
                    </p>
                </div>
                <div class="flex items-center space-x-4 w-full md:w-auto">
                    <a href="/trainer/briefs" class="text-slate-500 hover:text-white font-bold text-xs uppercase tracking-widest transition-colors">Discard</a>
                    <button type="submit" class="flex-grow md:flex-grow-0 px-12 py-5 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/30 transition-all active:scale-95 uppercase tracking-widest text-[11px]">
                        Publish to Class
                    </button>
                </div>
            </div>
        </form>
    </section>
    @else
        <!-- Step 1 Pending State -->
        <div class="py-24 text-center bg-slate-800/30 rounded-[3rem] border border-slate-700 border-dashed">
            <div class="w-16 h-16 bg-slate-900 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
            </div>
            <p class="text-slate-500 font-medium italic">Please select a target promotion above to configure the delivery timeline.</p>
        </div>
    @endif
</div>
@endsection