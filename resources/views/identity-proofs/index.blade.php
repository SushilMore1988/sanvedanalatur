<x-auth-layout>
    <x-slot name="page_title">Identity Proofs</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Identity Proof List</h4>
        </div>
        @can('identity-proof-create')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('identity-proofs.create') }}"> Add new Identity Proof</a>
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
                @foreach ($identities as $key => $identity)
                    {{--@if($role->name != 'Admin')--}}
                    <tr>
                       <td>{{ $identity->id }}</td>
                       <td>{{ $identity->name }}</td>
                       <td>
                           {{-- <a class="btn btn-info" href="{{ route('identity-proofs.show',$identity->id) }}">Show</a>--}}
                           @can('identity-proof-edit')
                               <a class="btn btn-primary" href="{{ route('identity-proofs.edit',$identity->id) }}">Edit</a>
                           @endcan
                           @can('identity-proof-delete')
                               {!! Form::open(['method' => 'DELETE','route' => ['identity-proofs.destroy', $identity->id],'style'=>'display:inline']) !!}
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