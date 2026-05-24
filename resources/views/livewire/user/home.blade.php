<div class="min-h-screen bg-[#383838] p-6">
    @livewireStyles
    @livewireScripts
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" >

<script>

    const swalCustom = {

        background: '#FFFFFF',

        color: '#374151',

        showClass: {
            popup: ''
        },

        hideClass: {
            popup: ''
        },

        customClass: {

            popup:
                'rounded-3xl border border-gray-200 shadow-xl',

            title:
                'text-sm font-semibold',

            htmlContainer:
                'text-xs text-gray-500'
        }

    };



    document.addEventListener('livewire:init', () => {

        Livewire.on('attendance-added', () => {

            Swal.fire({
                ...swalCustom,

                toast: true,
                position: 'top-end',

                icon: 'success',

                title: 'Attendance submitted',

                timer: 2200,
                timerProgressBar: true,

                showConfirmButton: false,

                iconColor: '#3B82F6'
            });

        });

    });

</script>

    <div class="max-w-6xl mx-auto">

         <!-- Profile Card -->
    <div class="bg-[#000] rounded-3xl shadow-sm border border-gray-800 p-6 mb-8">
        <div class="flex items-center gap-5">

            <img
                class="w-20 h-20 rounded-full object-cover ring-4 ring-blue-100"
            >

            <div class="flex-1">
                <h2 class="text-xl font-bold text-gray-500">
                    Lorem
                </h2>

                <p class="text-gray-400">
                    Ipsum
                </p>
            </div>

            <div class="flex items-center gap-3">

    <!-- Hidden Input -->
    <input
        type="file"
        wire:model="photo"
        id="photoUpload"
        class="hidden"
    >

    <!-- Custom Button -->
    <label
        for="photoUpload"
        class="cursor-pointer
               inline-flex items-center gap-2
               px-4 py-2
               rounded-2xl
               border border-blue-200
               bg-blue-50/70
               text-blue-600
               text-sm font-medium
               hover:bg-blue-100
               hover:border-blue-300
               transition-all duration-150">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-4 h-4"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 4v12m0 0l-4-4m4 4l4-4"/>
        </svg>

        Choose Photo
    </label>

    <!-- Upload Button -->
    <button
        wire:click="uploadPhoto"
        type="button"
        class="px-5 py-2
               rounded-2xl
               bg-blue-500
               text-black
               text-sm font-medium
               shadow-[0_8px_20px_rgba(59,130,246,0.22)]
               hover:bg-blue-600
               hover:scale-[1.02]
               transition-all duration-150">

        Save Photo
    </button>

</div>

        </div>
    </div>

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-700">Attendance Dashboard</h1>
                <p class="text-gray-400 mt-1">Manage your attendance records</p>
            </div>

            <a href="biji.com"
                class="bg-gradient-to-r from-blue-500 to-blue-400 text-black px-5 py-3 rounded-2xl shadow-md hover:scale-105 transition">
                Logout
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-black rounded-3xl shadow-sm border border-gray-100 p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-5">
                Submit Attendance
            </h2>

            <form wire:submit="save" class="flex flex-col md:flex-row gap-4">
                <select wire:model="status"
                    class="w-full md:w-72 p-3 rounded-2xl border border-gray-200 text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Select Status --</option>
                    <option value="present">Present</option>
                    <option value="absent">Absent</option>
                    <option value="sick">Sick</option>
                    <option value="permit">Permit</option>
                </select>

                <button type="submit"
                    class="bg-gradient-to-r from-blue-500 to-blue-400 text-black px-6 py-3 rounded-2xl shadow-md hover:scale-105 transition font-medium">
                    Save Attendance
                </button>
            </form>
        </div>

        <!-- Table -->
        <div class="bg-black rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-semibold text-gray-700">
                    Attendance History
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-[#FAFAFC] text-gray-400 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4 text-left">#</th>
                            <th class="px-6 py-4 text-left">Name</th>
                            <th class="px-6 py-4 text-left">Date</th>
                            <th class="px-6 py-4 text-left">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>