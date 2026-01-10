<div class="max-w-4xl mx-auto pb-20">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-black text-slate-900 flex items-center gap-3">
                <span class="material-symbols-outlined text-primary text-3xl">history</span>
                Interaction History
            </h2>
            <p class="text-slate-400 text-sm font-medium mt-1">Track how readers are engaging with your articles</p>
        </div>
        
        <div class="bg-slate-100 px-4 py-2 rounded-2xl text-[11px] font-black text-slate-500 uppercase tracking-widest">
            <?= count($history) ?> Events
        </div>
    </div>

    <div class="space-y-4 relative">
        <?php if (empty($history)): ?>
            <div class="flex flex-col items-center justify-center py-20 bg-white rounded-[3rem] border border-slate-100 shadow-sm">
                <div class="w-20 h-20 bg-slate-50 rounded-3xl flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-4xl text-slate-200">auto_stories</span>
                </div>
                <h3 class="text-slate-900 font-black text-lg">No interactions yet</h3>
                <p class="text-slate-400 text-sm italic">When users like or comment, they will appear here.</p>
            </div>
        <?php else: ?>
            <div class="absolute left-8 top-10 bottom-10 w-0.5 bg-slate-50 hidden md:block"></div>

            <?php foreach ($history as $event): ?>
                <div class="relative bg-white rounded-[2rem] p-6 border border-slate-100 flex items-start gap-5 hover:shadow-[0_20px_50px_rgba(0,0,0,0.04)] hover:border-transparent transition-all duration-500 group">
                    
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0 z-10 shadow-sm transition-transform group-hover:scale-110 
                        <?php if ($event['activity_type'] === 'like'): ?>
                            bg-pink-50 text-pink-500
                        <?php elseif ($event['activity_type'] === 'report'): ?>
                            bg-orange-50 text-orange-600
                        <?php else: ?>
                            bg-primary/5 text-primary
                        <?php endif; ?>">
                        <span class="material-symbols-outlined text-2xl">
                            <?php if ($event['activity_type'] === 'like'): ?>
                                favorite
                            <?php elseif ($event['activity_type'] === 'report'): ?>
                                warning
                            <?php else: ?>
                                forum
                            <?php endif; ?>
                        </span>
                    </div>

                    <div class="flex-1">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-2">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <h4 class="text-sm font-black text-slate-900 capitalize">
                                        <?= htmlspecialchars($event['actor_name']) ?>
                                    </h4>
                                    <span class="text-[10px] font-black uppercase tracking-tighter px-2 py-0.5 rounded-md 
                                        <?php if ($event['activity_type'] === 'like'): ?>
                                            text-pink-400 bg-pink-50
                                        <?php elseif ($event['activity_type'] === 'report'): ?>
                                            text-orange-500 bg-orange-50
                                        <?php else: ?>
                                            text-primary bg-primary/5
                                        <?php endif; ?>">
                                        <?= htmlspecialchars($event['activity_type']) ?>
                                    </span>
                                </div>
                                <p class="text-xs font-bold text-slate-400">
                                    Performed action on <span class="text-slate-900">"<?= htmlspecialchars($event['article_title']) ?>"</span>
                                </p>
                            </div>
                            
                            <div class="flex items-center gap-1.5 text-[10px] font-black text-slate-300 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full">
                                <span class="material-symbols-outlined text-xs">schedule</span>
                                <?= date('M d, H:i', strtotime($event['created_at'])) ?>
                            </div>
                        </div>

                        <?php if ($event['activity_type'] !== 'like'): ?>
                            <div class="mt-4 relative">
                                <div class="absolute inset-y-0 left-0 w-1 bg-slate-100 rounded-full"></div>
                                <div class="pl-5 py-1">
                                    <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest mb-2">
                                        <?= $event['activity_type'] === 'report' ? 'Reason for report' : 'Comment Content' ?>
                                    </p>
                                    <p class="text-sm text-slate-600 leading-relaxed italic font-medium">
                                        "<?= htmlspecialchars($event['detail']) ?>"
                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>