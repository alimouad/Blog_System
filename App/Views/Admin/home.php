<div class="flex-1 w-full max-w-full mx-auto p-4 md:p-8 flex flex-col gap-10">
    
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="flex flex-col gap-2">
            <nav class="flex items-center gap-2 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                <a href="/admin/home" class="hover:text-primary transition-colors">Admin</a>
                <span class="material-symbols-outlined text-[12px]">chevron_right</span>
                <span class="text-slate-900">Dashboard</span>
            </nav>
            <h2 class="text-slate-900 text-2xl md:text-3xl font-black leading-tight tracking-tight">Overview</h2>
            <p class="text-slate-500 text-base font-medium">Hello, <?= $_SESSION['user_name'] ?>. Here is your blog's performance today.</p>
        </div>
        
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <div class="group bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-500/5 transition-all duration-500">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-blue-50 rounded-2xl text-blue-600 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-3xl">article</span>
                </div>
                <div class="flex items-center gap-1 text-green-500 font-bold text-xs bg-green-50 px-2 py-1 rounded-lg">
                    <span class="material-symbols-outlined text-sm">trending_up</span>
                    12%
                </div>
            </div>
            <div>
                <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">Total Articles</p>
                <h3 class="text-4xl font-black mt-2 text-slate-900"><?= number_format($stats['total_articles']) ?></h3>
                <p class="text-xs text-slate-400 mt-2 font-medium">Published content live on site</p>
            </div>
        </div>

        <div class="group bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 hover:border-purple-200 hover:shadow-xl hover:shadow-purple-500/5 transition-all duration-500">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-purple-50 rounded-2xl text-purple-600 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-3xl">group</span>
                </div>
                <div class="flex items-center gap-1 text-purple-500 font-bold text-xs bg-purple-50 px-2 py-1 rounded-lg">
                    <span class="material-symbols-outlined text-sm">face</span>
                    Active
                </div>
            </div>
            <div>
                <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">Active Members</p>
                <h3 class="text-4xl font-black mt-2 text-slate-900"><?= number_format($stats['active_members']) ?></h3>
                <p class="text-xs text-slate-400 mt-2 font-medium">Users with logged sessions</p>
            </div>
        </div>

        <div class="group bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 hover:border-orange-200 hover:shadow-xl hover:shadow-orange-500/5 transition-all duration-500">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-orange-50 rounded-2xl text-orange-600 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-3xl">forum</span>
                </div>
                <div class="flex items-center gap-1 text-orange-500 font-bold text-xs bg-orange-50 px-2 py-1 rounded-lg">
                    <span class="material-symbols-outlined text-sm">history</span>
                    New
                </div>
            </div>
            <div>
                <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">Total Comments</p>
                <h3 class="text-4xl font-black mt-2 text-slate-900"><?= number_format($stats['books_comments']) ?></h3>
                <p class="text-xs text-slate-400 mt-2 font-medium">Community interactions tracked</p>
            </div>
        </div>
    </div>

    </div>