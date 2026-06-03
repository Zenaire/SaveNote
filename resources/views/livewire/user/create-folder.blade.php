<div class="min-h-screen py-10 px-4 text-white">
    <div class="max-w-3xl mx-auto">
        
        <!-- HEADER -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <a href="/folders" class="group flex items-center text-gray-400 hover:text-blue-400 transition-colors mb-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Folders
                </a>
                <h1 class="text-3xl font-bold text-white tracking-tight">Create New Folder</h1>
            </div>
            
            <div class="hidden md:block">
                <div class="h-12 w-12 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center">
                    <!-- Ikon Folder -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- FORM -->
        <form wire:submit.prevent="save" class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-3xl p-6 md:p-10 shadow-2xl space-y-8">
            
            <!-- FOLDER NAME INPUT -->
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-400 ml-1">Folder Name <span class="text-blue-500">*</span></label>
                <input type="text" wire:model="name" 
                    class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-4 text-white text-lg placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 transition-all"
                    placeholder="Enter folder name...">
                @error('name') 
                    <p class="text-red-400 text-xs mt-1 ml-1">{{ $message }}</p> 
                @enderror
            </div>

            <!-- THUMBNAIL UPLOAD -->
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-400 ml-1">Thumbnail (Optional)</label>
                <div class="relative group">
                    <label for="thumbnail" class="flex flex-col items-center justify-center w-full h-32 border-2 border-white/5 border-dashed rounded-2xl cursor-pointer bg-black/20 hover:bg-white/5 hover:border-blue-500/40 transition-all">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2 text-gray-500 group-hover:text-blue-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-600 mt-1">PNG, JPG or GIF (Max. 2MB)</p>
                        </div>
                        <input id="thumbnail" type="file" wire:model="thumbnail" class="hidden" />
                    </label>

                    @error('thumbnail') 
                        <p class="text-red-400 text-xs mt-1 ml-1">{{ $message }}</p> 
                    @enderror
                    
                    <!-- IMAGE PREVIEW -->
                    @if ($thumbnail)
                        <div class="mt-4 relative inline-block">
                            <img src="{{ $thumbnail->temporaryUrl() }}" class="h-32 w-48 object-cover rounded-xl border border-white/20 shadow-lg">
                            <div class="absolute -top-2 -right-2 bg-blue-500 rounded-full p-1 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    @endif

                    <!-- LOADING STATE UNTUK UPLOAD -->
                    <div wire:loading wire:target="thumbnail" class="text-xs text-blue-400 mt-2 flex items-center">
                        <svg class="animate-spin h-3 w-3 mr-2" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processing thumbnail...
                    </div>
                </div>
            </div>

            <!-- BUTTONS -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-white/5">
                
                <a href="/folders" class="px-6 py-3 text-sm font-medium text-gray-400 hover:text-white transition-colors">
                    Cancel
                </a>
                
                <button type="submit" wire:loading.attr="disabled"
                    class="bg-blue-600 hover:bg-blue-500 text-white px-8 py-3 rounded-2xl font-semibold transition-all shadow-[0_0_20px_rgba(37,99,235,0.2)] hover:shadow-[0_0_25px_rgba(37,99,235,0.4)] disabled:opacity-50 flex items-center">
                    
                    <span wire:loading.remove wire:target="save">Create Folder</span>
                    
                    <span wire:loading wire:target="save" class="flex items-center">
                        <svg class="animate-spin h-4 w-4 mr-3" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Saving...
                    </span>
                    
                </button>
            </div>
            
        </form>
    </div>
</div>