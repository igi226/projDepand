<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacilityIntakeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_name' => 'required|string',
            'ein_number' => 'required|numeric',
            'dun_bradstreet_number' => 'required|numeric',
            'auth_company_rep_name' => 'required|string',
            'company_phone' => 'required|string',
            'company_email' => 'required|email',
            'facility_name' => 'required|string',
            'facility_address' => 'required|string',
            'facility_phone' => 'required|string',
            'facility_fax' => 'required|string',
            'facility_website' => 'required|string',
            'corporate_billing_ocntact' => 'required|string',
            'billing_address' => 'required|string',
            'billing_phone' => 'required|string',
            'billing_fax' => 'required|string',
            'billing_email' => 'required|email',
            'facility_billing_contact' => 'required|string',
            'facility_billing_address' => 'required|string',
            'facility_billing_phone' => 'required|string',
            'facility_billing_fax' => 'required|string',
            'facility_billing_email' => 'required|email',
            'director_nursing' => 'required|string',
            'nursing_phone' => 'required|string',
            'nursing_fax' => 'required|string',
            'nursing_email' => 'required|email',
            'facility_administrator' => 'required|string',
            'administrator_phone' => 'required|string',
            'administrator_fax' => 'required|string',
            'administrator_email' => 'required|email',
            'staffing_coordinator' => 'required|string',
            'coordinator_phone' => 'required|string',
            'coordinator_fax' => 'required|string',
            'coordinator_email' => 'required|email',
            'facility_type' => 'required',
            'nurse_ratio_per_floor' => 'required|string',
            'aide_ratio_per_floor' => 'required|string',
            'patient_ratio_per_floor' => 'required|string',
            'nac_first_shift' => 'required|string',
            'nac_second_shift' => 'required|string',
            'nac_third_shift' => 'required|string',
            'rn_first_shift' => 'required|string',
            'rn_second_shift' => 'required|string',
            'rn_third_shift' => 'required|string',
            'medical_treatement_shift' => 'required|string',
            'assisted_living_shift' => 'required|string',
            'charge_position_shift' => 'required|string',
            'comment_additional_info' => 'required|string',
            'is_bankruptcy' => 'required',
            'is_corporate_change' => 'required',
            'is_owner_change' => 'required',
            'is_fit_testing' => 'required',
            'disclosure_comment' => 'required|string',
            'ppe_mask_type' => 'required|string',
            'facility_operation_year' => 'required|string',
            'how_you_hear' => 'required|string',
        ];
    }
}