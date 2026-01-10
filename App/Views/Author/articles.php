 <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
     <div class="flex flex-col gap-2">
         <nav class="flex items-center gap-2 text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">
             <a href="/admin/home" class="hover:text-primary transition-colors">Author</a>
             <span class="material-symbols-outlined text-[12px]">chevron_right</span>
             <span class="text-slate-900">Articles</span>
         </nav>

         <div class="flex items-center gap-4">
             <h2 class="text-slate-900 text-2xl md:text-3xl font-black leading-tight tracking-tight">
                 My Articles
             </h2>

         </div>

     </div>
 </div>
 <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-6">
     <?php if (empty($articles)): ?>
         <div class="col-span-full flex flex-col items-center justify-center py-20 bg-slate-50 rounded-[3rem] border-2 border-dashed border-slate-200">
             <div class="size-20 bg-white rounded-3xl shadow-sm flex items-center justify-center mb-4">
                 <span class="material-symbols-outlined text-4xl text-slate-300">post_add</span>
             </div>
             <h3 class="text-slate-900 font-black text-lg">No articles yet</h3>
             <p class="text-slate-400 text-sm italic">Your written stories will appear here.</p>
         </div>
     <?php else: ?>
         <?php foreach ($articles as $art): ?>
             <article class="group bg-white rounded-[2rem] p-2 border border-slate-100 hover:border-transparent 
                           hover:shadow-[0_20px_50px_rgba(0,0,0,0.06)] transition-all duration-500 relative flex flex-col">

                 <div class="cursor-pointer p-5 flex-1">
                     <div class="flex flex-col sm:flex-row gap-6">
                         <div class="flex-shrink-0">
                             <div class="w-full sm:w-40 h-40 rounded-[1.5rem] bg-slate-50 overflow-hidden relative shadow-inner">
                                 <img src="<?= !empty($art['image']) ? '/Public/Uploads/articles/' . $art['image'] : 'https://ui-avatars.com/api/?name=' . urlencode($art['title']) . '&background=random' ?>"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000 ease-out" />

                                 <?php if (($art['report_count'] ?? 0) > 0): ?>
                                     <div class="absolute top-2 right-2 animate-bounce">
                                         <span class="bg-red-500 text-white size-6 rounded-full flex items-center justify-center shadow-lg ring-2 ring-white">
                                             <span class="material-symbols-outlined text-[14px] font-bold">priority_high</span>
                                         </span>
                                     </div>
                                 <?php endif; ?>
                             </div>
                         </div>

                         <div class="flex-1">
                             <div class="flex items-center justify-between mb-3">
                                 <span class="text-[9px] font-black uppercase tracking-widest text-primary/80 bg-primary/5 px-2 py-0.5 rounded-md">
                                     <?= htmlspecialchars($art['category_name'] ?? 'General') ?>
                                 </span>

                                 <?php if (($art['report_count'] ?? 0) > 0): ?>
                                     <span class="text-[10px] font-black text-red-500 flex items-center gap-1 uppercase tracking-tighter">
                                         <span class="material-symbols-outlined text-sm">report</span>
                                         <?= $art['report_count'] ?> Reports
                                     </span>
                                 <?php endif; ?>
                             </div>

                             <h3 class="text-xl font-black leading-[1.3] text-slate-900 group-hover:text-primary transition-colors line-clamp-2">
                                 <?= htmlspecialchars($art['title']) ?>
                             </h3>
                             <p class="mt-3 text-sm text-slate-500 line-clamp-2 font-medium leading-relaxed">
                                 <?= htmlspecialchars($art['content']) ?>
                             </p>
                         </div>
                     </div>
                 </div>

                 <div class="px-7 pb-6 pt-2 flex items-center justify-between mt-auto">
                     <div class="flex items-center gap-3">
                         <img src="https://ui-avatars.com/api/?name=<?= urlencode($art['author_name'] ?? 'User') ?>&background=random"
                             class="size-8 rounded-xl ring-4 ring-slate-50" />
                         <div class="flex flex-col">
                             <span class="text-[10px] font-black text-slate-900 uppercase tracking-tighter"><?= htmlspecialchars($art['author_name'] ?? 'You') ?></span>
                             <span class="text-[10px] font-bold text-slate-300 uppercase"><?= date('M d, Y', strtotime($art['created_at'])) ?></span>
                         </div>
                     </div>

                     <div class="flex items-center gap-2">
                         <a href="/author/article/delete?id=<?= $art['article_id'] ?>"
                             onclick="return confirm('Are you sure you want to delete this article? All category links and reports will be removed.')"
                             class="size-10 rounded-xl bg-red-50 text-red-400 opacity-0 group-hover:opacity-100 hover:bg-red-500 hover:text-white transition-all duration-300 flex items-center justify-center shadow-sm">
                             <span class="material-symbols-outlined text-xl">delete_outline</span>
                         </a>
                     </div>
                 </div>
             </article>
         <?php endforeach; ?>
     <?php endif; ?>
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
 <?php if (isset($_SESSION['ERROR_MESSAGE'])): ?>
     <div id="flash-message" class="fixed top-5 right-5 bg-white border-l-4 border-red-500 p-4 rounded-lg shadow-2xl z-[100] flex items-center gap-4 min-w-[320px] animate-slide-in">
         <div class="bg-red-100 p-2 rounded-full">
             <span class="material-symbols-outlined text-red-600">check_circle</span>
         </div>
         <div class="flex-1">
             <p class="text-sm font-bold text-slate-900">Failed</p>
             <p class="text-xs text-slate-600"><?= htmlspecialchars($_SESSION['ERROR_MESSAGE']); ?></p>
         </div>
         <button onclick="closeFlash()" class="text-slate-400 hover:text-slate-900">
             <span class="material-symbols-outlined text-xl">close</span>
         </button>
     </div>
     <?php unset($_SESSION['ERROR_MESSAGE']); ?>
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