<x-auth-layout>
    <x-slot name="page_title">Admin List</x-slot>
    <x-slot name="style"></x-slot>
    <x-slot name="javascript"></x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Admin List</h4>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('admin.create') }}"> Create New Admin</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Area</th>
                        <th>Name</th>
                        <th>Mobile Number </th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{!! $loop->index+1 !!}</td>
                        <td>{!! $user->city !!}</td>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->roles->pluck('name') !!}</td>
                        <td>{!! $user->role !!}</td>
                        <td>
                            @if($user->status == 1)
                            <span class="badge badge-pill badge-primary">Active</span>
                            @else
                            <span class="badge badge-pill badge-danger">In-Active</span>
                            @endif
                        </td>
                        <td> 
                            <a class="ml-2 ceo" href="javascript:void(0)" data-toggle="modal" data-target='#ceoModal'>
                                <i class="far fa-edit"></i>
                            </a>
    
                           <!--  <a class="ml-2" href="#" data-toggle="tooltip" data-original-title="Delete">
                                <i class="far fa-trash-alt"></i>
                            </a>
                            <a class="ml-2" href="#" data-toggle="tooltip" data-original-title="Settings">
                                <i class="fas fa-cog"></i>
                            </a> -->
                        </td>
                    </tr>
                    @endforeach
                   
            </table>
        </div>
    </div>
</x-auth-layout>