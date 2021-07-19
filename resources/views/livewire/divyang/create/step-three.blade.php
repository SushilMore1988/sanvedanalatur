<div>
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
                            {!! Form::select('is_employeed', ['1' => 'Employeed', '0' => 'Unemployeed'], null, ['class' => 'custom-select employed_type', 'wire:model' => 'is_employeed']) !!}
                        </div>
                        @if ($errors->has('is_employeed')) 
                            <div class="text-danger mt-1">  
                                {{ $errors->first('is_employeed') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 " style="display:none" id='occupation'>
                        <label for="inputEmail4" class="f-14 text-dark p-regular">Occupation <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            {!! Form::select('occupation_id', $occupations, null, ['class' => 'custom-select', 'wire:model' => 'occupation_id']) !!}
                        </div>
                        @if ($errors->has('occupation_id')) 
                            <div class="text-danger mt-1">  
                                {{ $errors->first('occupation_id') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-row pb-2">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4" class="f-14 text-dark p-regular">BPL / APL <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            {!! Form::select('bpl_apl', ['BPL' => 'BPL', 'APL' => 'APL'], null, ['class' => 'custom-select', 'wire:model' => 'bpl_apl']) !!}
                        </div>
                        @if ($errors->has('bpl_apl')) 
                            <div class="text-danger mt-1">  
                                {{ $errors->first('bpl_apl') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                          <label for="inputEmail4" class="f-14 text-dark p-regular">Personal Income (Annual) <span class="text-danger">*</span></label>
                          <div class="input-group mb-3">
                            {!! Form::select('income', ['< 1,00,000' => '< 1,00,000', '> 1,00,000' => '> 1,00,000'], null, ['class' => 'custom-select', 'wire:model' => 'income']) !!}
                        </div>
                        @if ($errors->has('income')) 
                            <div class="text-danger mt-1">  
                                {{ $errors->first('income') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-row pb-2">
                    <div class="form-group col-md-4">
                          <label for="inputEmail4" class="f-14 text-dark p-regular">Spouse Income (Annual) </label>
                          <div class="input-group mb-3">
                            {!! Form::select('spouse_income', ['< 1,00,000' => '< 1,00,000', '> 1,00,000' => '> 1,00,000'], null, ['class' => 'custom-select', 'wire:model' => 'spouse_income']) !!}
                        </div>
                        @if ($errors->has('spouse_income')) 
                            <div class="text-danger mt-1">  
                                {{ $errors->first('spouse_income') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="py-4 text-right ">
                    <button type="button" class="btn prevbtn btn-primary prev f-12 p-semibold rounded-9 px-5">Prev</button>
                    <!-- <button type="button" class="nextBtn next" id="nextBtnStep3">Next</button> -->
                    <button type="button" class="nextBtn next d-none" id="nextBtnStep3">Next</button>
                    <button type="button" class="btn btn-primary f-12 p-semibold rounded-9 px-5" id="employment-detail-store">Next</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
