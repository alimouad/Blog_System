<!-- Mobile Search -->
<div class="md:hidden mb-6 relative">
    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
    <input
        type="text"
        placeholder="Search articles..."
        class="w-full pl-12 pr-4 py-3 rounded-xl border-none bg-white text-slate-900 placeholder-slate-400 focus:ring-2 focus:ring-primary/50 transition-all shadow-sm" />
</div>

<!-- Categories -->
<div class="flex gap-3 overflow-x-auto pb-4 mb-8 no-scrollbar">
    <button class="flex-none px-5 py-2 rounded-full bg-slate-900 text-white text-sm font-medium transition-all hover:scale-105">All</button>
    <?php foreach ($categories as $cat): ?>

        <button class="flex-none px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 text-sm font-medium transition-all hover:bg-slate-50"><?= htmlspecialchars($cat['name']) ?></button>
    <?php endforeach; ?>
</div>

<div class="flex my-3">
    <a href="/author/add_article"
        class="ml-auto flex items-center gap-2 px-4 py-2 bg-primary text-white
              rounded-lg hover:bg-blue-300 hover:text-white transition-colors font-medium">

        <span class="material-symbols-outlined text-lg">
            edit_note
        </span>

        <span>Add</span>
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-4">
    <?php foreach ($articles as $article): ?>
        <article
            onclick="window.location.href='/article/view?id=<?= $article['id'] ?>'"
            class="group relative bg-white rounded-3xl p-6 border border-slate-100 
                   hover:border-primary/20 hover:shadow-[0_20px_50px_rgba(0,0,0,0.05)] 
                   transition-all duration-500 cursor-pointer flex flex-col justify-between">

            <div>
                <div class="flex flex-col sm:flex-row gap-6 mb-6">
                    <div class="flex-shrink-0">
                        <div class="w-full sm:w-32 h-32 rounded-2xl bg-slate-100 overflow-hidden shadow-inner">
                            <img
                                src="<?= !empty($article['image']) ? '/Public/Uploads/articles/' . $article['image'] : 'https://ui-avatars.com/api/?name=' . urlencode($article['title']) . '&background=random' ?>"
                                alt="<?= htmlspecialchars($article['title']) ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                        </div>
                    </div>

                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-[10px] font-bold tracking-widest uppercase text-primary bg-primary/10 px-2.5 py-1 rounded-full">
                                Lifestyle
                            </span>
                            <div class="flex items-center gap-1 text-slate-400">
                                <span class="material-symbols-outlined text-sm">schedule</span>
                                <span class="text-[11px] font-medium">3 min read</span>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold leading-tight text-black group-hover:text-primary transition-colors duration-300">
                            <?= htmlspecialchars($article['title']) ?>
                        </h3>

                        <p class="mt-3 text-sm text-slate-500 line-clamp-2 leading-relaxed italic">
                            "<?= htmlspecialchars($article['content']) ?>"
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between pt-5 border-t border-slate-50">

                <div class="flex items-center gap-1 text-primary font-bold text-xs opacity-0 translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300">
                    <span>Read More</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
</div>

 <?php if (isset($_SESSION['SUCCESS_MESSAGE'])): ?>
     <div id="flash-message" class="fixed top-5 right-5 bg-white border-l-4 border-green-500 p-4 rounded-lg shadow-2xl z-[100] flex items-center gap-4 min-w-[320px] animate-slide-in">
         <div class="bg-green-100 p-2 rounded-full">
             <span class="material-symbols-outlined text-green-600">check_circle</span>
         </div>
         <div class="flex-1">
             <p class="text-sm font-bold text-slate-900">Success</p>
             <p class="text-xs text-slate-600"><?= htmlspecialchars($_SESSION['SUCCESS_MESSAGE']); ?></p>
         </div>
         <button onclick="closeFlash()" class="text-slate-400 hover:text-slate-900">
             <span class="material-symbols-outlined text-xl">close</span>
         </button>
     </div>
     <?php unset($_SESSION['SUCCESS_MESSAGE']); ?>
 <?php endif; ?>

  <script>
     function closeFlash() {
         const el = document.getElementById('flash-message');
         if (el) {
             el.style.opacity = '0';
             el.style.transform = 'translateX(20px)';
             setTimeout(() => el.remove(), 500);
         }
     }
     setTimeout(closeFlash, 5000);
 </script>