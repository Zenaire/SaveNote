<div>
    <div>

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            /* Animated Background */
            body {
                background: #050816;
                overflow-x: hidden;
            }

            .bg-glow {
                position: fixed;
                border-radius: 9999px;
                filter: blur(120px);
                z-index: -1;
                animation: float 12s ease-in-out infinite;
            }

            .bg-glow:nth-child(1) {
                width: 400px;
                height: 400px;
                background: rgba(37, 99, 235, 0.35);
                top: -100px;
                left: -100px;
            }

            .bg-glow:nth-child(2) {
                width: 500px;
                height: 500px;
                background: rgba(59, 130, 246, 0.2);
                bottom: -200px;
                right: -100px;
                animation-delay: 4s;
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px) translateX(0px);
                }

                50% {
                    transform: translateY(-40px) translateX(30px);
                }
            }

            /* Grid Overlay */
            .grid-bg {
                background-image:
                    linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
                background-size: 40px 40px;
            }

            /* Shine Effect */
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
            <div class="bg-glow"></div>
            <div class="bg-glow"></div>

            <!-- Main Container -->
            <div class="max-w-6xl mx-auto px-6 py-12">

                <!-- Header -->
                <div class="mb-10">
                    <h1
                        class="text-5xl font-extrabold bg-gradient-to-r from-blue-400 to-cyan-300 bg-clip-text text-transparent">
                        Category Manager
                    </h1>
                    <p class="text-slate-400 mt-3 text-lg">
                        Organize your notes with modern categories.
                    </p>

                </div>


                <!-- Add Category Card -->
                <div
                    class="bg-slate-900/70 backdrop-blur-xl border border-blue-500/20 rounded-3xl p-8 shadow-2xl shadow-blue-500/10 mb-10">

                    <div class="flex flex-col md:flex-row gap-4">
                        <input id="categoryInput" type="text" placeholder="Enter category name..."
                            class="flex-1 px-5 py-4 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none transition-all duration-300" />
                        <a href="/createkategori">
                            <button
                                class="shine px-8 py-4 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 hover:scale-105 hover:shadow-lg hover:shadow-blue-500/40 transition-all duration-300 font-semibold">
                                Add Category
                            </button>
                        </a>
                    </div>
                </div>

                <!-- Categories Section -->
                <div>
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-semibold">
                            Your Categories
                        </h2>

                        <span id="count"
                            class="px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-300">
                            0 Categories
                        </span>
                    </div>
                    <div class="flex justify-end">
                        <a href="/editkategori">
                            <h3 class="text-sm text-slate-200 border/slate-200 border px-3 py-1 rounded-full flex">
                                Edit
                            </h3>
                        </a>
                    </div>
                    <div id="categoryGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    </div>
                </div>

            </div>

            <div class="max-w-6xl mx-auto px-6 py-12 text-center">
                <a href="/dashboard">
                    <button
                        class="px-4 py-2 rounded-lg bg-slate-800 border border-slate-600 hover:bg-slate-700 transition">
                        Back to Home
                    </button>
                </a>
            </div>



        </body>
    </div>
</div>