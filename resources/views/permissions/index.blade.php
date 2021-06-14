<x-auth-layout>
    <x-slot name="page_title">Permissions</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Permissions List</h4>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permission</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $key => $role)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @can('permission-edit')
                            <a class="btn btn-primary" href="{{ route('permissions.edit',$role->id) }}">Edit</a>
                            @endcan
                            {{-- @can('permission-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            @endcan --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {!! $permissions->render() !!} --}}
        </div>
    </div>
</x-auth-layout>