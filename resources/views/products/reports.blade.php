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
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#exportUsersReport">Export Users Report</button>
                        </div>
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#exportProductsReport">
                                Export Products Report</button>
                        </div>
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#exportSellsReport">
                                Export Sells Reports</button>
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

<!-- Modal Chart-->
<div class="modal fade" id="createReport" tabindex="-1" aria-labelledby="createReportLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createReportLabel">Chart Report</h5>
                <button type="button" name="btnCreRep" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='GET' action="{{ route('report.show')}}">
                    @csrf
                    <div class="form-group">
                        <label for="reportType">Report Type</label>
                        <select id="reportType" class="form-control" name="reportType" required>
                            <option></option>
                            @foreach(\App\Constants\reportTypes::toArray() as $reportKey => $reportType))
                                <option value="{{$reportType}}" @if($reportType) === old('reportType') )selected @endif>{{$reportKey}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="typeChart">Chart Type</label>
                        <select id="typeChart" class="form-control" name="typeChart" required>
                            <option></option>
                            @foreach(\App\Constants\chartTypes::toArray() as $chartKey => $chartType)
                                <option value="{{$chartType}}" @if($chartType === old('typeChart') )selected @endif>{{$chartType}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="initialDate">Initial Date</label>
                        <input class="form-control" type="date" name="initialDate" value="{{ old('initialDate') }}" id="initialDate" required>
                    </div>
                    <div class="form-group">
                        <label for="finalDate">Final date</label>
                        <input class="form-control" type="date" name="finalDate" value="{{ old('finalDate') }}" id="finalDate" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary" style="background-color:#BD2765;border-bottom-color: #0b0b0b">See Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Export Users Report-->

<div class="modal fade" id="exportUsersReport" tabindex="-1" aria-labelledby="exportUsersReport" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportReportLabel">Export Report User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='GET' action="{{ route('users.export')}}">
                    <div class="form-group">
                        <label for="status">Report By Status</label>
                        <select id="status" class="form-control" name="status">
                            <option value=""></option>
                            @foreach(\App\Constants\status::toArray() as $statusKey => $status)
                                <option value="{{$status}}" @if($status === old('$status') )selected @endif>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Report By ID Type</label>
                        <select id="status" class="form-control" name="idType">
                            <option value=""></option>
                            @foreach(\App\Constants\idTypes::toArray() as $idKey => $idType)
                                <option value="{{$idType}}" @if($idType === old('idType') )selected @endif>{{$idType}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="initialDate">Initial Date</label>
                        <input class="form-control" type="date" name="initialDate" value="" id="initialDate" required>
                    </div>
                    <div class="form-group">
                        <label for="finalDate">Final date</label>
                        <input class="form-control" type="date" name="finalDate" value="" id="finalDate" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary" style="background-color:#bd2765;border-bottom-color: #0b0b0b">See Report</button>
                    </div>
                    <div class="form-group">
                        <label for="users"></label>
                        <input class="form-control" type="hidden" name="exportType" value="exportUsers" id="exportUsers">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Export Product Report-->

<div class="modal fade" id="exportProductsReport" tabindex="-1" aria-labelledby="exportProductsReport" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportProductsLabel">Export Report Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='GET' action="{{ route('products.export')}}">
                    <div class="form-group">
                        <label for="status">Report By Status</label>
                        <select id="status" class="form-control" name="status">
                            <option value=""></option>
                            @foreach(\App\Constants\status::toArray() as $statusKey => $status)
                                <option value="{{$status}}" @if($status === old('$status') )selected @endif>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Report By Category</label>
                        <select id="status" class="form-control" name="category">
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == old('category')) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Report By Mark</label>
                        <select id="status" class="form-control" name="mark">
                            <option value=""></option>
                            @foreach($marks as $mark)
                                <option value="{{$mark->name}}" @if($mark->name === old('mark') )selected @endif>{{$mark->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="initialDate">Initial Date</label>
                        <input class="form-control" type="date" name="initialDate" value="" id="initialDate" required>
                    </div>
                    <div class="form-group">
                        <label for="finalDate">Final date</label>
                        <input class="form-control" type="date" name="finalDate" value="" id="finalDate" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary" style="background-color:#bd2765;border-bottom-color: #0b0b0b">See Report</button>
                    </div>
                    <div class="form-group">
                        <label for="product"></label>
                        <input class="form-control" type="hidden" name="exportType" value="exportProducts" id="exportProducts">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Export Sells Report-->

<div class="modal fade" id="exportSellsReport" tabindex="-1" aria-labelledby="exportSellsReport" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportSellsReports">SellsReport</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='GET' action="{{ route('sells.export')}}">
                    <div class="form-group">
                        <label for="status">Report By Sells</label>
                        <select id="status" class="form-control" name="status">
                            <option value=""></option>
                            @foreach(\App\Constants\invoicesStatus::toArray() as $statusKey => $status)
                                <option value="{{$status}}" @if($status === old('$status') )selected @endif>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="initialDate">Initial Date</label>
                        <input class="form-control" type="date" name="initialDate" value="" id="initialDate" required>
                    </div>
                    <div class="form-group">
                        <label for="finalDate">Final date</label>
                        <input class="form-control" type="date" name="finalDate" value="" id="finalDate" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary" style="background-color:#bd2765;border-bottom-color: #0b0b0b">See Report</button>
                    </div>
                    <div class="form-group">
                        <label for="exportSells"></label>
                        <input class="form-control" type="hidden" name="exportType" value="exportSells" id="exportSells">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
