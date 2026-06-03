<div>

    <title>Edit Category - Notes App</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #040816;
            overflow-x: hidden;
        }

        /* Animated Background */
        .glow {
            position: fixed;
            border-radius: 9999px;
            filter: blur(140px);
            z-index: -1;
            animation: float 12s ease-in-out infinite;
        }

        .glow-blue {
            width: 500px;
            height: 500px;
            background: rgba(37, 99, 235, 0.25);
            top: -150px;
            left: -100px;
        }

        .glow-cyan {
            width: 450px;
            height: 450px;
            background: rgba(6, 182, 212, 0.15);
            bottom: -100px;
            right: -100px;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(30px, -40px);
            }
        }

        .grid-bg {
            background-image:
                linear-gradient(rgba(255, 255, 255, .03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .03) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .shine {
            position: relative;
            overflow: hidden;
        }

        .shine::before {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg,
                    transparent,
                    rgba(255, 255, 255, .15),
                    transparent);
            transition: .8s;
        }

        .shine:hover::before {
            left: 120%;
        }

        .card-hover:hover {
            transform: translateY(-4px);
        }
    </style>
    </head>

    <body class="min-h-screen text-white grid-bg">

        <div class="glow glow-blue"></div>
        <div class="glow glow-cyan"></div>

        <div class="max-w-6xl mx-auto px-6 py-10">
            <div class="text-left mb-10">
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
            </div>
            <!-- Header -->
            <div class="mb-10">
                <h1
                    class="text-5xl font-black bg-gradient-to-r from-blue-400 via-cyan-300 to-blue-500 bg-clip-text text-transparent">
                    Edit Category
                </h1>
                <p class="text-slate-400 mt-3 text-lg">
                    Modify your note categories with real-time preview.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">

                <!-- Edit Form -->
                <div
                    class="bg-slate-900/70 backdrop-blur-xl border border-blue-500/20 rounded-3xl p-8 shadow-2xl shadow-blue-900/30">

                    <h2 class="text-2xl font-bold mb-6">
                        Category Settings
                    </h2>

                    <!-- Name -->
                    <div class="mb-5">
                        <label class="block text-slate-300 mb-2">
                            Category Name
                        </label>

                        <input id="categoryName" value="Work" type="text"
                            class="w-full px-5 py-4 bg-slate-800 border border-slate-700 rounded-xl focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    <!-- Description -->
                    <div class="mb-5">
                        <label class="block text-slate-300 mb-2">
                            Description
                        </label>

                        <textarea id="categoryDescription" rows="4"
                            class="w-full px-5 py-4 bg-slate-800 border border-slate-700 rounded-xl focus:outline-none focus:border-blue-500 resize-none transition-all">Work related notes and projects.</textarea>
                    </div>

                    <!-- Icon -->
                    <div class="mb-5">
                        <label class="block text-slate-300 mb-3">
                            Category Icon
                        </label>

                        <div class="grid grid-cols-6 gap-3">

                            <button
                                class="icon-btn text-xl bg-slate-800 rounded-xl py-3 hover:bg-blue-500/20">💼</button>
                            <button
                                class="icon-btn text-xl bg-slate-800 rounded-xl py-3 hover:bg-blue-500/20">📚</button>
                            <button
                                class="icon-btn text-xl bg-slate-800 rounded-xl py-3 hover:bg-blue-500/20">💡</button>
                            <button
                                class="icon-btn text-xl bg-slate-800 rounded-xl py-3 hover:bg-blue-500/20">🎯</button>
                            <button
                                class="icon-btn text-xl bg-slate-800 rounded-xl py-3 hover:bg-blue-500/20">🚀</button>
                            <button
                                class="icon-btn text-xl bg-slate-800 rounded-xl py-3 hover:bg-blue-500/20">📝</button>

                        </div>
                    </div>

                    <!-- Colors -->
                    <div class="mb-8">
                        <label class="block text-slate-300 mb-3">
                            Accent Color
                        </label>

                        <div class="flex flex-wrap gap-3">

                            <button class="color-btn w-10 h-10 rounded-full bg-blue-500 ring-4 ring-white"></button>
                            <button class="color-btn w-10 h-10 rounded-full bg-cyan-500"></button>
                            <button class="color-btn w-10 h-10 rounded-full bg-purple-500"></button>
                            <button class="color-btn w-10 h-10 rounded-full bg-pink-500"></button>
                            <button class="color-btn w-10 h-10 rounded-full bg-green-500"></button>
                            <button class="color-btn w-10 h-10 rounded-full bg-orange-500"></button>

                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-4">

                        <button onclick="saveChanges()"
                            class="shine flex-1 py-4 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 font-semibold hover:scale-105 transition-all duration-300 shadow-lg shadow-blue-500/20">
                            Save Changes
                        </button>

                        <button onclick="deleteCategory()"
                            class="px-6 py-4 rounded-xl border border-red-500/40 text-red-400 hover:bg-red-500/10 transition-all">
                            Delete
                        </button>

                    </div>

                </div>

                <!-- Live Preview -->
                <div
                    class="bg-slate-900/70 backdrop-blur-xl border border-blue-500/20 rounded-3xl p-8 shadow-2xl shadow-blue-900/20">

                    <h2 class="text-2xl font-bold mb-6">
                        Live Preview
                    </h2>

                    <div id="previewCard"
                        class="card-hover transition-all duration-300 bg-slate-800 border border-slate-700 rounded-2xl p-6">

                        <div id="previewIcon"
                            class="w-16 h-16 rounded-2xl bg-blue-500 flex items-center justify-center text-3xl mb-5 transition-all">
                            💼
                        </div>

                        <h3 id="previewTitle" class="text-2xl font-bold">
                            Work
                        </h3>

                        <p id="previewDescription" class="text-slate-400 mt-3">
                            Work related notes and projects.
                        </p>

                        <div class="mt-6 flex gap-2 flex-wrap">
                            <span class="px-3 py-1 rounded-full bg-blue-500/20 text-blue-300 text-sm">
                                Active Category
                            </span>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Notification -->
            <div id="notification"
                class="hidden mt-6 bg-green-500/10 border border-green-500/30 text-green-300 p-4 rounded-xl text-center">
                Category updated successfully!
            </div>

        </div>



    </body>

</div>