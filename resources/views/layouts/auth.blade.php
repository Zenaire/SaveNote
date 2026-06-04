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

    <div class="w-full min-h-screen flex flex-col relative translate-y-[100px] mb-60">

        <nav class="p-8 flex justify-between items-center border-b border-white/5 translate-y-[-100px]">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-widest">Save Note</span>
            </div>
        </nav>

        <main class="flex-1 flex flex-col items-center justify-center text-center px-6 space-y-6 translate-y-[100px]">
            <h2 class="text-4xl md:text-5xl font-light text-white">
                Welcome to
            </h2>

            <h1 class="text-6xl md:text-8xl font-bold text-white tracking-tight">
                Save Note
            </h1>

            <p class="text-lg md:text-xl text-zinc-400 max-w-2xl leading-relaxed mt-4">
                Organize your ideas, tasks, and memories in one clean and simple place. A minimal workspace designed for
                focus and productivity.
            </p>
        </main>
        <svg class="translate-y-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,192L18.5,176C36.9,160,74,128,111,144C147.7,160,185,224,222,224C258.5,224,295,160,332,144C369.2,128,406,160,443,192C480,224,517,256,554,250.7C590.8,245,628,203,665,181.3C701.5,160,738,160,775,186.7C812.3,213,849,267,886,261.3C923.1,256,960,192,997,181.3C1033.8,171,1071,213,1108,240C1144.6,267,1182,277,1218,240C1255.4,203,1292,117,1329,80C1366.2,43,1403,53,1422,58.7L1440,64L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path></svg>
        <svg class="translate-y-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,320L18.5,272C36.9,224,74,128,111,106.7C147.7,85,185,139,222,133.3C258.5,128,295,64,332,37.3C369.2,11,406,21,443,69.3C480,117,517,203,554,208C590.8,213,628,139,665,122.7C701.5,107,738,149,775,165.3C812.3,181,849,171,886,154.7C923.1,139,960,117,997,96C1033.8,75,1071,53,1108,85.3C1144.6,117,1182,203,1218,224C1255.4,245,1292,203,1329,160C1366.2,117,1403,75,1422,53.3L1440,32L1440,0L1421.5,0C1403.1,0,1366,0,1329,0C1292.3,0,1255,0,1218,0C1181.5,0,1145,0,1108,0C1070.8,0,1034,0,997,0C960,0,923,0,886,0C849.2,0,812,0,775,0C738.5,0,702,0,665,0C627.7,0,591,0,554,0C516.9,0,480,0,443,0C406.2,0,369,0,332,0C295.4,0,258,0,222,0C184.6,0,148,0,111,0C73.8,0,37,0,18,0L0,0Z"></path></svg>
    </div>


    <div id="auth">
        @yield('content')
    </div>

    @livewireScripts
</body>

</html>