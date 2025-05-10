
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .sidebar-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .dropdown-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        .dropdown-content.active {
            max-height: 500px;
        }
        .chart-container {
            position: relative;
            height: 250px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-gradient-to-b from-blue-800 to-blue-900 text-white w-64 flex-shrink-0 shadow-lg">
            <div class="p-4 flex items-center space-x-3">
                <div class="bg-white p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h1 class="text-xl font-bold">PetCare Pro</h1>
            </div>
            
            <div class="mt-6">
                <!-- Dashboard Link -->
                <a href="#" class="sidebar-item flex items-center px-4 py-3 text-white hover:bg-blue-700 transition-colors duration-200 bg-blue-700">
                    <i class="fas fa-th-large w-6"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
                
                <!-- Customer Management Dropdown -->
                <div class="dropdown">
                    <div class="sidebar-item flex items-center justify-between px-4 py-3 text-white hover:bg-blue-700 cursor-pointer transition-colors duration-200">
                        <div class="flex items-center">
                            <i class="fas fa-users w-6"></i>
                            <span class="ml-3">Customer Management</span>
                        </div>
                        <i class="fas fa-chevron-down transition-transform duration-200"></i>
                    </div>
                    <div class="dropdown-content bg-blue-700/50 pl-10">
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700/70 transition-colors duration-200">
                            <i class="fas fa-user-friends w-5"></i>
                            <span class="ml-2">Data Pelanggan</span>
                        </a>
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700/70 transition-colors duration-200">
                            <i class="fas fa-paw w-5"></i>
                            <span class="ml-2">Data Hewan</span>
                        </a>
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700/70 transition-colors duration-200">
                            <i class="fas fa-history w-5"></i>
                            <span class="ml-2">Riwayat Kunjungan</span>
                        </a>
                    </div>
                </div>
                
                <!-- Services Management Dropdown -->
                <div class="dropdown">
                    <div class="sidebar-item flex items-center justify-between px-4 py-3 text-white hover:bg-blue-700 cursor-pointer transition-colors duration-200">
                        <div class="flex items-center">
                            <i class="fas fa-concierge-bell w-6"></i>
                            <span class="ml-3">Service Management</span>
                        </div>
                        <i class="fas fa-chevron-down transition-transform duration-200"></i>
                    </div>
                    <div class="dropdown-content bg-blue-700/50 pl-10">
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700/70 transition-colors duration-200">
                            <i class="fas fa-list w-5"></i>
                            <span class="ml-2">Service List</span>
                        </a>
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700/70 transition-colors duration-200">
                            <i class="fas fa-tags w-5"></i>
                            <span class="ml-2">Packages</span>
                        </a>
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700/70 transition-colors duration-200">
                            <i class="fas fa-calendar-check w-5"></i>
                            <span class="ml-2">Appointments</span>
                        </a>
                    </div>
                </div>
                
                <!-- Inventory Management Dropdown -->
                <div class="dropdown">
                    <div class="sidebar-item flex items-center justify-between px-4 py-3 text-white hover:bg-blue-700 cursor-pointer transition-colors duration-200">
                        <div class="flex items-center">
                            <i class="fas fa-box w-6"></i>
                            <span class="ml-3">Inventory</span>
                        </div>
                        <i class="fas fa-chevron-down transition-transform duration-200"></i>
                    </div>
                    <div class="dropdown-content bg-blue-700/50 pl-10">
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700/70 transition-colors duration-200">
                            <i class="fas fa-boxes w-5"></i>
                            <span class="ml-2">Products</span>
                        </a>
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700/70 transition-colors duration-200">
                            <i class="fas fa-clipboard-list w-5"></i>
                            <span class="ml-2">Stock Management</span>
                        </a>
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700/70 transition-colors duration-200">
                            <i class="fas fa-truck w-5"></i>
                            <span class="ml-2">Suppliers</span>
                        </a>
                    </div>
                </div>
                
                <!-- Financial Management Dropdown -->
                <div class="dropdown">
                    <div class="sidebar-item flex items-center justify-between px-4 py-3 text-white hover:bg-blue-700 cursor-pointer transition-colors duration-200">
                        <div class="flex items-center">
                            <i class="fas fa-money-bill-wave w-6"></i>
                            <span class="ml-3">Finance</span>
                        </div>
                        <i class="fas fa-chevron-down transition-transform duration-200"></i>
                    </div>
                    <div class="dropdown-content bg-blue-700/50 pl-10">
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700/70 transition-colors duration-200">
                            <i class="fas fa-cash-register w-5"></i>
                            <span class="ml-2">Transactions</span>
                        </a>
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700/70 transition-colors duration-200">
                            <i class="fas fa-file-invoice-dollar w-5"></i>
                            <span class="ml-2">Invoices</span>
                        </a>
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700/70 transition-colors duration-200">
                            <i class="fas fa-chart-line w-5"></i>
                            <span class="ml-2">Financial Reports</span>
                        </a>
                    </div>
                </div>
                
                <!-- Settings Link -->
                <a href="#" class="sidebar-item flex items-center px-4 py-3 text-white hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-cog w-6"></i>
                    <span class="ml-3">Settings</span>
                </a>
                
                <!-- Help Link -->
                <a href="#" class="sidebar-item flex items-center px-4 py-3 text-white hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-question-circle w-6"></i>
                    <span class="ml-3">Help & Support</span>
                </a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <button id="sidebar-toggle" class="text-gray-600 focus:outline-none lg:hidden">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h2 class="text-xl font-semibold text-gray-800 ml-4">Dashboard</h2>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                        </button>
                        
                        <div class="relative">
                            <button class="flex items-center focus:outline-none" id="user-menu-button">
                                <div class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold">
                                    AD
                                </div>
                                <span class="ml-2 text-gray-700">Admin</span>
                                <svg class="ml-1 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-4">
                <!-- Dashboard Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <!-- Total Customers -->
                    <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
                        <div class="rounded-full bg-blue-100 p-3">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 text-sm font-medium">Total Customers</h3>
                            <p class="text-2xl font-semibold text-gray-800">1,248</p>
                            <p class="text-green-600 text-sm font-medium flex items-center">
                                <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                12.5% increase
                            </p>
                        </div>
                    </div>
                    
                    <!-- Total Pets -->
                    <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
                        <div class="rounded-full bg-purple-100 p-3">
                            <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 text-sm font-medium">Total Pets</h3>
                            <p class="text-2xl font-semibold text-gray-800">1,875</p>
                            <p class="text-green-600 text-sm font-medium flex items-center">
                                <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                8.2% increase
                            </p>
                        </div>
                    </div>
                    
                    <!-- Monthly Revenue -->
                    <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
                        <div class="rounded-full bg-green-100 p-3">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 text-sm font-medium">Monthly Revenue</h3>
                            <p class="text-2xl font-semibold text-gray-800">$24,389</p>
                            <p class="text-green-600 text-sm font-medium flex items-center">
                                <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                15.3% increase
                            </p>
                        </div>
                    </div>
                    
                    <!-- Appointments -->
                    <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
                        <div class="rounded-full bg-amber-100 p-3">
                            <svg class="h-8 w-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 text-sm font-medium">Appointments</h3>
                            <p class="text-2xl font-semibold text-gray-800">42</p>
                            <p class="text-amber-600 text-sm font-medium flex items-center">
                                <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Today
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Revenue Chart -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Monthly Revenue</h3>
                            <div class="flex items-center">
                                <select class="text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                    <option>Last 6 Months</option>
                                    <option>Last Year</option>
                                    <option>All Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                    
                    <!-- Service Distribution Chart -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Service Distribution</h3>
                            <div class="flex items-center">
                                <select class="text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                    <option>This Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="serviceChart"></canvas>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activities and Upcoming Appointments -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Activities -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Recent Activities</h3>
                            <a href="#" class="text-blue-600 text-sm hover:underline">View All</a>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-800">New customer registered</p>
                                    <p class="text-sm text-gray-500">John Doe registered with pet Max (Golden Retriever)</p>
                                    <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                        <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-800">Appointment completed</p>
                                    <p class="text-sm text-gray-500">Bella's grooming session was completed</p>
                                    <p class="text-xs text-gray-400 mt-1">3 hours ago</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                        <svg class="h-5 w-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-800">New appointment scheduled</p>
                                    <p class="text-sm text-gray-500">Sarah booked a vet checkup for her cat Whiskers</p>
                                    <p class="text-xs text-gray-400 mt-1">5 hours ago</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center">
                                        <svg class="h-5 w-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-800">New product purchase</p>
                                    <p class="text-sm text-gray-500">Michael purchased Premium Dog Food (10kg)</p>
                                    <p class="text-xs text-gray-400 mt-1">Yesterday</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Upcoming Appointments -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Upcoming Appointments</h3>
                            <a href="#" class="text-blue-600 text-sm hover:underline">View All</a>
                        </div>
                        <div class="space-y-3">
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <div class="flex justify-between">
                                    <div>
                                        <p class="font-medium text-gray-800">Charlie (Labrador)</p>
                                        <p class="text-sm text-gray-600">Vaccination</p>
                                        <div class="flex items-center mt-1">
                                            <svg class="h-4 w-4 text-gray-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <span class="text-sm text-gray-500">Emma Wilson</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-blue-600">Today</p>
                                        <p class="text-sm text-gray-600">10:30 AM</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex justify-between">
                                    <div>
                                        <p class="font-medium text-gray-800">Luna (Persian Cat)</p>
                                        <p class="text-sm text-gray-600">Grooming</p>
                                        <div class="flex items-center mt-1">
                                            <svg class="h-4 w-4 text-gray-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <span class="text-sm text-gray-500">David Chen</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-gray-600">Today</p>
                                        <p class="text-sm text-gray-600">2:00 PM</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex justify-between">
                                    <div>
                                        <p class="font-medium text-gray-800">Rocky (Bulldog)</p>
                                        <p class="text-sm text-gray-600">Health Checkup</p>
                                        <div class="flex items-center mt-1">
                                            <svg class="h-4 w-4 text-gray-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <span class="text-sm text-gray-500">Maria Garcia</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-gray-600">Tomorrow</p>
                                        <p class="text-sm text-gray-600">11:15 AM</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex justify-between">
                                    <div>
                                        <p class="font-medium text-gray-800">Milo (Siamese Cat)</p>
                                        <p class="text-sm text-gray-600">Dental Cleaning</p>
                                        <div class="flex items-center mt-1">
                                            <svg class="h-4 w-4 text-gray-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <span class="text-sm text-gray-500">James Wilson</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-gray-600">Tomorrow</p>
                                        <p class="text-sm text-gray-600">3:30 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script>
        // Dropdown functionality
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            const trigger = dropdown.querySelector('.sidebar-item');
            const content = dropdown.querySelector('.dropdown-content');
            const icon = dropdown.querySelector('.fa-chevron-down');
            
            trigger.addEventListener('click', () => {
                content.classList.toggle('active');
                icon.style.transform = content.classList.contains('active') ? 'rotate(180deg)' : 'rotate(0)';
            });
        });
        
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue',
                    data: [18500, 19200, 21000, 20100, 23400, 24389],
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            display: true,
                            drawBorder: false
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        
        // Service Distribution Chart
        const serviceCtx = document.getElementById('serviceChart').getContext('2d');
        const serviceChart = new Chart(serviceCtx, {
            type: 'doughnut',
            data: {
                labels: ['Grooming', 'Veterinary', 'Boarding', 'Training', 'Pet Shop'],
                datasets: [{
                    data: [35, 25, 15, 10, 15],
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(139, 92, 246, 0.8)',
                        'rgba(239, 68, 68, 0.8)'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    }
                },
                cutout: '70%'
            }
        });
        
        // Mobile sidebar toggle
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('hidden');
        }); 
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'93d7d5f006684484',t:'MTc0Njg2MzMyMS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>