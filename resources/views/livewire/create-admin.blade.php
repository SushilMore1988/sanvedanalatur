<div>
    <form wire:submit.prevent="store" action="#">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('role', $roles, null, array('placeholder' => 'Role','class' => 'form-control','wire:model' => 'role')) !!}
            </div>
        </div>
        {{--@if($country)--}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Country:</strong>
                    {!! Form::select('country', $countries, null, array('placeholder' => 'Country','class' => 'form-control', 'wire:model' => 'country', 'wire:change' => 'changedCountry()')) !!}
                </div>
            </div>
        {{--@endif--}}
        @if($country)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>State:</strong>
                    {!! Form::select('state', $states, null, array('placeholder' => 'State','class' => 'form-control', 'wire:model' => 'state', 'wire:change' => 'changedState()')) !!}
                </div>
            </div>
        @endif
        @if($state)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>District:</strong>
                {!! Form::select('district', $districts, null, array('placeholder' => 'District','class' => 'form-control', 'wire:model' => 'district', 'wire:change' => 'changedDistrict()')) !!}
            </div>
        </div>
        @endif
        @if($district)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Taluka:</strong>
                {!! Form::select('taluka', $talukas, null, array('placeholder' => 'Taluka','class' => 'form-control', 'wire:model' => 'taluka', 'wire:change' => 'changedTaluka()')) !!}
            </div>
        </div>
        @endif
        @if($taluka)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City:</strong>
                {!! Form::select('city', $cities, null, array('placeholder' => 'City','class' => 'form-control', 'wire:model' => 'city', 'wire:change' => 'changedCity()')) !!}
            </div>
        </div>
        @endif
        @if($city)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nagarparishad:</strong>
                {!! Form::select('nagarparishad', $nagarparishads, null, array('placeholder' => 'Nagarparishad','class' => 'form-control', 'wire:model' => 'nagarparishad', 'wire:change' => 'changedNagarparishad()')) !!}
            </div>
        </div>
        @endif
        @if($nagarparishad)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nagarparishad Ward Number:</strong>
                {!! Form::select('nagarparishadWardNumber', $nagarparishadWardNumbers, null, array('placeholder' => 'Nagarparishad Ward Number','class' => 'form-control', 'wire:model' => 'nagarparishadWardNumber', 'wire:change' => 'changedNagarparishadWardNumber()')) !!}
            </div>
        </div>
        @endif
        @if($nagarparishadWardNumber)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mahanagarpalika:</strong>
                {!! Form::select('mahanagarpalika', $mahanagarpalikas, null, array('placeholder' => 'Mahanagarpalika','class' => 'form-control', 'wire:model' => 'mahanagarpalika', 'wire:change' => 'changedMahanagarpalika()')) !!}
            </div>
        </div>
        @endif
        @if($mahanagarpalika)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Zone:</strong>
                {!! Form::select('zone', $zones, null, array('placeholder' => 'Zone','class' => 'form-control', 'wire:model' => 'zone', 'wire:change' => 'changedZone()')) !!}
            </div>
        </div>
        @endif
        @if($zone)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mahanagarpalika Ward Number:</strong>
                {!! Form::select('mahanagarpalikaWardNumber', $mahanagarpalikaWardNumbers, null, array('placeholder' => 'Mahanagarpalika Ward Number','class' => 'form-control', 'wire:model' => 'mahanagarpalikaWardNumber', 'wire:change' => 'changedMahanagarpalikaWardNumber()')) !!}
            </div>
        </div>
        @endif
        @if($mahanagarpalikaWardNumber)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Village:</strong>
                {!! Form::select('village', $villages, null, array('placeholder' => 'Village','class' => 'form-control', 'wire:model' => 'village')) !!}
            </div>
        </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'wire:model' => 'name')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number:</strong>
                {!! Form::text('phone', null, array('placeholder' => 'Phone No.','class' => 'form-control', 'wire:model' => 'phone')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::text('password', null, array('placeholder' => 'Password','class' => 'form-control', 'wire:model' => 'password')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
