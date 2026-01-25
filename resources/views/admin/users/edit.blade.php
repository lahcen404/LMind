@extends('templates.layout')

@section('title', 'Edit User')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white tracking-tight">Edit User</h1>
        <p class="text-slate-400 mt-1 font-medium">Updating account details for #{{ $user->getId() }}</p>
    </div>

    <form action="/admin/users/update" method="POST" class="bg-slate-800 border border-slate-700 rounded-3xl p-8 shadow-2xl space-y-6">
        
        
        <input type="hidden" name="id" value="{{ $user->getId() }}">

        <div class="space-y-2">
            <label class="block text-sm font-bold text-slate-300 ml-1">Full Name</label>
            <input type="text" name="fullname" value="{{ $user->getFullName() }}" required
                class="w-full px-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-white outline-none focus:ring-2 focus:ring-indigo-600 transition-all">
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-bold text-slate-300 ml-1">Email Address</label>
            <input type="email" name="email" value="{{ $user->getEmail() }}" required
                class="w-full px-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-white outline-none focus:ring-2 focus:ring-indigo-600 transition-all">
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-bold text-slate-300 ml-1">System Role</label>
            <select name="role" class="w-full px-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-white outline-none focus:ring-2 focus:ring-indigo-600 transition-all font-bold uppercase tracking-widest text-xs">
                <option value="ADMIN" {{ $user->getRole()->value === 'ADMIN' ? 'selected' : '' }}>Administrator</option>
                <option value="TRAINER" {{ $user->getRole()->value === 'TRAINER' ? 'selected' : '' }}>Trainer</option>
                <option value="LEARNER" {{ $user->getRole()->value === 'LEARNER' ? 'selected' : '' }}>Learner</option>
            </select>
        </div>

        <div class="pt-4 flex items-center justify-end space-x-4">
            <a href="/admin/users" class="text-slate-500 hover:text-white font-bold text-sm transition-colors">Cancel</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white px-8 py-3 rounded-xl font-bold shadow-lg transition-all active:scale-95">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection