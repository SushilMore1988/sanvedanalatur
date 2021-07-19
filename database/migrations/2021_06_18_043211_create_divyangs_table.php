<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivyangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divyangs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('mark_of_identification')->nullable();
            $table->string('religion_id');
            $table->string('caste_id');
            $table->string('blood_group')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('relation_with_pwd')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_contact')->nullable();
            $table->string('photo');
            $table->string('signature');
            $table->foreignId('state_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->string('local_gov_institution');
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('address_line_3')->nullable();
            $table->foreignId('taluka_id')->constrained()->nullable();
            $table->foreignId('village_id')->constrained()->nullable();
            $table->foreignId('mahanagarpalika_id')->constrained()->nullable();
            $table->foreignId('zone_id')->constrained()->nullable();
            $table->foreignId('mahanagarpalika_ward_number_id')->constrained()->nullable();
            $table->foreignId('nagarparishad_id')->constrained()->nullable();
            $table->foreignId('nagarparishad_ward_number_id')->constrained()->nullable();
            $table->string('pin_code')->nullable();
            $table->string('address_proof');
            $table->string('address_proof_doc');
            $table->string('education');
            $table->string('account_no');
            $table->string('ifsc');
            /* 
            * Step 2 Starts
            */
            $table->boolean('disability_certificate');
            $table->string('certificate_image')->nullable();
            $table->boolean('disability_by_birth');
            $table->date('disability_since')->nullable();
            $table->string('hospital_treatment')->nullable();
            $table->string('pension_card_no')->nullable();
            $table->foreignId('disability_reason_id')->constrained()->nullable();
            $table->foreignId('hospital_id')->constrained()->nullable();
            $table->boolean('st_pass')->default(0);
            $table->string('pass_no')->nullable();
            $table->boolean('government_scheme')->default(0);
            $table->string('scheme_name')->nullable();
            $table->boolean('personal_toilet')->default(0);
            $table->boolean('home')->default(0);
            $table->boolean('need_goods')->default(0);
            $table->foreignId('divyang_goods_id')->constrained()->nullable();
            $table->string('other_goods')->nullable();
            /*
            * Step 3 Starts
            */
            $table->boolean('is_employeed');
            $table->foreignId('occupation_id')->constrained()->nullable();
            $table->string('bpl_apl');
            $table->string('income');
            $table->string('spouse_income')->nullable();
            /*
            * Step 4 Starts
            */
            $table->foreignId('identity_proof_id')->constrained()->nullable();
            $table->string('identity_proof_photo');
            $table->string('tin');
            $table->string('aadhar');
            $table->boolean('i_agree_share_aadhar')->default(1);
            $table->boolean('i_agree')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divyangs');
    }
}
