<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use App\Models\CareService;
use App\Models\FacilityIntakeForm;
use App\Models\Package;
use App\Models\RequestTalent;
use App\Models\SubmitResume;
use App\Models\Terms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    
    public function index()
    {
        $data['packages'] = DB::table('packages')->get();
        return view('Admin.Packages.index', $data);
    }

    
    public function create()
    {
        return view('Admin.Packages.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required|string',
            'package_features' => 'required|string',
            'package_type'  => 'required|string',
            // 'package_price'  => 'required|string',
        ]);
        $data = $request->except('_token');
        $slug = Str::slug($data['package_name']);
       $slug_count = DB::table('packages')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().rand(100000, 999999).'-'.$slug;
        } 
       $data['slug'] = $slug;
        $store = Package::create($data);
        if ($store) {
            return redirect()->route('packages.index')->with('msg', $data['package_name'].' Created Successfully');
        } else {
            return redirect()->back()->with('msg',' Some Error Occur!');

        }

    }

    
    public function show($slug)
    {
        
    }

   
    public function edit($slug)
    {
        $data['package'] = Package::where('slug', $slug)->firstOrFail();
        return view('Admin.Packages.edit', $data);
    }

    
    public function update(Request $request, $slug)
    {
        $request->validate([
            'package_name' => 'required|string',
            'package_features' => 'required|string',
            'package_type'  => 'required|string',
            'package_price'  => 'required|string',
        ]);
        $data = $request->except('_token', '_method');
        $update = Package::where('slug', $slug)->update($data);
        if ($update) {
            return redirect()->route('packages.index')->with('msg', $data['package_name'].' Updated Successfully');
        } else {
            return redirect()->back()->with('msg',' Some Error Occur!');

        }
    }

    
    public function destroy($slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();
        $package->delete();
        return redirect()->back()->with('msg', $package->package_name. " Deleted Successfully");

    }

    public function changePS3( Request $request) {
        //  dd($request->all());
    $package = DB::table('packages')->where('slug', $request->slug)->update(['status' => $request->status]);
    if($package) {
        return response()->json([
            'status' => 1,
            'msg' => 'Status Successfully Updated'
        ]);
    }else{
        return response()->json([
            'status' => 0,
            'msg' => 'Error'
        ]);
    }
    
    
    }

    public function termsGet() {
        $data['terms'] = Terms::where('slug', 'terms')->first();
        return view('Admin.terms', $data);
    }

    public function terms( Request $request) {
        $request->validate([
            'terms' => 'required|string'
        ]);
        Terms::where('slug', "terms")->update([
            'terms' =>$request->terms
        ]);
        return back()->with('msg', 'Terms and condition updated successfully. ');
    }

    public function requestServises( )
    {
        $data['requested_services'] = DB::table('care_services')->get();
        return view('Admin.requestedServices', $data);
    }
    public function requestServisesDelete($id)
    {
        CareService::find($id)->delete();
        return back()->with('msg', 'The requested query deleted successfully');
    }

    public function requestTalent( )
    {
        $data['requested_talent'] = DB::table('request_talent')->orderBy('id', 'desc')->get();
        return view('Admin.requestTalant', $data);
    }

    public function requesttalentDelete($id)
    {
        RequestTalent::find($id)->delete();
        return back()->with('msg', 'The requested query deleted successfully');
    }
    public function requestTalentView($id )
    {
        $data['requested_talent'] = DB::table('request_talent')->where('id', $id)->first();
        return view('Admin.requestTalantView', $data);
    }

    public function requestresume( )
    {
        $data['submit_resumes'] = DB::table('submit_resumes')->join('users', 'submit_resumes.user_id', '=', 'users.id')->select('submit_resumes.*', 'users.name AS u_name')->get();
        return view('Admin.submit_resumes', $data);
    }
    
    public function requestResumeDelete($id)
    {
        SubmitResume::find($id)->delete();
        return back()->with('msg', 'The information with resume has deleted successfully');
    }

    public function requestFacility() {
        $data['requestFacility'] = FacilityIntakeForm::join('users', 'facility_intake_forms.user_id', '=', 'users.id')->select('facility_intake_forms.*', 'users.name AS u_name')->get();
        return view('Admin.requestFacility', $data);
    }
    
    public function requestFacilityDelete($id)
    {
        FacilityIntakeForm::find($id)->delete();
        return back()->with('msg', 'The information has deleted successfully');
    }
    

    public function requestFacilityView($id )
    {
        $data['requestFacilityView'] = FacilityIntakeForm::where('facility_intake_forms.id', $id)->join('users', 'facility_intake_forms.user_id', '=', 'users.id')->select('facility_intake_forms.*', 'users.name AS u_name')->first();
        return view('Admin.requestFacilityView', $data);
    }

    public function patientReffarlList() {
        $data['patient_reffeal'] = DB::table('patient_referrals_form')->orderBy('created_at', 'desc')->get();
        return view('Admin.patientReffeal', $data);
    }

    public function patientReffarlDelete($id)
    {
        DB::table('patient_referrals_form')->where('id',$id)->delete();
        return back()->with('msg', 'The patient referral has been deleted successfully');
    }

    public function patientReffarlView($id )
    {
        $data['patientReffarlView'] = DB::table('patient_referrals_form')->where('id',$id)->first();
        return view('Admin.patientRefferelView', $data);
    }
}
