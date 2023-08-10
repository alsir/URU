@extends('layouts.app')
@section('title', 'الطلبات ')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"> الطلبات </h2>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-8 col-md-6 col-12">
    <div class="card card-statistics">
        <div class="card-header">
            <h4 class="card-title"> احصائيات </h4>    
        </div>
        <div class="card-body statistics-body">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="media">
                        <div class="avatar bg-primary mr-2">
                            <div class="avatar-content">
                                <i data-feather="trending-up" class="avatar-icon font-medium-2 fa fa-bell"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            <h4 class="font-weight-bolder mb-0">{{$order_count}}</h4>
                            <p class="card-text font-small-3 mb-0">عمليات البيع</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="media">
                        <div class="avatar bg-danger mr-2">
                            <div class="avatar-content">
                                <i data-feather="user" class="avatar-icon font-medium-2 fa fa-envelope"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            <h4 class="font-weight-bolder mb-0">{{$orders_by_projects}}</h4>
                            <p class="card-text font-small-3 mb-0">المشاريع</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                    <div class="media">
                        <div class="avatar bg-warning mr-2">
                            <div class="avatar-content">
                                <i data-feather="box" class="avatar-icon font-medium-2 fa fa-check-square"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            <h4 class="font-weight-bolder mb-0">{{$orders_by_sells}}</h4>
                            <p class="card-text font-small-3 mb-0"> المبيعات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="/admin/order/someorders" method="get">
    @csrf
    <div class="input-group mb-3">
        <input type="date" class="form-control" name="start_date">
        <input type="date" class="form-control" name="end_date">
        <button class="btn btn-primary" type="submit">موافقة</button>
    </div>
</form>
    <div class="content-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">كل الطلبات </h4>
                    <a href="/admin/ordering" class="btn btn-primary" >إضافة </a>
                </div>

                <div class="card-content">
                    <div class="card-body card-dashboard">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>منفذ العملية</th>
                                        <th>نوع الطلب</th>
                                        <th>المجموع</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td><a href="/admin/order/{{$order->id}}">{{$order->id}}</a></td>
                                            <td>{{ $order->name }}</td>
                                            <td>
                                                @if ($order->order_type == 0)
                                                    <span class="badge badge-danger">مببيعات</span>
                                                @else
                                                    <span class="badge badge-success"> مشاريع </span>
                                                @endif
                                            </td>
                                            <td>{{ $order->total }}</td>
                                               <td> <button class="btn btn-success" name="edit_button"
                                                    value="{{ $order->id }}" data-toggle="modal"
                                                    data-target="#edit_modal"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger mr-2"
                                                    onclick="if(confirm('هل أنت متأكد ؟')){document.getElementById('delete-users_{{ $order->id }}').submit();}else{
                                            event.preventDefault();}"><i
                                                        class="fa fa-trash"></i></button>
                                                <form id="delete-users_{{ $order->id }}"
                                                    action="/admin/order/{{ $order->id }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">إضافة </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form form-vertical" action="/admin/order" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                
                                        <input type="hidden"  value="{{ Auth::user()->name }}"name="name" >
                                    
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-vertical">المجموع</label>
                                        <input type= "number"step="0.01" min="0" max="1000000000000" class="form-control @error('total') is-invalid @enderror"
                                            name="total" placeholder="المجموع" value="{{ old('total') }}" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical"> نوع الطلب</label>
                                        <select name="order_type" class="form-control" required>
                                            <option value="0" @selected(old('order_type') == 0)>مبيعات</option>
                                            <option value="1" @selected(old('order_type') == 1)>مشاريع</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">إضافة</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                </div>
            </div>
        </div>
    </div>

    <!-- edit Modal -->
    <div class="modal fade text-left" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">تعديل </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-section">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptjs')
    <script>
        $(document).ready(function() {
            $("button[name='edit_button']").click(function() {

                var edit_val = this.value;

                $(".form-section").html(" ");
                $(".form-section").append(
                    "<center><img src='{{ asset('loader.gif') }}'  width='300px'/></center>"
                );
                $.get("/admin/order/" + edit_val + "/edit", function(data, status) {
                    $(".form-section").html(data);
                }).fail(function() {
                    $(".form-section").html(" ");
                    $(".form-section").append(
                        "<div class='alert alert-danger' role='alert'>عذراً , حصل خطأ ما !!</div>"
                    );
                });
            });
        });
    </script>
@endsection