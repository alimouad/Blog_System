 <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200">
     <div class="max-w-7xl mx-auto px-6 py-4">
         <div class="flex items-center justify-between gap-6">
             <!-- Logo -->
             <div class="flex items-center gap-8">
                 <button class="lg:hidden p-2 hover:bg-slate-100 rounded-lg transition-colors">
                     <span class="material-symbols-outlined">menu</span>
                 </button>
                 <h1 class="text-xl font-bold tracking-tight text-slate-900">Daily Blog</h1>
             </div>

             <!-- Search Bar -->
             <div class="flex-1 max-w-2xl relative hidden md:block">
                 <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
                 <input
                     type="text"
                     placeholder="Search articles, topics, authors..."
                     class="w-full pl-12 pr-4 py-3 rounded-xl border-none bg-slate-100 text-slate-900 placeholder-slate-400 focus:ring-2 focus:ring-primary/50 transition-all" />
             </div>

             <!-- Actions -->
             <div class="flex items-center gap-3">
                 <button class="hidden md:flex p-2 hover:bg-slate-100 rounded-lg transition-colors">
                     <span class="material-symbols-outlined text-slate-700">notifications</span>
                 </button>
                 <a href="/login" class="hidden md:flex items-center gap-2 px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-blue-300 hover:text-white transition-colors font-medium">
                     <span>Login</span>
                 </a>
                 <img
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuA3tCfZOoBBwM01DfaZ25NPxRwbEqtGKT2QeAWrsWc4aH2DtMVsjU1kK_fp8iZZy0EYHnmIiMMSo7QLVu_uP-1ObKJRScOwvnis2emR9WAHLZGeCh-Hd1PCMoieNwRaC7y5rrG5GoTKLY_iLaNKTyBq_5duQBqpHM8hQAkzZzOgHuNjSxnDTvG72PtE3WqpgdoFLVfcz7Tqxf6MGUYDFRO7Si613ymAopPl5_T6LnX0FXw03AtmlXM7FGrh3g0uaIh6MY8FgbfG2Djn"
                     alt="Profile"
                     class="w-10 h-10 rounded-full border-2 border-slate-200 object-cover cursor-pointer" />
             </div>
         </div>
     </div>
 </header>