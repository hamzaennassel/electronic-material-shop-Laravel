 <!-- plugins:js -->
 <script src="admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="admin/vendors/chart.js/Chart.min.js"></script>
  <!-- <script src="admin/vendors/datatables.net/jquery.dataTables.js"></script> -->
  <!-- <script src="admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
  <script src="admin/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="admin/js/off-canvas.js"></script>
  <script src="admin/js/hoverable-collapse.js"></script>
  <script src="admin/js/template.js"></script>
  <script src="admin/js/settings.js"></script>
  <script src="admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="admin/js/dashboard.js"></script>
  <script src="admin/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Données du graphique
    var salesData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Ventes mensuelles',
            data: [120, 200, 150, 300, 250, 180],
            backgroundColor: 'rgba(46, 204, 113, 0.8)', // Couleur verte
            borderColor: 'rgba(46, 204, 113, 1)',
            borderWidth: 1
        }]
    };

    // Options du graphique
    var salesOptions = {
        scales: {
        y: {
            beginAtZero: true,
            ticks: {
                color: 'white' // Couleur blanche pour les étiquettes
            }
        },
        x: {
            ticks: {
                color: 'white' // Couleur blanche pour les étiquettes
            }
        }
    }
    };

    // Créer le graphique des ventes
    var salesChart = new Chart(document.getElementById('salesChart'), {
        type: 'bar',
        data: salesData,
        options: salesOptions
    });
</script>
  @yield('scripts')