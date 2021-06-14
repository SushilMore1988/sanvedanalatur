<x-auth-layout>
    <x-slot name="page_title">Roles</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Roles List</h4>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Area</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                    @if($role->name != 'Admin')
                    <tr>
                       <td>{{ ++$i }}</td>
                       <td>{{ $role->name }}</td>
                       <td>{{ empty($role->area) ? '' : $role->area->name }}</td>
                       <td>
                           <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                           @can('role-edit')
                               <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                           @endcan
                           @can('role-delete')
                               {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                               {!! Form::close() !!}
                           @endcan
                       </td>
                    </tr>
                    @endif
                @endforeach
            </table>
            {!! $roles->render() !!}
        </div>
    </div>
</x-auth-layout>