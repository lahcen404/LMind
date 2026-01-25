@extends('templates.layout')

@section('title', 'Link Skills')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <a href="/trainer/briefs/details?id={{ $brief->getId() }}" class="text-indigo-400 hover:underline text-xs font-bold mb-2 inline-block">← Back to Project Details</a>
            <h1 class="text-3xl font-bold text-white tracking-tight">Competency Mapping</h1>
            <p class="text-slate-400 text-sm italic">Select the skills required for: <span class="text-indigo-400 font-bold">{{ $brief->getTitle() }}</span></p>
        </div>
    </div>


    <form action="/trainer/briefs/skills/sync" method="POST">
        <!-- Hidden Brief ID -->
        <input type="hidden" name="brief_id" value="{{ $brief->getId() }}">

        <!-- Simple Flat List of Skills -->
        <div class="bg-slate-800 rounded-3xl border border-slate-700 shadow-2xl overflow-hidden">
            <div class="p-6 bg-slate-900/40 border-b border-slate-700 flex items-center justify-between">
                <h3 class="text-xs font-black text-white uppercase tracking-widest">Global Skill Framework</h3>
                <span class="text-[10px] text-slate-500 font-bold uppercase">{{ count($allSkills) }} Available Competencies</span>
            </div>

            <div class="divide-y divide-slate-700/50">
                @forelse($allSkills as $skill)
                    <label class="flex items-center justify-between p-5 hover:bg-indigo-600/[0.03] transition group cursor-pointer">
                        <div class="flex items-center space-x-6">
                            <!-- Checkbox -->
                            <input type="checkbox" name="skill_ids[]" value="{{ $skill->getId() }}" 
                                {{ in_array($skill->getId(), $currentSkillIds) ? 'checked' : '' }}
                                class="w-6 h-6 rounded border-slate-700 bg-slate-900 text-indigo-600 focus:ring-indigo-600 transition-all">
                            
                            <div class="flex items-center space-x-4">
                                <span class="text-sm font-black text-indigo-400 w-8">{{ $skill->getCode() }}</span>
                                <div class="h-4 w-px bg-slate-700"></div>
                                <div>
                                    <p class="text-sm font-bold text-white group-hover:text-indigo-400 transition-colors">{{ $skill->getDescription() }}</p>
                                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-0.5">{{ $skill->getCategory()->value }}</p>
                                </div>
                            </div>
                        </div>

                       
                    </label>
                @empty
                    <div class="p-10 text-center text-slate-500 italic text-sm">No skills found in the database.</div>
                @endforelse
            </div>

            <!-- Simple Action Bar -->
            <div class="p-8 bg-slate-900/40 border-t border-slate-700 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-[10px] text-slate-500 font-medium uppercase tracking-tight max-w-xs">
                    Checked skills will be made mandatory for student submissions and evaluations.
                </p>
                <div class="flex items-center space-x-4">
                    <a href="/trainer/briefs/details?id={{ $brief->getId() }}" class="text-slate-400 hover:text-white text-xs font-bold transition-colors">Cancel</a>
                    <button type="submit" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-xl transition-all active:scale-95 uppercase tracking-widest text-[11px]">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection