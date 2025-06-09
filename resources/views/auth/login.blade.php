<!DOCTYPE html>
   <html>
   <head>
       <title>Login</title>
       @vite(['resources/css/app.css', 'resources/js/app.js'])
   </head>
   <body class="bg-gray-100">
       <div class="container mx-auto p-4">
           <h1 class="text-2xl font-bold mb-4">Login</h1>
           @if ($errors->any())
               <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           <form method="POST" action="{{ route('login') }}" class="bg-white p-6 rounded shadow">
               @csrf
               <div class="mb-4">
                   <label for="username" class="block text-sm font-medium">Username</label>
                   <input id="username" type="text" name="username" value="{{ old('username') }}" class="w-full p-2 border rounded" required autofocus>
                   @error('username')
                       <span class="text-red-600 text-sm">{{ $message }}</span>
                   @enderror
               </div>
               <div class="mb-4">
                   <label for="password" class="block text-sm font-medium">Password</label>
                   <input id="password" type="password" name="password" class="w-full p-2 border rounded" required>
                   @error('password')
                       <span class="text-red-600 text-sm">{{ $message }}</span>
                   @enderror
               </div>
               <button type="submit" class="bg-blue-500 text-white p-2 rounded">Login</button>
           </form>
           <a href="{{ route('register') }}" class="text-blue-500 mt-4 inline-block">Register</a>
       </div>
   </body>
   </html>