<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO LIST</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root{
            --bg:#0b0f1a;
            --card:#0f1724;
            --muted:#9aa4b2;
            --accent:#7c5cff;
            --accent-2:#00d4ff;
        }
        body{background:linear-gradient(180deg,var(--bg) 0%, #071022 100%);color:#e6eef8}
        .card{background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01)); border:1px solid rgba(255,255,255,0.04)}
        .muted{color:var(--muted)}
        .pill{background:linear-gradient(90deg,var(--accent),var(--accent-2));-webkit-background-clip:text;background-clip:text;color:transparent}
    </style>
</head>
<body class="antialiased font-sans">
    <nav class="py-6">
        <div class="max-w-3xl mx-auto px-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-md bg-gradient-to-br from-purple-700 to-teal-400 flex items-center justify-center shadow-lg">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="text-white">
                        <path d="M4 12h16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4 7h16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4 17h10" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div>
                    <div class="text-xl font-semibold">TO DO LIST</div>
                    <div class="text-sm muted">Mars Regency</div>
                </div>
            </div>
        </div>
    </nav>
    <main class="max-w-3xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-center pill mb-6">Your Tasks, Your Future</h1>
        @if (session('success'))
            <div class="mb-4 p-3 rounded card text-sm text-green-300">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="mb-4 p-3 rounded card text-sm text-red-300">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="space-y-6">
            <div class="card rounded-lg p-6">
                <form action="{{ route('todo.post') }}" method="POST" class="flex gap-3">
                    @csrf
                    <input type="text" name="task" placeholder="Add a new task..." class="flex-1 px-4 py-3 rounded bg-transparent border border-white/6 placeholder:text-muted focus:outline-none focus:ring-2 focus:ring-purple-600" required>
                    <button class="px-4 py-3 rounded bg-purple-600 hover:bg-purple-500 text-white">Add</button>
                </form>
            </div>
            <div class="card rounded-lg p-6">
                <h2 class="text-lg font-semibold muted mb-3">Tasks</h2>

                @if ($todos->isEmpty())
                    <div class="muted">No tasks yet — take your time.</div>
                @else
                    <ul class="space-y-3">
                        @foreach ($todos as $todo)
                            <li class="flex items-center justify-between p-3 rounded border border-white/4">
                                <div class="flex items-center gap-3">
                                    <form action="#" method="POST">
                                        @csrf
                                    </form>
                                    <div>
                                        <div class="font-medium">{{ $todo->task }}</div>
                                        <div class="text-sm muted">{{ $todo->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <form action="{{ route('todo.delete', $todo->id) }}" method="POST" onsubmit="return confirm('Delete this task?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-400 hover:text-red-300">✕</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <p class="mt-8 text-center muted text-sm">List your future!</p>
    </main>

</body>

</html> 