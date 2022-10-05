
@include('admin.partials.head')
@include('admin.partials.navbar')

<section id="interface">
    @include('admin.partials.search')
   

    <h3 class="i-name">Dashboard</h3>
    <div class="values text-white ">
        <div class="val-box" style="background-color:#0b3199 ;">
            <i class="fa-solid fa-user-graduate"></i>
            <div style="border-left: 2px solid #fff; padding-left: 15px;">
                <h3 class="fw-bold">{{ $students_count }}</h3>
                <span class="text-white fs-6">Students</span>
            </div>
        </div>

        <div class="val-box" style="background-color:#065ce5 ;">
            <a href="view-all-teachers.html"><i class="fa-solid fa-user-tie " ></i></a>
            <div style="border-left: 2px solid #fff; padding-left: 15px;">
                <h3 class="fw-bold">
                    {{ $teachers_count }}
                </h3>
                <span class="text-white fs-6">teachers</span>
            </div>
        </div>

        <div class="val-box" style="background-color:#0080ff ;">
            <i class="fa-solid fa-book-open"></i>
            <div style="border-left: 2px solid #fff; padding-left: 15px;">
                <h3 class="fw-bold">{{ $courses_count }}</h3>
                <span class="text-white fs-6"> courses</span>
            </div>
        </div>

        <div class="val-box" style="background-color:#4399f0 ;">
            <i class="fa-solid fa-person-shelter"></i>
            <div style="border-left: 2px solid #fff; padding-left: 15px;">
                <h3 class="fw-bold">{{ $classes_count }}</h3>
                <span class="text-white fs-6"> classes</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-6">
                <div id="piechart" style="width: 430px; height: 400px; margin-left: 105px;"></div>
            </div>
            <div class="col-6">
                <div id="curve_chart" style="width: 470px; height: 400px"></div>
            </div>
            
        </div>
    </div>

</section>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Male',  {{ $males }}],
          ['Female', {{ $females }}]
        ]);

        var options = {
          title: 'The Number Of Males And Females'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);


        var data = google.visualization.arrayToDataTable([
          ['Year', 'School Earnings'],
          @foreach ($earnings as $earning)
          [{{ $earning->year}},  {{ $earning->sum }}, ],    
          @endforeach
          
          
        ]);

        var options = {
          title: 'School Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }


    //   function drawChart() {
  
    // }
    </script>

<script>
    $(document).ready(function(){
        $("#menu-btn").click(function(){
        $("#menu").toggleClass("active");
        });
    });
</script>

@include('admin.partials.scripts')