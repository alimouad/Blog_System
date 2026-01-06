<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <?php foreach ($articles as $article): ?>
        <article 
            onclick="window.location.href='/article/<?= $article['id'] ?>'"
            class="group bg-white rounded-2xl p-6 border border-slate-200 
                   hover:border-primary/30 hover:shadow-xl hover:shadow-slate-200/60 
                   transition-all duration-300 cursor-pointer flex flex-col justify-between">
            
            <div>
                <div class="flex gap-5 mb-5">
                    <div class="flex-shrink-0">
                        <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-2xl bg-slate-100 overflow-hidden ring-1 ring-slate-200/50">
                            <img
                                src="<?= !empty($article['image']) ? '/Public/Uploads/articles/' . $article['image'] : 'https://ui-avatars.com/api/?name=' . urlencode($article['title']) ?>"
                                alt="<?= htmlspecialchars($article['title']) ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                        </div>
                    </div>

                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-[10px] uppercase tracking-wider font-bold text-primary bg-primary/10 px-2 py-0.5 rounded-md">
                                Design
                            </span>
                            <span class="text-[10px] font-medium text-slate-400">
                                <?= $article['read_time'] ?? '3' ?> min read
                            </span>
                        </div>
                        
                        <h3 class="text-lg sm:text-xl font-extrabold leading-snug text-slate-900 group-hover:text-primary transition-colors line-clamp-2">
                            <?= htmlspecialchars($article['title']) ?>
                        </h3>
                        
                        <p class="mt-2 text-sm text-slate-500 line-clamp-2 leading-relaxed font-normal">
                            <?= htmlspecialchars($article['content']) ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between pt-5 border-t border-slate-100 mt-auto">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <img
                            src="https://ui-avatars.com/api/?name=<?= urlencode($article['full_name']) ?>&background=random"
                            alt="<?= htmlspecialchars($article['full_name']) ?>"
                            class="w-8 h-8 rounded-full object-cover ring-2 ring-white shadow-sm" />
                        <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-white rounded-full"></span>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-800"><?= htmlspecialchars($article['full_name']) ?></p>
                        <p class="text-[10px] text-slate-400 font-medium"><?= date('M d, Y', strtotime($article['created_at'])) ?></p>
                    </div>
                </div>

                <div class="flex items-center text-primary opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all">
                    <span class="text-xs font-bold">Read More</span>
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
</div>