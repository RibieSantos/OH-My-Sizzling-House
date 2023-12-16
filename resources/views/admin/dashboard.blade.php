@include('admin.templates.__header',['title' => 'Admin Dashboard'])
<div class="custom-bg position-absolute w-100 h-50"></div>

<main>

    <div class="container" >
      
        <h3 class="m-4 position-relative text-light">Dashboard</h3>
        
            <div class="container-fluid pb-4">
              
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                      <div class="card">
                        <div class="card-header p-3 pt-2">
                          <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-calendar fs-2" aria-hidden="true"></i>
                          </div>
                          <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Today's Sales</p>
                            <h4 class="mb-0">{{ number_format($tsales,2) }}</h4>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                      <div class="card">
                        <div class="card-header p-3 pt-2">
                          <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-user fs-2" aria-hidden="true"></i>
                          </div>
                          <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Users</p>
                            <h4 class="mb-0">{{ $user }}</h4>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                      <div class="card">
                        <div class="card-header p-3 pt-2">
                          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa-solid fa-utensils fs-2"></i>
                          </div>
                          <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Menu</p>
                            <h4 class="mb-0">{{ $menu }}</h4>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                      <div class="card">
                        <div class="card-header p-3 pt-2">
                          <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa-solid fa-coins fs-2"></i>
                          </div>
                          <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Sales</p>
                            <h4 class="mb-0">{{ number_format($sales,2) }}</h4>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
            </div>
            <div class="mx-5 mb-5">
              <div class="card z-index-2 h-100 w-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                  <h6 class="text-capitalize">Sales Overview</h6>
                  
                </div>
                <div class="card-body p-3">
                  <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                  </div>
                </div>
              </div>
            </div>  
    </div>
    
</main>
<script src="{{ URL::asset('js/chartjs.min.js') }}"></script>

<script>
  var ctx1 = document.getElementById("chart-line").getContext("2d");

  var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
  gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
  gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

  new Chart(ctx1, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Sales",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#5e72e4",
        backgroundColor: gradientStroke1,
        borderWidth: 3,
        fill: true,
        data: @json($schart),
        maxBarThickness: 6
      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#fbfbfb',
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#ccc',
            padding: 20,
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
</script>

@include('admin.templates.__footer')