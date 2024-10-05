<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&amp;display=swap" rel="stylesheet"/>
    @vite('resources/css/app.css')
    <title>Login</title> 
</head>
<body class="bg-blue-900 h-screen flex items-center justify-center">
    <div class="flex w-full max-w-6xl mx-auto">
     <div class="w-1/2 flex flex-col justify-center text-white p-8">
      <h2 class="text-teal-300 text-sm font-semibold">
       BEST LAUNDRY
      </h2>
      <h1 class="text-4xl font-bold mt-2">
       Your Trusted Professional Laundry Service
      </h1>
      <p class="mt-4 text-lg">
       We provide high-quality laundry services with convenience and reliability. Please log in to get started.
      </p>
     </div>
     <div class="w-1/2 flex items-center justify-center">
      <div class="bg-white p-8 rounded-lg shadow-lg w-96">
       <div class="flex justify-center mb-6">
        <img alt="Company Logo" class="w-20 h-20" height="80" src="https://storage.googleapis.com/a1aa/image/cAnOPIwgx8JLG1wS1pGHcCgNLHy6iODf02u802ilnFAtGpxJA.jpg" width="80"/>
       </div>
       <h2 class="text-gray-700 text-2xl font-semibold text-center mb-6">
        Account Login
       </h2>
       <form>
        <div class="mb-4">
         <input class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Username" type="text"/>
        </div>
        <div class="mb-6">
         <input class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Password" type="password"/>
        </div>
        <button class="w-full bg-blue-900 text-white p-3 rounded-lg font-semibold hover:bg-blue-700" type="submit">
         SIGN IN
        </button>
       </form>
      </div>
     </div>
    </div>
   </body>
</html>
