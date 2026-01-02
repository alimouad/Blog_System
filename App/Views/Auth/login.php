<!-- Blog Login Section -->
<div class="max-w-4xl mx-auto bg-white border border-slate-200 rounded-xl overflow-hidden">

    <!-- Right: Login Form -->
    <div id="loginForm" class="p-8">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl mb-3  text-center font-bold text-slate-900 mb-2">
                Welcome back
            </h1>
            <p class="text-slate-600 text-sm">
                Sign in to continue reading and writing.
            </p>
        </div>
        <?php if (isset($data['errors']['LoginErr'])): ?>
            <div class="mb-4 p-3 rounded bg-red-50 text-red-700 text-sm border border-red-200">
                <?= htmlspecialchars($data['errors']['LoginErr']); ?>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form method="POST" action="/login" class="space-y-5" novalidate>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">
                    Email address
                </label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="you@example.com"
                    autocomplete="email"
                    required
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-md
                           focus:outline-none focus:ring-2 focus:ring-slate-900/20 focus:border-slate-900" />
                <?php if (isset($data['errors']['EmailErr'])): ?>
                    <p class="text-red-500 text-xs mt-1"><?= htmlspecialchars($data['errors']['EmailErr']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1">
                    Password
                </label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="current-password"
                    required
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-md
                           focus:outline-none focus:ring-2 focus:ring-slate-900/20 focus:border-slate-900" />
                <?php if (isset($data['errors']['PasswordErr'])): ?>
                    <p class="text-red-500 text-xs mt-1"><?= htmlspecialchars($data['errors']['PasswordErr']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input
                        type="checkbox"
                        name="remember"
                        class="rounded border-slate-300 focus:ring-slate-900" />
                    <span class="text-slate-600">Remember me</span>
                </label>

            </div>

            <!-- Submit -->
            <button
                type="submit"
                class="w-full py-2.5 bg-slate-900 text-white rounded-md
                       hover:bg-slate-800 transition font-medium">
                Sign in
            </button>

            <!-- Footer -->
            <p class="text-center text-sm text-slate-600">
                New here?
                <a href="/register" class="font-medium underline hover:text-slate-900">
                    Create an account
                </a>
            </p>
        </form>
    </div>
</div>