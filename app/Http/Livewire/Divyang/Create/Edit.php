<?php

namespace App\Http\Livewire\Divyang\Create;


use App\Models\AddressProof;
use App\Models\DisabilityArea;
use App\Models\DisabilityReason;
use App\Models\DisabilityType;
use App\Models\DivyangGoods;
use App\Models\Hospital;
use App\Models\IdentityProof;
use App\Models\Occupation;
use App\Models\District;
use App\Models\State;
use App\Models\Country;
use App\Models\Divyang;
use App\Models\Mahanagarpalika;
use App\Models\MahanagarpalikaWardNumber;
use App\Models\Nagarparishad;
use App\Models\NagarparishadWardNumber;
use App\Models\Role;
use App\Models\Taluka;
use App\Models\User;
use App\Models\Village;
use App\Models\Zone;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Religion;
use App\Models\Caste;

class Edit extends Component
{
    use WithFileUploads;

    public $divyang;

    public $photoUrl = '', $signatureUrl = '', $address_proof_docUrl = '', $certificate_imageUrl = '', $identity_proof_photoUrl = '';
    
    public $castes, $states, $zones, $nagarparishads, $districts, $talukas, $villages, $mahanagarpalikas, $mahanagarpalikaWards, $nagarparishadWards, $addressProofs;

    protected $listeners = [
        "selectBirthDate" => 'getSelectBirthDate',
        'selectDisabilitySince' => 'getSelectDisabilitySince',
    ];

    public $disabilityTypes, $disabilityReasons, $hospitals, $disabilityAreas, $divyangGoods;

    public $occupations, $religions;

    public $identityProofs;

    public $step = 1;
    public $stepOneSuccess = false, $stepTwoSuccess = false, $stepThreeSuccess = false, $stepFourSuccess = false;

    /**
     * variables for step 1
     */

    public $first_name, $middle_name, $last_name, $father_name, $mother_name, $surname, $date_of_birth, $gender, $mobile_number, $email_id, $identification_mark, $religion, $caste, $blood_group, $marital_status, $relation_with_pwd, $guardian_name, $guardian_contact, $photo, $signature, $state, $district, $local_gov_institution, $address_line_1, $address_line_2, $address_line_3, $taluka, $village, $mahanagarpalika, $zone, $mahanagarpalika_ward, $nagarparishad, $nagarparishad_ward, $pin_code, $address_proof, $address_proof_doc, $education, $account_no, $ifsc;

    /**
     * variables for step 2
     */

    public $disability_certificate = false, $certificate_image, $disability_type = [], $disability_by_birth, $disability_since, $disability_area = [], $hospital_treatment, $pension_card_no, $disability_reason, $hospital, $st_pass = false, $pass_no, $government_scheme = false, $scheme_name, $personal_toilet = false, $home = false, $need_goods = false, $divyang_goods, $other_goods;

    /**
     * variables for step 3
     */

    public $is_employeed, $occupation, $bpl_apl, $income, $spouse_income;

     /**
     * variables for step 4
     */

    public $identity_proof_id, $identity_proof_photo, $tin, $aadhar, $i_agree_share_aadhar, $password, $i_agree_tc;

    public function getSelectBirthDate($val)
    {
        $this->date_of_birth = $val;
    }

    public function getSelectDisabilitySince($val)
    {
        $this->disability_since = $val;
    }

    public function getDistricts()
    {
        $this->districts = District::Where('state_id', $this->state)->pluck('name', 'id');
    }

    public function changedDistricts()
    {
        $this->talukas = Taluka::where('district_id', $this->district)->pluck('name', 'id');
        $this->mahanagarpalikas = Mahanagarpalika::where('district_id', $this->district)->pluck('name', 'id');
    }
    
    public function changedTaluka()
    {
        $this->villages = Village::where('taluka_id', $this->taluka)->pluck('name','id');
        $this->nagarparishads = Nagarparishad::where('taluka_id', $this->taluka)->pluck('name', 'id');
    }

    public function changedNagarparishad()
    {
        $this->nagarparishadWards = NagarparishadWardNumber::where('nagarparishad_id', $this->nagarparishad)->pluck('name', 'id');
    }

    public function changedMahanagarpalika()
    {
        $this->zones = Zone::where('mahanagarpalika_id', $this->mahanagarpalika)->pluck('name', 'id');
    }

    public function changedZone()
    {
        $this->mahanagarpalikaWards = MahanagarpalikaWardNumber::where('zone_id', $this->zone)->pluck('name', 'id');
    }

