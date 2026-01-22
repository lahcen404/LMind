@extends('templates.layout')

@section('title', 'Manage Classes')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">Class Management</h1>
            <p class="text-slate-400 mt-1 text-sm font-medium">View and organize all active promotions and their assigned trainers.</p>
        </div>
        
        <a href="/admin/classes/create" class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-indigo-600/20 transition-all active:scale-95 flex items-center space-x-2 w-fit">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
            <span>Add New Class</span>
        </a>
    </div>

   
    <div class="bg-slate-800 p-4 rounded-2xl border border-slate-700 flex flex-col sm:flex-row gap-4 justify-between items-center">
        <div class="relative w-full sm:w-96">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </span>
            <input type="text" placeholder="Search by class name..." class="block w-full pl-10 pr-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white text-sm focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-600">
        </div>
    </div>


    <!-- Classes Table -->
    <div class="bg-slate-800 rounded-2xl border border-slate-700 overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-6 py-5">Class Details (Nom & Promotion)</th>
                        <th class="px-6 py-5">Assigned Formateur</th>
                        <th class="px-6 py-5">Status</th>
                        <th class="px-6 py-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($classes as $class)
                        <tr class="hover:bg-slate-700/30 transition group">
                            <td class="px-6 py-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-indigo-600/10 rounded-2xl flex items-center justify-center text-indigo-500 border border-indigo-500/20">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-white tracking-tight">{{ $class->getName() }}</p>
                                        <p class="text-xs text-slate-500 font-medium mt-0.5">Promotion: {{ $class->getPromotion() }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-full bg-slate-700 border border-slate-600 flex items-center justify-center text-[10px] font-bold text-indigo-400 uppercase">
                                        {{ substr($class->getTrainerName(), 0, 2) }}
                                    </div>
                                    <span class="text-sm text-slate-300 font-medium tracking-tight">{{ $class->getTrainerName() }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 text-[10px] font-black uppercase tracking-widest rounded-md border border-emerald-500/20">Active</span>
                            </td>
                            <td class="px-6 py-6 text-right">
                                <div class="flex items-center justify-end space-x-2 opacity-0 group-hover:opacity-100 transition-all duration-200 translate-x-2 group-hover:translate-x-0">
                                   
                                    <a href="/admin/classes/enroll?id={{ $class->getId() }}" class="p-2.5 bg-slate-900 border border-slate-700 rounded-xl text-slate-400 hover:text-emerald-400 hover:border-emerald-500/50 transition shadow-sm" title="Manage Roster">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                    </a>
                                    
                                   
                                    <a href="/admin/classes/edit?id={{ $class->getId() }}" class="p-2.5 bg-slate-900 border border-slate-700 rounded-xl text-slate-400 hover:text-indigo-400 hover:border-indigo-500/50 transition shadow-sm" title="Edit Class">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                    </a>

                                    
                                    <a href="/admin/classes/delete?id={{ $class->getId() }}" 
                                       onclick="return confirm('Are you sure you want to delete this class? Students will become unassigned.')"
                                       class="p-2.5 bg-slate-900 border border-slate-700 rounded-xl text-slate-400 hover:text-red-400 hover:border-red-500/50 transition shadow-sm" title="Delete Class">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center text-slate-500 italic">
                                No classes registered yet. Click "Add New Class" to begin.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Footer -->
        <div class="p-6 bg-slate-900/30 border-t border-slate-700/50 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-[11px] text-slate-500 font-bold uppercase tracking-widest italic">
                Showing {{ count($classes) }} registered promotions
            </p>
        </div>
    </div>
</div>
@endsection