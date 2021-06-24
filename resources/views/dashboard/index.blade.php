@extends('layouts.main')
@section('styles')

@endsection
@section('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Home</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<!-- Default box -->
@can('view_taskpushes')
<div class="row">
    
</div>
<div class="row">
   
</div>

@endcan
<!-- /.card -->
@endsection
@push('scripts')

@endpush