    public function mount($id)
    {
        $divyang = Divyang::find($id);
        $this->divyang = $divyang;
        $country_id = Country::Where('name', 'India')->first()->id;
        $this->states = State::where('country_id', $country_id)->pluck('name', 'id');

        $this->districts = [];
        $this->talukas = [];
        $this->villages = [];
        $this->mahanagarpalikas = [];
        $this->mahanagarpalikaWards = [];
        $this->nagarparishadWards = [];
        $this->zones = [];
        $this->nagarparishads = [];
        
        $this->divyangGoods = DivyangGoods::pluck('name', 'id')->toArray();
        $this->disabilityTypes = DisabilityType::all();
        $this->disabilityAreas = DisabilityArea::all();
        $this->disabilityReasons = DisabilityReason::pluck('reason', 'id');
        $this->hospitals = Hospital::pluck('name', 'id');
        $this->occupations = Occupation::pluck('name', 'id');
        $this->identityProofs = IdentityProof::pluck('name', 'id');
        $this->addressProofs = AddressProof::pluck('name', 'id');
        $this->religions = Religion::pluck('name', 'id');
        $this->castes = Caste::pluck('name', 'id');

        $this->disability_by_birth = 'No';
        /**
         * Set Values for divyang
         */
        $this->first_name = $divyang->first_name;
        $this->middle_name = $divyang->middle_name;
        $this->surname = $divyang->surname;
        $this->father_name = $divyang->father_name;
        $this->mother_name = $divyang->mother_name;
        $this->date_of_birth = date('m/d/Y', strtotime($divyang->date_of_birth));
        $this->gender = $divyang->gender;
        $this->mobile_number = $divyang->phone;
        $this->email_id = $divyang->email;
        $this->identification_mark = $divyang->mark_of_identification;
        $this->religion = $divyang->religion_id;
        $this->caste = $divyang->caste_id;
        $this->blood_group = $divyang->blood_group;
        $this->marital_status = $divyang->marital_status;
        $this->relation_with_pwd = $divyang->relation_with_pwd;
        $this->guardian_name = $divyang->guardian_name;
        $this->guardian_contact = $divyang->guardian_contact;
        
        $this->state = $divyang->state_id;
        $this->districts = District::where('state_id', $this->state)->pluck('name','id');
        $this->district = $divyang->district_id;
        $this->local_gov_institution = $divyang->local_gov_institution;
        $this->address_line_1 = $divyang->address_line_1;
        $this->address_line_2 = $divyang->address_line_2;
        $this->address_line_3 = $divyang->address_line_3;
        $this->talukas = Taluka::where('district_id', $this->district)->pluck('name','id');
        $this->taluka = $divyang->taluka_id;
        if(!empty($divyang->taluka_id)){
            $this->villages = Village::where('taluka_id', $this->taluka)->pluck('name','id');
            $this->nagarparishads = Nagarparishad::where('taluka_id', $this->taluka)->pluck('name', 'id');
        }
        $this->village = $divyang->village_id;
        $this->mahanagarpalikas = Mahanagarpalika::where('district_id', $this->district)->pluck('name', 'id');
        $this->mahanagarpalika = $divyang->mahanagarpalika_id;
        if(!empty($divyang->mahanagarpalika_id)){
            $this->zones = Zone::where('mahanagarpalika_id', $this->mahanagarpalika)->pluck('name', 'id');
            $this->zone = $divyang->zone_id;
        }
        if(!empty($divyang->zone_id)){
            $this->mahanagarpalikaWards = MahanagarpalikaWardNumber::where('zone_id', $this->zone)->pluck('name', 'id');
            $this->mahanagarpalika_ward = $divyang->mahanagarpalika_ward_number_id;
        }
        $this->nagarparishad = $divyang->nagarparishad_id;
        if(!empty($divyang->nagarparishad_id)){
            $this->nagarparishadWards = NagarparishadWardNumber::where('nagarparishad_id', $this->nagarparishad)->pluck('name', 'id');
            $this->nagarparishad_ward = $divyang->nagarparishad_ward_number_id;
        }
        $this->pin_code = $divyang->pin_code;
        $this->address_proof = $divyang->address_proof;
        $this->education = $divyang->education;
        $this->account_no = $divyang->account_no;
        $this->ifsc = $divyang->ifsc;
        $this->disability_certificate = $divyang->disability_certificate == 1 ? true : false;
        $this->disability_by_birth = $divyang->disability_by_birth ? 'Yes' : 'No';
        $this->disability_since = date('m/d/Y', strtotime($divyang->disability_since));
        $this->hospital_treatment = $divyang->hospital_treatment;
        $this->pension_card_no = $divyang->pension_card_no;
        $this->disability_reason = $divyang->disability_reason;
        $this->hospital = $divyang->hospital;
        $this->st_pass = $divyang->st_pass == 1 ? true : false;
        $this->pass_no = $divyang->pass_no;
        $this->government_scheme = $divyang->government_scheme == 1 ? true : false;
        $this->scheme_name = $divyang->scheme_name;
        $this->personal_toilet = $divyang->personal_toilet == 1 ? true : false;
        $this->home = $divyang->home == 1 ? true : false;
        $this->need_goods = $divyang->need_goods == 1 ? true : false;
        $this->divyang_goods = $divyang->divyang_goods;
        $this->other_goods = $divyang->other_goods;
        $this->is_employeed = $divyang->is_employeed;
        $this->occupation = $divyang->occupation;
        $this->bpl_apl = $divyang->bpl_apl;
        $this->income = $divyang->income;
        $this->spouse_income = $divyang->spouse_income;
        $this->identity_proof_id = $divyang->identity_proof_id;
        $this->tin = $divyang->tin;
        $this->aadhar = $divyang->aadhar;
        $this->i_agree_tc = $divyang->i_agree;
        $this->i_agree_share_aadhar = $divyang->i_agree_share_aadhar;
        
        $this->photoUrl = $divyang->photo;
        if(!empty($divyang->photo)){
            $this->photoUrl = $divyang->photo;
            // $this->photo = Storage::get($divyang->photo);
        }
        if(!empty($divyang->signature)){
            // $this->signature = Storage::get($divyang->signature);
            $this->signatureUrl = $divyang->signature;
        }
        if(!empty($divyang->address_proof_doc)){
            // $this->address_proof_doc = Storage::get($divyang->address_proof_doc);
            $this->address_proof_docUrl = $divyang->address_proof_doc;
        }
        if(!empty($divyang->certificate_image)){
            // $this->certificate_image = Storage::get($divyang->certificate_image);
            $this->certificate_imageUrl = $divyang->certificate_image;
        }
        if(!empty($divyang->identity_proof_photo)){
            $this->identity_proof_photoUrl = $divyang->identity_proof_photo;
            // $this->identity_proof_photo = Storage::get($divyang->identity_proof_photo);
        }
        foreach($divyang->disabilityTypes as $type){
            $this->disability_type[] = $type->id;
        }
        foreach($divyang->disabilityAreas as $type){
            $this->disability_area[] = $type->id;
        }
        $this->step = 1;
    }

