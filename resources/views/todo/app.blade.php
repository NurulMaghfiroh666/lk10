<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans text-gray-800 antialiased">
    
    <nav class="bg-gray-900 shadow-md">
        <div class="max-w-3xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="text-white text-lg font-semibold">Simple To Do List</div>
            <!-- 
            <div class="relative group">
                <button class="text-gray-300 hover:text-white focus:outline-none">
                    Akun Saya ▾
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden group-hover:block">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Update Data</a>
                </div>
            </div>
            -->
        </div>
    </nav>
    
    <div class="max-w-3xl mx-auto px-4 mt-8">
        <!-- 01. Content-->
        <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">To Do List</h1>
        
        <div class="flex flex-col gap-6">
            
            <!-- 02. Form input data -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <form id="todo-form" action="" method="post">
                    <div class="flex gap-2">
                        <input type="text" name="task" id="todo-input"
                            placeholder="Tambah task baru" required
                            class="flex-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-md transition duration-150 ease-in-out shadow-sm">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- List & Searching Section -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                
                <!-- 03. Searching -->
                <form id="search-form" action="" method="get" class="mb-6">
                    <div class="flex gap-2">
                        <input type="text" name="search" value="" 
                            placeholder="Masukkan kata kunci"
                            class="flex-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                        <button type="submit" 
                            class="bg-gray-500 hover:bg-gray-600 text-white font-medium px-5 py-2 rounded-md transition duration-150 ease-in-out shadow-sm">
                            Cari
                        </button>
                    </div>
                </form>
                
                <!-- 04. Display Data -->
                <ul class="flex flex-col gap-2 mb-4" id="todo-list">
                    
                    <!-- Task Item -->
                    <li class="border border-gray-200 rounded-md p-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100 transition duration-150">
                        <span class="text-gray-700 font-medium">Coding</span>
                        <div class="flex gap-1">
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded text-sm transition shadow-sm" title="Hapus">
                                ✕
                            </button>
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded text-sm transition shadow-sm" 
                                onclick="toggleCollapse('collapse-1')" title="Edit">
                                ✎
                            </button>
                        </div>
                    </li>
                    
                    <!-- 05. Update Data (Hidden by default) -->
                    <li id="collapse-1" class="hidden border border-gray-200 rounded-md p-4 bg-white shadow-inner mb-2">
                        <form action="" method="POST">
                            <div class="flex gap-2 mb-3">
                                <input type="text" name="task" value="Coding"
                                    class="flex-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                                <button type="button" 
                                    class="border-2 border-blue-500 text-blue-600 hover:bg-blue-50 font-medium px-4 py-2 rounded-md transition duration-150">
                                    Update
                                </button>
                            </div>
                            
                            <!-- Radio Buttons -->
                            <div class="flex items-center gap-6 mt-3 px-1">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" value="1" name="is_done" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                    <span class="ml-2 text-gray-700">Selesai</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" value="0" name="is_done" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                    <span class="ml-2 text-gray-700">Belum</span>
                                </label>
                            </div>
                        </form>
                    </li>
                    
                </ul>
            </div>
            
        </div>
    </div>

    @if ($errors->any())
            <div class="bg-red-50 border border-red-400 text-red-700 px-4 py-5 mb-3 rounded-md">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <!-- Script to handle collapse functionality (Replacing Bootstrap JS) -->
    <script>
        function toggleCollapse(elementId) {
            const element = document.getElementById(elementId);
            if (element.classList.contains('hidden')) {
                element.classList.remove('hidden');
            } else {
                element.classList.add('hidden');
            }
        }
    </script>
</body>

</html>