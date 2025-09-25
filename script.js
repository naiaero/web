// Sidebar toggle
const toggleBtn = document.getElementById("toggleBtn");
const sidebar = document.getElementById("sidebar");

toggleBtn.addEventListener("click", () => {
  sidebar.classList.toggle("");
});

// Chart.js demo
const trafficCtx = document.getElementById("trafficChart");
const salesCtx = document.getElementById("salesChart");

new Chart(trafficCtx, {
  type: "line",
  data: {
    labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
    datasets: [{
      label: "Visitors",
      data: [120, 190, 300, 500, 200, 300, 400],
      borderColor: "#4e73df",
      fill: true,
      backgroundColor: "rgba(78,115,223,0.1)",
      tension: 0.3
    }]
  },
  options: {
    responsive: true,
    plugins: { legend: { display: false } }
  }
});

new Chart(salesCtx, {
  type: "bar",
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
    datasets: [{
      label: "Sales",
      data: [65, 59, 80, 81, 56, 55],
      backgroundColor: "#1cc88a"
    }]
  },
  options: {
    responsive: true,
    plugins: { legend: { display: false } }
  }
});
