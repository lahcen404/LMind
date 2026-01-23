<nav class="bg-slate-800 border-b border-slate-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo & Brand -->
            <div class="flex items-center">
                <a href="/" class="flex-shrink-0 flex items-center space-x-3">
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center shadow-lg">
                        <span class="text-white font-black text-sm">L</span>
                    </div>
                    <span class="text-white font-bold text-xl tracking-tight">LMind</span>
                </a>
                
                <!-- Role-Based Navigation Links -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        @php $role = $_SESSION['user_role'] ?? ''; @endphp

                        @if($role === 'ADMIN')
                            <a href="/admin/dashboard" class="px-3 py-2 rounded-md text-sm font-medium text-white bg-slate-900">Dashboard</a>
                            <a href="/admin/users" class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-700 transition">Users</a>
                            <a href="/admin/classes" class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-700 transition">Classes</a>
                            <a href="/admin/skills" class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-700 transition">Skills</a>
                            <a href="/admin/sprints" class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-700 transition">Sprints</a>
                        @elseif($role === 'TRAINER')
                            <a href="/trainer/dashboard" class="px-3 py-2 rounded-md text-sm font-medium text-white bg-slate-900">Dashboard</a>
                            <a href="/trainer/briefs" class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-700 transition">My Briefs</a>
                            <a href="/trainer/evaluations" class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-700 transition">Evaluations</a>
                        @elseif($role === 'LEARNER')
                            <a href="/learner/dashboard" class="px-3 py-2 rounded-md text-sm font-medium text-white bg-slate-900">Dashboard</a>
                            <a href="/learner/briefs" class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-700 transition">My Projects</a>
                            <a href="/learner/progress" class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-700 transition">My Skills</a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Profile / Actions -->
            <div class="flex items-center space-x-4">
                @if(isset($_SESSION['user_id']))
                    <div class="hidden sm:flex flex-col text-right mr-2">
                        <span class="text-xs font-bold text-white">{{ $_SESSION['user_name'] ?? 'User' }}</span>
                        <span class="text-[10px] text-slate-400 uppercase tracking-widest">{{ strtolower($role) }}</span>
                    </div>
                    <div class="relative">
                        <button class="flex text-sm border-2 border-slate-700 rounded-full focus:outline-none focus:border-indigo-500 transition">
                            <img class="h-8 w-8 rounded-full bg-slate-700" 
                                 src="https://ui-avatars.com/api/?name={{ urlencode($_SESSION['user_name'] ?? 'U') }}&background=4f46e5&color=fff" 
                                 alt="User profile">
                        </button>
                    </div>
                    
                    <a href="/logout" class="p-2 text-slate-400 hover:text-red-400 transition" title="Logout">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </a>
                @else
                    <a href="/login" class="text-sm font-bold text-indigo-400 hover:text-indigo-300 transition">Sign In</a>
                @endif
            </div>
        </div>
    </div>
</nav>