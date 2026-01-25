@extends('templates.layout')

@section('title', 'Pedagogical Debriefing')

@section('content')
<div class="space-y-10">
    <!-- Header -->
    <div class="text-balance">
        <h1 class="text-3xl font-bold text-white tracking-tight">Pedagogical Debriefing</h1>
        <p class="text-slate-400 mt-1 font-medium italic text-sm">Follow the steps below to evaluate student progress through standard HTML navigation.</p>
    </div>


    <!-- STEP 1: Select a Promotion -->
    <section class="space-y-4">
        <h2 class="text-xs font-black text-indigo-400 uppercase tracking-[0.2em] flex items-center px-1">
            <span class="w-6 h-6 rounded-full bg-indigo-600/20 flex items-center justify-center text-[10px] mr-3 border border-indigo-500/20">1</span>
            Select Promotion
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($classes as $class)
                @php 
                    $isActive = (isset($selectedClassId) && $selectedClassId === $class->getId()); 
                @endphp
                <a href="/trainer/evaluations?class_id={{ $class->getId() }}" 
                   class="p-6 rounded-2xl border transition-all group shadow-sm 
                   {{ $isActive ? 'bg-indigo-600 border-indigo-500 shadow-indigo-600/20' : 'bg-slate-800 border-slate-700 hover:border-slate-600' }}">
                    <p class="text-[10px] font-black uppercase tracking-widest {{ $isActive ? 'text-indigo-200' : 'text-slate-500' }}">Promotion</p>
                    <h3 class="text-lg font-bold mt-1 {{ $isActive ? 'text-white' : 'text-slate-200' }} tracking-tight">{{ $class->getName() }}</h3>
                    <p class="text-xs mt-1 {{ $isActive ? 'text-indigo-100' : 'text-slate-500' }} font-medium italic">{{ $class->getPromotion() }}</p>
                </a>
            @endforeach
        </div>
    </section>

    @if(isset($selectedClassId) && $selectedClassId)
    <!-- STEP 2: Choose Project Brief -->
    <section class="space-y-6 animate-in fade-in slide-in-from-bottom-2 duration-500">
        <h2 class="text-xs font-black text-emerald-400 uppercase tracking-[0.2em] flex items-center px-1">
            <span class="w-6 h-6 rounded-full bg-emerald-600/20 flex items-center justify-center text-[10px] mr-3 border border-emerald-500/20">2</span>
            Lock Target Project
        </h2>

        <!-- No-JS Form: Uses GET to reload the page with brief_id in the URL -->
        <form action="/trainer/evaluations" method="GET" class="flex flex-col md:flex-row gap-4">
            {{-- Keep the class context --}}
            <input type="hidden" name="class_id" value="{{ $selectedClassId }}">
            
            <div class="relative w-full md:w-96">
                <select name="brief_id" required class="w-full bg-slate-800 border border-slate-700 text-slate-300 text-[10px] font-black uppercase tracking-widest rounded-xl px-5 py-4 outline-none focus:ring-2 focus:ring-indigo-600 cursor-pointer appearance-none">
                    <option value="">Choose Project...</option>
                    @foreach($briefs as $brief)
                        <option value="{{ $brief->getId() }}" {{ (isset($selectedBriefId) && $selectedBriefId === $brief->getId()) ? 'selected' : '' }}>
                            {{ $brief->getTitle() }}
                        </option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none text-slate-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </div>
            </div>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white px-8 py-4 rounded-xl font-black text-[10px] uppercase tracking-widest transition-all active:scale-95 shadow-lg shadow-indigo-600/20">
                Confirm Selection
            </button>
        </form>

        @if(isset($selectedBriefId) && $selectedBriefId)
        <!-- STEP 3: Identify Learner (Visible only after Step 2) -->
        <div class="bg-slate-800 rounded-[2.5rem] border border-slate-700 overflow-hidden shadow-2xl animate-in zoom-in-95 duration-500">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/50 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">
                            <th class="px-8 py-5">Student Identity</th>
                            <th class="px-8 py-5">Communication</th>
                            <th class="px-8 py-5 text-right">Evaluation</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @forelse($learners as $learner)
                            <tr class="hover:bg-slate-700/30 transition group">
                                <td class="px-8 py-6">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 rounded-xl bg-indigo-600/20 flex items-center justify-center text-indigo-400 font-black border border-indigo-500/10 uppercase">
                                            {{ substr($learner->getFullName(), 0, 2) }}
                                        </div>
                                        <span class="text-sm font-bold text-white group-hover:text-indigo-400 transition-colors tracking-tight">{{ $learner->getFullName() }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="text-xs text-slate-500 font-medium">{{ $learner->getEmail() }}</span>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div class="flex items-center justify-end space-x-4">
                                        <a href="/trainer/evaluations/history?learner_id={{ $learner->getId() }}" class="text-[10px] font-black text-slate-500 hover:text-white uppercase tracking-widest transition-colors">History</a>
                                        
                                        {{-- Standard Anchor Link instead of JS button --}}
                                        <a href="/trainer/evaluations/create?brief_id={{ $selectedBriefId }}&learner_id={{ $learner->getId() }}" 
                                           class="inline-block px-6 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white text-[10px] font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-indigo-600/20">
                                            Assess Skillset
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-20 text-center text-slate-500 italic text-sm">
                                    No students enrolled in this promotion.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <!-- Brief Pending State -->
        <div class="py-16 text-center bg-slate-800/50 rounded-[2.5rem] border border-slate-700 border-dashed">
            <p class="text-slate-500 text-sm font-medium italic">Please select and "Confirm" a project brief above to load the student list.</p>
        </div>
        @endif
    </section>
    @else
    <!-- Class Pending State -->
    <div class="py-24 text-center bg-slate-800/30 rounded-[3rem] border border-slate-700 border-dashed">
        <div class="w-16 h-16 bg-slate-900 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-700">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
        </div>
        <p class="text-slate-500 font-medium italic">Please select a promotion above to begin the debriefing workflow.</p>
    </div>
    @endif
</div>
@endsection