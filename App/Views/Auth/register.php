<!-- Blog Register Form -->
<div id="registerForm" class="max-w-md mx-auto bg-white border border-slate-200 rounded-xl p-8">
    <?php if (isset($data['errors']['DatabaseErr'])): ?>
        <div class="mb-4 p-3 rounded bg-red-50 text-red-700 text-sm border border-red-200">
            <?= htmlspecialchars($data['errors']['DatabaseErr']); ?>
        </div>
    <?php endif; ?>
    <!-- Header -->
    <div class="mb-8 text-center">
        <h1 class="text-xl font-bold text-slate-900 mb-2">
            Create your account
        </h1>
        <p class="text-slate-600 text-sm">
            Join our blog to read, write, and share ideas.
        </p>
    </div>

    <!-- Form -->
    <form method="POST" action="" class="space-y-5" novalidate>

        <!-- Name -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Full name
            </label>
            <input
                type="text"
                name="full_name"
                placeholder="John Doe"
                required
                class="w-full px-4 py-2.5 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-slate-900/20 focus:border-slate-900" />
            <?php if (isset($data['errors']['NameErr'])): ?>
                <p class="text-red-500 text-xs mt-1"><?= htmlspecialchars($data['errors']['NameErr']) ?></p>
            <?php endif; ?>
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Email address
            </label>
            <input
                type="email"
                name="email"
                placeholder="john@example.com"
                required
                class="w-full px-4 py-2.5 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-slate-900/20 focus:border-slate-900" />
            <?php if (isset($data['errors']['NameErr'])): ?>
                <p class="text-red-500 text-xs mt-1"><?= htmlspecialchars($data['errors']['NameErr']) ?></p>
            <?php endif; ?>
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Password
            </label>
            <input
                type="password"
                name="password"
                minlength="8"
                required
                class="w-full px-4 py-2.5 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-slate-900/20 focus:border-slate-900" />
            <?php if (isset($data['errors']['PasswordErr'])): ?>
                <p class="text-red-500 text-xs mt-1"><?= htmlspecialchars($data['errors']['PasswordErr']) ?></p>
            <?php endif; ?>
        </div>

        <!-- Confirm -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Confirm password
            </label>
            <input
                type="password"
                name="password_confirm"
                required
                class="w-full px-4 py-2.5 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-slate-900/20 focus:border-slate-900" />
        </div>

        <!-- Terms -->
        <div class="flex items-start gap-2">
            <input type="checkbox" required class="mt-1">
            <p class="text-sm text-slate-600">
                I agree to the
                <a href="#" class="underline hover:text-slate-900">Terms</a>
                and
                <a href="#" class="underline hover:text-slate-900">Privacy Policy</a>
            </p>
        </div>

        <!-- Submit -->
        <button
            type="submit"
            class="w-full py-2.5 bg-slate-900 text-white rounded-md hover:bg-slate-800 transition font-medium">
            Create account
        </button>

        <!-- Footer -->
        <p class="text-center text-sm text-slate-600">
            Already have an account?
            <a href="/login" class="font-medium underline hover:text-slate-900">
                Sign in
            </a>
        </p>
    </form>
</div>