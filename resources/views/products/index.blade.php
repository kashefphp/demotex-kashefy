@extends('layouts.base')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">محصولات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item">محصولات</li>
                        <li class="breadcrumb-item active">نمایش</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">محصولات</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>آدرس</th>
                                <th>نام</th>
                                <th>دسته بندی</th>
                                <th>قیمت(دلار)</th>
                                <th>تخفیف(درصد)</th>
                                <th>مقدار کل(دلار)</th>
                                <th>توضیحات</th>
                                <th>جزییات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td> {{$product->name}}</td>
                                    <td> {{$product->category->name ?? '_'}}</td>
                                    <td>
                                        {{$product->price}}
                                        <br>
                                        <div class="bg-danger">{{$product->detail_price}}</div>
                                    </td>
                                    <td> {{$product->discount}}</td>
                                    <td>
                                        {{$product->amount}}
                                        <br>
                                        <div class="bg-danger">{{$product->discount_detail_price}}</div>
                                    </td>
                                    <td> {{$product->details}}</td>
                                    <td><a href="{{route('product.getByProduct',['product'=>$product->id])}}"
                                           class="btn btn-primary">details</a></td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>آدرس</th>
                                <th>نام</th>
                                <th>دسته بندی</th>
                                <th>قیمت(دلار)</th>
                                <th>تخفیف(درصد)</th>
                                <th>مقدار کل(دلار)</th>
                                <th>توضیحات</th>
                                <th>جزییات</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                {{--                    <div class="d-flex justify-content-center">--}}
                {{--                        {!! $tags->links() !!}--}}
                {{--                    </div>--}}

                <!-- /.card-body -->
                </div>


                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('js')

    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous": "قبلی"
                    }
                },
                "info": false,
            });

        });

        $(document).ready(function () {
            $('.delete').on('click', function (e) {
                return confirm("حذف شود؟");

            })
        });
    </script>
@endsection
