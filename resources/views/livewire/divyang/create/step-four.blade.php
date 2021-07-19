<div>
    <div class="form-content wow slideInRight" data-wow-duration="0.5s" id="step4">
        <div class="row">
            <div class="col-lg-12 mx-auto basic-information">
                <h2 class="p-semibold f-20 text-dark pb-3"> Identity Details </h2>
                {!! Form::open([ 'id' => 'step-four-form', 'files' => "true"]) !!}
                <div class="form-row pb-2">
                    <div class="form-group col-lg-4">
                        <label for="inputEmail4" class="f-14 text-dark p-regular">Identity Proof <span class="text-warning">*</span></label>
                        <div class="input-group mb-3">
                            {!! Form::select('identity_proof_id', $identityProofs, null, ['class' => 'custom-select', 'wire:model' => 'identity_proof_id']) !!}
                        </div>
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
                                <div class="text-danger mt-1">  
                                    {{ $errors->first('identity_proof_photo') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-4">								
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
                </div>
                <div class="form-row pb-2">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4" class="f-14 text-dark p-regular">TIN (NPR) <span class="text-danger">*</span></label>
                        {!! Form::text('tin', null, ["class"=>"w-100 form-control", 'wire:model' => 'tin']) !!}
                        @error('tin')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4" class="f-14 text-dark p-regular">Aadhar No.  <span class="text-danger">*</span> </label>
                        {!! Form::text('aadhar', null, ["class"=>"w-100 form-control", 'wire:model' => 'aadhar']) !!}
                        @error('aadhar')
                            <div class="text-danger mt-1">
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
                            <div class="text-danger mt-1">
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
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row pb-2">
                    <div class="form-group col-md-6">
                        <label class="radio-wrapper f-14 text-dark p-regular align-self-center d-flex ">I have read and agree to the Terms and Conditions <span class="text-danger">*</span>
                            {!! Form::checkbox('i_agree', "yes", false, ['class' => 'i_agree_tc']) !!}
                            <span class="checkmark-check"></span>
                        </label>
                        @error('i_agree')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="py-4 text-right ">
                    <button type="button" name="previous" class="btn prevbtn btn-primary prev f-12 p-semibold rounded-9 px-5">Prev</button>
                    <button type="submit" name="next" class="nextBtn d-none" id="submit">Next</button>
                    <button type="button" name="next" class="btn nextBtn btn-primary next f-12 p-semibold rounded-9 px-5" id="identity-detail-store">Next</button>
                    
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
