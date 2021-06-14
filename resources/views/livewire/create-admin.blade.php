<div>
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('role', $roles, null, array('placeholder' => 'Role','class' => 'form-control')) !!}
            </div>
        </div>
        @if($country)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Country:</strong>
                    {!! Form::select('country', $countries, null, array('placeholder' => 'Country','class' => 'form-control')) !!}
                </div>
            </div>
        @endif
        @if($state)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>State:</strong>
                    {!! Form::select('state', $states, null, array('placeholder' => 'State','class' => 'form-control')) !!}
                </div>
            </div>
        @endif
        @if($district)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>District:</strong>
                    {!! Form::select('district', $districts, null, array('placeholder' => 'District','class' => 'form-control')) !!}
                </div>
            </div>
        @endif
        @if($taluka)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Taluka:</strong>
                    {!! Form::select('taluka', $Talukas, null, array('placeholder' => 'Taluka','class' => 'form-control')) !!}
                </div>
            </div>
        @endif
        @if($city)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>City:</strong>
                    {!! Form::select('city', $cities, null, array('placeholder' => 'City','class' => 'form-control')) !!}
                </div>
            </div>
        @endif
        @if($nagarparishad)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nagarparishad:</strong>
                    {!! Form::select('nagarparishad', $nagarparishads, null, array('placeholder' => 'Nagarparishad','class' => 'form-control')) !!}
                </div>
            </div>
        @endif
        @if($nagarparishadWardNumber)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nagarparishad Ward Number:</strong>
                    {!! Form::select('nagarparishadWardNumber', $nagarparishadWardNumbers, null, array('placeholder' => 'Nagarparishad Ward Number','class' => 'form-control')) !!}
                </div>
            </div>
        @endif
        @if($mahanagarpalika)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mahanagarpalika:</strong>
                    {!! Form::select('mahanagarpalika', $mahanagarpalikas, null, array('placeholder' => 'Mahanagarpalika','class' => 'form-control')) !!}
                </div>
            </div>
        @endif
        @if($zone)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Zone:</strong>
                    {!! Form::select('zone', $zones, null, array('placeholder' => 'Zone','class' => 'form-control')) !!}
                </div>
            </div>
        @endif
        @if($mahanagarpalikaWardNumber)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mahanagarpalika Ward Number:</strong>
                    {!! Form::select('mahanagarpalikaWardNumber', $mahanagarpalikaWardNumbers, null, array('placeholder' => 'Mahanagarpalika Ward Number','class' => 'form-control')) !!}
                </div>
            </div>
        @endif
        @if($village)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Village:</strong>
                    {!! Form::select('village', $villages, null, array('placeholder' => 'Village','class' => 'form-control')) !!}
                </div>
            </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
