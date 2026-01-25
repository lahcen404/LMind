@extends('templates.layout')

@section('title', 'Create New User')

@section('content')
<div class="max-w-3xl mx-auto py-4">
    <!-- Breadcrumb Navigation -->
    <a href="/users" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-bold text-xs mb-8 transition group">
        <svg class="w-3 h-3 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to User Management
    </a>

    <!-- Registration Card -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 shadow-2xl overflow-hidden">
        <!-- Card Header -->
        <div class="p-8 border-b border-slate-700 bg-slate-800/50">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/20 text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white tracking-tight">Create User Account</h1>
                    <p class="text-slate-400 text-sm font-medium mt-1">Register a new person into the LMind ecosystem.</p>
                </div>
            </div>
        </div>

        <!-- Form Body -->
        <form action="/admin/users/create" method="POST" class="p-8 space-y-8" ">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Full Name -->
                <div class="space-y-2">
                    <label for="name" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Full Name</label>
                    <input type="text" id="name" name="fullName" placeholder="e.g. John Doe" required
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-600 font-medium">
                        @if(isset($_SESSION['errors']['fullName']))
                    <p class="text-red-400 text-[10px] font-bold">{{ $_SESSION['errors']['fullName'] }}</p>
                    @endif
                </div>

                <!-- System Role -->
                <div class="space-y-2">
                    <label for="role" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">System Role</label>
                    <div class="relative group">
                        <select id="role" name="role" required class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white text-sm focus:ring-2 focus:ring-indigo-600 outline-none transition-all appearance-none cursor-pointer">
                            <option value="" disabled selected>Select user role...</option>
                            <option value="LEARNER">Student (Apprenant)</option>
                            <option value="TRAINER">Trainer (Formateur)</option>
                            <option value="ADMIN">Administrator</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none text-slate-500 group-focus-within:text-indigo-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Email Address -->
            <div class="space-y-2">
                <label for="email" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Email Address</label>
                <input type="email" id="email" name="email" placeholder="user@lmind.com" required
                    class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-600 font-medium">
                @if(isset($_SESSION['errors']['email']))
                    <p class="text-red-400 text-[10px] font-bold">{{ $_SESSION['errors']['email'] }}</p>
                    @endif
                </div>

            <!-- Password -->
            <div class="space-y-2">
                <label for="password" class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1"> Password</label>
                <div class="relative group">
                    <input type="password" id="password" name="password" placeholder="••••••••" required
                        class="block w-full px-5 py-4 bg-slate-900 border border-slate-700 rounded-2xl text-white focus:ring-2 focus:ring-indigo-600 outline-none transition-all placeholder:text-slate-600 font-medium">
                    @if(isset($_SESSION['errors']['password']))
                    <p class="text-red-400 text-[10px] font-bold">{{ $_SESSION['errors']['password'] }}</p>
                    @endif
                        <button type="button" class="absolute inset-y-0 right-0 px-5 text-slate-500 hover:text-indigo-400 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    </button>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-5 pt-6 border-t border-slate-700/50">
                <button type="button" class="px-6 py-3 text-slate-500 font-bold hover:text-white transition-colors">Discard</button>
                <button type="submit" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/20 transition-all active:scale-95 uppercase tracking-widest text-[11px]">
                    Register User
                </button>
            </div>
        </form>
    </div>

  
</div>
@endsection