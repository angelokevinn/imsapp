<x-app-layout>
    
    <div class="w-full px-10 pt-5 flex flex-col gap-4 mb-8">
        <div class="w-full flex justify-center my-5 px-6 py-3 bg-[#D7D3BF] rounded-lg shadow-lg">
            <h1 class="text-3xl font-black text-[#161616] animate-pulse">
                IMS Dashboard
            </h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1: Total Products -->
            <a href="{{ route('product.index') }}" class="p-6 rounded-lg shadow-lg hover:bg-[#8D493A] hover:text-[#D7D3BF] transition delay-50 duration-300 ease-in-out">
                <h3 class="text-xl font-black mb-4">Total Products</h3>
                <p class="text-3xl font-bold">1,250</p>
            </a>
            <a href="/dashboard" class="p-6 rounded-lg shadow-lg hover:bg-[#09122C] hover:text-[#ffff] transition delay-50 duration-300 ease-in-out">
                <h3 class="text-xl font-black mb-4">Low Stock Items</h3>
                <p class="text-3xl font-bold text-red-600">20</p>
            </a>
            <a href="/dashboard" class="p-6 rounded-lg shadow-lg hover:bg-[#8D493A] hover:text-[#D7D3BF] transition delay-50 duration-300 ease-in-out">
                <h3 class="text-xl font-black mb-4">Orders Today</h3>
                <p class="text-3xl font-bold">50</p>
            </a>
            <a href="/dashboard" class="p-6 rounded-lg shadow-lg hover:bg-[#09122C] hover:text-[#ffff] transition delay-50 duration-300 ease-in-out">
                <h3 class="text-xl font-black mb-4">Total Sales</h3>
                <p class="text-3xl font-bold text-green-600">IDR 1,250,000</p>
            </a>
        </div>

        <div class="mt-8 shadow-lg rounded-xl">
            <!-- Graphs or Charts Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-10">Capital Overview</h3>
                <div class="w-full h-100 flex items-center justify-center">
                    <!-- Chart Container -->
                    <div id="chart" class="w-full h-80"></div>
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>


<!-- Chart Script -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
      var options = {
        series: [{
        name: 'Net Profit',
        data: [50, 15, 20, 44, 55, 57, 56, 61, 58, 63, 60, 66]
      }, {
        name: 'Revenue',
        data: [43, 16, 18, 76, 85, 101, 98, 87, 105, 91, 114, 94]
      }, {
        name: 'Free Cash Flow',
        data: [55, 14, 16, 35, 41, 36, 26, 45, 48, 52, 53, 41]
      }],
        chart: {
        type: 'bar',
        height: 350
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '55%',
          borderRadius: 5,
          borderRadiusApplication: 'end'
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
        title: {
          text: 'IDR (Millions)'
        }
      },
      fill: {
        colors:['#09122C', '#A94A4A', '#889E73'],
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function (val) {
            return "IDR " + val + " Millions"
          }
        }
      }
      };
      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
  });
</script>
