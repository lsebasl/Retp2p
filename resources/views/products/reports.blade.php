@extends('layout.report')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item" >
                            <a class="nav-link active" href="{{ route('home') }}">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <span data-feather="users"></span>
                                users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">
                                <span data-feather="shopping-cart"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('stocks.index') }}">
                                <span data-feather="layers"></span>
                                Stock
                            </a>
                        </li>
                    </ul>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        @foreach(\App\Constants\exportTypes::toArray() as $exportKey => $exportType)
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('storage/'.$exportType.'.xlsx')}}">
                                <span data-feather="file-text"></span>
                                {{$exportKey}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#reports">
                                Export Reports</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createReport">
                            Chart Report
                        </button>
                    </div>
                </div>
                @include('partials.__alerts')
                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

                @section('scripts')
                    <script>
                        var ejeX = new Array();
                        var etiquetas = new Array();
                        var ejeY = new Array();
                        const result = @json($result ?? '');
                        const typeChart = @json($typeChart ?? '');
                        const reportType = @json($tittle ?? '');
                        result.forEach(function(data){
                            ejeX.push(data.DATA);
                            ejeY.push(data.LABEL);
                        });
                    </script>
                @endsection

                <h2>Section title</h2>
               <notification></notification>

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>{{$ejeX}}</th>
                            <th>{{$ejeY}}</th>
                        </tr>
                        </thead>
                        @foreach($result as $item)
                        <tbody>
                        <tr>
                            <td>{{$item->DATA}}</td>
                            <td>{{$item->LABEL}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
@endsection

@include('partials.__form_reports')


