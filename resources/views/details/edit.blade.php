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
                        <li class="breadcrumb-item active">ویرایش جزییات</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('ویرایش ') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('detail.update', $detail->id) }}">
                                @csrf
                                @method('put')

                                <div class="form-group row">
                                    <label for="key"
                                           class="col-md-4 col-form-label text-md-right">{{ __('عنوان ') }}</label>

                                    <div class="col-md-6">
                                        <input id="key" type="text"
                                               class="form-control @error('key') is-invalid @enderror" name="key"
                                               value="{{ $detail->key }}" required autocomplete="key" autofocus>

                                        @error('key')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="value"
                                           class="col-md-4 col-form-label text-md-right">{{ __('مقدار ') }}</label>

                                    <div class="col-md-6">
                                        <input id="value" type="text"
                                               class="form-control @error('value') is-invalid @enderror" name="value"
                                               value="{{ $detail->value }}" required autocomplete="value" autofocus>

                                        @error('value')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price"
                                           class="col-md-4 col-form-label text-md-right">{{ __('افزایش قیمت ') }}</label>

                                    <div class="col-md-6">
                                        <input id="price" type="text"
                                               class="form-control @error('price') is-invalid @enderror" name="price"
                                               value="{{ $detail->price }}" required autocomplete="price" autofocus>

                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kind"
                                           class="col-md-4 col-form-label text-md-right">{{ __('نوع ') }}</label>

                                    <div class="col-md-6">
                                        {{--                                      <input @error('kind') is-invalid @enderror" value="{{ old('kind') }}">--}}
                                        <select id="kind" name="kind" class="form-control browser-default custom-select"
                                                required >
                                            <option @if ($detail->type == 'محصول')
                                                    selected
                                                    @endif value="product">محصول
                                            </option>
                                            <option @if ($detail->type == 'دسته بندی')
                                                    selected
                                                    @endif value="category">دسته بندی
                                            </option>

                                        </select>
                                        @error('kind')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row" >
                                    <label for="kind_id"
                                           class="col-md-4 col-form-label text-md-right">{{ __('انتخاب ') }}</label>
                                    <div class="col-md-6" >

                                        <select name="kind_id" class="form-control browser-default custom-select" required id="append-kind">

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('ویرایش') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection
@section('js')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $('#kind').on('change', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#append-kind > option').remove();
                $.ajax({
                    url: '{{ route('detail.getKind') }}',
                    dataType: 'json',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function( data, textStatus, jQxhr ){

                        $.each(data, function (k, value){
                            $('#append-kind').append('<option  value="'+value.id+'">'+value.name+'</option>');
                        });

                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });

            });

            //Initialize Select2 Elements
            $('.select2').select2();
        });

    </script>
@endsection
