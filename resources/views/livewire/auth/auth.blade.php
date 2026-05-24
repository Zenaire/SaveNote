<div>
    <div class="relative h-screen overflow-hidden bg-[#0f0f17] text-white">

        <div class="absolute inset-0 pointer-events-none">

            <!-- WELCOME TEXT  -->
            <div @class([
                'absolute top-1/2 left-24 -translate-y-1/2 max-w-md transition-all duration-700 ease-in-out',
                'translate-x-0 opacity-100' => $mode === 'login',
                'translate-x-[500px] opacity-0' => $mode === 'register',])>
                <div class="space-y-4">
                    <h2 class="text-5xl font-light">Welcome Back</h2>
                    <h1 class="text-7xl font-bold">Lorem Ipsum</h1>
                    <p class="text-zinc-500 leading-relaxed text-lg">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Quidem dolore officiis asperiores ipsam fuga.
                    </p>
                </div>
            </div>

            <!-- REGISTER TEXT -->
            <div @class([
                'absolute top-1/2 right-24 -translate-y-1/2 max-w-md transition-all duration-700 ease-in-out',
                '-translate-x-[500px] opacity-0' => $mode === 'login',
                'translate-x-0 opacity-100' => $mode === 'register',])>
                <div class="space-y-4">
                    <h2 class="text-5xl font-light">Create Your Account</h2>
                    <h1 class="text-7xl font-bold">Lorem Ipsum</h1>
                    <p class="text-zinc-500 leading-relaxed text-lg">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Quidem dolore officiis asperiores ipsam fuga.
                    </p>
                </div>
            </div>

        </div>

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[450px] z-20">
            
            <div class="bg-[#15151f] border border-zinc-800 rounded-3xl p-8 shadow-[0_0_50px_rgba(0,0,0,0.5)]">
                
                <form class="space-y-5">
                    <div class="space-y-2">
                        <label class="text-sm text-zinc-400">Email</label>
                        <input type="email" placeholder="example@email.com" 
                               class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 outline-none focus:border-blue-500">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm text-zinc-400">Password</label>
                        <input type="password" placeholder="••••••••" 
                               class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 outline-none focus:border-blue-500">
                    </div>

                    @if($mode === 'register')
                        <div class="space-y-2 transition-all duration-500">
                            <label class="text-sm text-zinc-400">Confirm Password</label>
                            <input type="password" placeholder="••••••••" 
                                   class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 outline-none focus:border-blue-500">
                        </div>
                    @endif

                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 transition rounded-xl py-3 font-medium">
                        {{ $mode === 'register' ? 'Register' : 'Login' }}
                    </button>
                </form>

                <!-- TOGGLE -->
                <div class="mt-6 text-center">
                    @if($mode === 'login')
                        <button wire:click="$set('mode', 'register')" type="button" class="text-sm text-zinc-400 hover:text-white transition">
                            Register Instead
                        </button>
                    @else
                        <button wire:click="$set('mode', 'login')" type="button" class="text-sm text-zinc-400 hover:text-white transition">
                            Login With Your Account
                        </button>
                    @endif
                </div>

            </div>
        </div>

    </div>
</div>