<div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>

        </form>
        <ul class="navbar-nav navbar-right">


          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Admin</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/dashboard">Admin Panel</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">AP</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown" id="dashboard">
                <a href="/dashboard" class="nav-link"><ion-icon name="home-outline" style="font-size: 15pt"></ion-icon><span class="ms-3"> Beranda</span></a>
              </li>
              <li class="menu-header">Peserta</li>
              <li class="nav-item dropdown " id="daftar_peserta">
                <a href="/peserta" class="nav-link"><ion-icon name="reader-outline" style="font-size: 15pt"></ion-icon><span class="ms-3"> Daftar Peserta</span></a>
              </li>
              <li class="menu-header">Sesi</li>
              <li class="nav-item dropdown " id="daftar_sesi">
                <a href="/sesi" class="nav-link"><ion-icon name="documents-outline" style="font-size: 15pt"></ion-icon><span class="ms-3"> Daftar Sesi</span></a>
              </li>
              <li class="nav-item dropdown " id="daftar_absen">
                <a href="/absensi" class="nav-link"><ion-icon name="finger-print-outline" style="font-size: 15pt"></ion-icon><span class="ms-3"> Absensi Peserta</span></a>
              </li>
              <li class="menu-header">Pembayaran</li>
              <li class="nav-item dropdown " id="pembayaran">
                <a href="/vpembayaran" class="nav-link"><ion-icon name="cash-outline" style="font-size: 15pt"></ion-icon><span class="ms-3">Verifikasi Pembayaran</span></a>
              </li>
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split w-100">
                <ion-icon name="log-out-outline" style="font-size: 15pt" class="align-middle me-3"></ion-icon>Logout
              </a>
            </div>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            @yield('body')
        </section>
      </div>

    </div>
  </div>
<script>
    $('#{{$menu}}').addClass("active");
</script>
