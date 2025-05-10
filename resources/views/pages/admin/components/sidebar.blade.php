 <!-- Sidebar -->
 <aside class="sidebar" id="sidebar">
     <div class="sidebar-header">
         <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0iIzRBOUQ5QyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+PHBhdGggZD0iTTEyIDJjLjUgMCAxIC4xOSAxLjQuNTkuNC4zOS42Ljg4LjYgMS40MSAwIC41My0uMiAxLjAxLS42IDEuNDEtLjQuNC0uOS41OS0xLjQuNTktLjUgMC0xLS4xOS0xLjQtLjU5LS40LS40LS42LS44OC0uNi0xLjQxIDAtLjUzLjItMS4wMi42LTEuNDFDMTEgMi4xOSAxMS41IDIgMTIgMnptLTQuNSA5Yy44MyAwIDEuNS42NyAxLjUgMS41cy0uNjcgMS41LTEuNSAxLjUtMS41LS42Ny0xLjUtMS41LjY3LTEuNSAxLjUtMS41em0wLTVjLjgzIDAgMS41LjY3IDEuNSAxLjVTOC4zMyA5IDcuNSA5IDYgOC4zMyA2IDcuNSA2LjY3IDYgNy41IDZ6bTkgMGMuODMgMCAxLjUuNjcgMS41IDEuNVMxNy4zMyA5IDE2LjUgOSAxNSA4LjMzIDE1IDcuNSAxNS42NyA2IDE2LjUgNnptMCA1Yy44MyAwIDEuNS42NyAxLjUgMS41cy0uNjcgMS41LTEuNSAxLjUtMS41LS42Ny0xLjUtMS41LjY3LTEuNSAxLjUtMS41em0tNC41IDVjMS42NiAwIDMgMS4zNCAzIDNzLTEuMzQgMy0zIDMtMy0xLjM0LTMtMyAxLjM0LTMgMy0zeiIvPjwvc3ZnPg=="
             alt="Logo">
         <h2>VetClinic Admin</h2>
     </div>
     <nav class="sidebar-menu">
         <a href="#" class="sidebar-menu-item @yield('dashboard')" data-page="dashboard">
             <i class="fas fa-tachometer-alt"></i>
             <span>Dashboard</span>
         </a>
         
         <a href="#" class="sidebar-menu-item @yield('data-pelanggan')" data-page="doctor-schedules">
             <i class="fas fa-calendar-alt"></i>
             <span>Customer Management</span>
         </a>
         <a href="#" class="sidebar-menu-item" data-page="appointments">
             <i class="fas fa-calendar-check"></i>
             <span>Appointments</span>
         </a>
         <a href="#" class="sidebar-menu-item" data-page="services">
             <i class="fas fa-stethoscope"></i>
             <span>Services</span>
         </a>
         <a href="#" class="sidebar-menu-item cursor-pointer" id="logoutButton">
             <i class="fas fa-sign-out-alt"></i>
             <span>Logout</span>
         </a>
     </nav>
 </aside>
