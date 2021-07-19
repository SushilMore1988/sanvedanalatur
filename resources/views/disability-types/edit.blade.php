<x-auth-layout>
    <x-slot name="page_title">Edit Disability Type</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Disability Type</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('disability-types.index') }}"> Back</a>
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


    {!! Form::model($disabilitype, ['method' => 'PATCH','route' => ['disability-types.update', $disabilitype->id]]) !!}
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Type:</strong>
            {!! Form::text('type', null, array('placeholder' => 'Type','class' => 'form-control')) !!}
        </div>
    </div>
    {{--<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Area:</strong>
            {!! Form::select('area', [
                'Country' => 'Country', 
                'State' => 'State', 
                'District' => 'District', 
                'Taluka' => 'Taluka', 
                'Village' => 'Village', 
                'City' => 'City', 
                'Zone' => 'Zone', 
                'Mahanagarpalika' => 'Mahanagarpalika', 
                'MahanagarpalikaWardNumber' => 'MahanagarpalikaWardNumber', 
                'Nagarparishad' => 'Nagarparishad', 
                'NagarparishadWardNumber' => 'NagarparishadWardNumber'
            ], $role->area->name, array('placeholder' => 'Area','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>--}}
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    {!! Form::close() !!}
</x-auth-layout>