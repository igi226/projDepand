<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\FacilityIntakeRequest;
use App\Models\FacilityIntakeForm;
use App\Models\SubmitResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class FacilitieController extends Controller
{
    public function facilities() {
        return View::make('User.Facilities.facilities');
    }

    public function resources() {
        return View::make('User.Resources.resources');
    }

    public function submitResume(Request $request) {
        
        $request->validate([
            'name' => 'required|string',
            'email'  => 'required|email',
            'number'  => 'required|string',
            'resume'  => 'required',
           
            'address'  => 'required|string',
            'city'  => 'required|string',
            
            'state'  => 'required|string',
            'country'  => 'required|string',
            'zipcode'  => 'required|numeric',
           
            
        ]);
        // dd("hh");
        $data  = $request->except('_token', 'resume');
        if ($request->has("resume")) {
           

            $resume = $request->file("resume");
            $Resume_img =
                time() .
                rand(0000, 9999) .
                "." .
                $resume->getClientOriginalExtension();

            $resume->storeAs("public/Resume", $Resume_img);
        $data['resume'] = $Resume_img;

        }
        // dd($data);
        $data['user_id'] = auth()->id();
        $store = DB::table('submit_resumes')->insert($data);
        if($store) {
            return redirect('/resources')->with('msg', 'Thanks For Your Time');
        }else {
            return redirect()->back()->with('msg', 'Some Error Occur');

        }
    }

    public function facility_intake_forms(FacilityIntakeRequest $request)  {
        $data = $request->except('_token','facility_type');
        // dd($data);
        $data['facility_type'] = json_encode($request->facility_type);
        $data['user_id'] = auth()->id();
        $store = FacilityIntakeForm::create($data);
        if($store) {
            return redirect('/facilities')->with('msg', 'Thanks For Your Time');
        }else {
            return redirect()->back()->with('msg', 'Some Error Occur');

        }
    }
    

    public function postAjob() {
        return View::make('User.PostJob.postAjob');
    }

    public function patientReferrals() {
        return view('User.PatientRefferel.patientRefferel');
    }

    public function patientReferralsPost( Request $request) {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'poa_first_name' => 'required|string',
            'poa_last_name' => 'required|string',
            'poa_phone' => 'required|numeric',
            'e_mail' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|numeric',
            'diagnosis' => 'required|string',
            'patientrefferal' => 'required',
            'complete_plan_care' => 'required|string',
        ]);
     

        $data = $request->except('_token', 'patientrefferal');
        $data['patientrefferal'] = json_encode($request->patientrefferal);
        $data['created_at'] = date('Y-m-d H:i:s');
        $store = DB::table('patient_referrals_form')->insert($data);
        if($store) {
            return redirect('/patient-referrals')->with('msg', 'Thanks For Your Time');
        }else {
            return redirect()->back()->with('msg', 'Some Error Occur');

        }
        

    }
}
