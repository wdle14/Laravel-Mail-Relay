@extends('layouts.main')
@section('styles')

@endsection

@section('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Token</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            {!! Form::model($data, ['method' => 'PUT', 'route' => ['tokens.update', $data->id ] ]) !!}
            <div class="card-body">
                <div class="form-group  @if ($errors->has('client_name')) has-error @endif">
                    <label for="exampleInputEmail1">Client Name</label>
                    {!! Form::text('client_name',null,['class'=>'form-control','placeholder'=>'']) !!}
                    @if ($errors->has('client_name')) <p class="help-block">{{ $errors->first('client_name') }}</p> @endif

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {{ Form::close()}}

            </div>
            <!-- /.card -->


            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    @endsection

    @push('scripts')

    @endpush
