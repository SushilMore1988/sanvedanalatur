<x-auth-layout>
    <x-slot name="page_title">Address Proofs</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Address Proof List</h4>
        </div>
        @can('address-proof-create')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('address-proofs.create') }}"> Add new Address Proof</a>
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
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($addresses as $key => $address)
                    <tr>
                       <td>{{ $address->id }}</td>
                       <td>{{ $address->name }}</td>
                       <td>
                           @can('address-proof-edit')
                               <a class="btn btn-primary" href="{{ route('address-proofs.edit',$address->id) }}">Edit</a>
                           @endcan
                           @can('address-proof-delete')
                               {!! Form::open(['method' => 'DELETE','route' => ['address-proofs.destroy', $address->id],'style'=>'display:inline']) !!}
                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                               {!! Form::close() !!}
                           @endcan
                       </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-auth-layout>