<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- Sidenav Menu -->
        <div class="w-64 bg-white shadow-lg">

            <!-- Sidenav Brand Logo -->
            <div class="p-4">
                <a href="#" class="flex items-center space-x-2">
                    <img src="assets/images/logo-dark.png" class="h-6" alt="Dark logo">
                    <span class="text-lg font-semibold">KONRIX</span>
                </a>
            </div>

            <!-- Menu -->
            <nav class="mt-4">
                <ul>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-blue-600 hover:bg-gray-200">
                            <i class="mgc_home_3_line mr-2"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="mt-4">
                        <span class="px-4 text-gray-500 text-sm uppercase tracking-wider">Apps</span>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-200">
                            <i class="mgc_calendar_line mr-2"></i>
                            <span>Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-200">
                            <i class="mgc_coupon_line mr-2"></i>
                            <span>Tickets</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-200">
                            <i class="mgc_folder_2_line mr-2"></i>
                            <span>File Manager</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-200">
                            <i class="mgc_task_2_line mr-2"></i>
                            <span>Kanban</span>
                        </a>
                    </li>

                    <li class="mt-4">
                        <span class="px-4 text-gray-500 text-sm uppercase tracking-wider">Custom</span>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-200">
                            <i class="mgc_user_3_line mr-2"></i>
                            <span>Auth Pages</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Dashboard Overview -->
            <div class="grid grid-cols-3 gap-6">

                <!-- Monthly Target -->
                <div class="bg-white shadow p-6 rounded-lg">
                    <h2 class="text-lg font-semibold">Monthly Target</h2>
                    <div class="flex justify-center mt-6">
                        <div class="w-32 h-32 bg-gray-200 rounded-full flex items-center justify-center">
                            <!-- Replace with actual chart -->
                            <span class="text-lg font-semibold">68.9%</span>
                        </div>
                    </div>
                    <div class="flex justify-between mt-4">
                        <span class="text-gray-500">Pending Projects</span>
                        <span>31.1%</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Done Projects</span>
                        <span>68.9%</span>
                    </div>
                </div>

                <!-- Project Statistics -->
                <div class="bg-white shadow p-6 rounded-lg col-span-2">
                    <h2 class="text-lg font-semibold">Project Statistics</h2>
                    <div class="mt-6">
                        <canvas id="projectStatisticsChart"></canvas>
                    </div>
                </div>

            </div>

            <!-- Project Summary -->
            <div class="mt-6 bg-white shadow p-6 rounded-lg">
                <h2 class="text-lg font-semibold">Project Summary</h2>
                <div class="grid grid-cols-2 gap-6 mt-4">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Project Discussion</span>
                        <span class="bg-blue-500 text-white rounded-full px-3 py-1">6 Persons</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">In Progress</span>
                        <span class="bg-yellow-500 text-white rounded-full px-3 py-1">16 Projects</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Completed Projects</span>
                        <span class="bg-red-500 text-white rounded-full px-3 py-1">24 Projects</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Delivery Projects</span>
                        <span class="bg-green-500 text-white rounded-full px-3 py-1">20 Projects</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Include your chart library like Chart.js for the statistics chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('projectStatisticsChart').getContext('2d');
        var projectStatisticsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                datasets: [{
                    label: 'Projects',
                    data: [180, 120, 240, 200, 150, 90, 100, 130, 200],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'Working Hours',
                    data: [120, 100, 200, 180, 140, 80, 90, 110, 160],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
