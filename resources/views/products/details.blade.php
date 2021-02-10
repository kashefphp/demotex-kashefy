@extends('layouts.base')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">جزییات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item">محصولات</li>
                        <li class="breadcrumb-item active">جزییات</li>
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
                        <h3 class="card-title">جزییات</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>مقدار</th>
                                <th>مبلغ(تومان)</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details as $detail)
                                <tr>
                                    <td>{{$detail->id}}</td>
                                    <td> {{$detail->key}}</td>
                                    <td> {{$detail->value}}</td>
                                    <td> {{$detail->price}}</td>
                                 </tr>
                            @endforeach
                            </tbody>

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
