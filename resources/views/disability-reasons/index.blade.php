<x-auth-layout>
    <x-slot name="page_title">Disability Reasons</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Disability Reasons List</h4>
        </div>
        @can('disability-reason-create')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('disability-reasons.create') }}"> Add New Disability Reason</a>
        </div>
        @endcan
    </div>
    <div class="row">
        <div class="col-lg-12">
        <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/imported') }}">
                    {{ csrf_field() }}
                    {{-- <label>Select File for Upload</label> --}}
            
                    <input type="file" name="import_file" />
            
                    <button class="btn btn-success">Import File</button>
                    <a class="btn btn-info" href="{{ url('export-excelse') }}">Export File</a>
                </form> 
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Reason</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($reasons as $key => $reason)
                    {{--@if($role->name != 'Admin')--}}
                    <tr>
                       <td>{{ $reason->id }}</td>
                       <td>{{ $reason->reason }}</td>
                       <td>
                           {{-- <a class="btn btn-info" href="{{ route('identity-proofs.show',$identity->id) }}">Show</a>--}}
                           @can('disability-reason-edit')
                               <a class="btn btn-primary" href="{{ route('disability-reasons.edit',$reason->id) }}">Edit</a>
                           @endcan
                           @can('disability-reason-delete')
                               {!! Form::open(['method' => 'DELETE','route' => ['disability-reasons.destroy', $reason->id],'style'=>'display:inline']) !!}
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