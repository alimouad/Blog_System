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
<div class="flex-1 w-full max-w-full mx-auto p-4 md:p-8 flex flex-col gap-10">

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="flex flex-col gap-2">
            <nav class="flex items-center gap-2 text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">
                <a href="/admin/home" class="hover:text-primary transition-colors">Admin</a>
                <span class="material-symbols-outlined text-[12px]">chevron_right</span>
                <span class="text-slate-900">Category</span>
            </nav>

            <div class="flex items-center gap-4">
                <h2 class="text-slate-900 text-2xl md:text-3xl font-black leading-tight tracking-tight">
                    Categories
                </h2>

            </div>
            <p class="text-slate-500 text-base font-medium">Organize your articles by creating and managing topics.</p>
        </div>

        <button onclick="openModal()"
            class="flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-2xl font-bold text-sm hover:shadow-xl hover:shadow-primary/30 transition-all active:scale-95">
            <span class="material-symbols-outlined text-[20px]">add_box</span>
            New Category
        </button>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-sm">
        <table class="w-full">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="px-6 py-4 text-left text-[11px] font-bold text-slate-400 uppercase tracking-widest">Name</th>
                    <th class="px-6 py-4 text-left text-[11px] font-bold text-slate-400 uppercase tracking-widest">Description</th>
                    <th class="px-6 py-4 text-left text-[11px] font-bold text-slate-400 uppercase tracking-widest">Created At</th>
                    <th class="px-6 py-4 text-right text-[11px] font-bold text-slate-400 uppercase tracking-widest">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $cat): ?>
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="size-8 rounded-lg bg-primary/5 flex items-center justify-center text-primary">
                                        <span class="material-symbols-outlined text-lg">label</span>
                                    </div>
                                    <span class="text-sm font-bold text-slate-900"><?= htmlspecialchars($cat['name']) ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500 max-w-xs truncate">
                                <?= htmlspecialchars($cat['description']) ?>
                            </td>
                            <td class="px-6 py-4 text-xs font-medium text-slate-400">
                                <?= date('M d, Y', strtotime($cat['created_at'])) ?>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="/admin/category/delete?id=<?= $cat['id'] ?>" onclick="return confirm('Delete category?')" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center gap-2">
                                <span class="material-symbols-outlined text-4xl text-slate-200">person_off</span>
                                <p class="text-slate-400 text-sm italic">No category found in the database.</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="modalOverlay" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-40 transition-opacity" onclick="closeModal()"></div>

<div id="categoryModal" class="hidden fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 w-full max-w-lg bg-white rounded-3xl shadow-2xl overflow-hidden">
    <form action="" method="POST" novalidate">
        <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-xl font-black text-slate-900">Create Category</h3>
            <button type="button" onclick="closeModal()" class="text-slate-400 hover:text-slate-600">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <div class="p-8 space-y-6">
            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase">Category Name</label>
                <input type="text" name="name" required placeholder="e.g. Technology"
                    class="w-full h-12 px-4 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all">
                <?php if (!empty($data['errors']['nameErr'])): ?>
                    <p class="text-red-500 text-xs"><?= htmlspecialchars($data['errors']['nameErr']) ?></p>
                <?php endif; ?>
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase">Description</label>
                <textarea name="description" rows="4" placeholder="What is this category about?"
                    class="w-full p-4 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all resize-none"></textarea>
                <?php if (!empty($data['errors']['descrErr'])): ?>
                    <p class="text-red-500 text-xs"><?= htmlspecialchars($data['errors']['descrErr']) ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="p-8 pt-0 flex gap-3">
            <button type="button" onclick="closeModal()" class="flex-1 py-3 font-bold text-slate-500 hover:bg-slate-50 rounded-xl transition-all">Cancel</button>
            <button type="submit" class="flex-1 py-3 font-bold bg-primary text-white rounded-xl shadow-lg shadow-primary/20 hover:scale-[1.02] transition-all">Save Category</button>
        </div>
    </form>
</div>

<script>
    function openModal() {
        document.getElementById('categoryModal').classList.remove('hidden');
        document.getElementById('modalOverlay').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('categoryModal').classList.add('hidden');
        document.getElementById('modalOverlay').classList.add('hidden');
    }

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