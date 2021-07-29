<x-auth-layout>
    <x-slot name="page_title">Goverment</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Goverment List</h4>
        </div>
        
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('goverment.create') }}"> Add New Goverment</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Text</th>
                    <th>Link</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($goverments as  $goverment)
                     {{--@if($role->name != 'Admin')--}}
                    <tr>
                       <td>{{ $goverment->id }}</td>
                       <td>{{ $goverment->text }}</td>
                       <td>{{ $goverment->link }}</td>
                       <td>
                           {{-- <a class="btn btn-info" href="{{ route('goverment.show',$goverment->id) }}">Show</a>--}}
                           
                               <a class="btn btn-primary" href="{{ route('goverment.edit',$goverment->id) }}">Edit</a>
                          
                         
                               {!! Form::open(['method' => 'DELETE','route' => ['goverment.destroy', $goverment->id],'style'=>'display:inline']) !!}
                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                               {!! Form::close() !!}
                        
                       </td>
                    </tr>
                    {{--@endif--}}
                @endforeach
            </table>
            <!-- {{--{!! $identity->render() !!}--}} -->
        </div>
    </div>
</x-auth-layout>