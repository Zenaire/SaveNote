<div>
    <div class="min-h-screen py-10 px-4">
        <div class="max-w-3xl mx-auto">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <a href="/dashboard"
                        class="group flex items-center text-gray-400 hover:text-blue-400 transition-colors mb-2 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Dashboard
                    </a>
                    <h1 class="text-3xl font-bold text-white tracking-tight">
                        Profile
                    </h1>
                    <p class="text-gray-500 mt-1">
                        Manage your account information
                    </p>
                </div>

                <div class="hidden md:block">
                    <div
                        class="h-12 w-12 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Profile Card -->
            <div class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-3xl p-6 md:p-10 shadow-2xl">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    <!-- Photo -->
                    <div class="relative group">
                        <img src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" class="w-32 h-32 rounded-full object-cover border-4 border-white/10">
                    </div>
                    <!-- User Info -->
                    <div class="flex-1 text-center md:text-left">

                        <h2 class="text-3xl font-bold text-white">
                            {{ Auth::user()->name }}
                        </h2>

                        <p class="text-blue-400 mt-2">
                            {{ Auth::user()->email }}
                        </p>

                        <div class="flex flex-wrap gap-4 mt-8">

                            <a href="/editProfile"
                                class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-2xl font-semibold transition-all shadow-[0_0_20px_rgba(37,99,235,0.2)] hover:shadow-[0_0_25px_rgba(37,99,235,0.4)]">
                                Edit Profile
                            </a>
                            <a href="/dashboard"
                                class="px-6 py-3 rounded-2xl border border-white/10 text-gray-400 hover:text-white hover:border-blue-500/50 transition-all">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>