<header class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-slate-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex items-center justify-between gap-6">
            
            <div class="flex items-center gap-6">
                <button class="lg:hidden p-2 hover:bg-slate-50 rounded-xl transition-colors text-slate-600">
                    <span class="material-symbols-outlined">menu_open</span>
                </button>
                <a href="/" class="flex items-center gap-2 group">
                    <div class="size-9 bg-slate-900 rounded-xl flex items-center justify-center text-white group-hover:scale-105 transition-transform">
                        <span class="material-symbols-outlined text-xl">edit_square</span>
                    </div>
                    <h1 class="text-xl font-black tracking-tighter text-slate-900">DailyBlog</h1>
                </a>
            </div>

            <div class="flex-1 max-w-xl relative hidden md:block">
                <div class="relative group">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-300 group-focus-within:text-primary transition-colors text-xl">search</span>
                    <input
                        type="text"
                        placeholder="Search articles, topics, authors..."
                        class="w-full pl-12 pr-4 py-2.5 rounded-2xl border border-slate-600 bg-slate-50/50 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-primary/5 focus:border-primary focus:bg-white transition-all" />
                </div>
            </div>

            <div class="flex items-center gap-4">

                <div class="h-8 w-px bg-slate-100 hidden md:block mx-1"></div>

                <div class="flex items-center gap-3 pl-1">
                    <div class="hidden md:flex flex-col items-end">
                        <span class="text-xs font-black text-slate-900 leading-none"><?= $_SESSION['user_name'] ?></span>
                        <a href="/logout" class="text-[10px] font-bold text-slate-400 hover:text-red-500 transition-colors uppercase tracking-wider mt-1">Logout</a>
                    </div>
                    <div class="relative group cursor-pointer">
                        <img
                            src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['user_name']) ?>&background=random"
                            alt="Profile"
                            class="size-10 rounded-2xl border-2 border-white shadow-sm object-cover group-hover:ring-2 group-hover:ring-primary/20 transition-all" />
                        <div class="absolute -bottom-1 -right-1 size-4 bg-green-500 border-2 border-white rounded-full"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>