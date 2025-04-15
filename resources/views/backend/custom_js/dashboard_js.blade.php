@if($view == 'dashboard')
<script>
    // ================================ Revenue Report Chart Start ================================ 
    var options = {
      series: [{
        name: 'Visitors',
        data: ["{{ $visitor_01 }}","{{ $visitor_02 }}","{{ $visitor_03 }}","{{ $visitor_04 }}","{{ $visitor_05 }}","{{ $visitor_06 }}","{{ $visitor_07 }}","{{ $visitor_08 }}","{{ $visitor_09 }}","{{ $visitor_10 }}","{{ $visitor_11 }}","{{ $visitor_12 }}"]
      },{
        name: 'Pendaftar',
        data: ["{{ $pendaftar_01 }}","{{ $pendaftar_02 }}","{{ $pendaftar_03 }}","{{ $pendaftar_04 }}","{{ $pendaftar_05 }}","{{ $pendaftar_06 }}","{{ $pendaftar_07 }}","{{ $pendaftar_08 }}","{{ $pendaftar_09 }}","{{ $pendaftar_10 }}","{{ $pendaftar_11 }}","{{ $pendaftar_12 }}"]
      },{
        name: 'Pemesan',
        data: ["{{ $pesan_01 }}","{{ $pesan_02 }}","{{ $pesan_03 }}","{{ $pesan_04 }}","{{ $pesan_05 }}","{{ $pesan_06 }}","{{ $pesan_07 }}","{{ $pesan_08 }}","{{ $pesan_09 }}","{{ $pesan_10 }}","{{ $pesan_11 }}","{{ $pesan_12 }}"]
      }],
      colors: ['#487FFF', '#FF9F29', '#DC3545'],
      labels: ['Active', 'New', 'Total'],
      legend: {
          show: false 
      },
      chart: {
        type: 'bar',
        height: 250,
        toolbar: {
          show: false
        },
      },
      grid: {
          show: true,
          borderColor: '#D1D5DB',
          strokeDashArray: 4, // Use a number for dashed style
          position: 'back',
      },
      plotOptions: {
        bar: {
          borderRadius: 4,
          columnWidth: 10,
        },
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      },
      yaxis: {
        categories: ['0', '5000', '10,000', '20,000', '30,000', '50,000', '60,000', '60,000', '70,000', '80,000', '90,000', '100,000'],
      },
      fill: {
        opacity: 1,
        width: 18,
      },
    };

    var chart = new ApexCharts(document.querySelector("#paymentStatusChart"), options);
    chart.render();
  // ================================ Revenue Report Chart End ================================ 
</script>
@endif