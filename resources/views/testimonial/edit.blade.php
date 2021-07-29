<x-auth-layout>
    <x-slot name="page_title">Edit Testimonial</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Testimonial</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('testimonial.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif


    {!! Form::model($testimonials, ['method' => 'PATCH','route' => ['testimonial.update', $testimonials->id]]) !!}
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Discription:</strong>
            {!! Form::text('discription', null, array('placeholder' => 'Discription','class' => 'form-control')) !!}
        </div>
    </div><div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image:</strong>
            {!! Form::text('img', null, array('placeholder' => 'Image','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    {!! Form::close() !!}
</x-auth-layout>