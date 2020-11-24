@extends('layout.report')
@section('content')
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item" >
                        <a class="nav-link active" href="#">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers"></span>
                            Integrations
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Year-end sale
                        </a>
                    </li>
                </ul>
            </div>
        </nav>



        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#exportReport">Export Users Report</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createReport">
                        Create Report
                    </button>
                </div>
            </div>

            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            {{$typeChart}}
           @section('scripts')
                <script>
                    var ejeX = new Array();
                    var etiquetas = new Array();
                    var ejeY = new Array();
                    const result = @json($result ?? '');
                    const typeChart = @json($typeChart ?? '');
                    result.forEach(function(data){
                        etiquetas.push(data.DATA);
                        ejeY.push(data.LABEL);
                    });
                </script>
            @endsection

            <h2>Section title</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1,001</td>
                        <td>Lorem</td>
                        <td>ipsum</td>
                        <td>dolor</td>
                        <td>sit</td>
                    </tr>
                    <tr>
                        <td>1,002</td>
                        <td>amet</td>
                        <td>consectetur</td>
                        <td>adipiscing</td>
                        <td>elit</td>
                    </tr>
                    <tr>
                        <td>1,003</td>
                        <td>Integer</td>
                        <td>nec</td>
                        <td>odio</td>
                        <td>Praesent</td>
                    </tr>
                    <tr>
                        <td>1,003</td>
                        <td>libero</td>
                        <td>Sed</td>
                        <td>cursus</td>
                        <td>ante</td>
                    </tr>
                    <tr>
                        <td>1,004</td>
                        <td>dapibus</td>
                        <td>diam</td>
                        <td>Sed</td>
                        <td>nisi</td>
                    </tr>
                    <tr>
                        <td>1,005</td>
                        <td>Nulla</td>
                        <td>quis</td>
                        <td>sem</td>
                        <td>at</td>
                    </tr>
                    <tr>
                        <td>1,006</td>
                        <td>nibh</td>
                        <td>elementum</td>
                        <td>imperdiet</td>
                        <td>Duis</td>
                    </tr>
                    <tr>
                        <td>1,007</td>
                        <td>sagittis</td>
                        <td>ipsum</td>
                        <td>Praesent</td>
                        <td>mauris</td>
                    </tr>
                    <tr>
                        <td>1,008</td>
                        <td>Fusce</td>
                        <td>nec</td>
                        <td>tellus</td>
                        <td>sed</td>
                    </tr>
                    <tr>
                        <td>1,009</td>
                        <td>augue</td>
                        <td>semper</td>
                        <td>porta</td>
                        <td>Mauris</td>
                    </tr>
                    <tr>
                        <td>1,010</td>
                        <td>massa</td>
                        <td>Vestibulum</td>
                        <td>lacinia</td>
                        <td>arcu</td>
                    </tr>
                    <tr>
                        <td>1,011</td>
                        <td>eget</td>
                        <td>nulla</td>
                        <td>Class</td>
                        <td>aptent</td>
                    </tr>
                    <tr>
                        <td>1,012</td>
                        <td>taciti</td>
                        <td>sociosqu</td>
                        <td>ad</td>
                        <td>litora</td>
                    </tr>
                    <tr>
                        <td>1,013</td>
                        <td>torquent</td>
                        <td>per</td>
                        <td>conubia</td>
                        <td>nostra</td>
                    </tr>
                    <tr>
                        <td>1,014</td>
                        <td>per</td>
                        <td>inceptos</td>
                        <td>himenaeos</td>
                        <td>Curabitur</td>
                    </tr>
                    <tr>
                        <td>1,015</td>
                        <td>sodales</td>
                        <td>ligula</td>
                        <td>in</td>
                        <td>libero</td>
                    </tr>
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
                <h5 class="modal-title" id="createReportLabel">Create Report</h5>
                <button type="button" name="btnCreRep" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='GET' action="{{ route('report.show')}}">
                    @csrf
                    <div class="form-group">
                        <label for="reportType">Report Type</label>
                        <select id="reportType" class="form-control" name="reportType">
                            <option selected>Choose...</option>
                            <option value="product" {{'product' == request()->input('reportType') ? 'selected' : ''}}>{{__('Products')}}</option>
                            <option value="sellByCategory" {{'sellByCategory' == request()->input('reportType') ? 'selected' : ''}}>{{__('Sells By Category')}}</option>
                            <option value="sellByStatus" {{'sellByStatus' == request()->input('reportType') ? 'selected' : ''}}>{{__('Sells By Status')}}</option>
                            <option value="sellByProduct" {{'sellByProduct' == request()->input('reportType') ? 'selected' : ''}}>{{__('Sells By Product')}}</option>
                            <option value="topClient" {{'topClient' == request()->input('reportType') ? 'selected' : ''}}>{{__('Top TopClients')}}</option>
                            <option value="stockByCategory" {{'stockByCategory' == request()->input('reportType') ? 'selected' : ''}}>{{__('Stock By Category')}}</option>
                            <option value="usersStatus" {{'usersStatus' == request()->input('reportType') ? 'selected' : ''}}>{{__('User By Status')}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="typeChart">Chart Type</label>
                        <select id="typeChart" class="form-control" name="typeChart">
                            <option selected>Choose...</option>
                            <option value="line" {{'line' == request()->input('typeChart') ? 'selected' : ''}}>{{__('Line')}}</option>
                            <option value="bar" {{'bar' == request()->input('typeChart') ? 'selected' : ''}}>{{__('Vertical Bar')}}</option>
                            <option value="horizontalBar" {{'horizontalBar' == request()->input('typeChart') ? 'selected' : ''}}>{{__('horizontal Bar')}}</option>
                            <option value="polarArea" {{'polarArea' == request()->input('typeChart') ? 'selected' : ''}}>{{__('Polar Area')}}</option>
                            <option value="pie" {{'pie' == request()->input('typeChart') ? 'selected' : ''}}>{{__('Pie')}}</option>
                            <option value="doughnut" {{'doughnut' == request()->input('typeChart') ? 'selected' : ''}}>{{__('Donna')}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="initialDate">Initial Date</label>
                        <input class="form-control" type="date" name="initialDate" value="" id="initialDate">
                    </div>
                    <div class="form-group">
                        <label for="finalDate">Final date</label>
                        <input class="form-control" type="date" name="finalDate" value="" id="finalDate">
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

<!-- Modal Export-->

<div class="modal fade" id="exportReport" tabindex="-1" aria-labelledby="exportReportLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportReportLabel">Create Users Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='GET' action="{{ route('users.export')}}">
                    @csrf
                    <div class="form-group">
                        <label for="status">Report By Status</label>
                        <select id="status" class="form-control" name="status">
                            <option value=""></option>
                            <option value="Enable" {{'Enable' == request()->input('status') ? 'selected' : ''}}>{{__('Enable')}}</option>
                            <option value="Disable" {{'Disable' == request()->input('status') ? 'selected' : ''}}>{{__('Disable')}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Report By Status</label>
                        <select id="client" class="form-control" name="client">
                            <option value=""></option>
                            <option value="client" {{'Enable' == request()->input('client') ? 'selected' : ''}}>{{__('Client')}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="initialDate">Initial Date</label>
                        <input class="form-control" type="date" name="initialDate" value="" id="initialDate">
                    </div>
                    <div class="form-group">
                        <label for="finalDate">Final date</label>
                        <input class="form-control" type="date" name="finalDate" value="" id="finalDate">
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
