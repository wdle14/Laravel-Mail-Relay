@extends('layouts.main')
@section('styles')

@endsection

@section('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Token List</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
                <a class="btn btn-primary" href="{{ route('tokens.create') }}">New</a>
                <br><br>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tableIndex" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:50px;">No.</th>
                            <th>Client Name</th>
                            <th>Token</th>
                            <th>HIT</th>
                            <th style="width:100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $v)
                        @php $no=1; @endphp
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$v->client_name}}</td>
                            <td>{{$v->token}}</td>
                            <td>{{$v->hit}}</td>
                            <td>                                
                                <a href="{{route('tokens.edit',$v->id)}}" class='edit_a' rel='tooltip-left'
                                    title='Edit User'>
                                    <span class="fa fa-user-edit" style='font-size:18px;'></span>
                                </a>&nbsp;&nbsp;
                               
                                <form class='del_a' id='delete' method='POST'
                                    action="{{route('tokens.destroy',$v->id)}}" accept-charset='UTF-8'
                                    style='display: inline'
                                    onsubmit='return confirm(&quot;Are yous sure wanted to delete it?&quot;)'>
                                    <input name='_method' type='hidden' value='DELETE'> @csrf
                                    <a href="javascript:void(0)" class='del_a' rel='tooltip-left' title='Delete Files'>
                                        <span class='fa fa-trash' style='font-size:18px;'></span>
                                    </a>
                                </form>                               
                            </td>
                        </tr>
                        @php $no++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection

@push('scripts')
<script>
    $(function () {
      
        $('.table tbody').on( 'click', '.del_a', function () {
            $(this).submit();     
             
        });

    });

</script>
@endpush
