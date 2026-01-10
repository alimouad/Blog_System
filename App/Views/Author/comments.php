 <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
     <div class="flex flex-col gap-2">
         <nav class="flex items-center gap-2 text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">
             <a href="/admin/home" class="hover:text-primary transition-colors">Author</a>
             <span class="material-symbols-outlined text-[12px]">chevron_right</span>
             <span class="text-slate-900">Comments</span>
         </nav>

         <div class="flex items-center gap-4">
             <h2 class="text-slate-900 text-2xl md:text-3xl font-black leading-tight tracking-tight">
                 Manage Comments
             </h2>

         </div>

     </div>
 </div>
 <div class="flex items-center justify-between mb-8 border-b border-slate-100 pb-5 mt-5">
     <div class="flex items-center gap-3">
         <div class="bg-primary/10 p-2 rounded-lg">
             <span class="material-symbols-outlined text-primary text-xl">forum</span>
         </div>
         <div>
             <h3 class="text-lg font-bold text-slate-900 leading-none">Discussion</h3>
             <p class="text-xs text-slate-400 mt-1"><?= count($comments) ?> comments shared</p>
         </div>
     </div>
     <div class="flex items-center gap-1 text-[11px] font-bold text-slate-400 bg-slate-50 px-3 py-1.5 rounded-full border border-slate-100">
         <span class="material-symbols-outlined text-sm">swap_vert</span>
         SORT BY: NEWEST
     </div>
 </div>

 <div id="commentsList" class="space-y-8">
     <?php if (empty($comments)): ?>
         <div class="flex flex-col items-center gap-2">
             <span class="material-symbols-outlined text-4xl text-slate-200">person_off</span>
             <p class="text-slate-400 text-sm italic">No comments found .</p>
         </div>
     <?php else: ?>
         <?php foreach ($comments as $comment): ?>
             <div class="comment-item group">
                 <div class="flex gap-4">
                     <div class="flex-1">
                         <div class="bg-slate-50 border border-transparent group-hover:border-slate-200 group-hover:bg-white rounded-2xl rounded-tl-none p-5 transition-all duration-300 shadow-sm group-hover:shadow-md">
                             <div class="flex items-center justify-between mb-2">
                                 <span class="text-[13px] font-bold text-slate-400 uppercase tracking-widest flex items-center gap-1">
                                     <span class="material-symbols-outlined text-[12px]">schedule</span>
                                     <?= date('M d, Y • H:i', strtotime($comment['created_at'])) ?>
                                 </span>
                             </div>
                             <p class="text-sm text-slate-700 leading-relaxed font-medium">
                                 <?= htmlspecialchars($comment['content']) ?>
                             </p>
                         </div>

                         <div class="flex items-center gap-4 mt-3 ml-2">
                             <button class="group/btn flex items-center gap-1.5 text-[11px] font-extrabold text-slate-400 hover:text-primary transition-all">
                                 <span class="material-symbols-outlined text-[16px] group-hover/btn:scale-125 transition-transform">thumb_up</span>
                                 <span>LIKE</span>
                             </button>

                             <span class="w-1 h-1 bg-slate-300 rounded-full"></span>

                             <a href="/author/comments/delete?id=<?= $comment['id'] ?>"
                                 onclick="return confirm('Delete this comment?')"
                                 class="group/del flex items-center gap-1.5 text-[11px] font-extrabold text-slate-400 hover:text-red-500 transition-all">
                                 <span class="material-symbols-outlined text-[16px] group-hover/del:rotate-12 transition-transform">delete_sweep</span>
                                 <span>DELETE</span>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
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