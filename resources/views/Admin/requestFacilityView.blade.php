@extends('Admin.Main.masterLayout')

@section('title', 'Facility Intake | Defendable Stuffing Agency')

@section('content')

    <style>
        .intakeform tbody tr td {
            text-align: left;
            line-height: 22px;
        }
    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="user-profile">
                        <div class="row">

                            <div class="col-lg-12">


                                <div class="custom-tab user-profile-tab">

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="1">

                                            <div class="basic-information">
                                                <div class="align-content-between">
                                                    <h4>Facility Intake Information</h4>
                                                    <div id="editor"></div>
                                                    <button class="btn btn-warning btn-sm float-right mb-3"
                                                        onclick="generatePDF()">Generate PDF</button>
                                                </div>
                                                
                                                <div class="table-responsive" id="contentPrint">
                                                    <table class="table table-bordered intakeform">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%">Company Name:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->company_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Employer Name:</td>
                                                                <td class="text-dark">{{ $requestFacilityView->u_name }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>EIN Number:</td>
                                                                <td class="text-dark">{{ $requestFacilityView->ein_number }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dun & Bradstreet Number:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->dun_bradstreet_number }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Authorized Company Representative Name and Title:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->auth_company_rep_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->company_phone }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->company_email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Facility Name:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->facility_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->facility_address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->facility_phone }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fax:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->facility_fax }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Website Address:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->facility_website }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Corporate Billing Contact:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->corporate_billing_ocntact }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Billing Address:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->billing_address }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->billing_phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fax:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->billing_fax }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->billing_email }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Facility Billing Contact:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->facility_billing_contact }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Billing Address:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->facility_billing_address }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->facility_billing_phone }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fax:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->facility_billing_fax }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->facility_billing_email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Director of Nursing:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->director_nursing }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->nursing_phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fax:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->nursing_fax }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->nursing_email }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Facility Administrator:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->facility_administrator }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->administrator_phone }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fax:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->administrator_fax }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->administrator__email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Staffing Coordinator:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->staffing_coordinator }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->coordinator_phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fax:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->coordinator_fax }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->coordinator__email }}</td>
                                                            </tr>
                                                            @php
                                                                $fas_types = explode(',', $requestFacilityView->facility_type);
                                                            @endphp
                                                            <tr>
                                                                <td>Email:</td>
                                                                <td class="text-dark">
                                                                    @foreach ($fas_types as $item)
                                                                        {{ $item }},
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nurse Ratio Per Floor:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->nurse_ratio_per_floor }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Aide Ratio Per Floor:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->aide_ratio_per_floor }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Patient Ratio per Floor:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->patient_ratio_per_floor }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>NAC/HHA/MAC 1st Shift:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->nac_first_shift }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>NAC/HHA/MAC 2nd Shift:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->nac_second_shift }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>NAC/HHA/MAC 3rd Shift:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->nac_third_shift }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>RN/LPN/MT 1st Shift:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->rn_first_shift }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>RN/LPN/MT 2nd Shift:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->rn_second_shift }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>RN/LPN/MT 3rd Shift:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->rn_third_shift }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Medical Treatment Shift:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->medical_treatement_shift }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Assisted Living Shift:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->assisted_living_shift }} </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Charge Position Shift:</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->charge_position_shift }} </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Comments or Additional information that DSA should now:
                                                                </td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->comment_additional_info }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Has the Company/Ownership field for bankruptcy within
                                                                    the past 7 years ?</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->is_bankruptcy }} </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Has there been any corporate/ownership change within the
                                                                    past year?</td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->is_corporate_change }} </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Is Company planning any change in ownership within the
                                                                    next year? </td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->is_owner_change }} </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Does the Facility do any Fit Testing? </td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->is_fit_testing }} </td>
                                                            </tr>

                                                            <tr>
                                                                <td>If you have answered Yes to any of the questions above,
                                                                    please provide an explanation below: </td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->disclosure_comment }} </td>
                                                            </tr>

                                                            <tr>
                                                                <td>What type of PPE mask does the Facility Use? </td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->ppe_mask_type }} </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Number of years the Facility has been in operation?
                                                                </td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->facility_operation_year }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>How did the Company hear about Dependable Staffing
                                                                    Agency, LTD? </td>
                                                                <td class="text-dark">
                                                                    {{ $requestFacilityView->how_you_hear }} </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>



                                                <div class="text-center">
                                                    <a href="{{ route('requestFacility') }}"
                                                        class="btn btn-danger btn-sm">Back</a>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('printSection')
    <script>
        function generatePDF() {
        const element = document.getElementById('contentPrint');
        html2pdf()
            .from(element)
            .save('facility-intake-form');

    }
        
    </script>


@endsection
@include('Admin.sweetAlertMsg')
