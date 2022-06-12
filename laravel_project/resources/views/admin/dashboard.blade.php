
@extends('admin.master')
@section('content')
      <div class="panel-header panel-header-lg">
        <canvas id="bigDashboardChart"></canvas>
      </div>
      <div class="content">
        <div class="row"  style="margin-top: -200px">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category"></h5>
                <h4 class="card-title" style="color: #2F8F9D">Users</h4>
                <div class="" style="height: 20px; padding-left: 30px">
                  <img src="https://v.fastcdn.co/u/cf2bdce5/50199270-0-users.png" height="200px">
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="lineChartExample"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category"></h5>
                <h4 class="card-title" style="color: #2F8F9D">Products</h4>
                <div class="" style="height: 20px; padding-left: 50px; padding-top: 20px">
                 
                  <img src="https://th.bing.com/th/id/OIP.6X-tB1F8KlnGQ7pXzRZ4BAHaHa?w=166&h=180&c=7&r=0&o=5&dpr=1.25&pid=1.7" height="200px">
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category"></h5>
                <h4 class="card-title" style="color: #2F8F9D"> Donations</h4>
              </div>
              <div style="height: 20px; padding-left: 20px; padding-top: 20px">
                <img src="https://th.bing.com/th/id/OIP.NthyN5jtOUgSFyNzXkrprgHaFM?pid=ImgDet&rs=1" height="200px">
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="barChartSimpleGradientsNumbers"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      @endsection
     