    public function storeStep1()
    {
        $this->validate([
            'first_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'date_of_birth' => 'required|before_or_equal:'.date('m/d/Y'),
            'gender' => 'required',
            'mobile_number' => 'required',
            'email_id' => 'nullable|email',
            'religion' => 'required',
            'caste' => 'required',
            // 'photo' => 'required',
            // 'signature' => 'required',
            'state' => 'required',
            'district' => 'required',
            'local_gov_institution' => 'required',
            'address_line_1' => 'required',
            'pin_code' => 'required',
            'address_proof' => 'required',
            // 'address_proof_doc' => 'required',
            'education' => 'required',
            'account_no' => 'required',
            'ifsc' => 'required',
            'mahanagarpalika' => 'required_if:local_gov_institution,Mahanagarpalika',
            'zone' => 'required_if:local_gov_institution,Mahanagarpalika',
            'mahanagarpalika_ward' => 'required_if:local_gov_institution,Mahanagarpalika',
            'taluka' => 'required_if:local_gov_institution,Nagarparishad,Grampanchayat',
            'nagarparishad' => 'required_if:local_gov_institution,Nagarparishad',
            'nagarparishad_ward' => 'required_if:local_gov_institution,Nagarparishad',
            'village' => 'required_if:local_gov_institution,Grampanchayat',
        ]);

        $this->stepOneSuccess = true;
        $this->step = 2;
    }

    public function storeStep2()
    {
        $this->validate([
            'disability_certificate' => 'required',
            // 'certificate_image' => 'required_if:disability_certificate,true',
            'disability_type' => 'required',
            'disability_area' => 'required',
            'disability_by_birth' => 'required',
            'disability_since' => 'required_if:disability_by_birth,No',
            'hospital_treatment' => 'nullable',
            'pension_card_no' => 'nullable',
            'disability_reason' => 'nullable',
            'hospital' => 'nullable',
            'st_pass' => 'required',
            'pass_no' => 'required_if:st_pass,true',
            'government_scheme' => 'required',
            'scheme_name' => 'required_if:government_scheme,true',
            'personal_toilet' => 'required',
            'home' => 'required',
            'need_goods' => 'required',
            'divyang_goods' => 'required_if:need_goods,true',
        ]);
        $this->stepTwoSuccess = true;
        $this->step = 3;
    }

    public function storeStep3()
    {
        $this->validate([
            'is_employeed' => 'required',
            'occupation' => 'required_if:is_employeed,1',
            'bpl_apl' => 'required',
            'income' => 'required',
            'spouse_income' => 'required',
        ]);
        $this->stepThreeSuccess = true;
        $this->step = 4;
    }

