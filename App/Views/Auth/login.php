<div class="max-w-[480px] mx-auto bg-white rounded-[2.5rem] shadow-[0_20px_60px_rgba(0,0,0,0.05)] p-10 md:p-12 transition-all">

    <div id="loginForm">

        <div class="mb-10 text-center">
            <div class="inline-flex items-center justify-center size-14 bg-primary/5 text-primary rounded-2xl mb-6">
                <span class="material-symbols-outlined text-3xl">login</span>
            </div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight leading-none mb-3">
                Welcome back
            </h1>
            <p class="text-slate-400 text-sm font-medium">
                Sign in to your account to continue.
            </p>
        </div>

        <?php if (isset($data['errors']['LoginErr'])): ?>
            <div class="mb-6 flex items-center gap-3 p-4 rounded-2xl bg-red-50 text-red-600 text-sm border border-red-100">
                <span class="material-symbols-outlined text-lg">error</span>
                <span class="font-bold"><?= htmlspecialchars($data['errors']['LoginErr']); ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" action="/login" class="space-y-6" novalidate>

            <div class="group">
                <label for="email" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">
                    Email address
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-300 group-focus-within:text-primary transition-colors text-[20px]">mail</span>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="you@example.com"
                        value="<?= $data['email'] ?? '' ?>"
                        class="w-full pl-12 pr-4 py-4 bg-white border border-slate-200 rounded-2xl outline-none focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all placeholder:text-slate-300 text-slate-700 text-sm font-medium" />
                </div>
                <?php if (isset($data['errors']['EmailErr'])): ?>
                    <p class="text-red-500 text-[10px] font-bold mt-2 flex items-center gap-1 ml-1">
                        <span class="material-symbols-outlined text-xs">warning</span> <?= htmlspecialchars($data['errors']['EmailErr']) ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="group">
                <label for="password" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">
                    Password
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-300 group-focus-within:text-primary transition-colors text-[20px]">lock</span>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="••••••••"
                        class="w-full pl-12 pr-4 py-4 bg-white border border-slate-200 rounded-2xl outline-none focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all placeholder:text-slate-300 text-slate-700 text-sm font-medium" />
                </div>
                <?php if (isset($data['errors']['PasswordErr'])): ?>
                    <p class="text-red-500 text-[10px] font-bold mt-2 flex items-center gap-1 ml-1">
                        <span class="material-symbols-outlined text-xs">warning</span> <?= htmlspecialchars($data['errors']['PasswordErr']) ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="flex items-center justify-between px-1">
                <label class="flex items-center gap-2 cursor-pointer group">
                    <input
                        type="checkbox"
                        name="remember"
                        class="size-4 rounded-md border-slate-200 text-primary focus:ring-primary/20 transition-all cursor-pointer" />
                    <span class="text-xs text-slate-400 font-bold group-hover:text-slate-600 transition-colors">Remember me</span>
                </label>
                <a href="/forgot-password" class="text-xs font-bold text-primary hover:text-primary/80 transition-colors">Forgot Password?</a>
            </div>

            <button
                type="submit"
                class="w-full py-4 bg-slate-900 text-white rounded-2xl hover:bg-black active:scale-[0.97] transition-all font-bold text-sm shadow-xl shadow-slate-200 mt-2">
                Sign in
            </button>

            <div class="pt-6 text-center border-t border-slate-50 mt-8">
                <p class="text-xs text-slate-400 font-medium">
                    New here?
                    <a href="/register" class="font-bold text-primary hover:text-primary/80 transition-colors ml-1">
                        Create an account
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>