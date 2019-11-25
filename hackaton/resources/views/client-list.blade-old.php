@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between py-3 py-lg-4 w-100">
                    <h6 class="h4 m-0 font-weight-bold text-primary">Листа на клиенти:</h6>
                    <div>
                        <form action="{{ route('clients.search') }}" method="GET">
                            <div class="md-form input-group my-0">
                                <input type="text" class="form-control" placeholder="Внеси код или E-mail" name="query" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-sm btn-info m-0" type="button"><i class="fab fa-searchengin"></i></button>
                                </div>
                            </div>
                        </form>
                        @if(isset($query))
                        <a href="{{ route('clients.index') }}">Ресетирај пребарување</a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0" class="mb-4">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>E-mail</th>
                                    <th class="text-center">Код</th>
                                    <th class="text-center">Статус</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($clients))
                                @foreach($clients as $c)
                                <tr>
                                    <td class="text-center">{{ $c->id }}</td>
                                    <td>{{ $c->mail }}</td>
                                    <td class="text-center">{{ $c->code }}</td>
                                    <td class="text-center">{{ $c->status == 1 ? 'Нов купон' : 'Искористен купон' }}</td>
                                    <td class="text-right">
                                        <a href="{{  route('clients.edit', $c->id) }}" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-pen fa-sm text-white-50"></i> Измени</a>
                                        <form action="{{ route('clients.destroy', $c->id) }}" method="POST" class="d-inline-block">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete" />
                                            <button type="submit" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i> Избриши</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div>
                        	<a href="{{ route('export') }}" class="btn btn-sm btn-info shadow-sm"><i class="fas fa-file-export"></i> Export</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Статистика:</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myPieChart" height="200px" style="width: 100%;"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
        <script type="text/javascript">
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
              type: 'doughnut',
              data: {
                labels: ["Нови", "Искористени"],
                datasets: [{
                  data: [{{ count($valid_coupons) }}, {{ count($expired_coupons) }}],
                  backgroundColor: ['#1cc88a', '#e74a3b'],
                  hoverBackgroundColor: ['#1cc88a', '#e74a3b'],
                  hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
              },
              options: {
                maintainAspectRatio: false,
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  caretPadding: 10,
                },
                cutoutPercentage: 80,
              },
            });
        </script>
@endsection