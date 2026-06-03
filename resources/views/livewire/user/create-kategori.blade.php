<div>


    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #050816;
            overflow-x: hidden;
        }

        /* Animated Background */
        .glow {
            position: fixed;
            border-radius: 9999px;
            filter: blur(120px);
            z-index: -1;
            animation: float 10s ease-in-out infinite;
        }

        .glow-1 {
            width: 400px;
            height: 400px;
            background: rgba(37, 99, 235, 0.35);
            top: -120px;
            left: -120px;
        }

        .glow-2 {
            width: 450px;
            height: 450px;
            background: rgba(14, 165, 233, 0.2);
            bottom: -180px;
            right: -100px;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) translateX(0);
            }

            50% {
                transform: translateY(-35px) translateX(25px);
            }
        }

        .grid-bg {
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .shine {
            position: relative;
            overflow: hidden;
        }

        .shine::before {
            content: "";
            position: absolute;
            inset: 0;
            left: -120%;
            background: linear-gradient(120deg,
                    transparent,
                    rgba(255, 255, 255, 0.15),
                    transparent);
            transition: 0.8s;
        }

        .shine:hover::before {
            left: 120%;
        }
    </style>
    </head>

    <body class="min-h-screen text-white grid-bg">

        <!-- Background Effects -->
        <div class="glow glow-1"></div>
        <div class="glow glow-2"></div>

        <div class="max-w-3xl mx-auto px-6 py-12">
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
            <div class="mb-10 text-center">
                <h1
                    class="text-5xl font-extrabold bg-gradient-to-r from-blue-400 to-cyan-300 bg-clip-text text-transparent">
                    Create Category
                </h1>

                <p class="text-slate-400 mt-3">
                    Build a new category for organizing your notes.
                </p>
            </div>

            <!-- Main Card -->
            <div
                class="bg-slate-900/70 backdrop-blur-xl border border-blue-500/20 rounded-3xl p-8 shadow-2xl shadow-blue-500/10">

                <!-- Category Name -->
                <div class="mb-6">
                    <label class="block text-sm text-slate-300 mb-2">
                        Category Name
                    </label>

                    <input id="categoryName" type="text" placeholder="e.g. Work, School, Ideas..."
                        class="w-full px-5 py-4 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none transition-all duration-300">
                </div>


                <!-- Description -->
                <div class="mb-8">
                    <label class="block text-sm text-slate-300 mb-2">
                        Description
                    </label>

                    <textarea id="description" rows="4" placeholder="Describe this category..."
                        class="w-full px-5 py-4 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none resize-none transition-all duration-300"></textarea>
                </div>

                <!-- Preview -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4">
                        Live Preview
                    </h3>

                    <div id="previewCard"
                        class="bg-slate-800 border border-slate-700 rounded-2xl p-5 transition-all duration-300">
                        <div id="previewIcon"
                            class="w-12 h-12 rounded-xl bg-blue-500 flex items-center justify-center font-bold text-lg mb-4">
                            C
                        </div>

                        <h4 id="previewTitle" class="text-xl font-semibold">
                            Category Name
                        </h4>

                        <p id="previewDesc" class="text-slate-400 mt-2">
                            Category description...
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <button wire:click='(createKategori)'
                        class="shine flex-1 py-4 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 hover:scale-105 hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300 font-semibold">
                        Create Category
                    </button>

                    <button onclick="resetForm()"
                        class="px-6 py-4 rounded-xl border border-slate-700 hover:border-slate-500 hover:bg-slate-800 transition-all duration-300">
                        Reset
                    </button>
                </div>
            </div>

            <!-- Success Message -->
            <div id="success"
                class="hidden mt-6 bg-green-500/10 border border-green-500/30 text-green-300 rounded-xl p-4 text-center">
                Category created successfully!
            </div>

        </div>

    </body>


</div>