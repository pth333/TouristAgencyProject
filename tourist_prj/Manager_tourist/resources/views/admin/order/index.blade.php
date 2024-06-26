@extends('layouts.admin')
@section('title', 'Manager Order')
@section('css')
<link rel="stylesheet" href="{{ asset('index/list.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Manager Order', 'key' => 'Danh sách'])
    <div class="search-field d-none d-md-block">
        <form action="" method="GET" class="d-flex align-items-center h-100">
            <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                    <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" name="key" placeholder="Tìm Kiếm...">
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-12">

                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Thông tin</th>
                        <th>Tiền thanh toán</th>
                        <th>Tiền đặt cọc</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($orderCustomers) > 0)
                    @foreach($orderCustomers as $orderCustomer)
                    <tr>
                        <td>{{$orderCustomer->id}}</td>
                        <td>
                            Tên: {{ optional($orderCustomer->user)->name }} <br> <br>
                            Email: {{ optional($orderCustomer->user)->email }}
                        </td>
                        <td>{{number_format($orderCustomer->total_price)}} VNĐ</td>
                        <td>{{number_format($orderCustomer->total_deposit)}} VNĐ</td>
                        <td>{{$orderCustomer->total_person}} người</td>
                        @if($orderCustomer->total_price > $orderCustomer->total_deposit)
                        <td>
                            <label class="badge badge-gradient-success">Đã thanh toán</label>
                        </td>
                        @else
                        <td>
                            <label class="badge badge-gradient-warning">Chưa hoàn tất</label>
                        </td>
                        @endif
                        <td>
                            <button data-url="{{ route('order.tour.edit', ['id' => $orderCustomer->id])}}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-info edit">
                                Sửa
                            </button>
                            <button data-url="{{ route('order.tour.delete', ['id' => $orderCustomer->id])}}" id="delete-compnay" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger action_delete">
                                Xóa
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="12" class="text-center">No Data Found</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $orderCustomers->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@include('admin.order.edit')

@endsection
@section('js')
<script src="{{ asset('ajax/orderAjax.js')}}"></script>
@endsection
