<aside class="hidden md:flex flex-col w-[300px] bg-white border-r border-slate-200 h-screen sticky top-0 shrink-0 z-20">
    <div class="flex flex-col h-full p-6">
        
        <div class="flex items-center gap-3 px-2 mb-10">
            <div class="rounded-xl size-10 bg-primary/10 flex items-center justify-center text-primary shadow-sm">
                <span class="material-symbols-outlined text-2xl font-bold">edit_note</span>
            </div>
            <div class="flex flex-col">
                <h1 class="text-slate-900 text-lg font-black leading-tight tracking-tight">BlogMaster</h1>
                <p class="text-slate-400 text-[10px] uppercase font-bold tracking-widest">Admin Console</p>
            </div>
        </div>

        <?php $current = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>

        <nav class="flex flex-col gap-1.5 flex-1">
            
            <?php $isActive = ($current === '/admin/home' || $current === '/adminhome'); ?>
            <a href="/admin/home"
               class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 hover:translate-x-1 
               <?= $isActive ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'text-slate-500 hover:bg-slate-50 hover:text-primary' ?>">
                <span class="material-symbols-outlined <?= $isActive ? 'fill-1' : '' ?>">grid_view</span>
                <span class="text-sm font-bold">Dashboard</span>
            </a>

            <?php $isActive = (strpos($current, '/admin/articles') !== false); ?>
            <a href="/admin/articles"
               class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 hover:translate-x-1 
               <?= $isActive ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'text-slate-500 hover:bg-slate-50 hover:text-primary' ?>">
                <span class="material-symbols-outlined <?= $isActive ? 'fill-1' : '' ?>">article</span>
                <span class="text-sm font-bold">Articles</span>
            </a>

            <?php $isActive = ($current === '/admin/categories'); ?>
            <a href="/admin/categories"
               class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 hover:translate-x-1 
               <?= $isActive ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'text-slate-500 hover:bg-slate-50 hover:text-primary' ?>">
                <span class="material-symbols-outlined <?= $isActive ? 'fill-1' : '' ?>">category</span>
                <span class="text-sm font-bold">Categories</span>
            </a>

            <?php $isActive = ($current === '/admin/users'); ?>
            <a href="/admin/users"
               class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 hover:translate-x-1 
               <?= $isActive ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'text-slate-500 hover:bg-slate-50 hover:text-primary' ?>">
                <span class="material-symbols-outlined <?= $isActive ? 'fill-1' : '' ?>">group</span>
                <span class="text-sm font-bold">Users</span>
            </a>

            <div class="h-px bg-slate-100 my-4 mx-2"></div>
        </nav>

        <div class="mt-auto space-y-4">
            <div class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50 border border-slate-100">
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['user_name']) ?>&background=random" 
                     class="size-10 rounded-full border-2 border-white shadow-sm" alt="Admin">
                <div class="flex flex-col min-w-0">
                    <p class="text-slate-900 text-sm font-bold truncate">Admin</p>
                    <p class="text-slate-400 text-[10px] truncate"><?= htmlspecialchars($_SESSION['user_name']) ?></p>
                </div>
            </div>

            <a href="/logout"
               onclick="return confirm('Ready to leave?')"
               class="flex items-center justify-center gap-2 w-full py-3 rounded-xl text-sm font-bold text-red-500 bg-red-50 hover:bg-red-500 hover:text-white transition-all duration-300 group">
                <span class="material-symbols-outlined text-[20px] group-hover:rotate-12 transition-transform">logout</span>
                <span>Sign Out</span>
            </a>
        </div>
    </div>
</aside>