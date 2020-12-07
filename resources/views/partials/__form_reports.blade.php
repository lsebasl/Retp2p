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

<div class="modal fade" id="reports" tabindex="-1" aria-labelledby="reports" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportReportLabel">Reports</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body flex">
                <div class="">
                <div class="form-group d-flex justify-content-center">
                    <button type="button" class="btn btn-lg " style="background: #3F51B5; color: #fff; box-shadow:0 2px 2px 0 rgba(0,0,0, .14),0 3px 1px -2px rgba(0,0,0, .2),0 1px 5px 0 rgba(0,0,0, .12); width: 15rem" data-toggle="modal" data-target="#exportUsersReport">
                        Export Users Report</button>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="button" class="btn btn-lg  " style="background: #3F51B5; color: #fff; box-shadow:0 2px 2px 0 rgba(0,0,0, .14),0 3px 1px -2px rgba(0,0,0, .2),0 1px 5px 0 rgba(0,0,0, .12); width: 15rem" data-toggle="modal" data-target="#exportProductsReport">
                        Export Products Report</button>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="button" class="btn btn-lg " style="background: #3F51B5; color: #fff; box-shadow:0 2px 2px 0 rgba(0,0,0, .14),0 3px 1px -2px rgba(0,0,0, .2),0 1px 5px 0 rgba(0,0,0, .12); width: 15rem" data-toggle="modal" data-target="#exportSellsReport">
                        Export Sells Reports</button>
                </div>
                </div>
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
