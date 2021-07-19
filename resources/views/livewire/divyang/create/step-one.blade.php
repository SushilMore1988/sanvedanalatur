@once
    @push('scripts')
        <script type="text/javascript" src="{{url('vendor/datepicker/new-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <script type="text/javascript" src="{{url('vendor/datepicker/new-datepicker/bootstrap.bundle.min.js')}}"></script>
        <script>
            var currDate = new Date();
            $(function () {
                $('#date_of_birth').datepicker({
                    clearBtn: true,
                    endDate: currDate,
                    startDate: new Date(new Date().setFullYear(new Date().getFullYear() - 100)),
                    format: "dd/mm/yyyy"
                }).on('changeDate', function(e){
                    alert('here');
                    Livewire.emit("selectBirthDate", e.target.value);
                });
            });
        </script>
    @endpush
    
@endonce
<div>
    <div class="form-content wow slideInRight" data-wow-duration="0.5s" id="step1">
        <div class="row">
            <div class="col-lg-12 mx-auto basic-information">
                <h2 class="p-semibold f-20 text-dark pb-3"> Personal Details </h2>
                {!! Form::open(['id' => 'step-one-form', 'files'=>true , 'wire:submit.prevent="store"']) !!}
                    <div class="form-row pb-2">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="f-14 text-dark p-regular">Applicant First Name <span class="text-danger">*</span></label>
                            {!! Form::text('first_name',null,['class'=>"w-100 form-control", 'wire:model' => 'first_name' ]) !!}
                            @if ($errors->has('first_name'))
                                <div class="text-danger mt-1">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="f-14 text-dark p-regular">Applicant Middle Name </label>
                            {!! Form::text('middle_name',null,['class'=>"w-100 form-control", 'wire:model' => 'middle_name']) !!}
                            @if ($errors->has('middle_name')) 
                                <div class="text-danger mt-1">  
                                    {{ $errors->first('middle_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="f-14 text-dark p-regular">Applicant Surname</label>
                            {!! Form::text('last_name',null,['class'=>"w-100 form-control", 'wire:model' => 'surname' ]) !!}
                            @if ($errors->has('last_name')) 
                                <div class="text-danger mt-1">  
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
                                <div class="text-danger mt-1">  
                                    {{ $errors->first('father_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="f-14 text-dark p-regular">Applicant Mother's Name <span class="text-danger">*</span></label>
                            {!! Form::text('mother_name',null,['class'=>"w-100 form-control ",'id'=>'mother_name', 'wire:model' => 'mother_name' ]) !!}
                            <span class="text text-danger mother_name" style="display:none"></span>
                            @if ($errors->has('mother_name')) 
                                <div class="text-danger mt-1">  
                                    {{ $errors->first('mother_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="f-14 text-dark p-regular">Date of Birth<span class="text-danger">*</span></label>
                            <div class="datepicker date input-group p-0">
                            {!! Form::text('date_of_birth',null,['class'=>"form-control border-right-0 ",'id'=>'date_of_birth']) !!}
                            <div class="input-group-append border-left-0"><span class="input-group-text px-4"><i class="fas fa-calendar"></i></span></div>
                            </div>
                            @if ($errors->has('date_of_birth')) 
                                <div class="text-danger mt-1">  
                                    {{ $errors->first('date_of_birth') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-row pb-2">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="f-14 text-dark p-regular">Gender <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], null, ['class' => 'custom-select', 'wire:model' => 'gender']) !!}
                            </div>
                            @if ($errors->has('gender')) 
                                <div class="text-danger mt-1">  
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="f-14 text-dark p-regular">Mobile Number <span class="text-danger">*</span></label>
                            {!! Form::text('mobile_number',null,['class'=>"w-100 form-control ",'id'=>'mobile_number', 'wire:model' => 'phone']) !!}
                            <span class="text text-danger mobile_number" style="display:none"></span>
                            @if ($errors->has('mobile_number')) 
                                <div class="text-danger mt-1">  
                                    {{ $errors->first('mobile_number') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="f-14 text-dark p-regular">E-Mail Id</label>
                            {!! Form::email('email_id',null,['class'=>"w-100 form-control", 'wire:model' => 'email']) !!}
                            @if ($errors->has('email_id')) 
                                <div class="text-danger mt-1">  
                                    {{ $errors->first('email_id') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-row pb-2">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="f-14 text-dark p-regular">Mark of Identification</label>
                            {!! Form::text('identification_mark',null,['class'=>"w-100 form-control", 'wire:model' => 'mark_of_identification']) !!}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="f-14 text-dark p-regular">Religion<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                {!! Form::select('religion', [
                                    'Hindu' => 'Hindu',
                                    'Muslim' => 'Muslim',
                                    'Boudha' => 'Boudha',
                                    'Sikh' => 'Sikh',
                                    'Christian' => 'Christian',
                                    'Jain' => 'Jain',
                                    'Other' => 'Other',
                                ], null, ['class' => 'custom-select', 'wire:model' => 'religion']) !!}
                            </div>
                            @if ($errors->has('religion')) 
                                <div class="text-danger mt-1">  
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
                                <div class="text-danger mt-1">  
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
                                ], null, ['class' => 'custom-select', 'wire:model' => 'blood_group']) !!}
                            </div>
                            @if ($errors->has('blood_group')) 
                                <div class="text-danger mt-1">  
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
                                ], null, ['class' => 'custom-select', 'wire:model' => 'marital_status']) !!}
                            </div>
                            @if ($errors->has('marital_status')) 
                                <div class="text-danger mt-1">  
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
                                ], null, ['class' => 'custom-select', 'wire:model' => 'relation_with_pwd']) !!}
                            </div>
                            @if ($errors->has('relation_with_pwd')) 
                                <div class="text-danger mt-1">  
                                    {{ $errors->first('relation_with_pwd') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="f-14 text-dark p-regular">Name of Guardian / Caretaker / Attendant / Related person</label>
                            {!! Form::text('guardian_name',null,['class'=>"w-100 form-control", 'wire:model' => 'guardian_name']) !!}
                            @if ($errors->has('guardian_name')) 
                                <div class="text-danger mt-1">  
                                    {{ $errors->first('guardian_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="f-14 text-dark p-regular">Contact No. of Guardian / Caretaker / Attendant / Related person</label>
                            {!! Form::text('guardian_contact',null,['class'=>"w-100 form-control", 'wire:model' => 'guardian_contact']) !!}
                            @if ($errors->has('guardian_contact')) 
                                <div class="text-danger mt-1">  
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
                                        <div class="text-danger mt-1">  
                                            {{ $errors->first('photo') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-4">
                                    <div class="profile-img text-center bg-white image-input">
                                        <div class="upload-image image-input-inner d-flex align-items-center ">
                                            <img  src="#" alt="your image" />
                                        </div>
                                        <div class="d-flex h-100 align-items-center text-center justify-content-center flex-column upload-data">
                                            <i class="far fa-images f-25"></i>
                                            <p class="f-12 text-dark p-regular mb-0">Image Preview</p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-4 order-lg-1 order-12 ">
                                    <div class="signature-img text-center align-items-center bg-white image-input">
                                        <div class="upload-signature image-input-inner">
                                            <img src="#" alt="your image"/>
                                        </div>
                                        <div class="d-flex h-100 align-items-center text-center justify-content-center flex-column sign-data">
                                            <i class="far fa-images f-25"></i>
                                            <p class="f-12 text-dark p-regular mb-0">Signature Preview</p>
                                        </div>
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
                                        <div class="text-danger mt-1">  
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
                                    {!! Form::select('state', $states, null, ['class' => 'custom-select']) !!}
                                </div>
                                @if ($errors->has('state')) 
                                    <div class="text-danger mt-1">  
                                        {{ $errors->first('state') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular">District <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    {!! Form::select('district', $districts, null, ['class' => 'custom-select']) !!}
                                </div>
                                @if ($errors->has('district')) 
                                    <div class="text-danger mt-1">  
                                        {{ $errors->first('district') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="f-14 text-dark p-regular">Local Government Institution <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        {!! Form::select('local_gov_institution', [
                                            'Mahanagarpalika' => 'Mahanagarpalika',
                                            'Nagarparishad' => 'Nagarparishad',
                                            'Grampanchayat' => 'Grampanchayat'
                                        ], null, ['class' => 'custom-select']) !!}
                                    </div>
                                    @if ($errors->has('local_gov_institution')) 
                                        <div class="text-danger mt-1">  
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
                                    <div class="text-danger mt-1">  
                                        {{ $errors->first('address_line_1') }}
                                    </div>
                                @endif
                            </div>
        
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular">Address Line 2 </label>
                                {!! Form::text('address_line_2',null,['class'=>"w-100 form-control", 'wire:model' => 'address_line_2']) !!}
                                @if ($errors->has('address_line_2')) 
                                    <div class="text-danger mt-1">  
                                        {{ $errors->first('address_line_2') }}
                                    </div>
                                @endif
                            </div>
                        
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular">Address Line 3</label>
                                {!! Form::text('address_line_3',null,['class'=>"w-100 form-control", 'wire:model' => 'address_line_3']) !!}
                                @if ($errors->has('address_line_3')) 
                                    <div class="text-danger mt-1">  
                                        {{ $errors->first('address_line_3') }}
                                    </div>
                                @endif
                            </div>
                            
                        </div>
                        <div class="form-row pb-2" style="display:none" id="grampanchayatDiv" >
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular">City / Sub District / Tehsil  <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    {!! Form::select('taluka', $talukas, null, ['class' => 'custom-select', 'wire:model' => 'taluka']) !!}
                                </div>
                                @if ($errors->has('taluka')) 
                                    <div class="text-danger mt-1">  
                                        {{ $errors->first('taluka') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular">Village / Block</label>
                                <div class="input-group mb-3">
                                    {!! Form::select('village', $villages, null, ['class' => 'custom-select', 'wire:model' => 'village']) !!}
                                </div>
                                @if ($errors->has('village')) 
                                    <div class="text-danger mt-1">  
                                        {{ $errors->first('village') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row pb-2" style="display:none" id="mahanagarpalikaDiv" >
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular"> Mahanagarpalika <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    {!! Form::select('mahanagarpalika', $mahanagarpalikas, null, ['class' => 'custom-select', 'wire:model' => 'mahanagarpalika']) !!}
                                </div>
                                @if ($errors->has('mahanagarpalika')) 
                                    <div class="text-danger mt-1">  
                                        {{ $errors->first('mahanagarpalika') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular">Zone</label>
                                <div class="input-group mb-3">
                                    {!! Form::select('zone', $zones, null, ['class' => 'custom-select', 'wire:model' => 'zone']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular">Ward</label>
                                <div class="input-group mb-3">
                                    {!! Form::select('mahanagarpalika_ward', $mahanagarpalikaWards, null, ['class' => 'custom-select', 'wire:model' => 'mahanagarpalika_ward']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-row pb-2" style="display:none" id="nagarparishadDiv" >
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular"> Nagarparishad <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    {!! Form::select('nagarparishad', $nagarparishads, null, ['class' => 'custom-select', 'wire:model' => 'nagarparishad']) !!}
                                </div>
                                @if ($errors->has('nagarparishad')) 
                                    <div class="text-danger mt-1">  
                                        {{ $errors->first('nagarparishad') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular">Ward</label>
                                <div class="input-group mb-3">
                                    {!! Form::select('nagarparishad_ward', $nagarparishadWards, null, ['class' => 'custom-select', 'wire:model' => 'nagarparishad_ward']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-row pb-2">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular">Pincode <span class="text-danger">*</span></label>
                                {!! Form::text('pin_code', null, ['class' => 'w-100 form-control', 'wire:model' => 'pin_code']) !!}
                                @if ($errors->has('pin_code')) 
                                    <div class="text-danger mt-1">  
                                        {{ $errors->first('pin_code') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular">Nature of Document for Address Proof <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    {!! Form::select('address_proof', [], null, ['class' => 'custom-select', 'wire:model' => 'address_proof']) !!}
                                </div>
                                @if ($errors->has('address_proof')) 
                                    <div class="text-danger mt-1">  
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
                                            <div class="text-danger mt-1">
                                                {{ $errors->first('address_proof_doc') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        <div class="profile-img text-center bg-white image-input">
                                            <div class="upload-image image-input-inner d-flex align-items-center ">
                                                <img src="#" alt="your image" />
                                            </div>
                                            <div class="d-flex h-100 align-items-center text-center justify-content-center flex-column upload-data">
                                                <i class="far fa-images f-25"></i>
                                                <p class="f-12 text-dark p-regular mb-0">Image Preview</p>
                                            </div>
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

                                    ], null, ['class' => 'custom-select', 'wire:model' => 'education']) !!}
                                </div>
                                @if ($errors->has('qualification')) 
                                <div class="text-danger mt-1">  
                                    {{ $errors->first('qualification') }}
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
                                    <div class="text-danger mt-1">
                                        {{ $errors->first('account_no') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="f-14 text-dark p-regular">IFSC Code<span class="text-warning">*</span> </label>
                                {!! Form::text('ifsc', null, ['class' => 'w-100 form-control', 'wire:model' => 'ifsc']) !!}
                                @if ($errors->has('ifsc')) 
                                    <div class="text-danger mt-1">  
                                        {{ $errors->first('ifsc') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="py-4 text-right ">
                        <button type="button" class="btn btn-primary f-12 p-semibold rounded-9 px-5" id="personal-detail-store">Next</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
