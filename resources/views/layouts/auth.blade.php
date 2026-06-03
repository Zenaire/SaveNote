<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Note</title>

    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-[#0f0f17] text-white overflow-x-hidden selection:bg-blue-500/30">

    <div class="w-full min-h-screen flex flex-col relative">
        
        <nav class="p-8 flex justify-between items-center border-b border-white/5">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-widest">Save Note</span>
            </div>
        </nav>

<main class="flex-1 flex flex-col items-center justify-center text-center px-6 space-y-6">
            
            <h2 class="text-4xl md:text-5xl font-light text-white">
                Welcome to
            </h2>

            <h1 class="text-6xl md:text-8xl font-bold text-white tracking-tight">
                Save Note
            </h1>
            
            <p class="text-lg md:text-xl text-zinc-400 max-w-2xl leading-relaxed mt-4">
                Organize your ideas, tasks, and memories in one clean and simple place. A minimal workspace designed for focus and productivity.
            </p>


        </main>

    </div>

    <div id="auth">
        @yield('content')
    </div>

    @livewireScripts
</body>
</html>