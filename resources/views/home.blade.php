@extends('templates.layout')

@section('title', 'Empowering Digital Talent')

@section('content')
<div class="space-y-24 py-12">
    <!-- Hero Section -->
    <div class="text-center space-y-8 max-w-4xl mx-auto px-4">
        <div class="inline-flex items-center space-x-3 px-4 py-2 bg-indigo-600/10 border border-indigo-500/20 rounded-full text-indigo-400 mb-4">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
            </span>
            <span class="text-[10px] font-black uppercase tracking-widest">Next-Gen Learning Management</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter leading-tight">
            Master Your Skills with <span class="text-indigo-500">LMind.</span>
        </h1>
        <p class="text-xl text-slate-400 font-medium leading-relaxed max-w-2xl mx-auto">
            A comprehensive pedagogical ecosystem designed to track progress, manage project briefs, and evaluate competencies through structured sprints.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
            <a href="/login" class="w-full sm:w-auto px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-2xl shadow-indigo-600/20 transition-all active:scale-95 uppercase tracking-widest text-xs">
                Enter Dashboard
            </a>
            <a href="#features" class="w-full sm:w-auto px-10 py-4 bg-slate-800 hover:bg-slate-700 text-slate-300 font-black rounded-2xl border border-slate-700 transition-all text-xs uppercase tracking-widest">
                Learn More
            </a>
        </div>
    </div>

    <!-- The Method Section (Functional Scope 3.1 - 3.5) -->
    <div id="features" class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto px-4">
        <!-- Step 1: Structure -->
        <div class="bg-slate-800/50 p-8 rounded-3xl border border-slate-700 hover:border-indigo-500/30 transition group">
            <div class="w-14 h-14 bg-indigo-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg group-hover:scale-110 transition-transform">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-4 tracking-tight">Structured Sprints</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Organize training into chronological sprints. Define durations and manage class rosters with precision.</p>
        </div>

        <!-- Step 2: Briefs -->
        <div class="bg-slate-800/50 p-8 rounded-3xl border border-slate-700 hover:border-emerald-500/30 transition group">
            <div class="w-14 h-14 bg-emerald-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg group-hover:scale-110 transition-transform">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-4 tracking-tight">Skill-Driven Briefs</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Create individual or collective project briefs that target specific competencies from your skill matrix.</p>
        </div>

        <!-- Step 3: Debrief -->
        <div class="bg-slate-800/50 p-8 rounded-3xl border border-slate-700 hover:border-purple-500/30 transition group">
            <div class="w-14 h-14 bg-purple-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg group-hover:scale-110 transition-transform">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-4 tracking-tight">Pedagogical Debrief</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Evaluate student deliverables and assign mastery levels: Imitate, Adapt, or Transpose with detailed feedback.</p>
        </div>
    </div>

    <!-- Role Access Section (Requirement 2: System Actors) -->
    <div class="max-w-7xl mx-auto px-4 py-16 bg-slate-800/30 rounded-[3rem] border border-slate-700/50">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-white tracking-tight">Tailored Experience for Every Actor</h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Admin -->
            <div class="text-center space-y-4">
                <p class="text-[10px] font-black text-indigo-500 uppercase tracking-[0.2em]">Management</p>
                <h4 class="text-xl font-bold text-white">Administrators</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Full control over the system hierarchy, user roles, classes, and the global skill matrix.</p>
            </div>
            <!-- Trainer -->
            <div class="text-center space-y-4 border-y lg:border-y-0 lg:border-x border-slate-700/50 py-8 lg:py-0 lg:px-8">
                <p class="text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em]">Instruction</p>
                <h4 class="text-xl font-bold text-white">Trainers</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Design project briefs, manage sprint timelines, and conduct pedagogical debriefings for their assigned classes.</p>
            </div>
            <!-- Learner -->
            <div class="text-center space-y-4">
                <p class="text-[10px] font-black text-purple-500 uppercase tracking-[0.2em]">Growth</p>
                <h4 class="text-xl font-bold text-white">Learners</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Access project briefs, submit deliverables, and track real-time progress through a visual skill matrix.</p>
            </div>
        </div>
    </div>

    <!-- Final Call to Action -->
    <div class="max-w-5xl mx-auto text-center px-4">
        <div class="bg-indigo-600 rounded-[3rem] p-12 md:p-20 relative overflow-hidden shadow-2xl">
            <div class="relative z-10 space-y-6">
                <h2 class="text-3xl md:text-5xl font-black text-white tracking-tighter">Ready to accelerate digital excellence?</h2>
                <p class="text-indigo-100 text-lg font-medium opacity-80">Log in now to access your personalized learning environment.</p>
                <div class="pt-4">
                    <a href="/login" class="bg-white text-indigo-600 px-12 py-5 rounded-2xl font-black shadow-xl hover:bg-slate-100 transition-all inline-block uppercase tracking-widest text-sm">
                        Start Your Journey
                    </a>
                </div>
            </div>
            <!-- Decorative Elements -->
            <svg class="absolute -right-20 -bottom-20 w-80 h-80 text-white/10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
            <div class="absolute top-10 left-10 w-32 h-32 bg-white/5 rounded-full blur-3xl"></div>
        </div>
    </div>
</div>
@endsection