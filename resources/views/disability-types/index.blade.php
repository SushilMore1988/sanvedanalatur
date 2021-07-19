<x-auth-layout>
    <x-slot name="page_title">Disability Types</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Disability types List</h4>
        </div>
        @can('disability-type-create')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('disability-types.create') }}"> Add New Disability Type</a>
        </div>
        @endcan
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Type</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($disabilitypes as $key => $disabilitype)
                    {{--@if($role->name != 'Admin')--}}
                    <tr>
                       <td>{{ $loop->index+1 }}</td>
                       <td>{{ $disabilitype->type }}</td>
                       <td>
                           {{-- <a class="btn btn-info" href="{{ route('identity-proofs.show',$identity->id) }}">Show</a>--}}
                           @can('disability-type-edit')
                               <a class="btn btn-primary" href="{{ route('disability-types.edit',$disabilitype->id) }}">Edit</a>
                           @endcan
                           @can('disability-type-delete')
                               {!! Form::open(['method' => 'DELETE','route' => ['disability-types.destroy', $disabilitype->id],'style'=>'display:inline']) !!}
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