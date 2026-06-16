<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card">
      <div class="card-body">
  <h3>Welcome, {{ optional(auth()->user())->name ?? 'User' }}</h3>
        <p>This is a simple dashboard placeholder.</p>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>