    public function storeStep4()
    {
        $this->validate([
            'identity_proof_id' => 'required',
            // 'identity_proof_photo' => 'required',
            'tin' => 'required',
            'aadhar' => 'required',
            // 'password' => 'required',
            'i_agree_share_aadhar' => 'required',
            'i_agree_tc' => 'required'
        ],[
            'identity_proof_id.required' => 'Please select identity proof.',
        ]);
        //Store data and create user
        $divyang = Divyang::findOrFail($this->divyang->id);

        if(!empty($this->photo)){
            $divyang->photo = $this->photo->store('photos', 'public');
        }
        if(!empty($this->signature)){
            $divyang->signature = $this->signature->store('signature', 'public');
        }
        if(!empty($this->address_proof_doc)){
            $divyang->address_proof_doc = $this->address_proof_doc->store('address_proof_doc', 'public');
        }
        if(!empty($this->certificate_image)){
            $divyang->certificate_image = $this->certificate_image->store('certificate_image', 'public');
        }
        if(!empty($this->identity_proof_photo)){
            $divyang->identity_proof_photo = $this->identity_proof_photo->store('identity_proof_photo', 'public');
        }

        $divyang->first_name = $this->first_name;
        $divyang->middle_name = $this->middle_name;
        $divyang->surname = $this->surname;
        $divyang->father_name = $this->father_name;
        $divyang->mother_name = $this->mother_name;
        $divyang->date_of_birth = date('Y-m-d', strtotime($this->date_of_birth));
        $divyang->gender = $this->gender;
        $divyang->phone = $this->mobile_number;
        $divyang->email = $this->email_id;
        $divyang->mark_of_identification = $this->identification_mark;
        $divyang->religion_id = $this->religion;
        $divyang->caste_id = $this->caste;
        $divyang->blood_group = $this->blood_group;
        $divyang->marital_status = $this->marital_status;
        $divyang->relation_with_pwd = $this->relation_with_pwd;
        $divyang->guardian_name = $this->guardian_name;
        $divyang->guardian_contact = $this->guardian_contact;
        $divyang->state_id = $this->state;
        $divyang->district_id = $this->district;
        $divyang->local_gov_institution = $this->local_gov_institution;
        $divyang->address_line_1 = $this->address_line_1;
        $divyang->address_line_2 = $this->address_line_2;
        $divyang->address_line_3 = $this->address_line_3;
        $divyang->taluka_id = $this->taluka;
        $divyang->village_id = $this->village;
        $divyang->mahanagarpalika_id = $this->mahanagarpalika;
        $divyang->zone_id = $this->zone;
        $divyang->mahanagarpalika_ward_number_id = $this->mahanagarpalika_ward;
        $divyang->nagarparishad_id = $this->nagarparishad;
        $divyang->nagarparishad_ward_number_id = $this->nagarparishad_ward;
        $divyang->pin_code = $this->pin_code;
        $divyang->address_proof = $this->address_proof;
        $divyang->education = $this->education;
        $divyang->account_no = $this->account_no;
        $divyang->ifsc = $this->ifsc;
        $divyang->disability_certificate = $this->disability_certificate;
        $divyang->disability_by_birth = $this->disability_by_birth == 'No' ? false : true;
        $divyang->disability_since = date('Y-m-d', strtotime($this->disability_since));
        $divyang->hospital_treatment = $this->hospital_treatment;
        $divyang->pension_card_no = $this->pension_card_no;
        $divyang->disability_reason_id = $this->disability_reason;
        $divyang->hospital_id = $this->hospital;
        $divyang->st_pass = $this->st_pass;
        $divyang->pass_no = $this->pass_no;
        $divyang->government_scheme = $this->government_scheme;
        $divyang->scheme_name = $this->scheme_name;
        $divyang->personal_toilet = $this->personal_toilet;
        $divyang->home = $this->home;
        $divyang->need_goods = $this->need_goods;
        $divyang->divyang_goods_id = $this->divyang_goods;
        $divyang->other_goods = $this->other_goods;
        $divyang->is_employeed = $this->is_employeed;
        $divyang->occupation_id = $this->occupation;
        $divyang->bpl_apl = $this->bpl_apl;
        $divyang->income = $this->income;
        $divyang->spouse_income = $this->spouse_income;
        $divyang->identity_proof_id = $this->identity_proof_id;
        $divyang->tin = $this->tin;
        $divyang->aadhar = $this->aadhar;
        $divyang->i_agree_share_aadhar = 1;
        $divyang->i_agree = 1;
        if($divyang->save()){
            
            $divyang->disabilityTypes()->syncWithoutDetaching($this->disability_type);

            $divyang->disabilityAreas()->syncWithoutDetaching($this->disability_area);

        }

        return redirect()->route('divyang.index');
    }

    public function moveToStep($step)
    {
        $this->step = $step;
    }

    public function render()
    {
        return view('livewire.divyang.create.edit');
    }
}
