<!-- resources/views/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Your App</title>
</head>
<body>
<div class="container mx-auto mt-6">
  <div class="flex justify-end">
    @if(empty(session('token')))
      <div class="mb-4">
        <a href="/login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Login
        </a>
        <a href="/register"
           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
          Register
        </a>
      </div>
    @else
      <div class="mb-4">
        <p class="text-lg">Logged in as: {{ session('user') }}</p>
        <a href="{{ url('api/logout') }}"
           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
      </div>
      <form id="logout-form" action="{{ url('api/logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    @endif
  </div>
</div>
<div id="app">
  <router-view></router-view>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
