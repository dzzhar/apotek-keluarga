<?php
session_start();
$user_level = $_SESSION['level'] ?? '';
$current_path = $_SERVER['REQUEST_URI']; // Get the full URI
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand" href="<?= ($user_level === 'STAFF') ? '../../staff.html' : (($user_level === 'ADMIN') ? '../../admin.html' : '../../pasien.html'); ?>">
    <div class="sidebar-brand-text">Apotek Keluarga</div>
  </a>
  <hr class="sidebar-divider my-0" />

  <li class="nav-item <?= (strpos($current_path, 'admin.html') !== false || strpos($current_path, 'staff.html') !== false || strpos($current_path, 'pasien.html')) ? 'active' : ''; ?>">
  <a class="nav-link" href="<?= ($user_level === 'STAFF') ? '../../staff.html' : (($user_level === 'ADMIN') ? '../../admin.html' : '../../pasien.html'); ?>">
  <i class="fas fa-fw fa-home"></i>
      <span>Home</span>
    </a>
  </li>

  <hr class="sidebar-divider" />

  <li class="nav-item <?= (strpos($current_path, 'obat') !== false) ? 'active' : ''; ?>" style="<?= ($user_level === 'PASIEN') ? 'display: none;' : ''; ?>">
    <a class="nav-link" href="../obat">
      <i class="fas fa-fw fa-pills"></i>
      <span>Data Obat</span>
    </a>
  </li>

  <li class="nav-item <?= (strpos($current_path, 'pasien') !== false) ? 'active' : ''; ?>">
    <a class="nav-link" href="../pasien">
      <i class="fas fa-fw fa-user-injured"></i>
      <span>Data Pasien</span>
    </a>
  </li>

  <li class="nav-item <?= (strpos($current_path, 'dokter') !== false) ? 'active' : ''; ?>">
    <a class="nav-link" href="../dokter">
      <i class="fas fa-fw fa-user-md"></i>
      <span>Data Dokter</span>
    </a>
  </li>

  <li class="nav-item <?= (strpos($current_path, 'pembayaran') !== false) ? 'active' : ''; ?>">
    <a class="nav-link" href="../pembayaran">
      <i class="fas fa-fw fa-credit-card"></i>
      <span>Data Pembayaran</span>
    </a>
  </li>

  <li class="nav-item <?= (strpos($current_path, 'report') !== false) ? 'active' : ''; ?>" style="<?= ($user_level === 'PASIEN' || $user_level === 'STAFF') ? 'display: none;' : ''; ?>">
    <a class="nav-link" href="../report">
      <i class="fas fa-fw fa-file-alt"></i>
      <span>Data Report</span>
    </a>
  </li>

  <hr class="sidebar-divider d-none d-md-block" />

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
