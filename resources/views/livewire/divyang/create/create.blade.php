@once
    @push('scripts')
        <script type="text/javascript" src="{{url('vendor/datepicker/new-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <script type="text/javascript" src="{{url('vendor/datepicker/new-datepicker/bootstrap.bundle.min.js')}}"></script>
    @endpush
    
@endonce
<div>
    <section class="select-product-details">
        <div class="bg-light pt-5 pb-4">
            <div class="container">
                <h5 class="p-semibold f-25 text-dark pb-3 text-left">Person with Disability Registration</h5>
                <div class="row pt-3">
                    <div class="col-md-12 mx-auto">
                        <div class="arrow-steps clearfix progress-steps">
                            <div class="step {{ $stepOneSuccess == true ? 'form-success done' : '' }} {{ $step == 1 ? 'current' : '' }} progress_bar"> 
                                <a href="#step1" class="span-wrapper {{ $step == 1 ? 'active' : '' }}"><span class="pr-3">1</span> 
                                    Personal Details</a>
                            </div>
                            <div class="step {{ $stepTwoSuccess == true ? 'form-success done' : '' }} {{ $step == 2 ? 'current' : '' }} progress_bar"> 
                                <a href="#step2" class="span-wrapper {{ $step == 2 ? 'active' : '' }}"><Span class="pr-3">2</Span> 
                                    Disability Details</a> 
                            </div>
                            <div class="step {{ $stepThreeSuccess == true ? 'form-success done' : '' }} {{ $step == 3 ? 'current' : '' }} progress_bar">
                                <a href="#step3" class="span-wrapper {{ $step == 3 ? 'active' : '' }}"><span class="pr-3">3</span>
                                    Employment Details</a> 
                            </div>
                            <div class="step {{ $stepFourSuccess == true ? 'form-success done' : '' }} {{ $step == 4 ? 'current' : '' }} progress_bar"> 
                                <a href="#step4" class="span-wrapper {{ $step == 4 ? 'active' : '' }}"><Span class="pr-3">4</Span> 
                                    Identity Details</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        <div class="bg-light bigmin-height-section">
            <div class="multi_step_form py-4" style="overflow: hidden;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                            <div id="message">
                                <span class="alert alert-danger failed-msg" style="display:none"></span>
                                <span class="alert alert-success success-msg" style="display:none"></span>
                            </div>
                            {{-- Step 1 Start --}}
                            @if($step == 1)
                            <div class="form-content wow slideInRight" data-wow-duration="0.5s" id="step1">
                                <div class="row">
                                    <div class="col-lg-12 mx-auto basic-information">
                                        <h2 class="p-semibold f-20 text-dark pb-3"> Personal Details </h2>
                                        {!! Form::open(['id' => 'step-one-form', 'files'=>true , 'wire:submit.prevent="store"']) !!}
                                            <div class="form-row pb-2">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Applicant First Name <span class="text-danger">*</span></label>
                                                    {!! Form::text('first_name', null, ['class'=>"w-100 form-control", 'wire:model' => 'first_name', 'placeholder' => 'First Name' ]) !!}
                                                    @if ($errors->has('first_name'))
                                                        <div class="invalid-feedback d-block mt-1">
                                                            {{ $errors->first('first_name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Applicant Middle Name </label>
                                                    {!! Form::text('middle_name',null,['class'=>"w-100 form-control", 'wire:model' => 'middle_name']) !!}
                                                    @if ($errors->has('middle_name')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('middle_name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Applicant Surname</label>
                                                    {!! Form::text('last_name',null,['class'=>"w-100 form-control", 'wire:model' => 'surname' ]) !!}
                                                    @if ($errors->has('last_name')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('last_name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row pb-2">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Applicant Father's Name <span class="text-danger">*</span></label>
                                                    {!! Form::text('father_name',null,['class'=>"w-100 form-control ",'id'=>"father_name", 'wire:model' => 'father_name' ]) !!}
                                                    <span class="text text-danger father_name" style="display:none"></span>
                                                    @if ($errors->has('father_name')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('father_name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Applicant Mother's Name <span class="text-danger">*</span></label>
                                                    {!! Form::text('mother_name',null,['class'=>"w-100 form-control ",'id'=>'mother_name', 'wire:model' => 'mother_name' ]) !!}
                                                    <span class="text text-danger mother_name" style="display:none"></span>
                                                    @if ($errors->has('mother_name')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('mother_name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Date of Birth<span class="text-danger">*</span></label>
                                                    <div class="datepicker date input-group p-0">
                                                    {!! Form::text('date_of_birth', 
                                                                    null, 
                                                                    [
                                                                        'class'=>"form-control datepicker border-right-0 ",
                                                                        'id'=>'date_of_birth',
                                                                        "wire:model" => "date_of_birth",
                                                                        "type" => "text", 
                                                                        "placeholder" => "Birth Date",
                                                                        "autocomplete" => "off",
                                                                        "data-provide" => "datepicker",
                                                                        "data-date-autoclose" => "true",
                                                                        "data-date-format" => "mm/dd/yyyy",
                                                                        "data-maxDate" => now(),
                                                                        "data-date-today-highlight" => "true",
                                                                        "onchange" => "this.dispatchEvent(new InputEvent('input'))"
                                                                        ]) !!}
                                                    <div class="input-group-append border-left-0"><span class="input-group-text px-4"><i class="fas fa-calendar"></i></span></div>
                                                    </div>
                                                    @if ($errors->has('date_of_birth')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('date_of_birth') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row pb-2">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Gender <span class="text-danger">*</span></label>
                                                    <div class="input-group mb-3">
                                                        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], null, ['class' => 'custom-select', 'wire:model' => 'gender', 'placeholder' => 'Select Gender']) !!}
                                                    </div>
                                                    @if ($errors->has('gender')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('gender') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Mobile Number <span class="text-danger">*</span></label>
                                                    {!! Form::text('mobile_number',null,['class'=>"w-100 form-control ",'id'=>'mobile_number', 'wire:model' => 'mobile_number']) !!}
                                                    <span class="text text-danger mobile_number" style="display:none"></span>
                                                    @if ($errors->has('mobile_number')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('mobile_number') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">E-Mail Id</label>
                                                    {!! Form::email('email_id',null,['class'=>"w-100 form-control", 'wire:model' => 'email_id']) !!}
                                                    @if ($errors->has('email_id')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('email_id') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row pb-2">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Mark of Identification</label>
                                                    {!! Form::text('identification_mark',null,['class'=>"w-100 form-control", 'wire:model' => 'identification_mark']) !!}
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Religion<span class="text-danger">*</span></label>
                                                    <div class="input-group mb-3">
                                                        {!! Form::select('religion', $religions, null, ['class' => 'custom-select', 'wire:model' => 'religion', 'placeholder' => 'Select Religion']) !!}
                                                    </div>
                                                    @if ($errors->has('religion')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('religion') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Caste<span class="text-danger">*</span></label>
                                                    <div class="input-group mb-3">
                                                        {!! Form::select('caste', $castes, null, ['class' => 'custom-select', 'wire:model' => 'caste']) !!}
                                                    </div>
                                                    @if ($errors->has('caste')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('caste') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row pb-2">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Blood Group</label>
                                                    <div class="input-group mb-3">
                                                        {!! Form::select('blood_group', [
                                                            'O+' => 'O+',
                                                            'O-' => 'O-',
                                                            'A+' => 'A+',
                                                            'A-' => 'A-',
                                                            'B+' => 'B+',
                                                            'B-' => 'B-',
                                                            'AB+' => 'AB+',
                                                            'AB-' => 'AB-',
                                                        ], null, ['class' => 'custom-select', 'wire:model' => 'blood_group', 'placeholder' => 'Select Blood Group']) !!}
                                                    </div>
                                                    @if ($errors->has('blood_group')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('blood_group') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Marital Status</label>
                                                    <div class="input-group mb-3">
                                                        {!! Form::select('marital_status', [
                                                            'Married' => 'Married',
                                                            'Unmarried' => 'Unmarried',
                                                            'Widow' => 'Widow',
                                                            'Divorced' => 'Divorced',
                                                            'Divorced & Widower' => 'Divorced & Widower',
                                                        ], null, ['class' => 'custom-select', 'wire:model' => 'marital_status', 'placeholder' => 'Select Marital Status']) !!}
                                                    </div>
                                                    @if ($errors->has('marital_status')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('marital_status') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row pb-2">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Relation with PwD <br>(Person with Disability)</label>
                                                    <div class="input-group mb-3">
                                                        {!! Form::select('relation_with_pwd', [
                                                            'Father' => 'Father',
                                                            'Mother' => 'Mother',
                                                            'Son' => 'Son',
                                                            'Daughter' => 'Daughter',
                                                            'Wife' => 'Wife',
                                                            'Husband' => 'Husband',
                                                            'Uncle' => 'Uncle',
                                                            'Aunty' => 'Aunty',
                                                            'Sister' => 'Sister',
                                                            'Brother' => 'Brother',
                                                            'Self' => 'Self',
                                                            'Other' => 'Other'
                                                        ], null, ['class' => 'custom-select', 'wire:model' => 'relation_with_pwd', 'placeholder' => 'Select Relation With PwD']) !!}
                                                    </div>
                                                    @if ($errors->has('relation_with_pwd')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('relation_with_pwd') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Name of Guardian / Caretaker / Attendant / Related person</label>
                                                    {!! Form::text('guardian_name',null,['class'=>"w-100 form-control", 'wire:model' => 'guardian_name']) !!}
                                                    @if ($errors->has('guardian_name')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('guardian_name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Contact No. of Guardian / Caretaker / Attendant / Related person</label>
                                                    {!! Form::text('guardian_contact',null,['class'=>"w-100 form-control", 'wire:model' => 'guardian_contact']) !!}
                                                    @if ($errors->has('guardian_contact')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('guardian_contact') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row pb-2">
                                                <div class="form-group col-md-6">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-12 col-sm-8">
                                                            <label  class="f-14 text-dark p-regular">Photo <span class="text-danger">*</span></label>
                                                            <div class="input-group ">
                                                                <div class="custom-file">
                                                                    {!! Form::file('photo', ['class' => 'custom-file-input', 'wire:model' => 'photo']) !!}
                                                                    <label class="custom-file-label">Choose file</label>
                                                                </div>
                                                            </div>
                                                            <small class="f-12">(Only jpeg, jpg, gif and png image with size 15 KB to 30 KB allowed)</small>
                                                            <span class="text text-danger photo" style="display:none"></span>
                                                            @if ($errors->has('photo')) 
                                                                <div class="invalid-feedback d-block mt-1">  
                                                                    {{ $errors->first('photo') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-4 col-md-12 col-sm-4">
                                                            <div class="profile-img text-center bg-white image-input">
                                                                @if($photo)
                                                                <div class="upload-image image-input-inner d-flex align-items-center ">
                                                                    <img src="{{ $photo->temporaryUrl() }}" alt="your image" class="d-block"/>
                                                                </div>
                                                                @else
                                                                <div class="d-flex h-100 align-items-center text-center justify-content-center flex-column upload-data">
                                                                    <i class="far fa-images f-25"></i>
                                                                    <p class="f-12 text-dark p-regular mb-0">Image Preview</p>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-12 col-sm-4 order-lg-1 order-12 ">
                                                            <div class="signature-img text-center align-items-center bg-white image-input">
                                                                @if($signature)
                                                                <div class="upload-signature image-input-inner">
                                                                    <img src="{{ $signature->temporaryUrl() }}" alt="your image" class="d-block"/>
                                                                </div>
                                                                @else
                                                                <div class="d-flex h-100 align-items-center text-center justify-content-center flex-column sign-data">
                                                                    <i class="far fa-images f-25"></i>
                                                                    <p class="f-12 text-dark p-regular mb-0">Signature Preview</p>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8 col-md-12 col-sm-8 order-lg-12 order-1">
                                                            <label  class="f-14 text-dark p-regular">Signature / Thumb / Other Print <span class="text-danger">*</span> </label>
                                                            <div class="input-group ">
                                                                <div class="custom-file">
                                                                    {!! Form::file('signature', ['class' => 'custom-file-input', 'wire:model' => 'signature']) !!}
                                                                    <label class="custom-file-label" >Choose file</label>
                                                                </div>
                                                            </div>
                                                            <small class="f-12">(Only jpeg, jpg, gif and png image with size 3 KB to 30 KB allowed)</small>
                                                            @if ($errors->has('signature')) 
                                                                <div class="invalid-feedback d-block mt-1">  
                                                                    {{ $errors->first('signature') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-5">
                                                <div class="clearfix">
                                                    <h2 class="p-semibold f-20 text-dark float-left"> Permanent Address </h2>
                                                </div>
                                                <hr>
                                                <div class="form-row pb-2">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">State / UTs <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            {!! Form::select('state', $states, null, ['class' => 'custom-select', 'wire:model' => 'state', 'wire:change' => 'getDistricts()', 'placeholder' => 'Select State']) !!}
                                                        </div>
                                                        @if ($errors->has('state')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('state') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">District <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            {!! Form::select('district', $districts, null, ['class' => 'custom-select', 'wire:model' => 'district', 'wire:change' => 'changedDistricts()', 'placeholder' => 'Select District']) !!}
                                                        </div>
                                                        @if ($errors->has('district')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('district') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                            <label for="inputEmail4" class="f-14 text-dark p-regular">Local Government Institution<span class="text-danger">*</span></label>
                                                            <div class="input-group mb-3">
                                                                {!! Form::select('local_gov_institution', [
                                                                    'Mahanagarpalika' => 'Mahanagarpalika',
                                                                    'Nagarparishad' => 'Nagarparishad',
                                                                    'Grampanchayat' => 'Grampanchayat'
                                                                ], null, ['class' => 'custom-select', 'wire:model' => 'local_gov_institution', 'placeholder' => 'Select Local Government Institution']) !!}
                                                            </div>
                                                            @if ($errors->has('local_gov_institution')) 
                                                                <div class="invalid-feedback d-block mt-1">
                                                                    {{ $errors->first('local_gov_institution') }}
                                                                </div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-row pb-2">
                                                <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">Address Line 1 <span class="text-danger">*</span></label>
                                                        {!! Form::text('address_line_1',null,['class'=>"w-100 form-control",'wire:model' => 'address_line_1']) !!}
                                                        @if ($errors->has('address_line_1')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('address_line_1') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">Address Line 2 </label>
                                                        {!! Form::text('address_line_2',null,['class'=>"w-100 form-control", 'wire:model' => 'address_line_2']) !!}
                                                        @if ($errors->has('address_line_2')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('address_line_2') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">Address Line 3</label>
                                                        {!! Form::text('address_line_3',null,['class'=>"w-100 form-control", 'wire:model' => 'address_line_3']) !!}
                                                        @if ($errors->has('address_line_3')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('address_line_3') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if($local_gov_institution == 'Grampanchayat')
                                                <div class="form-row pb-2" id="grampanchayatDiv" >
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">City / Sub District / Tehsil  <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            {!! Form::select('taluka', 
                                                                                $talukas, 
                                                                                null, 
                                                                                [
                                                                                    'class' => 'custom-select', 
                                                                                    'wire:model' => 'taluka', 
                                                                                    'wire:change' => 'changedTaluka()', 
                                                                                    'placeholder' => 'Select City / Sub District / Tehsil'
                                                                                ]
                                                                            ) 
                                                            !!}
                                                        </div>
                                                        @if ($errors->has('taluka')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('taluka') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">Village / Block <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            {!! Form::select('village', $villages, null, ['class' => 'custom-select', 'wire:model' => 'village', 'placeholder' => 'Select Village / Block']) !!}
                                                        </div>
                                                        @if ($errors->has('village')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('village') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif
                                                @if($local_gov_institution == 'Mahanagarpalika')
                                                <div class="form-row pb-2" id="mahanagarpalikaDiv" >
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular"> Mahanagarpalika <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            {!! Form::select('mahanagarpalika', $mahanagarpalikas, null, ['class' => 'custom-select', 'wire:model' => 'mahanagarpalika', 'placeholder' => 'Select Mahanagarpalika', 'wire:change' => 'changedMahanagarpalika()']) !!}
                                                        </div>
                                                        @if ($errors->has('mahanagarpalika')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('mahanagarpalika') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">Zone <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            {!! Form::select('zone', $zones, null, ['class' => 'custom-select', 'wire:model' => 'zone', 'placeholder' => 'Select Zone', 'wire:change' => 'changedZone()']) !!}
                                                        </div>
                                                        @if ($errors->has('zone')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('zone') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">Ward <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            {!! Form::select('mahanagarpalika_ward', $mahanagarpalikaWards, null, ['class' => 'custom-select', 'wire:model' => 'mahanagarpalika_ward', 'placeholder' => 'Select Ward']) !!}
                                                        </div>
                                                        @if ($errors->has('mahanagarpalika_ward')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('mahanagarpalika_ward') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif
                                                @if($local_gov_institution == 'Nagarparishad')
                                                <div class="form-row pb-2" id="nagarparishadDiv" >
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">City / Sub District / Tehsil  <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            {!! Form::select('taluka', 
                                                                                $talukas, 
                                                                                null, 
                                                                                [
                                                                                    'class' => 'custom-select', 
                                                                                    'wire:model' => 'taluka', 
                                                                                    'wire:change' => 'changedTaluka()', 
                                                                                    'placeholder' => 'Select City / Sub District / Tehsil'
                                                                                ]
                                                                            ) 
                                                            !!}
                                                        </div>
                                                        @if ($errors->has('taluka')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('taluka') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular"> Nagarparishad <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            {!! Form::select('nagarparishad', $nagarparishads, null, ['class' => 'custom-select', 'wire:model' => 'nagarparishad', 'placeholder' => 'Select Nagarparishad', 'wire:change' => 'changedNagarparishad()']) !!}
                                                        </div>
                                                        @if ($errors->has('nagarparishad')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('nagarparishad') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">Ward <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            {!! Form::select('nagarparishad_ward', $nagarparishadWards, null, ['class' => 'custom-select', 'wire:model' => 'nagarparishad_ward', 'placeholder' => 'Select Ward']) !!}
                                                        </div>
                                                        @if ($errors->has('nagarparishad_ward')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('nagarparishad_ward') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif

                                                <div class="form-row pb-2">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">Pincode <span class="text-danger">*</span></label>
                                                        {!! Form::text('pin_code', null, ['class' => 'w-100 form-control', 'wire:model' => 'pin_code']) !!}
                                                        @if ($errors->has('pin_code')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('pin_code') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">Nature of Document for Address Proof <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            {!! Form::select('address_proof', $addressProofs, null, ['class' => 'custom-select', 'wire:model' => 'address_proof', 'placeholder' => 'Select Document for Address Proof']) !!}
                                                        </div>
                                                        @if ($errors->has('address_proof')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('address_proof') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-row pb-2">
                                                    <div class="form-group col-md-6">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <label for="inputEmail4" class="f-14 text-dark p-regular">Upload Proof of Correspondence Address <span class="text-danger">*</span></label>
                                                                <div class="input-group ">
                                                                    <div class="custom-file">
                                                                        {!! Form::file('address_proof_doc', ['class' => 'custom-file-input imgInp', 'wire:model' => 'address_proof_doc']) !!}
                                                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <small class="f-12">(Only jpeg, jpg, png and pdf with size 10 KB to 100 KB allowed)</small>
                                                                @if ($errors->has('address_proof_doc')) 
                                                                    <div class="invalid-feedback d-block mt-1">
                                                                        {{ $errors->first('address_proof_doc') }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="profile-img text-center bg-white image-input">
                                                                    @if($address_proof_doc)
                                                                    <div class="upload-image image-input-inner d-flex align-items-center ">
                                                                        <img src="{{ $address_proof_doc->temporaryUrl() }}" alt="your image" class="d-block"/>
                                                                    </div>
                                                                    @else
                                                                    <div class="d-flex h-100 align-items-center text-center justify-content-center flex-column upload-data">
                                                                        <i class="far fa-images f-25"></i>
                                                                        <p class="f-12 text-dark p-regular mb-0">Image Preview</p>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>	
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-5">
                                                <div class="clearfix">
                                                    <h2 class="p-semibold f-20 text-dark float-left"> Educational Details </h2>
                                                </div>
                                                <hr>
                                                <div class="form-row pb-2">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">Highest Qualification <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            {!! Form::select('education', [
                                                                'Illiterate' => 'Illiterate',
                                                                'Primary' => 'Primary',
                                                                'Middle/Higher Primary' => 'Middle/Higher Primary',
                                                                'Senior Secondary' => 'Senior Secondary',
                                                                'Higher Secondary' => 'Higher Secondary',
                                                                'Diploma' => 'Diploma',
                                                                'Graduate' => 'Graduate',
                                                                'PG Diploma' => 'PG Diploma',
                                                                'Post Graduate' => 'Post Graduate',
                                                                'Doctorate' => 'Doctorate',
                                                            ], null, ['class' => 'custom-select', 'wire:model' => 'education', 'placeholder' => 'Select Education']) !!}
                                                        </div>
                                                        @if ($errors->has('education')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('education') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-5">
                                                <div class="clearfix">
                                                    <h2 class="p-semibold f-20 text-dark float-left">Bank Account Details </h2>
                                                </div>
                                                <hr>
                                                <div class="form-row pb-2">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">Bank Account No<span class="text-warning">*</span> </label>
                                                        {!! Form::text('account_no', null, ['class' => 'w-100 form-control', 'wire:model' => 'account_no']) !!}
                                                        @if ($errors->has('account_no')) 
                                                            <div class="invalid-feedback d-block mt-1">
                                                                {{ $errors->first('account_no') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">IFSC Code<span class="text-warning">*</span> </label>
                                                        {!! Form::text('ifsc', null, ['class' => 'w-100 form-control', 'wire:model' => 'ifsc']) !!}
                                                        @if ($errors->has('ifsc')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('ifsc') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-4 text-right ">
                                                <button type="button" class="btn btn-primary f-12 p-semibold rounded-9 px-5" wire:click="storeStep1()">Next</button>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            @endif
                            {{-- Step 1 End --}}

                            {{-- Step 2 Start --}}
                            @if($step == 2)
                            <div class="form-content wow slideInRight" data-wow-duration="0.5s" id="step2">
                                <div class="row">
                                    <div class="col-lg-12 mx-auto basic-information">
                                        <h2 class="p-semibold f-20 text-dark pb-3"> Disability Details </h2>
                                        {!! Form::open(['id' => 'step-two-form','files'=>true, 'wire:submit.prevent' => 'store']) !!}
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                    <label class="f-14 text-dark p-regular align-self-center">Do you have disability certificate?<span class="text-danger">*</span></label>
                                                    <label class="switch">
                                                    {!! Form::checkbox('disability_certificate', "1", null, [ "class" => "switch-input certificate", 'id' => 'certificate', 'wire:click' => '$toggle("disability_certificate")']) !!}
                                                    <span class="switch-label" data-on="Yes" data-off="No"></span> 
                                                    <span class="switch-handle" ></span> 
                                                </label>
                                                 @if ($errors->has('disability_certificate')) 
                                                    <div class="invalid-feedback d-block mt-1">  
                                                        {{ $errors->first('disability_certificate') }}
                                                    </div>
                                                @endif
                                            </div>
                                            @if($disability_certificate)
                                            <div class="form-group col-md-6" id="certificate_image_div">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-12 col-sm-8">
                                                        <label  class="f-14 text-dark p-regular">Certificate Image<span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                {!! Form::file('certificate_image', ["class" => "custom-file-input file-input imgInp", 'wire:model' => 'certificate_image']) !!}
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                        <small class="f-12">(Only jpeg, jpg, gif and png image with size 15 KB to 30 KB allowed)</small>
                                                        @if ($errors->has('certificate_image')) 
                                                            <div class="invalid-feedback d-block mt-1">  
                                                                {{ $errors->first('certificate_image') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4 col-md-12 col-sm-4">
                                                        <div class="profile-img text-center bg-white image-input">
                                                            @if($certificate_image)
                                                            <div class="upload-image image-input-inner d-flex align-items-center ">
                                                                <img src="{{ $certificate_image->temporaryUrl() }}" alt="your image" class="d-block"/>
                                                            </div>
                                                            @else
                                                            <div class="d-flex h-100 align-items-center text-center justify-content-center flex-column upload-data">
                                                                <i class="far fa-images f-25"></i>
                                                                <p class="f-12 text-dark p-regular mb-0">Image Preview</p>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                <label class="f-14 text-dark p-regular align-self-center">Disability Type <span class="text-danger">*</span></label>
                                                <div class="checkbox-wrapper p-3">
                                                    @foreach($disabilityTypes as $type)
                                                    <label class="radio-wrapper f-14 text-dark p-regular align-self-center d-flex">{{$type->type}}
                                                        {!! Form::checkbox('disability_type', $type->id, null, ['class' => 'disability_type', 'wire:model' => 'disability_type']) !!}
                                                        <span class="checkmark-check"></span>
                                                    </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('disability_type')) 
                                                    <div class="invalid-feedback d-block mt-1">  
                                                        {{ $errors->first('disability_type') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4 pt-4 px-md-3">
                                                <div class="form-row pb-4 pt-1">
                                                    <div class="col-6"> 
                                                        <label class="radio-wrapper-2 f-14 text-dark p-regular align-self-center d-flex ">Disability since
                                                              {!! Form::radio('disability_by_birth', 'No', null, ['wire:model' => 'disability_by_birth']) !!}
                                                              <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="radio-wrapper-2 f-14 text-dark p-regular align-self-center d-flex">Disability by birth
                                                              {!! Form::radio('disability_by_birth', 'Yes', null, ['wire:model' => 'disability_by_birth']) !!}
                                                              <span class="checkmark"></span>
                                                        </label>
                                                        @if('disability_by_birth')
                                                            <span class="invalid-feedback d-block mt-1 f-13">
                                                                {{ $errors->first('disability_by_birth') }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if($disability_by_birth == 'No')
                                                <div class="form-row">
                                                    <div class="form-group col-md-12" id="sinceTextbox">
                                                        <label for="inputEmail4" class="f-14 text-dark p-regular">Disability since <span class="text-danger">*</span></label>
                                                        <div class="datepicker-2 date input-group p-0">
                                                            {!! Form::text('disability_since', null, ["class" => "form-control datepicker border-right-0", 'id' => 'disability_since', 'wire:model' => 'disability_since', 'autocomplete' => "off",
                                                            "data-provide" => "datepicker", "data-date-autoclose" => "true", "data-date-format" => "dd/mm/yyyy", "data-date-today-highlight" => "true", "onchange" => "this.dispatchEvent(new InputEvent('input'))"]) !!}
                                                            
                                                            <div class="input-group-append border-left-0"><span class="input-group-text px-4"><i class="fas fa-calendar"></i></span></div>
                                                        </div>
                                                        @if('disability_since')
                                                        <span class="invalid-feedback d-block mt-1">
                                                            {{ $errors->first('disability_since') }}
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4 ">
                                                <label class="f-14 text-dark p-regular align-self-center">Disability Area <span class="text-danger">*</span></label>
                                                <div class="checkbox-wrapper p-3">
                                                    @foreach($disabilityAreas as $disabilityArea)
                                                    <label class="radio-wrapper f-14 text-dark p-regular align-self-center d-flex ">{{$disabilityArea->area}}
                                                        {!! Form::checkbox('disability_area', $disabilityArea->id, null, ['class' => 'disability_area', 'wire:model' => 'disability_area']) !!}
                                                        <span class="checkmark-check"></span>
                                                    </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('disability_area'))
                                                    <div class="invalid-feedback d-block mt-1">  
                                                        {{ $errors->first('disability_area') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                  <label for="inputEmail4" class="f-14 text-dark p-regular">Hospital Treating Disability </label>
                                                  {!! Form::text('hospital_treatment', null, ['class' => 'form-control w-100', 'wire:model' => 'hospital_treatment']) !!}
                                            </div>
                                            <div class="form-group col-md-4">
                                                  <label for="inputEmail4" class="f-14 text-dark p-regular">Pension Card Number </label>
                                                  {!! Form::text('pension_card_no', null, ['class' => 'w-100 form-control', 'wire:model' => 'pension_card_no']) !!}
                                            </div>
                                        </div>		
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4" class="f-14 text-dark p-regular">Disability Due To </label>
                                                <div class="input-group mb-3">
                                                    {!! Form::select('disability_reason', $disabilityReasons, null, ['class' => 'custom-select', 'wire:model' => 'disability_reason', 'placeholder' => 'Select Disability Due To']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4" class="f-14 text-dark p-regular">Hospital </label>
                                                <div class="input-group mb-3">
                                                    {!! Form::select('hospital_id', $hospitals, null, ['class' => 'custom-select', 'wire:model' => 'hospital', 'placeholder' => 'Select Hospital']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                  <label class="f-14 text-dark p-regular align-self-center ">Have ST travel discount pass?</label>
                                                    <label class="switch ">
                                                    {!! Form::checkbox('st_pass', '0', null, ['class' => 'switch-input ST_pass', 'wire:click' => '$toggle("st_pass")', 'id' => 'ST_pass']) !!}
                                                    <span class="switch-label" data-on="Yes" data-off="No"></span> 
                                                    <span class="switch-handle"></span> 
                                                </label>
                                            </div>
                                            @if($st_pass)
                                            <div class="form-group col-md-4" id="pass_number">
                                                  <label for="inputEmail4" class="f-14 text-dark p-regular">Pass No<span class="text-danger">*</span></label>
                                                  {!! Form::text('pass_no', null, ['class' => 'w-100 form-control', 'wire:model' => 'pass_no']) !!}
                                                  @error('pass_no')
                                                    <div class="invalid-feedback d-block mt-1">  
                                                        {{ $message }}
                                                    </div>
                                                  @enderror
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                  <label class="f-14 text-dark p-regular align-self-center ">Having taken advantage of any government plan</label>
                                                    <label class="switch">
                                                    {!! Form::checkbox('government_scheme', '0', null, ['class' => 'switch-input goverment_scheme', 'wire:click' => '$toggle("government_scheme")', 'id' => 'goverment_scheme']) !!}
                                                    <span class="switch-label" data-on="Yes" data-off="No"></span> 
                                                    <span class="switch-handle"></span> 
                                                </label>
                                            </div>
                                            @if($government_scheme)
                                            <div class="form-group col-md-4" id="scheme_name">
                                                <label for="inputEmail4" class="f-14 text-dark p-regular">If yes, Scheme name<span class="text-danger">*</span></label>
                                                {!! Form::text('scheme_name', null, ['class' => 'w-100 form-control', 'wire:model' => 'scheme_name']) !!}
                                                @error('scheme_name')
                                                    <div class="invalid-feedback d-block mt-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                  <label class="f-14 text-dark p-regular align-self-center ">Have a personal toilet?</label>
                                                    <label class="switch">
                                                    {!! Form::checkbox('personal_toilet', '0', null, ['class' => 'switch-input personal_toilet', 'wire:click' => '$toggle("personal_toilet")', 'id' => 'personal_toilet']) !!}
                                                    <span class="switch-label" data-on="Yes" data-off="No"></span> 
                                                    <span class="switch-handle"></span> 
                                                </label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                  <label class="f-14 text-dark p-regular align-self-center ">Do you have a home?</label>
                                                    <label class="switch">
                                                    {!! Form::checkbox('home', '0', null, ['class' => 'switch-input home', 'wire:click' => '$toggle("home")', 'id' => 'home']) !!}
                                                    <span class="switch-label" data-on="Yes" data-off="No"></span> 
                                                    <span class="switch-handle"></span> 
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                  <label class="f-14 text-dark p-regular align-self-center ">Does the need for Divyang Goods?</label>
                                                    <label class="switch">
                                                    {!! Form::checkbox('need_goods', '0', null, ['class' => 'switch-input need_goods', 'wire:click' => '$toggle("need_goods")', 'id' => 'need_goods']) !!}
                                                    <span class="switch-label" data-on="Yes" data-off="No"></span> 
                                                    <span class="switch-handle"></span> 
                                                </label>
                                            </div>
                                            @if($need_goods)
                                            <div class="form-group col-md-4 " id="divyangGoodsDiv">
                                                <label for="inputEmail4" class="f-14 text-dark p-regular">Divyang Goods {{ $divyang_goods }}</label>
                                                <div class="input-group mb-3">
                                                    {!! Form::select('divyang_goods_id', $divyangGoods, null, ['class' => 'custom-select divyangGoods', 'wire:model' => 'divyang_goods', 'id' => 'divyangGoods']) !!}
                                                </div>
                                                <span class="text text-danger divyang_goods_error" style="display:none"></span>
                                            </div>
                                            @endif
                                            @if($divyang_goods == 'Other')
                                            <div class="form-group col-md-4" id="other_textbox">
                                                <label for="inputEmail4" class="f-14 text-dark p-regular">If Other Goods<span class="text-danger">*</span></label>
                                                {!! Form::text('other_goods', null, ['class' => 'w-100 form-control', 'wire:model' => 'other_goods']) !!}
                                                <span class="text text-danger other_goods_error" style="display:none"></span>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="py-4 text-right ">
                                            <button type="button" class="btn btn-primary f-12 p-semibold rounded-9 px-5" wire:click="moveToStep(1)">Prev</button>
                                            <button type="button" class="btn btn-primary f-12 p-semibold rounded-9 px-5" wire:click="storeStep2()">Next</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            @endif
                            {{-- Step 2 End --}}

                            {{-- Step 3 Start --}}
                            @if($step == 3)
                            <div class="form-content wow slideInRight" data-wow-duration="0.5s" id="step3">
                                <div class="row">
                                    <div class="col-lg-12 mx-auto basic-information">
                                        <h2 class="p-semibold f-20 text-dark pb-3"> Employment Details </h2>
                                        {!! Form::open(['id' => 'step-three-form']) !!}
                                        <input type="hidden" name="id" class="personalDetailId">
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4" class="f-14 text-dark p-regular">Employed or Unemployed <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    {!! Form::select('is_employeed', ['1' => 'Employeed', '0' => 'Unemployeed'], null, ['class' => 'custom-select employed_type', 'wire:model' => 'is_employeed', 'placeholder' => 'Select Employed or Unemployed']) !!}
                                                </div>
                                                @if ($errors->has('is_employeed')) 
                                                    <div class="invalid-feedback d-block mt-1">  
                                                        {{ $errors->first('is_employeed') }}
                                                    </div>
                                                @endif
                                            </div>
                                            @if($is_employeed)
                                            <div class="form-group col-md-4" id='occupation'>
                                                <label for="inputEmail4" class="f-14 text-dark p-regular">Occupation <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    {!! Form::select('occupation', $occupations, null, ['class' => 'custom-select', 'wire:model' => 'occupation']) !!}
                                                </div>
                                                @if ($errors->has('occupation')) 
                                                    <div class="invalid-feedback d-block mt-1">  
                                                        {{ $errors->first('occupation') }}
                                                    </div>
                                                @endif
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4" class="f-14 text-dark p-regular">BPL / APL <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    {!! Form::select('bpl_apl', ['BPL' => 'BPL', 'APL' => 'APL'], null, ['class' => 'custom-select', 'wire:model' => 'bpl_apl', 'placeholder' => 'Select BPL/APL']) !!}
                                                </div>
                                                @if ($errors->has('bpl_apl')) 
                                                    <div class="invalid-feedback d-block mt-1">  
                                                        {{ $errors->first('bpl_apl') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4">
                                                  <label for="inputEmail4" class="f-14 text-dark p-regular">Personal Income (Annual) <span class="text-danger">*</span></label>
                                                  <div class="input-group mb-3">
                                                    {!! Form::select('income', ['< 1,00,000' => '< 1,00,000', '> 1,00,000' => '> 1,00,000'], null, ['class' => 'custom-select', 'wire:model' => 'income', 'placeholder' => 'Select Personal Income']) !!}
                                                </div>
                                                @if ($errors->has('income')) 
                                                    <div class="invalid-feedback d-block mt-1">  
                                                        {{ $errors->first('income') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                  <label for="inputEmail4" class="f-14 text-dark p-regular">Spouse Income (Annual) </label>
                                                  <div class="input-group mb-3">
                                                    {!! Form::select('spouse_income', ['< 1,00,000' => '< 1,00,000', '> 1,00,000' => '> 1,00,000'], null, ['class' => 'custom-select', 'wire:model' => 'spouse_income', 'placeholder' => 'Select Spouse Income']) !!}
                                                </div>
                                                @if ($errors->has('spouse_income')) 
                                                    <div class="invalid-feedback d-block mt-1">  
                                                        {{ $errors->first('spouse_income') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="py-4 text-right ">
                                            <button type="button" class="btn btn-primary f-12 p-semibold rounded-9 px-5" wire:click="moveToStep(2)">Prev</button>
                                            <button type="button" class="btn btn-primary f-12 p-semibold rounded-9 px-5" wire:click="storeStep3()">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            {{-- Step 3 End --}}

                            {{-- Step 4 Start --}}
                            @if($step == 4)
                            <div class="form-content wow slideInRight" data-wow-duration="0.5s" id="step4">
                                <div class="row">
                                    <div class="col-lg-12 mx-auto basic-information">
                                        <h2 class="p-semibold f-20 text-dark pb-3"> Identity Details </h2>
                                        <div class="form-row pb-2">
                                            <div class="form-group col-lg-4">
                                                <label for="inputEmail4" class="f-14 text-dark p-regular">Identity Proof <span class="text-warning">*</span></label>
                                                <div class="input-group mb-3">
                                                    {!! Form::select('identity_proof_id', $identityProofs, null, ['class' => 'custom-select', 'wire:model' => 'identity_proof_id', 'placeholder' => 'Select Identity Proof']) !!}
                                                </div>
                                                @if ($errors->has('identity_proof_id')) 
                                                <div class="invalid-feedback d-block mt-1">  
                                                    {{ $errors->first('identity_proof_id') }}
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-8 col-md-12 col-sm-8 form-group">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label class="f-14 text-dark p-regular">Identity Proof Photo <span class="text-danger">*</span></label>
                                                        <div class="input-group ">
                                                            <div class="custom-file">
                                                                {!! Form::file('identity_proof_photo', ['class' => 'custom-file-input file-input imgInp', 'id' => 'identity_proof_image', 'wire:model' => 'identity_proof_photo']) !!}
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                        <small class="f-12">(Only jpeg, jpg, gif and png image with size 15 KB to 30 KB allowed)</small>
                                                        @if ($errors->has('identity_proof_photo')) 
                                                        <div class="invalid-feedback d-block mt-1">  
                                                            {{ $errors->first('identity_proof_photo') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-4">								
                                                        <div class="profile-img text-center bg-white image-input">
                                                            @if($identity_proof_photo)
                                                            <div class="upload-image image-input-inner d-flex align-items-center ">
                                                                <img src="{{ $identity_proof_photo->temporaryUrl() }}" alt="your image" class="d-block"/>
                                                            </div>
                                                            @else
                                                            <div class="d-flex h-100 align-items-center text-center justify-content-center flex-column upload-data">
                                                                <i class="far fa-images f-25"></i>
                                                                <p class="f-12 text-dark p-regular mb-0">Image Preview</p>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4" class="f-14 text-dark p-regular">TIN (NPR) <span class="text-danger">*</span></label>
                                                {!! Form::text('tin', null, ["class"=>"w-100 form-control", 'wire:model' => 'tin']) !!}
                                                @error('tin')
                                                    <div class="invalid-feedback d-block mt-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4" class="f-14 text-dark p-regular">Aadhar No.  <span class="text-danger">*</span> </label>
                                                {!! Form::text('aadhar', null, ["class"=>"w-100 form-control", 'wire:model' => 'aadhar']) !!}
                                                @error('aadhar')
                                                    <div class="invalid-feedback d-block mt-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4 pt-4">
                                                <label class="radio-wrapper f-14 text-dark p-regular align-self-center d-flex ">I agreed to share aadhar information with Govt. Department
                                                    {!! Form::checkbox('i_agree_share_aadhar', 'Yes', true, ["class"=>"i_agree_share_aadhar", 'wire:model' => 'i_agree_share_aadhar']) !!}
                                                    <span class="checkmark-check"></span>
                                                </label>
                                                @error('i_agree_share_aadhar')
                                                    <div class="invalid-feedback d-block mt-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4" class="f-14 text-dark p-regular">Login password <span class="text-warning">*</span> </label>
                                                {!! Form::password('password', ['class' => 'w-100 form-control', 'wire:model' => 'password']) !!}
                                                @error('password')
                                                    <div class="invalid-feedback d-block mt-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row pb-2">
                                            <div class="form-group col-md-6">
                                                <label class="radio-wrapper f-14 text-dark p-regular align-self-center d-flex ">I have read and agree to the Terms and Conditions <span class="text-danger">*</span>
                                                    {!! Form::checkbox('i_agree', "yes", false, ['class' => 'i_agree_tc', 'wire:model' => 'i_agree_tc']) !!}
                                                    <span class="checkmark-check"></span>
                                                </label>
                                                @error('i_agree_tc')
                                                    <div class="invalid-feedback d-block mt-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="py-4 text-right ">
                                            <button type="button" class="btn btn-primary f-12 p-semibold rounded-9 px-5" wire:click="moveToStep(3)">Prev</button>
                                            <button type="button" class="btn btn-primary f-12 p-semibold rounded-9 px-5" wire:click="storeStep4()">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            {{-- Step 4 End --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
