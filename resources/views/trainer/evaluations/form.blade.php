@extends('templates.layout')

@section('title', 'Pedagogical Debriefing')

@section('content')
<div class="max-w-5xl mx-auto space-y-8">
    <!-- Header: Evaluation Context -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <a href="/trainer/evaluations" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-xs mb-4 transition group">
                <svg class="w-3.5 h-3.5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Submissions
            </a>
            <h1 class="text-3xl font-bold text-white tracking-tight">Pedagogical Debriefing</h1>
            <p class="text-slate-400 mt-1 font-medium">
                Evaluating <span class="text-white font-bold">Sarah Green</span> 
                <span class="mx-2 text-slate-700">|</span> 
                Brief: <span class="text-indigo-400 font-bold italic text-sm">Authentication System</span>
            </p>
        </div>
        
        <!-- Deliverable Link (Livrable) -->
        <a href="#" target="_blank" class="bg-slate-800 hover:bg-slate-700 text-slate-300 px-5 py-3 rounded-2xl border border-slate-700 font-bold text-xs transition flex items-center space-x-2 shadow-xl">
            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
            <span>Review Submission (Livrable)</span>
        </a>
    </div>

    <!-- Main Evaluation Form -->
    <form action="/evaluations/store" method="POST" class="space-y-6">
        <!-- Hidden Foreign Keys (SQL Table: evaluations) -->
        <input type="hidden" name="learner_id" value="5">
        <input type="hidden" name="brief_id" value="142">

        <!-- Skills Loop (Retrieved from brief_skills table) -->
        <div class="space-y-6">
            
            <!-- Skill Assessment Card 1 -->
            <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl transition-all hover:border-indigo-500/30">
                <div class="p-6 bg-slate-900/40 border-b border-slate-700 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <span class="flex items-center justify-center w-10 h-10 bg-indigo-600/10 border border-indigo-500/20 rounded-xl text-indigo-400 font-black text-sm">C4</span>
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Créer une base de données</h3>
                    </div>
                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Required Competency</span>
                </div>
                
                <div class="p-8 grid grid-cols-1 lg:grid-cols-2 gap-10">
                    <!-- Proficiency Selection (mastery_level ENUM) -->
                    <div class="space-y-4">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Assign Mastery Level</p>
                        <div class="grid grid-cols-3 gap-3">
                            <!-- IMITATE -->
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="skills[4][level]" value="IMITATE" class="peer hidden" required>
                                <div class="p-4 bg-slate-900 border-2 border-slate-700 rounded-2xl text-center transition-all peer-checked:border-indigo-500 peer-checked:bg-indigo-500/10 group-hover:border-slate-500">
                                    <p class="text-[10px] font-black text-slate-500 peer-checked:text-indigo-400 uppercase tracking-tighter">Imitate</p>
                                </div>
                            </label>
                            <!-- ADAPT -->
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="skills[4][level]" value="ADAPT" class="peer hidden">
                                <div class="p-4 bg-slate-900 border-2 border-slate-700 rounded-2xl text-center transition-all peer-checked:border-emerald-500 peer-checked:bg-emerald-500/10 group-hover:border-slate-500">
                                    <p class="text-[10px] font-black text-slate-500 peer-checked:text-emerald-400 uppercase tracking-tighter">Adapt</p>
                                </div>
                            </label>
                            <!-- TRANSPOSE -->
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="skills[4][level]" value="TRANSPOSE" class="peer hidden">
                                <div class="p-4 bg-slate-900 border-2 border-slate-700 rounded-2xl text-center transition-all peer-checked:border-purple-500 peer-checked:bg-purple-500/10 group-hover:border-slate-500">
                                    <p class="text-[10px] font-black text-slate-500 peer-checked:text-purple-400 uppercase tracking-tighter">Transpose</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Feedback Comment (SQL: comment TEXT) -->
                    <div class="space-y-4">
                        <label for="comment_4" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Pedagogical Comment</label>
                        <textarea id="comment_4" name="skills[4][comment]" rows="3" placeholder="Provide constructive feedback on technical execution..." 
                            class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white text-sm focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-600 resize-none font-medium"></textarea>
                    </div>
                </div>
            </div>

            <!-- Skill Assessment Card 2 -->
            <div class="bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl transition-all hover:border-indigo-500/30">
                <div class="p-6 bg-slate-900/40 border-b border-slate-700 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <span class="flex items-center justify-center w-10 h-10 bg-indigo-600/10 border border-indigo-500/20 rounded-xl text-indigo-400 font-black text-sm">C6</span>
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Développer la partie backend</h3>
                    </div>
                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Required Competency</span>
                </div>
                
                <div class="p-8 grid grid-cols-1 lg:grid-cols-2 gap-10">
                    <div class="space-y-4">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Assign Mastery Level</p>
                        <div class="grid grid-cols-3 gap-3">
                            <label class="cursor-pointer group">
                                <input type="radio" name="skills[6][level]" value="IMITATE" class="peer hidden" required>
                                <div class="p-4 bg-slate-900 border-2 border-slate-700 rounded-2xl text-center transition-all peer-checked:border-indigo-500 peer-checked:bg-indigo-500/10 group-hover:border-slate-500">
                                    <p class="text-[10px] font-black text-slate-500 peer-checked:text-indigo-400 uppercase tracking-tighter">Imitate</p>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="skills[6][level]" value="ADAPT" class="peer hidden">
                                <div class="p-4 bg-slate-900 border-2 border-slate-700 rounded-2xl text-center transition-all peer-checked:border-emerald-500 peer-checked:bg-emerald-500/10 group-hover:border-slate-500">
                                    <p class="text-[10px] font-black text-slate-500 peer-checked:text-emerald-400 uppercase tracking-tighter">Adapt</p>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="skills[6][level]" value="TRANSPOSE" class="peer hidden">
                                <div class="p-4 bg-slate-900 border-2 border-slate-700 rounded-2xl text-center transition-all peer-checked:border-purple-500 peer-checked:bg-purple-500/10 group-hover:border-slate-500">
                                    <p class="text-[10px] font-black text-slate-500 peer-checked:text-purple-400 uppercase tracking-tighter">Transpose</p>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <label for="comment_6" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Pedagogical Comment</label>
                        <textarea id="comment_6" name="skills[6][comment]" rows="3" placeholder="Provide constructive feedback..." 
                            class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white text-sm focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-600 resize-none font-medium"></textarea>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Actions -->
        <div class="bg-slate-800 p-8 rounded-3xl border border-slate-700 flex flex-col md:flex-row items-center justify-between gap-6 shadow-2xl">
            <div class="flex items-start space-x-4 max-w-lg">
                <div class="bg-indigo-600/20 p-2.5 rounded-xl border border-indigo-500/10 mt-1">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <p class="text-[11px] text-slate-500 leading-relaxed font-medium uppercase tracking-tight">
                    By submitting this debriefing, you are registering final mastery levels for this learner. This action will update the global competency matrix and record historical pedagogical feedback.
                </p>
            </div>
            <div class="flex items-center space-x-4 w-full md:w-auto">
                <button type="button" class="px-6 py-3 text-slate-500 font-bold hover:text-white transition-colors text-xs uppercase tracking-widest">Discard</button>
                <button type="submit" class="flex-grow md:flex-grow-0 px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/30 transition-all active:scale-95 uppercase tracking-widest text-[11px]">
                    Finalize Debriefing
                </button>
            </div>
        </div>
    </form>
</div>
@endsection