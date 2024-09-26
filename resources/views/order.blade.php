<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <title>Beranda</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="h-full">

<div class="min-h-full">
    <!-- Navbar Section -->
    <nav class="bg-white" x-data="{ isOpen: false }">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img class="h-12 w-12" src="{{ asset('img/Logo-DeLaundry.png') }}" alt="DeLaundry Logo">
            </div>
            <h1 class="text-dark-blue text-xl font-bold ml-3">DeLaundry</h1>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/" class="{{ request()->is('/') ? "bg-gray-200 text-black" : "text-gray-300 hover:bg-gray-700 hover:text-white"}} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:text-sky-500">Order</a>
                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:text-sky-500">Payment</a>
                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:text-sky-500">Complaint</a>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400  focus:outline-none focus:ring-2 hover:text-sky-500 focus:ring-sky-300 focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View notifications</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </button>
  
              <!-- Profile dropdown -->
              <div class="relative ml-3">
                <div>
                  <button type="button" @click="isOpen = !isOpen" 
                  class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2
                  hover:text-sky-500 focus:ring-sky-300 focus:ring-offset-2 focus:ring-offset-gray-800 " id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <svg class="w-8 h-8 text-gray-800 dark:text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                      </svg>
                      
                      
                  </button>
                </div>

                <div x-show="isOpen"
                x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <!-- Active: "bg-gray-100", Not Active: "" -->
                  <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                </div>
              </div>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button @click="isOpen = !isOpen" type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!-- Menu open: "hidden", Menu closed: "block" -->
              <svg :class="{'hidden': isOpen, 'block': !isOpen }
              class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!-- Menu open: "block", Menu closed: "hidden" -->
              <svg :class="{'block': isOpen, 'hidden': !isOpen } 
              class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>
  
      <!-- Mobile menu, show/hide based on menu state. -->
      <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-white">Tom Cook</div>
              <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
            </div>
            <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
            </button>
          </div>
          <div class="mt-3 space-y-1 px-2">
            <a href="/profile" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
          </div>
        </div>
      </div>
    </nav>
  
    <header class="bg-dark-blue shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-100">ORDER</h1>
      </div>
    </header>

    <!-- Main content -->
    <main>
        <section class="order-form mx-auto max-w-7xl p-4">
          <h2 class="text-2xl font-bold mb-6 text-center">Fill Your Items</h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!--  (Name Item, Quantity, Category) -->
            <div>
              <div class="flex flex-col mb-4">
                <label for="itemName" class="text-sm font-medium mb-1">Name Item</label>
                <input type="text" id="itemName" class="border border-gray-300 p-2 rounded-md" placeholder="Enter item name">
              </div>
              <div class="flex flex-col mb-4">
                <label for="quantity" class="text-sm font-medium mb-1">Quantity</label>
                <input type="number" min="1" id="quantity" class="border border-gray-300 p-2 rounded-md" placeholder="Enter quantity">
              </div>
              <div class="flex flex-col mb-4">
                <label for="category" class="text-sm font-medium mb-1">Category</label>
                <select id="category" class="border border-gray-300 p-2 rounded-md">
                  <option value="Shirt">Shirt</option>
                  <option value="Pants">Pants</option>
                  <option value="Hoodie">Hoodie</option>
                  <option value="Blanket">Blanket</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
      
            <!--  (Note) -->
            <div>
              <div class="flex flex-col mb-4">
                <label for="note" class="text-sm font-medium mb-1">Note</label>
                <textarea id="note" class="border border-gray-300 p-2 rounded-md" rows="6" placeholder="Enter special instructions (optional)"></textarea>
              </div>
            </div>
            
            <!-- (Order Summary) -->
            <div>
              <h2 class="text-xl font-bold mb-4 text-center">Order Summary</h2>
              <table class="table-auto w-full border border-gray-300 mb-4">
                <thead>
                  <tr class="text-left border-b border-gray-300">
                    <th class="px-4 py-2">Item</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">Note</th>
                  </tr>
                </thead>
                <tbody id="order-summary-body">
                  <!-- Summary will be populated here -->
                </tbody>
              </table>
              <!-- Tombol bawah tabel -->
              <div class="flex justify-between mt-4">
                <button type="button" id="add-item-btn" class="bg-sky-500 hover:bg-sky-700 text-white font-medium py-2 px-4 rounded-md">Add Item</button>
                <button type="button" class="bg-[#4F5A67] hover:bg-[#3E4852] text-white font-medium py-2 px-4 rounded-md">Edit Item</button>
                <button type="button" class="bg-[#005DAD] hover:bg-[#004080] text-white font-medium py-2 px-4 rounded-md">Done</button>
              </div>
            </div>
      
          </div>
        </section>
      </main>
      
  
  </div>
  <script>
    document.getElementById('add-item-btn').addEventListener('click', function() {
      // Get values from inputs
      const itemName = document.getElementById('itemName').value;
      const quantity = document.getElementById('quantity').value;
      const category = document.getElementById('category').value;
      const note = document.getElementById('note').value;

      // Validate inputs (optional)
      if (!itemName || !quantity || !category) {
        alert('Please fill out all required fields.');
        return;
      }

      // Create new table row
      const newRow = `
        <tr>
          <td class="px-4 py-2">${itemName}</td>
          <td class="px-4 py-2">${quantity}</td>
          <td class="px-4 py-2">${category}</td>
          <td class="px-4 py-2">${note}</td>
        </tr>
      `;

      // Append new row to the order summary table
      document.getElementById('order-summary-body').insertAdjacentHTML('beforeend', newRow);

      // Clear inputs after adding
      document.getElementById('itemName').value = '';
      document.getElementById('quantity').value = '';
      document.getElementById('category').value = 'Shirt';  // Reset to default
      document.getElementById('note').value = '';
    });
  </script>
  
</body>

</html>