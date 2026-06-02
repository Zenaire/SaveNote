<div class="min-h-screen flex items-center justify-center">
    <script src=" https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }

            50% {
                box-shadow: 0 0 30px rgba(59, 130, 246, 0.5);
            }
        }

        .glow-animation {
            animation: glow 3s ease-in-out infinite;
        }

        .profile-image {
            transition: all 0.3s ease;
        }

        .profile-image:hover {
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(59, 130, 246, 0.6);
        }

        .edit-button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }

        .contact-card {
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            border-color: #3b82f6;
            background-color: rgba(59, 130, 246, 0.05);
        }

        .action-button {
            transition: all 0.3s ease;
        }

        .action-button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.4);
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }

        .icon-item {
            transition: all 0.3s ease;
        }

        .icon-item:hover {
            transform: scale(1.1);
        }

        .upload-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .profile-image-container:hover .upload-overlay {
            opacity: 1;
        }
    </style>
    </head>

    <body class="bg-gradient-to-b from-slate-950 to-black text-white">
        <main class="min-h-screen flex items-center justify-center px-4 py-8">
            <div class="w-full max-w-2xl">
                <!-- Header Background -->
                <div class="relative mb-8 rounded-2xl bg-gradient-to-r from-slate-900 to-slate-800 p-8 overflow-hidden">
                    <div
                        class="glow-animation absolute -right-20 -top-20 size-40 rounded-full bg-blue-500 blur-3xl opacity-20">
                    </div>
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold tracking-tight">Profile</h1>
                        <p class="text-slate-400 text-sm mt-1">Here is Your Profile Information</p>
                    </div>
                </div>

                <!-- Main Profile Card -->
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8 space-y-8">
                    <!-- Profile Header -->
                    <div class="flex flex-col sm:flex-row gap-8 items-start">
                        <!-- Profile Image -->
                        <div class="profile-image-container relative">
                            <img src="{{ Auth::user()->profile_photo_path }}" alt="Profile"
                                class="profile-image size-32 rounded-full border-4 border-blue-500 bg-slate-800 object-cover" />
                            <div class="upload-overlay">
                                <div class="text-center">
                                    <svg class="size-8 mx-auto mb-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    <p class="text-sm font-medium">Upload Photo</p>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Info -->
                        <div class="flex-1">
                            <div class="space-y-1 mb-4">
                                <h2 class="text-2xl font-bold">{{ Auth::user()->name }}</h2>
                                <p class="text-blue-400 font-medium">{{Auth::user()->email}}</p>
                                <p class="text-slate-400 text-sm max-w-md">Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit. Eos, atque tenetur dolore pariatur deleniti magnam enim voluptate
                                    optio quaerat sint.</p>

                            </div>

                            <!-- Buttons -->
                            <div class="flex flex-wrap gap-3 mt-6">
                                <a href="/editProfile">
                                    <button
                                        class="edit-button px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg font-medium transition-all">
                                        Edit Profile
                                    </button>
                                </a>
                                <a href="/dashboard">
                                    <button
                                        class="action-button px-6 py-2 border border-slate-600 rounded-lg font-medium hover:border-blue-500 transition-all"
                                        href="/dashboard">
                                        Back to Dashboard
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="pt-6 border-t border-slate-800">
                        <h3 class="text-sm font-semibold text-slate-400 uppercase tracking-wide mb-4">Contact
                            Information
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="contact-card border border-slate-700 rounded-lg p-4">
                                <div class="flex items-center gap-3 mb-2">
                                    <svg class="icon-item size-5 text-blue-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span
                                        class="text-xs text-slate-400 uppercase tracking-wide font-semibold">Email</span>
                                </div>
                                <p class="text-sm text-white truncate">alexandra@example.com</p>
                            </div>

                            <div class="contact-card border border-slate-700 rounded-lg p-4">
                                <div class="flex items-center gap-3 mb-2">
                                    <svg class="icon-item size-5 text-blue-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span
                                        class="text-xs text-slate-400 uppercase tracking-wide font-semibold">Location</span>
                                </div>
                                <p class="text-sm text-white truncate">San Francisco, CA</p>
                            </div>

                            <div class="contact-card border border-slate-700 rounded-lg p-4">
                                <div class="flex items-center gap-3 mb-2">
                                    <svg class="icon-item size-5 text-blue-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.658 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                        </path>
                                    </svg>
                                    <span
                                        class="text-xs text-slate-400 uppercase tracking-wide font-semibold">Website</span>
                                </div>
                                <p class="text-sm text-blue-400 truncate">www.alexandra.design</p>
                            </div>
                        </div>
                    </div>

                </div>
        </main>
    </body>

    <div>