@extends('Admin.Main.masterLayout')

@section('title', 'Patients Referrals | Defendable Stuffing Agency')

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
                                                {{-- <div class="align-content-between">
                                                    <h4>Facility Intake Information</h4>
                                                    <div id="editor"></div>
                                                    <button class="btn btn-warning btn-sm float-right mb-3"
                                                        onclick="generatePDF()">Generate PDF</button>
                                                </div> --}}

                                                <div class="table-responsive" id="contentPrint">
                                                    <table class="table table-bordered intakeform">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%">First Name:</td>
                                                                <td class="text-dark">
                                                                    {{ $patientReffarlView->first_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Last Name:</td>
                                                                <td class="text-dark">{{ $patientReffarlView->last_name }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone:</td>
                                                                <td class="text-dark">{{ $patientReffarlView->phone }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email:</td>
                                                                <td class="text-dark">
                                                                    {{ $patientReffarlView->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>POA First Name:</td>
                                                                <td class="text-dark">
                                                                    {{ $patientReffarlView->poa_first_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>POA Last Name:</td>
                                                                <td class="text-dark">
                                                                    {{ $patientReffarlView->poa_last_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>E-mail:</td>
                                                                <td class="text-dark">
                                                                    {{ $patientReffarlView->e_mail }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>POA Phone:</td>
                                                                <td class="text-dark">
                                                                    {{ $patientReffarlView->poa_phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address:</td>
                                                                <td class="text-dark">
                                                                    {{ $patientReffarlView->address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>City:</td>
                                                                <td class="text-dark">
                                                                    {{ $patientReffarlView->city }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>State:</td>
                                                                <td class="text-dark">
                                                                    {{ $patientReffarlView->state }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Zipcode:</td>
                                                                <td class="text-dark">
                                                                    {{ $patientReffarlView->zipcode }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diagnosis:</td>
                                                                <td class="text-dark">
                                                                    {{ $patientReffarlView->diagnosis }}
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $fas_types = explode(',', $patientReffarlView->patientrefferal);
                                                            @endphp
                                                            <tr>
                                                                <td>Type:</td>
                                                                <td class="text-dark">
                                                                    @foreach ($fas_types as $item)
                                                                    {{ $item }},
                                                                @endforeach
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>Complete Plan Care:</td>
                                                                <td class="text-dark">
                                                                    {{ $patientReffarlView->complete_plan_care }}</td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>



                                                <div class="text-center">
                                                    <a href="{{ route('patientReffarlList') }}"
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
{{-- @section('printSection')
    <script>
        function generatePDF() {
        const element = document.getElementById('contentPrint');
        html2pdf()
            .from(element)
            .save('facility-intake-form');

    }
        
    </script>


@endsection --}}
@include('Admin.sweetAlertMsg')
