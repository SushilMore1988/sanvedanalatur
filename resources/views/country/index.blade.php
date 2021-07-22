<x-auth-layout>
    <x-slot name="page_title">Country</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Country List</h4>
        </div>
        @can('country-create')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('country.create') }}"> Add New Country</a>
        </div>
        @endcan
    </div>
    <div class="row">
        <div class="col-lg-12">
        <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
        {{ csrf_field() }}
         <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
        <input type="file" name="import_file" />
       </td>
       <button class="btn btn-success">Import File</button>
                <a class="btn btn-info" href="{{ url('export-excel') }}"> 
                 Export File</a>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">.xls, .xslx</span></td>
       <td width="30%" align="left"></td>
      </tr>
</form>
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($countries as $key => $country)
                    <tr>
                       <td>{{ $country->id }}</td>
                       <td>{{ $country->name }}</td>
                       <td>
                            @can('country-edit')
                                <a class="btn btn-primary" href="{{ route('country.edit',$country->id) }}">Edit</a>
                            @endcan
                            @can('country-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['country.destroy', $country->id],'style'=>'display:inline']) !!}
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