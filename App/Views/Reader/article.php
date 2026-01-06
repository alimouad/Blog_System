<div id="add_article_overlay"
    class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40"
    onclick="closeAddArticleForm()"></div>

<div id="add_article_container"
    class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
            z-50 w-full max-w-3xl max-h-[90vh] flex flex-col
            rounded-2xl bg-white/100 shadow-2xl ring-1 ring-black/5">

    <div class="flex items-center justify-between px-6 py-4 border-b bg-white/10 rounded-t-2xl">
        <h2 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">article</span>
            Article & Comments
        </h2>
        <button onclick="closeAddArticleForm()" class="text-slate-400 hover:text-slate-600 transition">
            <span class="material-symbols-outlined text-2xl">close</span>
        </button>
    </div>

    <div class="flex-1 overflow-y-auto p-6 space-y-8">

        <article class="group rounded-xl border border-slate-200 p-5 bg-[#bcc2c780]">
            <div class="flex flex-col sm:flex-row gap-5 mb-4">
                <div class="w-full sm:w-32 h-32 rounded-lg overflow-hidden bg-slate-200 flex-shrink-0">
                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnhspnJBmr4BoSfV0a6xo8UYqh7jKPV7kEpybK-okXuzg2WHPu3tos0R_FjzERrRVg15XKV2wo7yAPL5WihNCH9yGHYtzPBNE7KqJkw0QPWu5bdQSqhH6mxMX_9WUCFRBA0XGk8RGWu01yOYpiAkcaJLpwn4HQJQ-qSEAdCdrCcz03-NAwBhJyA6XjybbWdy-F3p1EK_epJvLC9MrqxY3BBFKxU5mrP1CKkG7w_Q6N2f0QhiluwH1_-BUKvBwYlwEXUG06YeNsXrmi"
                        alt="Article Thumbnail"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-slate-900 mb-2">
                        <?= htmlspecialchars($article['title']) ?>
                    </h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        <?= htmlspecialchars($article['content']) ?>
                    </p>
                </div>
            </div>

            <div class="flex items-center justify-between text-xs text-slate-400 border-t pt-3">
                <div class="flex items-center gap-2 text-black">
                    <span class="material-symbols-outlined text-[16px]">calendar_month</span>
                    <?= date('M d, Y', strtotime($article['created_at'])) ?>
                </div>
                <span class="flex items-center gap-1 text-black">
                    <span class="material-symbols-outlined text-[16px]">schedule</span>
                    1 min read
                </span>
            </div>
        </article>

        <div class="border-t pt-6">
            <form id="commentForm" class="flex flex-col gap-4" method="POST">
                <div id="commentErrors"
                    class="hidden flex gap-2 items-center p-3 rounded-lg
                    bg-red-50 text-red-700 text-sm border border-red-200">
                    <span class="material-symbols-outlined">error</span>
                    <span id="commentErrorText"></span>
                </div>

                <div>
                    <label class="text-sm font-semibold text-slate-700 flex items-center gap-2 mb-2">
                        <span class="material-symbols-outlined text-[18px] text-primary">add_comment</span>
                        Leave a comment
                    </label>
                    <textarea
                        id="commentContent"
                        name="content"
                        rows="3"
                        placeholder="Write your thoughts..."
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm
                        focus:outline-none focus:ring-2 focus:ring-primary/50
                        focus:border-primary resize-none transition"></textarea>
                </div>

                <input type="hidden" name="article_id" value="<?= $article['id'] ?>">

                <div class="flex justify-end">
                    <button type="submit"
                        class="flex items-center gap-2 px-6 py-2.5 rounded-lg
                           bg-primary text-white text-sm font-medium
                           hover:bg-blue-600 transition shadow-md active:scale-95">
                        <span class="material-symbols-outlined text-[18px]">send</span>
                        Post Comment
                    </button>
                </div>
            </form>
        </div>

        <div class="border-t pt-6">
            <h3 class="text-sm font-semibold text-slate-900 mb-4">Discussion</h3>
            <div id="commentsList" class="flex flex-col gap-4">
                <?php foreach ($comments as $comment): ?>
                    <div class="comment-item rounded-xl border border-slate-100 p-4 bg-white shadow-sm">
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-full overflow-hidden bg-slate-200 flex-shrink-0">
                                <img src="<?= $comment['avatar'] ?? '/../..Public/Assets/user.jpg' ?>"
                                    class="w-full h-full object-cover" />
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="text-sm font-bold text-slate-900"><?= htmlspecialchars($comment['author_name']) ?></h4>
                                    <span class="text-[15px] text-slate-400"><?= date('M d, Y', strtotime($comment['created_at'])) ?></span>
                                </div>
                                <p class="text-sm text-slate-600"><?= htmlspecialchars($comment['content']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

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