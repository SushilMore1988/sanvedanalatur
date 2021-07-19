<x-auth-layout>
    <x-slot name="page_title">Disability Areas</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Disability Areas List</h4>
        </div>
        @can('disability-area-create')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('disability-areas.create') }}"> Add New Disability Area</a>
        </div>
        @endcan
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Area</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($disabilityareas as $key => $disabilityarea)
                    {{--@if($role->name != 'Admin')--}}
                    <tr>
                       <td>{{ $disabilityarea->id }}</td>
                       <td>{{ $disabilityarea->area }}</td>
                       <td>
                           {{-- <a class="btn btn-info" href="{{ route('identity-proofs.show',$identity->id) }}">Show</a>--}}
                           @can('disability-area-edit')
                               <a class="btn btn-primary" href="{{ route('disability-areas.edit',$disabilityarea->id) }}">Edit</a>
                           @endcan
                           @can('disability-area-delete')
                               {!! Form::open(['method' => 'DELETE','route' => ['disability-areas.destroy', $disabilityarea->id],'style'=>'display:inline']) !!}
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