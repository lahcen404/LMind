@extends('templates.layout')

@section('title', 'Edit Class')

@section('content')
<div class="max-w-3xl mx-auto py-6">
    <!-- Breadcrumb / Back Navigation -->
    <a href="/admin/classes" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-sm mb-8 transition group">
        <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Return to Class Management
    </a>



    <!-- Main Form Card -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 shadow-2xl overflow-hidden">
        <!-- Card Header -->
        <div class="p-8 border-b border-slate-700 bg-slate-800/50">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-amber-500 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-500/20">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white tracking-tight">Modify Promotion</h1>
                    <p class="text-slate-400 text-sm font-medium mt-1">Updating details for: <span class="text-indigo-400 font-bold">{{ $class->getName() }}</span></p>
                </div>
            </div>
        </div>

        <!-- Update Form Body -->
        <form action="/admin/classes/update" method="POST" class="p-8 space-y-8">
            
            <input type="hidden" name="id" value="{{ $class->getId() }}">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Name Attribute -->
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-bold text-slate-300 ml-1 uppercase tracking-widest text-[11px]">Class Name</label>
                    <input type="text" id="name" name="name" value="{{ $class->getName() }}" required
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all">
                </div>

                <!-- Promotion Attribute -->
                <div class="space-y-2">
                    <label for="promotion" class="block text-sm font-bold text-slate-300 ml-1 uppercase tracking-widest text-[11px]">Promotion (Year)</label>
                    <input type="text" id="promotion" name="promotion" value="{{ $class->getPromotion() }}" required
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all">
                </div>
            </div>

            <!-- Trainer Relationship -->
            <div class="space-y-2">
                <label for="trainer_id" class="block text-sm font-bold text-slate-300 ml-1 uppercase tracking-widest text-[11px]">Assigned Trainer (Formateur)</label>
                <div class="relative">
                    <select id="trainer_id" name="trainer_id" class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all appearance-none cursor-pointer">
                        <option value="">-- No Trainer Assigned --</option>
                        @foreach($trainers as $trainer)
                            <option value="{{ $trainer->getId() }}" {{ $class->getTrainerId() == $trainer->getId() ? 'selected' : '' }}>
                                {{ $trainer->getFullName() }}
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none text-slate-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end space-x-5 pt-6 border-t border-slate-700/50">
                <a href="/admin/classes" class="px-6 py-3 text-slate-400 font-bold hover:text-white transition-colors">Cancel</a>
                <button type="submit" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/20 transition-all active:scale-95 uppercase tracking-widest text-xs">
                    Update Class
                </button>
            </div>
        </form>
    </div>
</div>
@endsection