<x-auth-layout>
    <x-slot name="page_title">Occupation</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Occupation List</h4>
        </div>
        @can('occupation-create')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('occupations.create') }}"> Add New Occupation</a>
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
                @foreach ($occupations as $key => $occupation)
                    {{--@if($role->name != 'Admin')--}}
                    <tr>
                       <td>{{ $occupation->id }}</td>
                       <td>{{ $occupation->name }}</td>
                       <td>
                           {{-- <a class="btn btn-info" href="{{ route('identity-proofs.show',$identity->id) }}">Show</a>--}}
                           @can('occupation-edit')
                               <a class="btn btn-primary" href="{{ route('occupations.edit',$occupation->id) }}">Edit</a>
                           @endcan
                           @can('occupation-delete')
                               {!! Form::open(['method' => 'DELETE','route' => ['occupations.destroy', $occupation->id],'style'=>'display:inline']) !!}
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