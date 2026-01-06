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

<div id="add_article_overlay"
    class="fixed inset-0 bg-slate-900/60 backdrop-blur-md z-40 transition-all duration-300 opacity-100"
    onclick="closeAddBookForm()"></div>

<div id="add_article_container"
    class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 w-full max-w-2xl max-h-[85vh] flex flex-col rounded-2xl bg-white shadow-[0_20px_50px_rgba(0,0,0,0.2)] border border-slate-200 overflow-hidden">

    <form action="" method="POST" novalidate class="flex flex-col h-full">

        <div class="shrink-0 border-b border-slate-100 bg-white px-8 py-5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-primary/10 rounded-lg">
                    <span class="material-symbols-outlined text-primary text-2xl">post_add</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-slate-900">Create New Article</h3>
                    <p class="text-xs text-slate-500 font-medium uppercase tracking-wider">Draft your next masterpiece</p>
                </div>
            </div>

            <button type="button" onclick="closeAddBookForm()"
                class="p-2 rounded-full text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-all">
                <span class="material-symbols-outlined text-2xl">close</span>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto p-8 custom-scrollbar">
            <div class="space-y-8">

                <?php if (isset($data["errors"]["db"])): ?>
                    <div class="flex items-center gap-3 p-4 rounded-xl bg-red-50 text-red-700 border border-red-100 animate-in fade-in slide-in-from-top-2">
                        <span class="material-symbols-outlined">report</span>
                        <p class="text-sm font-semibold"><?= $data["errors"]["db"]; ?></p>
                    </div>
                <?php endif; ?>

                <div class="group flex flex-col gap-2.5">
                    <label class="text-sm font-bold text-slate-700 flex items-center justify-between">
                        <span>Article Title</span>
                        <span class="text-[10px] text-slate-400 font-normal italic">Required *</span>
                    </label>

                    <div class="relative transition-all duration-200">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 group-focus-within:text-primary transition-colors">
                            title
                        </span>
                        <input
                            type="text"
                            name="title"
                            value="<?= htmlspecialchars($data['title'] ?? '') ?>"
                            required
                            placeholder="e.g. The Future of Web GIS in 2026"
                            class="w-full h-12 pl-12 pr-4 text-sm font-medium rounded-xl border border-slate-200 bg-slate-50/30 text-slate-900 
                                   placeholder:text-slate-400 outline-none focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all" />
                    </div>

                    <?php if (!empty($data['errors']['titleErr'])): ?>
                        <p class="flex items-center gap-1 text-red-500 text-xs font-semibold mt-1">
                            <span class="material-symbols-outlined text-sm">error</span>
                            <?= htmlspecialchars($data['errors']['titleErr']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="group flex flex-col gap-2.5">
                    <label class="text-sm font-bold text-slate-700">
                        Article Content
                    </label>

                    <div class="relative transition-all duration-200">
                        <span class="absolute left-4 top-4 material-symbols-outlined text-slate-400 group-focus-within:text-primary transition-colors">
                            subject
                        </span>
                        <textarea
                            name="content"
                            rows="10"
                            required
                            placeholder="Start typing your story..."
                            class="w-full pl-12 pr-4 py-4 text-sm font-medium leading-relaxed rounded-xl border border-slate-200 bg-slate-50/30 text-slate-900 
                                   placeholder:text-slate-400 outline-none focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 resize-none transition-all"><?= htmlspecialchars($data['content'] ?? '') ?></textarea>
                    </div>

                    <?php if (!empty($data['errors']['contentErr'])): ?>
                        <p class="flex items-center gap-1 text-red-500 text-xs font-semibold mt-1">
                            <span class="material-symbols-outlined text-sm">error</span>
                            <?= htmlspecialchars($data['errors']['contentErr']) ?>
                        </p>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <div class="shrink-0 flex items-center justify-between gap-4 border-t border-slate-100 bg-slate-50/80 px-8 py-5">
            <p class="hidden sm:block text-xs text-slate-400 font-medium">
                Drafts are saved automatically
            </p>

            <div class="flex items-center gap-3 w-full sm:w-auto">
                <button type="button"
                    onclick="closeAddArticleForm()"
                    class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-6 py-2.5 text-sm font-bold text-slate-600 hover:text-slate-900 hover:bg-slate-200 rounded-xl transition-all">
                    Cancel
                </button>

                <button type="submit"
                    class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-8 py-2.5 rounded-xl bg-primary text-white text-sm font-bold
                           hover:bg-primary/90 hover:shadow-lg hover:shadow-primary/30 active:scale-95 transition-all shadow-md">
                    <span class="material-symbols-outlined text-[20px]">send</span>
                    Publish Article
                </button>
            </div>
        </div>

    </form>
</div>



<script>
    function openAddArticleForm() {
        document.getElementById('add_article_overlay').classList.remove('hidden');
        document.getElementById('add_article_container').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeAddArticleForm() {
        document.getElementById('add_article_overlay').classList.add('hidden');
        document.getElementById('add_article_container').classList.add('hidden');
        document.body.style.overflow = '';
        window.location.href = '/author/home';
    }

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAddArticleForm();

        }
    });

    let add_article_container = document.querySelector('#add_article_container')
    let add_article_btn = document.querySelector('#add_article_btn')
    add_article_btn.addEventListener('click', openAddBookForm)

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