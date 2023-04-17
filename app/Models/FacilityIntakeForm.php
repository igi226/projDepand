<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityIntakeForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','company_name',	'ein_number',	'dun_bradstreet_number',	'auth_company_rep_name',	'company_phone',	'company_email',	'facility_name',	'facility_address',	'facility_phone',	'facility_fax',	'facility_website',	'corporate_billing_ocntact',	'billing_address',	'billing_phone',	'billing_fax',	'billing_email',	'facility_billing_contact',	'facility_billing_address',	'facility_billing_phone',	'facility_billing_fax',	'facility_billing_email',	'director_nursing',	'nursing_phone',	'nursing_fax',	'nursing_email',	'facility_administrator',	'administrator_phone',	'administrator_fax',	'administrator_email',	'staffing_coordinator',	'coordinator_phone',	'coordinator_fax',	'coordinator_email',	'facility_type',	'nurse_ratio_per_floor',	'aide_ratio_per_floor',	'patient_ratio_per_floor',	'nac_first_shift',	'nac_second_shift',	'nac_third_shift',	'rn_first_shift',	'rn_second_shift',	'rn_third_shift',	'medical_treatement_shift',	'assisted_living_shift',	'charge_position_shift',	'comment_additional_info',	'is_bankruptcy',	'is_corporate_change',	'is_owner_change',	'is_fit_testing',	'disclosure_comment',	'ppe_mask_type',	'facility_operation_year',	'how_you_hear'
    ];
}
