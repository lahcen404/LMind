@extends('templates.layout')

@section('title', 'Add Skill Code')

@section('content')
<div class="max-w-3xl mx-auto py-4">
    <!-- Breadcrumb -->
    <a href="/admin/skills" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-xs mb-8 transition group">
        <svg class="w-3 h-3 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Framework Matrix
    </a>


    <!-- Form Container -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 shadow-2xl overflow-hidden">
        <!-- Header -->
        <div class="p-8 border-b border-slate-700 bg-slate-800/50">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/20 text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white tracking-tight">Add Skill to Framework</h1>
                    <p class="text-slate-400 text-sm font-medium mt-1">Register a new certification code in the competency matrix.</p>
                </div>
            </div>
        </div>

        <!-- Form Body -->
        <form action="/admin/skills/create" method="POST" class="p-8 space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Skill Code -->
                <div class="space-y-2">
                    <label for="code" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Skill Code</label>
                    <input type="text" id="code" name="code" required placeholder="e.g. C5" 
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-600 font-black text-center text-indigo-400">
                </div>

                <!-- Category Selector (Values match SkillCategory Enum) -->
                <div class="md:col-span-3 space-y-2">
                    <label for="category" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Matrix Category</label>
                    <div class="relative group">
                        <select id="category" name="category" required class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white text-sm focus:ring-2 focus:ring-indigo-600 outline-none transition-all appearance-none cursor-pointer">
                            <option value="" disabled selected>Select category...</option>
                            <option value="FRONTEND">Frontend Development</option>
                            <option value="BACKEND">Backend & Persistence</option>
                            <option value="DEVOPS">DevOps & Deployment</option>
                            <option value="SOFTSKILLS">Soft Skills</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none text-slate-500 group-focus-within:text-indigo-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description (Mapped to the 'description' attribute in DB/Service) -->
            <div class="space-y-2">
                <label for="description" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Competency Description</label>
                <textarea id="description" name="description" rows="4" required placeholder="e.g. Développer les composants d'accès aux données (SQL, SGBD, Modélisation...)" 
                    class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-600 resize-none font-medium text-sm"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end space-x-5 pt-6 border-t border-slate-700/50">
                <a href="/admin/skills" class="px-6 py-3 text-slate-500 font-bold hover:text-white transition-colors">Discard</a>
                <button type="submit" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/20 transition-all active:scale-95 uppercase tracking-widest text-[11px]">
                    Register Code
                </button>
            </div>
        </form>
    </div>
</div>
@endsection