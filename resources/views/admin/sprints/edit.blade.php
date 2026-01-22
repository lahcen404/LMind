@extends('templates.layout')

@section('title', 'Edit Sprint')

@section('content')
<div class="max-w-4xl mx-auto py-4">
    <!-- breadcrumb -->
    <a href="/admin/sprints" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-xs mb-8 transition group">
        <svg class="w-3 h-3 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Cancel and Return to Sprints
    </a>


    <!-- main form card -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 shadow-2xl overflow-hidden">
        <div class="p-8 border-b border-slate-700 bg-slate-800/50">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-amber-500 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-500/20 text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white tracking-tight">Modify Sprint</h1>
                    <p class="text-slate-400 text-sm font-medium mt-1">Update the configuration for: <span class="text-indigo-400 font-bold italic">{{ $sprint->getName() }}</span></p>
                </div>
            </div>
        </div>

        <!-- form body -->
        <form action="/admin/sprints/update" method="POST" class="p-8 space-y-8">
            
            <!-- hidden id -->
            <input type="hidden" name="id" value="{{ $sprint->getId() }}">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- order (order_sprint) -->
                <div class="space-y-2">
                    <label for="order_sprint" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Sprint Order</label>
                    <input type="number" id="order_sprint" name="order_sprint" value="{{ $sprint->getOrderSprint() }}" min="1" required
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all font-bold">
                </div>

                <!-- name -->
                <div class="md:col-span-2 space-y-2">
                    <label for="name" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Sprint Title / Name</label>
                    <input type="text" id="name" name="name" value="{{ $sprint->getName() }}" required
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all">
                </div>
            </div>

            <!-- class association -->
            <div class="space-y-2">
                <label for="class_id" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Target Class / Promotion</label>
                <div class="relative group">
                    <select id="class_id" name="class_id" required class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white text-sm focus:ring-2 focus:ring-indigo-600 outline-none transition-all appearance-none cursor-pointer">
                        @foreach($classes as $class)
                            <option value="{{ $class->getId() }}" {{ $sprint->getClassId() == $class->getId() ? 'selected' : '' }}>
                                {{ $class->getName() }} ({{ $class->getPromotion() }})
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none text-slate-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </div>
            </div>

            <!-- duration -->
            <div class="space-y-2">
                <label for="duration" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Duration (Number of Days)</label>
                <input type="number" id="duration" name="duration" value="{{ $sprint->getDuration() }}" min="1" required
                    class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all">
            </div>

            <!-- action buttons -->
            <div class="flex items-center justify-end space-x-5 pt-6 border-t border-slate-700/50">
                <a href="/admin/sprints" class="px-6 py-3 text-slate-500 font-bold hover:text-white transition-colors">Discard Changes</a>
                <button type="submit" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/20 transition-all active:scale-95 uppercase tracking-widest text-[11px]">
                    Update Sprint Details
                </button>
            </div>
        </form>
    </div>
</div>
@endsection