<div id="registerForm" class="max-w-md mx-auto bg-white border border-slate-100 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.04)] p-10 transition-all">
    
    <div class="mb-10 text-center">
        <div class="inline-flex items-center justify-center size-14 bg-primary/5 text-primary rounded-2xl mb-4">
            <span class="material-symbols-outlined text-3xl">person_add</span>
        </div>
        <h1 class="text-2xl font-black text-slate-900 tracking-tight">
            Create your account
        </h1>
        <p class="text-slate-400 text-sm mt-2 font-medium">
            Join the community and share your ideas.
        </p>
    </div>

    <?php if (isset($data['errors']['DatabaseErr'])): ?>
        <div class="mb-6 flex items-center gap-3 p-4 rounded-xl bg-red-50 text-red-600 text-sm border border-red-100 animate-shake">
            <span class="material-symbols-outlined text-lg">error</span>
            <span class="font-bold"><?= htmlspecialchars($data['errors']['DatabaseErr']); ?></span>
        </div>
    <?php endif; ?>

    <form method="POST" action="" class="space-y-6" novalidate>

        <div class="group">
            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">
                Full name
            </label>
            <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-300 group-focus-within:text-primary transition-colors text-[20px]">person</span>
                <input
                    type="text"
                    name="full_name"
                    placeholder="John Doe"
                    required
                    value="<?= $data['full_name'] ?? '' ?>"
                    class="w-full pl-12 pr-4 py-3.5 bg-white border border-slate-200 rounded-2xl outline-none focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all placeholder:text-slate-300 text-slate-700 text-sm font-medium" />
            </div>
            <?php if (isset($data['errors']['NameErr'])): ?>
                <p class="text-red-500 text-[10px] font-bold mt-2 flex items-center gap-1 ml-1">
                    <span class="material-symbols-outlined text-xs">warning</span> <?= htmlspecialchars($data['errors']['NameErr']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="group">
            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">
                Email address
            </label>
            <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-300 group-focus-within:text-primary transition-colors text-[20px]">mail</span>
                <input
                    type="email"
                    name="email"
                    placeholder="name@example.com"
                    required
                    value="<?= $data['email'] ?? '' ?>"
                    class="w-full pl-12 pr-4 py-3.5 bg-white border border-slate-200 rounded-2xl outline-none focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all placeholder:text-slate-300 text-slate-700 text-sm font-medium" />
            </div>
             <?php if (isset($data['errors']['EmailErr'])): ?>
                <p class="text-red-500 text-[10px] font-bold mt-2 flex items-center gap-1 ml-1">
                    <span class="material-symbols-outlined text-xs">warning</span> <?= htmlspecialchars($data['errors']['EmailErr']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="group">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">
                    Password
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-300 group-focus-within:text-primary transition-colors text-[20px]">lock</span>
                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full pl-12 pr-4 py-3.5 bg-white border border-slate-200 rounded-2xl outline-none focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all text-slate-700 text-sm" />
                </div>
            </div>

            <div class="group">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">
                    Confirm
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-300 group-focus-within:text-primary transition-colors text-[20px]">verified_user</span>
                    <input
                        type="password"
                        name="password_confirm"
                        required
                        class="w-full pl-12 pr-4 py-3.5 bg-white border border-slate-200 rounded-2xl outline-none focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all text-slate-700 text-sm" />
                </div>
            </div>
        </div>
        <?php if (isset($data['errors']['PasswordErr'])): ?>
            <p class="text-red-500 text-[10px] font-bold flex items-center gap-1 ml-1">
                <span class="material-symbols-outlined text-xs">warning</span> <?= htmlspecialchars($data['errors']['PasswordErr']) ?>
            </p>
        <?php endif; ?>

        <div class="flex items-start gap-3 px-1 pt-2">
            <input type="checkbox" required class="mt-0.5 size-4 rounded-md border-slate-200 text-primary focus:ring-primary/20 transition-all cursor-pointer">
            <p class="text-[11px] text-slate-400 font-medium leading-relaxed">
                I agree to the <a href="#" class="text-slate-900 font-bold hover:underline">Terms</a> and 
                <a href="#" class="text-slate-900 font-bold hover:underline">Privacy Policy</a>
            </p>
        </div>

        <button
            type="submit"
            class="w-full py-4 bg-slate-900 text-white rounded-2xl hover:bg-black active:scale-[0.97] transition-all font-bold text-sm shadow-xl shadow-slate-200 mt-2">
            Create Account
        </button>

        <div class="pt-6 text-center">
            <p class="text-xs text-slate-400 font-medium">
                Already have an account?
                <a href="/login" class="font-bold text-primary hover:text-primary/80 transition-colors ml-1">
                    Sign in
                </a>
            </p>
        </div>
    </form>
</div>