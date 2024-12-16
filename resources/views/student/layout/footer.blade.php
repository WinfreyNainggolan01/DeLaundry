<footer class="bg-gray-900
  shadow sm:flex sm:items-center sm:justify-between p-4 sm:p-6 xl:p-8 antialiased">
  <p class="mb-4 text-sm text-center text-gray-500 dark:text-gray-200 sm:mb-0">
      &copy; 2024-2029 <a href="#" class="hover:underline" target="_blank">DeLaundry.com</a>. All rights reserved.
  </p>
  <div class="flex justify-center items-center space-x-1">
    {{-- Facebook --}}
    <a href="#" data-tooltip-target="tooltip-facebook" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-200 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
        <img src="{{ asset('img/facebook.svg') }}" alt="facebook">
        <span class="sr-only">Facebook</span>
    </a>
    {{-- Instagram --}}
    <a href="#" data-tooltip-target="tooltip-twitter" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-200 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
        <img src="{{ asset('img/instagram.svg') }}" alt="instagram">
        <span class="sr-only">Instagram</span>
    </a>
    </div>
</footer>