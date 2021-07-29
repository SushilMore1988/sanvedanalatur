<x-auth-layout>
    <x-slot name="page_title">AboutUs</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">AboutUs List</h4>
        </div>
        
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('about.create') }}"> Add New AboutUs</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Test</th>
                    <th>Image</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($abouts as  $About)
                     {{--@if($role->name != 'Admin')--}}
                    <tr>
                       <td>{{ $About->id }}</td>
                       <td>{{ $About->test }}</td>
                       <td>{{ $About->img }}</td>

                       <td>
                           {{-- <a class="btn btn-info" href="{{ route('about.show',$About->id) }}">Show</a>--}}
                           
                               <a class="btn btn-primary" href="{{ route('about.edit',$About->id) }}">Edit</a>
                          
                         
                               {!! Form::open(['method' => 'DELETE','route' => ['about.destroy', $About->id],'style'=>'display:inline']) !!}
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