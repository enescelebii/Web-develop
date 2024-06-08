<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <title>ADMIN</title>
</head>
<body>
  @if (@session()->has('success2'))
  <div class="alert alert-success" role="alert" style="text-align: center">
   {{session('success2')}}
  </div>
  @endif
  
  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="background-color: rgb(141, 55, 55); color: black">
      <span class="brand-text font-weight-light"><b>Admin Paneli</b></span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar" style="background-color: rgb(141, 55, 55); color: black">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">
            
            @if (@session()->has('success'))
             {{session('success')}}
  
            @endif
          </a>
        </div>
      </div>
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('admin')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                <b>Anasayfa</b>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('verial')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p><b>Kullanıcılar</b></p>
                </a>
              </li>
              <li class="nav-item" style="margin-top:0 ">
                <a href="{{route('logout')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><b>Çıkış</b></p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</body>
</html>