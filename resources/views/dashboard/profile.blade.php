@extends('layouts.main')
@section('styles')

@endsection

@section('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Account Profile</h1>
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
            {!! Form::open(['route' => ['dashboard.profile']]) !!}   
                <div class="card-body">
                <div class="form-group @if ($errors->has('name')) has-error @endif">
                        {!! Form::label('name', 'Name') !!}<br>
                        {{$user['name']}}                                
                    </div>

                    <!-- email Form Input -->
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        <p>{{$data->email}}</p>                                
                    </div>

                    <!-- password Form Input -->
                    <div class="form-group @if ($errors->has('password')) has-error @endif">
                        {!! Form::label('New Password') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'style'=>'width:100px', 'placeholder' => 'Password']) !!}
                        @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                    </div>
                    <div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
                        {!! Form::label('Confirm New Password') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'style'=>'width:100px', 'placeholder' => 'Confirm Password']) !!}
                        @if ($errors->has('password_confirmation')) <p class="help-block">{{ $errors->first('password_confirmation') }}</p> @endif
                    </div>
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
