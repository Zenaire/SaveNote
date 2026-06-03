<div class="min-h-screen py-10 px-4 text-white">
    <div class="max-w-3xl mx-auto">
        
        <!-- HEADER -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <a href="/kategori" class="group flex items-center text-gray-400 hover:text-blue-400 transition-colors mb-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Categories
                </a>
                <h1 class="text-3xl font-bold text-white tracking-tight">Edit Category</h1>
            </div>
            
            <div class="hidden md:block">
                <div class="h-12 w-12 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center">
                    <!-- Ikon Tag (Kategori) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- SUCCESS NOTIFICATION -->
        @if (session()->has('success'))
            <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-400 rounded-2xl p-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM -->
        <form wire:submit.prevent="update" class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-3xl p-6 md:p-10 shadow-2xl space-y-8">
            
            <!-- CATEGORY NAME INPUT -->
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-400 ml-1">Category Name <span class="text-blue-500">*</span></label>
                <input type="text" wire:model="name" 
                    class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-4 text-white text-lg placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 transition-all"
                    placeholder="Enter category name...">
                @error('name') 
                    <p class="text-red-400 text-xs mt-1 ml-1">{{ $message }}</p> 
                @enderror
            </div>

            <!-- BUTTONS -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-white/5">
                
                <a href="/kategori" class="px-6 py-3 text-sm font-medium text-gray-400 hover:text-white transition-colors">
                    Cancel
                </a>
                
                <button type="submit" wire:loading.attr="disabled"
                    class="bg-blue-600 hover:bg-blue-500 text-white px-8 py-3 rounded-2xl font-semibold transition-all shadow-[0_0_20px_rgba(37,99,235,0.2)] hover:shadow-[0_0_25px_rgba(37,99,235,0.4)] disabled:opacity-50 flex items-center">
                    
                    <span wire:loading.remove wire:target="update">Update Category</span>
                    
                    <span wire:loading wire:target="update" class="flex items-center">
                        <svg class="animate-spin h-4 w-4 mr-3" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Updating...
                    </span>
                    
                </button>
            </div>
            
        </form>
    </div>
</div>