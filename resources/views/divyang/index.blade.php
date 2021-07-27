<x-auth-layout>
    <x-slot name="page_title">Divyang List</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Divyang List</h4>
        </div>
        @can('divyang-create')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('divyang.create') }}"> Register New Divyang</a>
        </div>
        @endcan
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($divyangs as $divyang)
                    <tr>
                       <td>{{ $divyang->id }}</td>
                       <td>{{ $divyang->first_name }}</td>
                       <td>
                           @can('divyang-edit')
                               <a class="btn btn-primary text-white" href="{{ route('divyang.edit',$divyang->id) }}">Edit</a>
                            @endcan
                            @can('divyang-list')
                               <a class="btn btn-success text-white" target="_blank" href="{{ route('divyang.show',$divyang->id) }}">Show</a>
                            @endcan
                           @can('divyangs-delete')
                               {!! Form::open(['method' => 'DELETE','route' => ['divyang.destroy', $divyang->id],'style'=>'display:inline']) !!}
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