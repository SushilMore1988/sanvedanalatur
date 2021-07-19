<div>
    <div class="form-content wow slideInRight" data-wow-duration="0.5s" id="step2">
        <div class="row">
            <div class="col-lg-12 mx-auto basic-information">
                <h2 class="p-semibold f-20 text-dark pb-3"> Disability Details </h2>
                {!! Form::open(['id' => 'step-two-form','files'=>true, 'wire:submit.prevent' => 'store']) !!}
                <div class="form-row pb-2">
                    <div class="form-group col-md-4">
                            <label class="f-14 text-dark p-regular align-self-center">Do you have disability certificate ? <span class="text-danger">*</span></label>
                            <label class="switch">
                            {!! Form::checkbox('disability_certificate', "No", null, ["class" => "switch-input certificate", 'id' => 'certificate', 'wire:model' => 'disability_certificate']) !!}
                            <span class="switch-label" data-on="Yes" data-off="No"></span> 
                            <span class="switch-handle" ></span> 
                        </label>
                         @if ($errors->has('disability_certificate')) 
                            <div class="text-danger mt-1">  
                                {{ $errors->first('disability_certificate') }}
                            </div>
                        @endif
                    </div>
    
                    <div class="form-group col-md-6" id="certificate_image_div" style="display:none">
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
                                    <div class="text-danger mt-1">  
                                        {{ $errors->first('certificate_image') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-4">
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
                <div class="form-row pb-2">
                    <div class="form-group col-md-4">
                        <label class="f-14 text-dark p-regular align-self-center">Disability Type <span class="text-danger">*</span></label>
                        <div class="checkbox-wrapper p-3">
                            @foreach($disabilityTypes as $type)
                            <label class="radio-wrapper f-14 text-dark p-regular align-self-center d-flex">{{$type->type}}
                                {!! Form::checkbox('disability_type', $type->type, null, ['class' => 'disability_type', 'wire:model' => 'disability_type']) !!}
                                <span class="checkmark-check"></span>
                            </label>
                            @endforeach
                        </div>
                        @if ($errors->has('disability_type')) 
                            <div class="text-danger mt-1">  
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
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12" id="sinceTextbox">
                                <label for="inputEmail4" class="f-14 text-dark p-regular">Disability since <span class="text-danger">*</span></label>
                                <div class="datepicker-2 date input-group p-0">
                                    {!! Form::text('disability_since', null, ["class" => "form-control border-right-0", 'id' => 'disability_since', 'wire:model' => 'disability_since']) !!}
                                    <div class="input-group-append border-left-0"><span class="input-group-text px-4"><i class="fas fa-calendar"></i></span></div>
                                </div>
                                <span class="text text-danger year_since_error" style="display:none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 ">
                        <label class="f-14 text-dark p-regular align-self-center ">Disability Area <span class="text-danger">*</span></label>
                        <div class="checkbox-wrapper p-3">
                            @foreach($disabilityAreas as $disabilityArea)
                            <label class="radio-wrapper f-14 text-dark p-regular align-self-center d-flex ">{{$disabilityArea->area}}
                                {!! Form::checkbox('disability_area', $disabilityArea->area, null, ['class' => 'disability_area', 'wire:model' => 'disability_area']) !!}
                                <span class="checkmark-check"></span>
                            </label>
                            @endforeach
                        </div>
                        @if ($errors->has('disability_area'))
                            <div class="text-danger mt-1">  
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
                            {!! Form::select('disability_reason', $disabilityReasons, null, ['class' => 'custom-select']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4" class="f-14 text-dark p-regular">Hospital </label>
                        <div class="input-group mb-3">
                            {!! Form::select('hospital_id', $hospitals, null, ['class' => 'custom-select']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-row pb-2">
                    <div class="form-group col-md-4">
                          <label class="f-14 text-dark p-regular align-self-center ">Have ST travel discount pass?</label>
                            <label class="switch ">
                            {{-- <input class="switch-input ST_pass" type="checkbox" name="ST_pass" id='ST_pass' value="No"/> --}}
                            {!! Form::checkbox('st_pass', 'No', null, ['class' => 'switch-input ST_pass', 'wire:model' => 'st_pass', 'id' => 'ST_pass']) !!}
                            <span class="switch-label" data-on="Yes" data-off="No"></span> 
                            <span class="switch-handle"></span> 
                        </label>
                    </div>
                    <div class="form-group col-md-4" style="display:none" id="pass_number">
                          <label for="inputEmail4" class="f-14 text-dark p-regular">Pass No<span class="text-danger">*</span></label>
                          {{-- <input type="text" class="w-100 form-control" id="ST_pass_no" name="ST_pass_no" > --}}
                          {!! Form::text('pass_no', null, ['class' => 'w-100 form-control', 'wire:model' => 'pass_no']) !!}
                          @error('pass_no')
                            <div class="text-danger mt-1">  
                                {{ $message }}
                            </div>
                          @enderror
                    </div>
                </div>
                <div class="form-row pb-2">
                    <div class="form-group col-md-4">
                          <label class="f-14 text-dark p-regular align-self-center ">Having taken advantage of any government plan</label>
                            <label class="switch ">
                            {{-- <input class="switch-input goverment_scheme" id="goverment_scheme" type="checkbox" name="goverment_scheme" value="No"/> --}}
                            {!! Form::checkbox('government_scheme', 'No', null, ['class' => 'switch-input goverment_scheme', 'wire:model' => 'government_scheme', 'id' => 'goverment_scheme']) !!}
                            <span class="switch-label" data-on="Yes" data-off="No"></span> 
                            <span class="switch-handle"></span> 
                        </label>
                    </div>
                    <div class="form-group col-md-4" style="display:none" id="scheme_name">
                          <label for="inputEmail4" class="f-14 text-dark p-regular">If yes, Scheme name<span class="text-danger">*</span></label>
                          {{-- <input type="text" class="w-100 form-control" id="scheme_name_textbox" name="scheme_name" > --}}
                          {!! Form::text('scheme_name', null, ['class' => 'w-100 form-control']) !!}
                          @error('scheme_name')
                              <div class="text-danger mt-1">
                                  {{ $message }}
                              </div>
                          @enderror
                    </div>
                </div>
                <div class="form-row pb-2">
                    <div class="form-group col-md-4">
                          <label class="f-14 text-dark p-regular align-self-center ">Have a personal toilet?</label>
                            <label class="switch ">
                            {{-- <input class="switch-input personal_toilet" id="personal_toilet" type="checkbox" name="personal_toilet" value="No" /> --}}
                            {!! Form::checkbox('personal_toilet', 'No', null, ['class' => 'switch-input personal_toilet', 'wire:model' => 'personal_toilet', 'id' => 'personal_toilet']) !!}
                            <span class="switch-label" data-on="Yes" data-off="No"></span> 
                            <span class="switch-handle"></span> 
                        </label>
                    </div>
                    <div class="form-group col-md-4">
                          <label class="f-14 text-dark p-regular align-self-center ">Do you have a home?</label>
                            <label class="switch ">
                            {{-- <input class="switch-input home" type="checkbox" name="home" id="home" value="No"/> --}}
                            {!! Form::checkbox('home', 'No', null, ['class' => 'switch-input home', 'wire:model' => 'home', 'id' => 'home']) !!}
                            <span class="switch-label" data-on="Yes" data-off="No"></span> 
                            <span class="switch-handle"></span> 
                        </label>
                    </div>
                </div>
                <div class="form-row pb-2">
                    <div class="form-group col-md-4">
                          <label class="f-14 text-dark p-regular align-self-center ">Does the need for Divyang Goods?</label>
                            <label class="switch ">
                            {{-- <input class="switch-input need_goods" id="need_goods" type="checkbox" name="need_goods" value="No"/> --}}
                            {!! Form::checkbox('need_goods', 'No', null, ['class' => 'switch-input need_goods', 'wire:model' => 'need_goods', 'id' => 'need_goods']) !!}
                            <span class="switch-label" data-on="Yes" data-off="No"></span> 
                            <span class="switch-handle"></span> 
                        </label>
                    </div>
                    <div class="form-group col-md-4 " style="display:none" id="divyangGoodsDiv">
                          <label for="inputEmail4" class="f-14 text-dark p-regular">Divyang Goods </label>
                          <div class="input-group mb-3">
                              {!! Form::select('divyang_goods_id', $divyangGoods, null, ['class' => 'custom-select divyangGoods', 'wire:model' => 'divyang_goods', 'id' => 'divyangGoods']) !!}
                            {{-- <select class="custom-select divyangGoods" id="divyangGoods" name="divyangGoods">
                                <option value=''>Please Select Goods </option>
                                @foreach($divyangGoods as $divyangGood)
                                    <option value="{{$divyangGood->name}}">{{$divyangGood->name}}</option>
                                @endforeach
                            </select> --}}
                        </div>
                        <span class="text text-danger divyang_goods_error" style="display:none"></span>
                    </div>
                    <div class="form-group col-md-4" style="display:none" id="other_textbox">
                          <label for="inputEmail4" class="f-14 text-dark p-regular">If Other Goods<span class="text-danger">*</span></label>
                          {{-- <input type="text" class="w-100 form-control" id="other_goods" name="other_goods" > --}}
                          {!! Form::text('other_goods', null, ['class' => 'w-100 form-control', 'wire:model' => 'other_goods']) !!}
                          <span class="text text-danger other_goods_error" style="display:none"></span>
                    </div>
                </div>
                <div class="py-4 text-right ">
                    <button type="button" class="btn prevbtn btn-primary prev f-12 p-semibold rounded-9 px-5">Prev</button>
                    <button type="button" class="btn btn-primary f-12 p-semibold rounded-9 px-5" id="disability-detail-store">Next</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
