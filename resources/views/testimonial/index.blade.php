<x-auth-layout>
    <x-slot name="page_title">Testimonial</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Testimonial List</h4>
        </div>
        @can('testimonial.create')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success"href="http://127.0.0.1:8000/testimonial/create"> Add New Testimonial</a>
        </div>
        @endcan
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Deescription</th>
                    <th>Image</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($testimonials as  $testimonial)
                     {{--@if($role->name != 'Admin')--}}
                    <tr>
                       <td>{{ $testimonial->id }}</td>
                       <td>{{ $testimonial->name }}</td>
                       <td>{{ $testimonial->description }}</td>
                       <td>{{ $testimonial->img }}</td>

                       <td>
                           {{-- <a class="btn btn-info" href="{{ route('testimonial.show',$testimonial->id) }}">Show</a>--}}
                           @can('testimonial.edit')
                               <a class="btn btn-primary" href="{{ route('testimonial.edit',$testimonial->id) }}">Edit</a>
                           @endcan
                           @can('testimonial.delete')
                               {!! Form::open(['method' => 'DELETE','route' => ['testimonial.destroy', $testimonial->id],'style'=>'display:inline']) !!}
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