<x-auth-layout>
    <x-slot name="page_title">Area List</x-slot>
    <x-slot name="style"></x-slot>
    <x-slot name="javascript"></x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Area List</h4>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route("areas.create", $area) }}"> Create New Area</a>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($areas as $area)
                    <tr>
                        <td>{!! $loop->index+1 !!}</td>
                        <td>{!! $area->name !!}</td>
                        <td> 
                            <a class="ml-2 ceo" href="javascript:void(0)" data-toggle="modal" data-target='#ceoModal'>
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                   
            </table>
        </div>
    </div>
</x-auth-layout>