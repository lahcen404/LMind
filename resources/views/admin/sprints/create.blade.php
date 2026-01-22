@extends('templates.layout')

@section('title', 'Create New Sprint')

@section('content')
<div class="max-w-4xl mx-auto py-4">
    <!-- breadcrumb -->
    <a href="/admin/sprints" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-xs mb-8 transition group">
        <svg class="w-3 h-3 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Return to Sprints Management
    </a>


    <!-- main form card -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 shadow-2xl overflow-hidden">
        <div class="p-8 border-b border-slate-700 bg-slate-800/50">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/20 text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white tracking-tight">Plan New Sprint</h1>
                    <p class="text-slate-400 text-sm font-medium mt-1">Define a new development cycle for a promotion.</p>
                </div>
            </div>
        </div>

        <!-- form body -->
        <form action="/admin/sprints/create" method="POST" class="p-8 space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- order (matches order_sprint in service) -->
                <div class="space-y-2">
                    <label for="order_sprint" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Sprint Order</label>
                    <input type="number" id="order_sprint" name="order_sprint" placeholder="e.g. 1" min="1" required
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all font-bold">
                </div>

                <!-- name -->
                <div class="md:col-span-2 space-y-2">
                    <label for="name" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Sprint Title / Name</label>
                    <input type="text" id="name" name="name" placeholder="e.g. PHP Fundamentals & SQL" required
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all">
                </div>
            </div>

            <!-- class association -->
            <div class="space-y-2">
                <label for="class_id" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Target Class / Promotion</label>
                <div class="relative group">
                    <select id="class_id" name="class_id" required class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white text-sm focus:ring-2 focus:ring-indigo-600 outline-none transition-all appearance-none cursor-pointer">
                        <option value="" disabled selected>Select the class for this sprint...</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->getId() }}">{{ $class->getName() }} ({{ $class->getPromotion() }})</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none text-slate-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </div>
            </div>

            <!-- duration (as requested to replace start/end date) -->
            <div class="space-y-2">
                <label for="duration" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Duration (Number of Days)</label>
                <input type="number" id="duration" name="duration" placeholder="e.g. 15" min="1" required
                    class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all">
            </div>

            <!-- action buttons -->
            <div class="flex items-center justify-end space-x-5 pt-6 border-t border-slate-700/50">
                <a href="/admin/sprints" class="px-6 py-3 text-slate-500 font-bold hover:text-white transition-colors">Discard</a>
                <button type="submit" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/20 transition-all active:scale-95 uppercase tracking-widest text-[11px]">
                    Initialize Sprint
                </button>
            </div>
        </form>
    </div>
</div>
@endsection