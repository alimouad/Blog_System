<div class="max-w-7xl mx-auto px-6 py-8">
    <div class="flex gap-8">
        <!-- Sidebar -->
        <aside class="hidden lg:block w-64 flex-shrink-0">
            <nav class="sticky top-24 space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary font-medium transition-colors">
                    <span class="material-symbols-outlined">home</span>
                    <span>Home</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-100 transition-colors">
                    <span class="material-symbols-outlined">auto_stories</span>
                    <span>My Reads</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-100 transition-colors">
                    <span class="material-symbols-outlined">trending_up</span>
                    <span>Trending</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-100 transition-colors">
                    <span class="material-symbols-outlined">bookmark</span>
                    <span>Bookmarks</span>
                </a>

                <div class="pt-6 mt-6 border-t border-slate-200">
                    <p class="px-4 text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Topics</p>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors">
                        <span class="material-symbols-outlined text-xl">palette</span>
                        <span class="text-sm">Design</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors">
                        <span class="material-symbols-outlined text-xl">computer</span>
                        <span class="text-sm">Technology</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors">
                        <span class="material-symbols-outlined text-xl">text_fields</span>
                        <span class="text-sm">Typography</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors">
                        <span class="material-symbols-outlined text-xl">psychology</span>
                        <span class="text-sm">UX Research</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 min-w-0">
            <!-- Mobile Search -->
            <div class="md:hidden mb-6 relative">
                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
                <input
                    type="text"
                    placeholder="Search articles..."
                    class="w-full pl-12 pr-4 py-3 rounded-xl border-none bg-white text-slate-900 placeholder-slate-400 focus:ring-2 focus:ring-primary/50 transition-all shadow-sm" />
            </div>

            <!-- Categories -->
            <div class="flex gap-3 overflow-x-auto pb-4 mb-8 no-scrollbar">
                <button class="flex-none px-5 py-2 rounded-full bg-slate-900 text-white text-sm font-medium transition-all hover:scale-105">All</button>
                <button class="flex-none px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 text-sm font-medium transition-all hover:bg-slate-50">Design</button>
                <button class="flex-none px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 text-sm font-medium transition-all hover:bg-slate-50">Tech</button>
                <button class="flex-none px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 text-sm font-medium transition-all hover:bg-slate-50">Culture</button>
                <button class="flex-none px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 text-sm font-medium transition-all hover:bg-slate-50">Minimalism</button>
                <button class="flex-none px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 text-sm font-medium transition-all hover:bg-slate-50">UX/UI</button>
            </div>

            <!-- Blog Posts Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Post Item 1 -->
                <article class="group bg-white rounded-2xl p-5 border border-slate-200 hover:shadow-lg hover:shadow-slate-200/50 transition-all cursor-pointer">
                    <div class="flex gap-4 mb-4">
                        <div class="flex-shrink-0">
                            <div class="w-28 h-28 rounded-xl bg-slate-200 overflow-hidden">
                                <img
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDoNbzEVsmsiVw0RwicpXLFhdNlhLoUFpb4UT8ArFLDc77uHgkFg5v6YfKH5BL4-DNdveT07CFuV0jJYGDtQeoEy0YWqvoVJ9QRU2sM_9zKRCTcCOSH3wAdw-Dte4dIRFNJwMM1ZgQ8kszc4QpkHuTEWoQ88UG3kOkV1kkOxzuv0BTJSgJCsjwq56zkWZzZ-kjk8lCaCSK1-T7FIFpwcvoN23hfQH0VaCSx2u5TcIv01bMEx5NDlL2DsyGkYYHiVK9wkAgN_lcntYkk"
                                    alt="Minimalist workspace"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold leading-tight text-slate-900 mb-2 group-hover:text-primary transition-colors">The Future of Minimalist UI</h3>
                            <p class="text-sm text-slate-500 line-clamp-2 leading-relaxed">
                                Exploring how white space and typography define modern mobile experiences and user retention.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-xs font-bold text-primary bg-primary/10 px-3 py-1 rounded-lg">Design</span>
                        <span class="text-xs text-slate-400">• 4 min read</span>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <div class="flex items-center gap-2">
                            <img
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAUwtJKsE3HTllXrF0gL7qON0TDcwq1Vs9lVTICYeR87Sx88w1nvKSCzHaycmG71uVnJwR2v6gFp2pUyU9uEOcD5oap_aBH4dGSyaUFkevKOX3Gb9JnvTMqFnTSfHcBnumkCNk1NjpI6X1-Y-CxVwFqg68-1ktuuAkHprA79ZOad00OP2mfcrno9x1QGbOVhKSzt3dZXKyRl3DmormOayjyQ7v_DBNE7roJ5WWHSi7Uumek54vwn8V0ADVYs6tLaCNyDNoNUqWA8bdc"
                                alt="Sarah Jenkins"
                                class="w-7 h-7 rounded-full object-cover" />
                            <p class="text-xs font-medium text-slate-600">Sarah Jenkins</p>
                        </div>
                        <p class="text-xs text-slate-400">Oct 24, 2023</p>
                    </div>
                </article>

                <!-- Post Item 2 -->
                <article class="group bg-white rounded-2xl p-5 border border-slate-200 hover:shadow-lg hover:shadow-slate-200/50 transition-all cursor-pointer">
                    <div class="flex gap-4 mb-4">
                        <div class="flex-shrink-0">
                            <div class="w-28 h-28 rounded-xl bg-slate-200 overflow-hidden">
                                <img
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtuQ9ro_HGIA02zL6bIv_Px0TRGryFwv1CHKeUZNr3yn2-OFY3D9vUXm5hs5-jhkHqphQq1gzJXYrlK_98Aq-Yq0YKsEToGAwNM2xdP-oAOK2AcXmSmvLyum5vk8aGKUsq1SwUitq3Q1WKPuNjsawdCrA4Fiy_o_oMDxfc9Leassp4wO7pr5i28tw8S-_nExDC_biphRzPjwcE-k_1nzpnUncnxWnLmDZ5SDGAo_0DT-G2b6S6OiXYBaY3pQc0-bzqtGbpESJb98nz"
                                    alt="Abstract blue liquid"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold leading-tight text-slate-900 mb-2 group-hover:text-primary transition-colors">Understanding Color Theory</h3>
                            <p class="text-sm text-slate-500 line-clamp-2 leading-relaxed">
                                Why the primary blue hue affects user trust and engagement metrics in financial applications.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-xs font-bold text-primary bg-primary/10 px-3 py-1 rounded-lg">Theory</span>
                        <span class="text-xs text-slate-400">• 6 min read</span>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <div class="flex items-center gap-2">
                            <img
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHJpfJyTthLQCvMRyE-WdMDyCPVFMMoqBPje777JlqdE4UvFlc2EFlSYe-gx4xKNWPdjaIwEErSPZGKaW8ptRn_kAN7da8qJNY1Xd7sJxGDtVF2hqHQKCtZ5Jl2pXtqb0nHq2Hb6_bXWe6EioAOumNn0n72nUJk6gXBlI8O46TwEmH6bw6-WLMBIQv3m4RFUVzcH2XEQOodgaAsDjZl4L3HEpX9QlCx6pPKnCF5ui4-qoEmbLMrr2bVqLCKS4U9zYNFLxw-VCqjNyq"
                                alt="Alex Chen"
                                class="w-7 h-7 rounded-full object-cover" />
                            <p class="text-xs font-medium text-slate-600">Alex Chen</p>
                        </div>
                        <p class="text-xs text-slate-400">Oct 23, 2023</p>
                    </div>
                </article>

                <!-- Post Item 3 -->
                <article class="group bg-white rounded-2xl p-5 border border-slate-200 hover:shadow-lg hover:shadow-slate-200/50 transition-all cursor-pointer">
                    <div class="flex gap-4 mb-4">
                        <div class="flex-shrink-0">
                            <div class="w-28 h-28 rounded-xl bg-slate-200 overflow-hidden">
                                <img
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnhspnJBmr4BoSfV0a6xo8UYqh7jKPV7kEpybK-okXuzg2WHPu3tos0R_FjzERrRVg15XKV2wo7yAPL5WihNCH9yGHYtzPBNE7KqJkw0QPWu5bdQSqhH6mxMX_9WUCFRBA0XGk8RGWu01yOYpiAkcaJLpwn4HQJQ-qSEAdCdrCcz03-NAwBhJyA6XjybbWdy-F3p1EK_epJvLC9MrqxY3BBFKxU5mrP1CKkG7w_Q6N2f0QhiluwH1_-BUKvBwYlwEXUG06YeNsXrmi"
                                    alt="Letterpress blocks"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold leading-tight text-slate-900 mb-2 group-hover:text-primary transition-colors">Typography in the Digital Age</h3>
                            <p class="text-sm text-slate-500 line-clamp-2 leading-relaxed">
                                A deep dive into serif fonts and their resurgence in modern app design.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-xs font-bold text-primary bg-primary/10 px-3 py-1 rounded-lg">Fonts</span>
                        <span class="text-xs text-slate-400">• 5 min read</span>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <div class="flex items-center gap-2">
                            <img
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcBICC52zh611yIcJX0Hg9oFkysbIoR3SLJnpMIqaWF3fawzIjgeYvtdjWPzjwrUcgJP9DXwc83aO2g7gOkO_Ottp6540luK2KttbbqFcRCxNRN8NmzBiybWJ1sTm6le827E1KnFzAfMFJ_Q_jPzfNRFUN1gRM0rjhoIR09PWy1I06RiRp8XBVVil5AjlqoBH6jdbTxi23bsjgDIKWB7_Aaw6D-lE5ZZ93FSCCzl_XL9WnrpxxEUMvL9LH3FnVTHVYoh2wFvX1e9Iz"
                                alt="Maria G"
                                class="w-7 h-7 rounded-full object-cover" />
                            <p class="text-xs font-medium text-slate-600">Maria G.</p>
                        </div>
                        <p class="text-xs text-slate-400">Oct 22, 2023</p>
                    </div>
                </article>

                <!-- Post Item 4 -->
                <article class="group bg-white rounded-2xl p-5 border border-slate-200 hover:shadow-lg hover:shadow-slate-200/50 transition-all cursor-pointer">
                    <div class="flex gap-4 mb-4">
                        <div class="flex-shrink-0">
                            <div class="w-28 h-28 rounded-xl bg-slate-200 overflow-hidden">
                                <img
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWtQDPRMS4n9cndcgunDO3-N1am1a1qCxpQRi1EkLyRzSeTqJ0fxA44jHaYWHqXuauRneNUAr2HHdmOs8m_W8b3AT2plJ7qDyOgjq-uoHLUSka_l5MseSdnH_EiV9rlZlxAF3wyy80-ekW3uA6XetvnLuJ1Ls4sF6XyCibLXPq6D77xkH7RHw8TPNDwsUZzK02dtq3ybFRv7aIY8eF2CZHMP6BUaRisFk4wxPCd2cYa2iWTPyVYt8jP47T9JaJzxL1CbKZBma47ejW"
                                    alt="3D abstract shapes"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold leading-tight text-slate-900 mb-2 group-hover:text-primary transition-colors">Micro-interactions Guide</h3>
                            <p class="text-sm text-slate-500 line-clamp-2 leading-relaxed">
                                Small animations that make a big difference in user perception and joy.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-xs font-bold text-primary bg-primary/10 px-3 py-1 rounded-lg">UX/UI</span>
                        <span class="text-xs text-slate-400">• 3 min read</span>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <div class="flex items-center gap-2">
                            <img
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDDST3osT4I3nGE6Wn0UuG95G5huc8H9W3w2cuzfN_Su6T56vwH88sdT1WpLPHXAeD-8TnlCwZ80SfmDhtyOZ3i-JViCpN7LKbGJBE9TRcOPzi1CVL98zw5NwOylXy-TyKQ6i8hpiN0ISvkxprfn3d__YHfpNkHpfxaQRzNeWxFeToWiN6oxX8RwQincN6qbjskn0lldH-gfisR7nI1u9dcpRyPdwrzaPy2ffla1b5eK3iZpgO60JSQtPp-Pkz5pAOEjdoetSeAdzzM"
                                alt="David R"
                                class="w-7 h-7 rounded-full object-cover" />
                            <p class="text-xs font-medium text-slate-600">David R.</p>
                        </div>
                        <p class="text-xs text-slate-400">Oct 20, 2023</p>
                    </div>
                </article>
            </div>
        </main>

    </div>
</div>