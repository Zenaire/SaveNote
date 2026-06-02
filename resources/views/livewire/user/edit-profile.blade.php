<div class="min-h-screen py-10 px-4">
    <div class="max-w-3xl mx-auto">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">

            <div>
                <a href="/profile"
                    class="group flex items-center text-gray-400 hover:text-blue-400 transition-colors mb-2 text-sm">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>

                    Back to Profile
                </a>

                <h1 class="text-3xl font-bold text-white tracking-tight">
                    Edit Profile
                </h1>

                <p class="text-gray-500 mt-1">
                    Update your personal information
                </p>
            </div>

            <div class="hidden md:block">
                <div
                    class="h-12 w-12 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-blue-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>

                </div>
            </div>

        </div>

        @if (session()->has('success'))
            <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-400 rounded-2xl p-4">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="update"
            class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-3xl p-6 md:p-10 shadow-2xl space-y-8">
        
            <!-- Profile Photo -->
            <div class="flex flex-col items-center">
        
                <div class="relative group">
        
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}"
                            class="w-32 h-32 rounded-full object-cover border-4 border-white/10">
                    @else
                        <img
                            src="{{ Auth::user()->profile_photo_path ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                            class="w-32 h-32 rounded-full object-cover border-4 border-white/10">
                    @endif
        
                    <div
                        class="absolute inset-0 rounded-full bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
        
                        <span class="text-sm text-white">
                            Change Photo
                        </span>
        
                    </div>
        
                </div>
        
                <label
                    class="mt-4 px-5 py-2 rounded-xl border border-white/10 text-gray-300 hover:border-blue-500/50 hover:text-white cursor-pointer transition">
        
                    Upload Photo
        
                    <input
                        type="file"
                        wire:model="photo"
                        class="hidden">
        
                </label>
        
                <div wire:loading wire:target="photo"
                    class="text-blue-400 text-sm mt-3">
                    Uploading...
                </div>
        
            </div>
        
            <!-- Name -->
            <div class="space-y-2">
        
                <label class="text-sm font-medium text-gray-400 ml-1">
                    Full Name
                </label>
        
                <input
                    type="text"
                    wire:model="name"
                    class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-4 text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50">
        
                @error('name')
                    <p class="text-red-400 text-xs ml-1">
                        {{ $message }}
                    </p>
                @enderror
        
            </div>
        
            <!-- Email -->
            <div class="space-y-2">
        
                <label class="text-sm font-medium text-gray-400 ml-1">
                    Email Address
                </label>
        
                <input
                    type="email"
                    wire:model="email"
                    class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-4 text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50">
        
                @error('email')
                    <p class="text-red-400 text-xs ml-1">
                        {{ $message }}
                    </p>
                @enderror
        
            </div>
        
            <!-- Password -->
            <div class="space-y-2">
        
                <label class="text-sm font-medium text-gray-400 ml-1">
                    New Password
                </label>
        
                <input
                    type="password"
                    wire:model="password"
                    placeholder="Leave blank if you don't want to change it"
                    class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500/50">
        
                @error('password')
                    <p class="text-red-400 text-xs ml-1">
                        {{ $message }}
                    </p>
                @enderror
        
            </div>
        
            <!-- Password Confirmation -->
            <div class="space-y-2">
        
                <label class="text-sm font-medium text-gray-400 ml-1">
                    Confirm Password
                </label>
        
                <input
                    type="password"
                    wire:model="password_confirmation"
                    placeholder="Repeat your password"
                    class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500/50">
        
            </div>
        
            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-white/5">
        
                <a href="/profile"
                    class="px-6 py-3 text-sm font-medium text-gray-400 hover:text-white transition-colors">
                    Cancel
                </a>
        
                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="bg-blue-600 hover:bg-blue-500 text-white px-8 py-3 rounded-2xl font-semibold transition-all shadow-[0_0_20px_rgba(37,99,235,0.2)] hover:shadow-[0_0_25px_rgba(37,99,235,0.4)] disabled:opacity-50">
        
                    <span wire:loading.remove wire:target="update">
                        Save Changes
                    </span>
        
                    <span wire:loading wire:target="update">
                        Saving...
                    </span>
        
                </button>
        
            </div>
        
        </form>

    </div>
</div>