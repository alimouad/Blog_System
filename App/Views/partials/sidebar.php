<aside class="hidden lg:block w-72 flex-shrink-0">
    <nav class="sticky top-24 space-y-1">
        
        <div class="space-y-1 mb-8">
            <?php $current = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>

            <a href="/" 
               class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 
               <?= ($current === '/') ? 'bg-primary text-white shadow-lg shadow-primary/25' : 'text-slate-600 hover:bg-slate-50 hover:text-primary' ?>">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined transition-transform group-hover:scale-110">home</span>
                    <span class="font-bold text-sm">Home Feed</span>
                </div>
                <?php if($current === '/'): ?>
                    <div class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></div>
                <?php endif; ?>
            </a>

          

            <a href="/history" 
               class="group flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-300
               <?= ($current === '/history') ? 'bg-primary text-white shadow-lg shadow-primary/25' : 'text-slate-600 hover:bg-slate-50 hover:text-primary' ?>">
                <span class="material-symbols-outlined transition-transform group-hover:scale-110">bookmark</span>
                <span class="font-bold text-sm">History</span>
            </a>
        </div>

        <div class="pt-6 border-t border-slate-100">
            <div class="flex items-center justify-between px-4 mb-4">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Explore Topics</p>
                <span class="material-symbols-outlined text-slate-300 text-sm">explore</span>
            </div>

            <div class="space-y-0.5">
                <a href="/topic/design" class="flex items-center justify-between px-4 py-2.5 rounded-xl text-slate-600 hover:bg-primary/5 hover:text-primary transition-all group">
                    <div class="flex items-center gap-3">
                        <div class="size-8 rounded-lg bg-slate-50 flex items-center justify-center group-hover:bg-white transition-colors">
                            <span class="material-symbols-outlined text-lg">palette</span>
                        </div>
                        <span class="text-sm font-semibold">Design</span>
                    </div>
                    <span class="text-[10px] font-bold bg-slate-100 text-slate-500 px-2 py-0.5 rounded-md group-hover:bg-primary group-hover:text-white transition-all">12</span>
                </a>

                <a href="/topic/technology" class="flex items-center justify-between px-4 py-2.5 rounded-xl text-slate-600 hover:bg-primary/5 hover:text-primary transition-all group">
                    <div class="flex items-center gap-3">
                        <div class="size-8 rounded-lg bg-slate-50 flex items-center justify-center group-hover:bg-white transition-colors">
                            <span class="material-symbols-outlined text-lg">computer</span>
                        </div>
                        <span class="text-sm font-semibold">Technology</span>
                    </div>
                    <span class="text-[10px] font-bold bg-slate-100 text-slate-500 px-2 py-0.5 rounded-md group-hover:bg-primary group-hover:text-white transition-all">45</span>
                </a>

                <a href="/topic/research" class="flex items-center justify-between px-4 py-2.5 rounded-xl text-slate-600 hover:bg-primary/5 hover:text-primary transition-all group">
                    <div class="flex items-center gap-3">
                        <div class="size-8 rounded-lg bg-slate-50 flex items-center justify-center group-hover:bg-white transition-colors">
                            <span class="material-symbols-outlined text-lg">psychology</span>
                        </div>
                        <span class="text-sm font-semibold">UX Research</span>
                    </div>
                    <span class="text-[10px] font-bold bg-slate-100 text-slate-500 px-2 py-0.5 rounded-md group-hover:bg-primary group-hover:text-white transition-all">8</span>
                </a>
            </div>
        </div>

    </nav>
</aside>