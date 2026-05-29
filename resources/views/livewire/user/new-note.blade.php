<div class="min-h-screen py-10 px-4">
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div>
                <a href="/dashboard" class="group flex items-center text-gray-400 hover:text-blue-400 transition-colors mb-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Dashboard
                </a>
                <h1 class="text-3xl font-bold text-white tracking-tight">Create New Note</h1>
            </div>
            <div class="hidden md:block">
                <div class="h-12 w-12 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
            </div>
        </div>

        <form wire:submit.prevent="createNote" class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-3xl p-6 md:p-10 shadow-2xl space-y-8">
            
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-400 ml-1">Note Title <span class="text-blue-500">*</span></label>
                <input type="text" wire:model="title" 
                    class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-4 text-white text-lg placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 transition-all"
                    placeholder="What's on your mind?">
                @error('title') <p class="text-red-400 text-xs mt-1 ml-1">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-400 ml-1">Subtitle</label>
                <input type="text" wire:model="subtitle" 
                    class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-3 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 transition-all"
                    placeholder="A brief summary (optional)">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-400 ml-1">Category</label>
                    <div class="relative">
                        <select wire:model="category_id" 
                            class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-3 text-white appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-all cursor-pointer">
                            <option value="">No Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" class="bg-[#1a1a2e]">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-400 ml-1">Add to Folder</label>
                    <div class="relative">
                        <select wire:model="folder_id" 
                            class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-3 text-white appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-all cursor-pointer">
                            <option value="">Root Directory</option>
                            @foreach($folders as $folder)
                                <option value="{{ $folder->id }}" class="bg-[#1a1a2e]">{{ $folder->name }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-400 ml-1">Content</label>
                <textarea wire:model="content" rows="6"
                    class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 transition-all resize-none"
                    placeholder="Write your thoughts here..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-400 ml-1">Attachment</label>
                <div class="relative group">
                    <label for="media" class="flex flex-col items-center justify-center w-full h-32 border-2 border-white/5 border-dashed rounded-2xl cursor-pointer bg-black/20 hover:bg-white/5 hover:border-blue-500/40 transition-all">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2 text-gray-500 group-hover:text-blue-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-600 mt-1">PNG, JPG or GIF (Max. 2MB)</p>
                        </div>
                        <input id="media" type="file" wire:model="media" class="hidden" />
                    </label>
                    
                    @if ($media)
                        <div class="mt-4 relative inline-block">
                            <img src="{{ $media->temporaryUrl() }}" class="h-20 w-20 object-cover rounded-xl border border-white/20">
                            <div class="absolute -top-2 -right-2 bg-blue-500 rounded-full p-1 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    @endif

                    <div wire:loading wire:target="media" class="text-xs text-blue-400 mt-2 flex items-center">
                        <svg class="animate-spin h-3 w-3 mr-2" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processing attachment...
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-white/5">
                <button type="button" onclick="window.history.back()" class="px-6 py-3 text-sm font-medium text-gray-400 hover:text-white transition-colors">
                    Discard
                </button>
                <button type="submit" wire:loading.attr="disabled"
                    class="bg-blue-600 hover:bg-blue-500 text-white px-8 py-3 rounded-2xl font-semibold transition-all shadow-[0_0_20px_rgba(37,99,235,0.2)] hover:shadow-[0_0_25px_rgba(37,99,235,0.4)] disabled:opacity-50 flex items-center">
                    <span wire:loading.remove wire:target="createNote">Save Note</span>
                    <span wire:loading wire:target="createNote" class="flex items-center">
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