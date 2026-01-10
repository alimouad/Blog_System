<div class="flex w-full max-w-full mx-auto p-4 md:p-8  flex-col md:flex-row md:items-end justify-between gap-6">
    <div class="flex flex-col gap-2">
        <nav class="flex items-center gap-2 text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">
            <a href="/admin/home" class="hover:text-primary transition-colors">Admin</a>
            <span class="material-symbols-outlined text-[12px]">chevron_right</span>
            <span class="text-slate-900">User Management</span>
        </nav>

        <div class="flex items-center gap-4">
            <h2 class="text-slate-900 text-2xl md:text-3xl font-black leading-tight tracking-tight">
                Members
            </h2>
            <span class="bg-primary/10 text-primary text-xs font-black px-3 py-1 rounded-full mt-2">
                <?= count($members) ?> Total
            </span>
        </div>

        <p class="text-slate-500 text-base  text-md">
            Hello, <?= $_SESSION['user_name'] ?>. You have full control over contributor permissions.
        </p>
    </div>
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

<div class="flex-1 overflow-y-auto px-8 py-8">
    <div class="rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px]">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-6 py-4 text-left text-[11px] font-bold text-slate-400 uppercase tracking-widest">User Profile</th>
                        <th class="px-6 py-4 text-left text-[11px] font-bold text-slate-400 uppercase tracking-widest">Email Address</th>
                        <th class="px-6 py-4 text-left text-[11px] font-bold text-slate-400 uppercase tracking-widest">Role</th>
                        <th class="px-6 py-4 text-left text-[11px] font-bold text-slate-400 uppercase tracking-widest">Joined Date</th>
                        <th class="px-6 py-4 text-right text-[11px] font-bold text-slate-400 uppercase tracking-widest">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <?php if (!empty($members)): ?>
                        <?php foreach ($members as $user): ?>
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <span class="text-[10px] font-bold text-slate-300 w-4">#<?= $user['id'] ?></span>
                                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($user['full_name']) ?>&background=random"
                                            class="size-9 rounded-full shadow-sm" alt="">
                                        <span class="text-sm font-bold text-slate-900"><?= htmlspecialchars($user['full_name']) ?></span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-600 font-medium">
                                    <?= htmlspecialchars($user['email']) ?>
                                </td>

                                <td class="px-6 py-4">
                                    <?php
                                    $role = strtolower($user['role']);
                                    $color = ($role === 'admin') ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700';
                                    ?>
                                    <span class="px-3 py-1 rounded-full <?= $color ?> text-[10px] font-black uppercase tracking-tight">
                                        <?= htmlspecialchars($user['role']) ?>
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-xs font-medium text-slate-400">
                                    <?= date('M d, Y', strtotime($user['created_at'] ?? 'now')) ?>
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="/admin/users/delete?id=<?= $user['id'] ?>"
                                            onclick="return confirm('Permanently delete this user?')"
                                            class="p-2 rounded-lg text-slate-400 hover:text-red-500 hover:bg-red-50 transition-all">
                                            <span class="material-symbols-outlined text-[18px]">delete</span>
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
                                    <p class="text-slate-400 text-sm italic">No members found in the database.</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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