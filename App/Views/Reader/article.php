<div id="add_article_overlay"
    class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 transition-opacity duration-300"
    onclick="closeAddArticleForm()"></div>

<div id="add_article_container"
    class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 w-full max-w-3xl max-h-[90vh] flex flex-col rounded-[2rem] bg-white shadow-2xl overflow-hidden animate-in zoom-in-95 duration-200">

    <div class="sticky top-0 z-10 flex items-center justify-between px-8 py-5 border-b border-slate-100 bg-white/80 backdrop-blur-md">
        <div class="flex items-center gap-3">
            <div class="size-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
                <span class="material-symbols-outlined font-bold">menu_book</span>
            </div>
            <div>
                <h2 class="text-lg font-black text-slate-900 leading-none">Article & Discussion</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Reader View</p>
            </div>
        </div>
        <button onclick="closeAddArticleForm()" class="size-10 flex items-center justify-center rounded-xl text-slate-400 hover:bg-slate-50 hover:text-slate-900 transition-all">
            <span class="material-symbols-outlined text-2xl">close</span>
        </button>
    </div>

    <div class="flex-1 overflow-y-auto p-8 space-y-10 custom-scrollbar">

        <article class="relative">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="w-full md:w-40 h-40 rounded-2xl overflow-hidden bg-slate-100 shadow-sm flex-shrink-0 group">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnhspnJBmr4BoSfV0a6xo8UYqh7jKPV7kEpybK-okXuzg2WHPu3tos0R_FjzERrRVg15XKV2wo7yAPL5WihNCH9yGHYtzPBNE7KqJkw0QPWu5bdQSqhH6mxMX_9WUCFRBA0XGk8RGWu01yOYpiAkcaJLpwn4HQJQ-qSEAdCdrCcz03-NAwBhJyA6XjybbWdy-F3p1EK_epJvLC9MrqxY3BBFKxU5mrP1CKkG7w_Q6N2f0QhiluwH1_-BUKvBwYlwEXUG06YeNsXrmi" alt="Article Thumbnail" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                </div>

                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-[10px] font-black tracking-[0.15em] uppercase text-primary bg-primary/5 px-3 py-1 rounded-full">
                            <?= htmlspecialchars($category['name']) ?>
                        </span>
                        <span class="text-[10px] font-bold text-slate-300 uppercase tracking-widest">• 1 min read</span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 leading-tight mb-4">
                        <?= htmlspecialchars($article['title']) ?>
                    </h3>

                    <p class="text-slate-600 leading-relaxed text-sm italic border-l-4 border-slate-100 pl-4 py-1">
                        "<?= htmlspecialchars($article['content']) ?>"
                    </p>
                </div>
            </div>

            <div class="flex items-center justify-between mt-6 pt-6 border-t border-slate-50">
                <div class="flex items-center gap-6 text-[11px] font-bold text-slate-400">
                    <div class="flex items-center gap-1.5 hover:text-slate-600 transition-colors">
                        <span class="material-symbols-outlined text-lg">calendar_today</span>
                        <?= date('M d, Y', strtotime($article['created_at'])) ?>
                    </div>
                    <div class="flex items-center gap-1.5 hover:text-slate-600 transition-colors">
                        <span class="material-symbols-outlined text-lg">person</span>
                        By Admin
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <button id="reportBtn"
                        data-article-id="<?= $article['id'] ?>"
                        class="group flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-50 hover:bg-orange-50 transition-all duration-300 active:scale-95"
                        title="Report this article">
                        <span class="material-symbols-outlined text-xl text-slate-400 group-hover:text-orange-500 transition-colors">
                            flag
                        </span>
                        <span class="text-xs font-black text-slate-600 group-hover:text-orange-600 uppercase tracking-tighter">
                            Report
                        </span>
                    </button>

                    <button id="likeBtn" data-article-id="<?= $article['id'] ?>" class="group flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-50 hover:bg-red-50 transition-all duration-300 active:scale-90">
                        <span id="likeIcon" class="material-symbols-outlined text-xl text-slate-400 group-hover:text-red-500 transition-colors">
                            favorite
                        </span>
                        <span id="likeCount" class="text-xs font-black text-slate-600 group-hover:text-red-600">
                            <?= $article['likes_count'] ?? 0 ?>
                        </span>
                    </button>
                </div>
            </div>
        </article>

        <section class="bg-slate-50 rounded-3xl p-6 border border-slate-100/50">
            <form id="commentForm" class="space-y-4" method="POST">
                <div id="commentErrors" class="hidden flex gap-3 items-center p-4 rounded-xl bg-red-50 text-red-700 text-xs font-bold border border-red-100 animate-pulse">
                    <span class="material-symbols-outlined text-lg">error</span>
                    <span id="commentErrorText"></span>
                </div>

                <div class="group">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest flex items-center gap-2 mb-3 ml-1">
                        <span class="material-symbols-outlined text-sm text-primary">chat_bubble</span>
                        Share your thoughts
                    </label>
                    <textarea
                        id="commentContent"
                        name="content"
                        rows="3"
                        placeholder="Write a constructive comment..."
                        class="w-full rounded-2xl border border-slate-200 bg-white px-5 py-4 text-sm text-slate-700 outline-none focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all resize-none shadow-sm"></textarea>
                </div>

                <input type="hidden" name="article_id" value="<?= $article['id'] ?>">

                <div class="flex justify-end">
                    <button type="submit"
                        class="flex items-center gap-2 px-8 py-3 rounded-xl bg-slate-900 text-white text-xs font-black uppercase tracking-widest hover:bg-primary hover:shadow-xl hover:shadow-primary/20 transition-all active:scale-95">
                        <span class="material-symbols-outlined text-lg">send</span>
                        Post Comment
                    </button>
                </div>
            </form>
        </section>

        <section class="space-y-6">
            <div class="flex items-center gap-3 mb-6">
                <h3 class="text-sm font-black text-slate-900 uppercase tracking-wider">Discussion</h3>
                <div class="h-px flex-1 bg-slate-100"></div>
                <span class="text-[11px] font-bold text-slate-400 bg-slate-100 px-2 py-0.5 rounded-md"><?= count($comments) ?></span>
            </div>

            <div id="commentsList" class="flex flex-col gap-6">
                <?php foreach ($comments as $comment): ?>
                    <div class="group flex gap-4 transition-all duration-300">
                        <div class="size-10 rounded-2xl overflow-hidden bg-slate-200 ring-4 ring-white shadow-sm flex-shrink-0">
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($comment['author_name']) ?>&background=random"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="flex-1 space-y-2">
                            <div class="flex items-baseline justify-between">
                                <h4 class="text-sm font-black text-slate-900"><?= htmlspecialchars($comment['author_name']) ?></h4>
                                <span class="text-[10px] font-bold text-slate-300 uppercase"><?= date('M d, Y', strtotime($comment['created_at'])) ?></span>
                            </div>
                            <div class="bg-white border border-slate-100 rounded-2xl rounded-tl-none p-4 text-sm text-slate-600 shadow-sm group-hover:border-primary/20 transition-colors leading-relaxed">
                                <?= htmlspecialchars($comment['content']) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </div>

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
        window.location.href = '/';
    }

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeAddArticleForm();

    });
    const likeBtn = document.getElementById('likeBtn');
    const likeIcon = document.getElementById('likeIcon');
    const likeCount = document.getElementById('likeCount');


    document.getElementById('reportBtn').addEventListener('click', async function() {
        const articleId = this.dataset.articleId;
        const reason = prompt("Why are you reporting this article? (Inappropriate, Spam, Harassment, etc.)");

        if (reason && reason.trim().length > 0) {
            const formData = new FormData();
            formData.append('article_id', articleId);
            formData.append('reason', reason);

            try {
                const res = await fetch('/article/report', {
                    method: 'POST',
                    body: formData
                });
                const data = await res.json();

                if (data.success) {
                    alert(data.message);
                    this.classList.add('opacity-50', 'pointer-events-none'); // Disable button after reporting
                } else {
                    alert(data.error || "Failed to submit report.");
                }
            } catch (err) {
                console.error('Report error:', err);
            }
        }
    });

    
    likeBtn.addEventListener('click', async () => {
        const articleId = likeBtn.dataset.articleId;
        const formData = new FormData();
        formData.append('article_id', articleId);

        try {
            const res = await fetch('/likes/store', {
                method: 'POST',
                body: formData
            });
            const text = await res.text();
            const data = JSON.parse(text);

            if (data.success) {
                likeCount.textContent = data.newLikeCount;

                if (data.isLiked) {
                    likeIcon.classList.remove('text-slate-400');
                    likeIcon.classList.add('text-red-500');
                    likeIcon.style.fontVariationSettings = "'FILL' 1";
                    likeBtn.classList.add('bg-red-50');
                } else {
                    likeIcon.classList.remove('text-red-500');
                    likeIcon.classList.add('text-slate-400');
                    likeIcon.style.fontVariationSettings = "'FILL' 0";
                    likeBtn.classList.remove('bg-red-50');
                }
            }
        } catch (err) {
            console.error('Check Network tab! The server returned HTML instead of JSON:', err);
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        const commentsList = document.getElementById('commentsList');
        const commentForm = document.getElementById('commentForm');
        const errorBox = document.getElementById('commentErrors');
        const errorText = document.getElementById('commentErrorText');

        // Function to render a single comment
        function renderComment(comment) {
            const div = document.createElement('div');
            div.className = 'bg-white rounded-xl p-4 border border-slate-200 shadow-sm';
            div.innerHTML = `
            <div class="flex items-center gap-3 mb-2">
                <img src="${comment.author_image || '/Public/Assets/user.jpg'}" alt="${comment.author}" class="w-8 h-8 rounded-full object-cover">
                <div>
                    <p class="text-sm font-medium text-slate-900">${comment.author}</p>
                    <p class="text-xs text-slate-400">${comment.created_at}</p>
                </div>
            </div>
            <p class="text-sm text-slate-700 leading-relaxed">${comment.content}</p>
        `;
            commentsList.prepend(div); // newest comments on top
        }


        // Handle new comment submission
        commentForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            errorBox.classList.add('hidden');
            errorText.textContent = '';

            const formData = new FormData(commentForm);

            try {
                const res = await fetch('/comments/store', {
                    method: 'POST',
                    body: formData
                });
                const data = await res.json();

                if (!data.success) {
                    errorText.textContent = data.error;
                    errorBox.classList.remove('hidden');
                    return;
                }
                commentForm.reset();
                renderComment(data.comment);
            } catch (err) {
                errorText.textContent = 'Something went wrong. Please try again.';
                errorBox.classList.remove('hidden');
                console.error(err);
            }
        });

    });
</script>