<x-auth-layout>
    <x-slot name="page_title">Divyang Goods</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Goods' List</h4>
        </div>
        @can('divyang-goods-create')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('divyang-goods.create') }}"> Add New Goods</a>
        </div>
        @endcan
    </div>
    <div class="row">
        <div class="col-lg-12">
        <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/imports') }}">
                    {{ csrf_field() }}
                    {{-- <label>Select File for Upload</label> --}}
            
                    <input type="file" name="import_file" />
            
                    <button class="btn btn-success">Import File</button>
                    <a class="btn btn-info" href="{{ url('export-excels') }}">Export File</a>
                </form> 
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($goods as $key => $good)
                    {{-- @if($role->name == 'Admin')--}}
                    <tr>
                       <td>{{ $good->id }}</td>
                       <td>{{ $good->name }}</td>
                       <td>
                           {{-- <a class="btn btn-info" href="{{ route('identity-proofs.show',$identity->id) }}">Show</a>--}}
                           @can('divyang-goods-edit')
                               <a class="btn btn-primary" href="{{ route('divyang-goods.edit',$good->id) }}">Edit</a>
                           @endcan
                           @can('divyang-goods-delete')
                               {!! Form::open(['method' => 'DELETE','route' => ['divyang-goods.destroy', $good->id],'style'=>'display:inline']) !!}
                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                               {!! Form::close() !!}
                           @endcan
                       </td>
                    </tr>
                    {{--@endif--}}
                @endforeach
            </table>
            {{--{!! $identity->render() !!}--}}
        </div>
    </div>
</x-auth-layout>