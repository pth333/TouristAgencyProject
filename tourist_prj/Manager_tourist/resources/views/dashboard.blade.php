@extends('layouts.admin')
@section('title', 'Trang chủ')
@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Chart-js', 'key' => 'Charts'])
    <div class="row">
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Tổng tour <i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
                    <h4 class="mb-5">{{ $dataAll['tours']}} tour</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Tour đã đặt <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i></h4>
                    <h4 class="mb-5">{{ $dataAll['orders']}} tour</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Tổng số bài viết <i class="mdi mdi-diamond mdi-24px float-right"></i></h4>
                    <h4 class="mb-5">{{ $dataAll['posts']}} bài</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Tổng số người truy cập <i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
                    <h4 class="mb-5">{{ $dataAll['users']}} người</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Tổng số khách hàng <i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
                    <h4 class="mb-5">{{ $dataAll['customers']}} người</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Doanh thu hôm nay <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i></h4>
                    <h4 class="mb-5">{{ number_format($dataAll['dailyRevenue'])}}VNĐ</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Doanh thu tháng này <i class="mdi mdi-diamond mdi-24px float-right"></i></h4>
                    <h4 class="mb-5">{{ number_format($dataAll['monthlyRevenue'])}}VNĐ</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Doanh thu năm nay <i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
                    <h4 class="mb-5">{{ number_format($dataAll['yearlyRevenue'])}}VNĐ</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <div class="clearfix mb-4">
                        <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                        <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right">
                            <ul>
                                <li><span class="legend-dots bg-primary"></span>CHN</li>
                                <li><span class="legend-dots bg-danger"></span>USA</li>
                                <li><span class="legend-dots bg-info"></span>UK</li>
                            </ul>
                        </div>
                    </div><canvas height="900" width="2000" id="visitSaleChart" style="display: block; height: 581px; width: 1162px;" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <h4 class="card-title">Traffic Sources</h4><canvas height="796" width="1592" style="display: block; height: 398px; width: 796px;" class="chartjs-render-monitor"></canvas>
                    <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4">
                        <ul>
                            <li><span class="legend-dots bg-info"></span>Search Engines<span class="float-right">30%</span></li>
                            <li><span class="legend-dots bg-success"></span>Direct Click<span class="float-right">30%</span></li>
                            <li><span class="legend-dots bg-danger"></span>Bookmarks Click<span class="float-right">40%</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
