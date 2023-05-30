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
<div id="app">
  <router-view></router-view>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
