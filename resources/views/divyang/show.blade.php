<x-auth-layout>
    <x-slot name="page_title">Create New Divyang</x-slot>
    <x-slot name="style">
        <link rel="stylesheet" type="text/css" href="{{url('vendor/datepicker/new-datepicker/bootstrap-datepicker.css')}}">
    </x-slot>
    <x-slot name="javascript">
        
    </x-slot>

    {{-- @livewire('divyang.create.show', ['id' => $divyang->id]) --}}
    <section class="user-detail pb-5">
		<h4 class="text-dark p-semibold f-20 text-center pt-5 pb-3 px-sm-0 px-3">District Social Welfare Department, Latur<br> Samvedana Divyang Abhiyan<br> Divyang Vyakti Registration Form</h4>
		<hr>
		<div class="container py-2">
			<div class="d-flex justify-content-sm-end justify-content-center pb-3">
				<button class="btn btn-primary mr-3 p-semibold f-14"><i class="fas fa-print pr-2"></i>Print</button>
				<a href="{{url()->previous()}}" class="btn btn-primary p-semibold f-14"><i class="fas fa-arrow-left pr-2"></i>Back</a>
			</div>
			<div>
				<h2 class="p-semibold f-20 text-dark py-2"> Personal Details </h2>
				<div class="row py-lg-2 pt-3 ">
					<div class="col-lg-9 col-sm-8 col-md-10 order-sm-1 order-12 pt-sm-0 pt-3">
						<div class="row">
							<div class="col-md-6 d-flex align-items-center py-2 border-bottom">
								<div class="media">
									<h6 class="p-medium f-14 text-dark mb-0 mr-2">1.</h6>
									<div class="media-body d-flex">
									    <h6 class="p-medium f-14 text-dark mb-0">Full Name : </h6>
									    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->first_name}} {{$divyang->middle_name}} {{$divyang->surname}} </p>
									</div>
								</div>
							</div>
							<div class="col-md-6 d-flex align-items-center py-2 border-bottom ">
								<div class="media">
									<h6 class="p-medium f-14 text-dark mb-0 mr-2">2.</h6>
									<div class="media-body d-flex">
									    <h6 class="p-medium f-14 text-dark mb-0">Mother Name : </h6>
									    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->mother_name}} </p>
									</div>
								</div>
							</div>
						</div>
						<div class="row ">
							<div class="col-md-6 d-flex align-items-center py-2 border-bottom">
								<div class="media">
									<h6 class="p-medium f-14 text-dark mb-0 mr-2">3.</h6>
									<div class="media-body d-flex">
									    <h6 class="p-medium f-14 text-dark mb-0">Gender : </h6>
									    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->gender}} </p>
									</div>
								</div>
							</div>
							<div class="col-md-6 d-flex align-items-center py-2 border-bottom">
								<div class="media">
									<h6 class="p-medium f-14 text-dark mb-0 mr-2">4.</h6>
									<div class="media-body d-flex">
									    <h6 class="p-medium f-14 text-dark mb-0">Date of Birth : </h6>
									    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->date_of_birth}}  </p>
									</div>
								</div>
							</div>
						</div>
						<div class="row ">
							<div class="col-md-6 d-flex align-items-center py-2 border-bottom">
								<div class="media">
									<h6 class="p-medium f-14 text-dark mb-0 mr-2">5.</h6>
									<div class="media-body d-flex">
									    <h6 class="p-medium f-14 text-dark mb-0">Mobile Number : </h6>
									    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->phone}}</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 d-flex align-items-center py-2 border-bottom">
								<div class="media">
									<h6 class="p-medium f-14 text-dark mb-0 mr-2">6.</h6>
									<div class="media-body d-flex">
									    <h6 class="p-medium f-14 text-dark mb-0">E-Mail Id : </h6>
									    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->email}}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-2 text-sm-center text-right col-sm-4 order-sm-12 order-1" >
						<div class="profile-wrapper mx-sm-auto">
							<img src="{{url('storage/'.$divyang->photo)}}" class="w-100 h-auto">
						</div>
					</div>
				</div>
				<div class="row ">
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">7.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Mark of Identification : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->mark_of_identification}} </p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">8.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Religion : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->religion->name}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">9.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Caste : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->caste->name}} </p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">10.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Blood Group : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->blood_group}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">11.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Marital Status : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->marital_status}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">12.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Relation with PwD (Person with Disability) : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">
							    	{{$divyang->relation_with_pwd}}
							    </p>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">13.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Name of Guardian / Caretaker / Attendant / Related person : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">
							    	{{$divyang->guardian_name}}
							    </p>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">14.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Contact No. of Guardian / Caretaker / Attendant / Related person : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">
							    	{{$divyang->guardian_contact}}
                                </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pt-4">
				<h2 class="p-semibold f-20 text-dark py-2"> Permanent Address </h2>
				<div class="row ">
					<div class="col-lg-12 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">15.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Address : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">
                                    {{ $divyang->address_line_1 }}, {{$divyang->address_line_2}}, {{$divyang->address_line_3}},
                                    @if($divyang->local_gov_institution == 'Mahanagarpalika')
                                        {{ $divyang->mahanagarpalika->name }}, {{ $divyang->zone->name }}, {{ $divyang->mahanagarpalikaWardNumber->name}}
                                    @elseif($divyang->local_gov_institution == 'Nagarparishad')
                                        {{ $divyang->nagarparishad->name }}, {{ $divyang->nagarparishadWardNumber->name }}, {{$divyang->taluka->name}},
                                    @elseif($divyang->local_gov_institution == 'Grampanchayat')
                                        {{ $divyang->village->name }}, {{$divyang->taluka->name}},
                                    @else
                                      {{$divyang->district->name}}, {{$divyang->state->name}},
                                    @endif
                                    {{$divyang->pin_code}}.
                                </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pt-4">
				<h2 class="p-semibold f-20 text-dark py-2"> Educational Details </h2>
				<div class="row ">
					<div class="col-lg-12 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">16.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Highest Qualification  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->education}} </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pt-4">
				<h2 class="p-semibold f-20 text-dark py-2"> Bank Account Details  </h2>
				<div class="row ">
					<div class="col-lg-6 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">17.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Bank Account No  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->account_no}} </p>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">18.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">IFSC Code : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->ifsc}} </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pt-4">
				<h2 class="p-semibold f-20 text-dark py-2">Disability Details </h2>
				<div class="row ">
					<div class="col-lg-12 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">19.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Do you have disability certificate ?  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->disability_certificate ? 'Yes' : 'No'}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">20.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Disability Type  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{ $divyang->disabilityTypes()->pluck('type')->implode(', ') }}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">20.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Disability By Birth  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->disability_by_birth ? 'Yes' : 'No'}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">21.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Disability since  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->disability_by_birth ? '-' : $divyang->disability_since}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">22.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Disability Area : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{ $divyang->disabilityAreas()->pluck('area')->implode(', ') }}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">23.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Hospital Treating Disability  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->hospital_treatment}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">24.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Pension Card Number   : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->pension_card_no}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">25.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Disability Doe To    : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->reason ? $divyang->reason->reason : ''}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">26.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Hospital  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->hospital ? $divyang->hospital->name : ''}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">27.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Have ST travel discount pass?  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->st_pass ? 'Yes' : 'No'}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">28.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Pass No  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->pass_no}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">29.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Having taken advantage of any government plan  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->goverment_scheme ? 'Yes' : 'No'}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">30.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Scheme Name  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->scheme_name}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">31.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Have a personal toilet? : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->personal_toilet ? 'Yes' : 'No'}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">32.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Do you have a home? : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->home ? 'Yes' : 'No'}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">33.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Does the need for Divyang Goods? : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->need_goods ? 'Yes' : 'No'}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">34.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Divyang Goods  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{ $divyang->divyangGoods ? $divyang->divyangGoods->name : '' }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pt-4">
				<h2 class="p-semibold f-20 text-dark py-2">Employment Details </h2>
				<div class="row ">
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">35.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Employed or Unemployed  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">
							    	{{$divyang->is_employeed ? 'Employed' : 'Unemployed'}}
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">36.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Occupation  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">
							    	{{$divyang->occupation ? $divyang->occupation->name : ''}}
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">37.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">BPL / APL : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">
							    	{{$divyang->bpl_apl}}
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">38.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Personal Income (Annual)  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">
							    	{{$divyang->income}}
							    </p>
							</div>
						</div>
					</div>
					<div class="col-lg-8 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">39.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Spouse Income (Annual) : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">
							    	{{$divyang->spouse_income}}
							    </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pt-4">
				<h2 class="p-semibold f-20 text-dark py-2"> Identity Details </h2>
				<div class="row ">
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">40.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Identity Proof : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->identityProof->name}} </p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">41.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">TIN (NPR)  : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0"> {{$divyang->tin}} </p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">42.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">Aadhar No. : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->aadhar}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-sm-12 d-flex align-items-center py-2 border-bottom">
						<div class="media">
							<h6 class="p-medium f-14 text-dark mb-0 mr-2">43.</h6>
							<div class="media-body d-flex">
							    <h6 class="p-medium f-14 text-dark mb-0">I agreed to share aadhar information with Govt. Department : </h6>
							    <p class="p-regular f-14 text-dark pl-3 mb-0">{{$divyang->i_agree_share_aadhar ? 'Yes' : 'No'}}</p>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="pt-4">
				<h2 class="p-semibold f-20 text-dark py-2"> Document Details </h2>
				<div class="card-deck">
					<div class="card border-0 shadow rounded-0" data-toggle="modal" data-target="#exampleModal">
					    <img class="card-img-top" src="{{url('storage/'.$divyang->photo)}}" alt="Card image cap">
					    <div class="card-body">
					      	<h5 class="card-title p-medium f-14 text-dark mb-0">Photo</h5>
					    </div>
					</div>
					<div class="card border-0 shadow rounded-0 mt-sm-0 mt-3">
					    <img class="card-img-top" src="{{url('storage/'.$divyang->signature)}}" alt="Card image cap">
					    <div class="card-body">
					      	<h5 class="card-title p-medium f-14 text-dark mb-0">Signature</h5>
					    </div>
					</div>
					<div class="card border-0 shadow rounded-0 mt-md-0 mt-3">
					    <img class="card-img-top" src="{{url('storage/'.$divyang->address_proof_doc)}}" alt="Card image cap">
					    <div class="card-body">
					      	<h5 class="card-title p-medium f-14 text-dark mb-0">Address Proof</h5>
					    </div>
					</div>
					<div class="card border-0 shadow rounded-0 mt-md-0 mt-3">
					    <img class="card-img-top" src="{{url('storage/'.$divyang->identity_proof_photo)}}" alt="Card image cap">
					    <div class="card-body">
					      	<h5 class="card-title p-medium f-14 text-dark mb-0">Identity Proof</h5>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</section>
</x-auth-layout>