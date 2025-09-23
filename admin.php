<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Rental Mobil</title>
  <link rel="stylesheet" href="assets/css/admin.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="dashboard">

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <h2>Rental Mobil</h2>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="#">Components</a></li>
        <li><a href="#">Charts</a></li>
        <li><a href="#">Forms</a></li>
        <li><a href="#">Tables</a></li>
        <li><a href="#">Profiles</a></li>
        <li><a href="#">Settings</a></li>
      </ul>
    </nav>
  </aside>

  <!-- Main content -->
  <div class="main-content">

    <!-- Topbar -->
    <header class="topbar">
      <div class="topbar-left">
        <button class="toggle-sidebar" id="toggleBtn">☰</button>
        <input type="text" placeholder="Search..." class="search-input">
      </div>
      <div class="topbar-right">
        <div class="notif">
          🔔
        </div>
        <div class="profile">
          <span class="profile-name">Admin</span>
          <img src="" alt="Profile" class="profile-pic">
        </div>
      </div>
    </header>

    <!-- Content -->
    <section class="content">

      <!-- Cards -->
      <div class="cards">
        <div class="card">
          <h3>Visitors</h3>
          <p>1,234</p>
        </div>
        <div class="card">
          <h3>Sales</h3>
          <p>567</p>
        </div>
        <div class="card">
          <h3>Orders</h3>
          <p>89</p>
        </div>
        <div class="card">
          <h3>Revenue</h3>
          <p>$12,345</p>
        </div>
      </div>

      <!-- Charts -->
      <div class="charts">
        <div class="chart">
          <h3>Traffic</h3>
          <canvas id="trafficChart"></canvas>
        </div>
        <div class="chart">
          <h3>Sales</h3>
          <canvas id="salesChart"></canvas>
        </div>
      </div>

    </section>

    <!-- Footer -->
    <footer class="footer">
      &copy; 2025 Rental Mobil. All Rights Reserved.
    </footer>

  </div>
</div>

<script src="script.js"></script>
</body>
</html>
