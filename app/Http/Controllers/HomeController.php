<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\ProfileUpdateRequest;
use App\Models\academicInfo;
use App\Models\Cms;
use App\Models\Galary;
use App\Models\User;
use App\Models\UserCompanyHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {

        $data['banner_content'] = Cms::where('slug', 'western-washingtons-staffing-experts')->first();
        return view('User.Index.index', $data);

    }

    public function employerHome()
    {
        return view('User.Dashboard.profile');
    }

    public function employeeHome()
    {
        return view('User.Dashboard.profile');
    }

    public function profileUpdate(ProfileUpdateRequest $request, $slug)
    {


        $data = $request->except('_token', 'addMoreInputFields', 'image', 'company_image_gal', 'addMoreCompaly');
        $img = DB::table('users')->where("slug", $slug)->select('resume', 'company_image', 'image', 'video')->first();

        if ($request->has("company_image_gal")) {
            $image_gal = $request->file("company_image_gal");
            foreach ($image_gal as $image) {
                $company_image_gal =
                    time() .
                    rand(0000, 9999) .
                    "." .
                    $image->getClientOriginalExtension();
                $image->storeAs("public/CompanyImageGalary", $company_image_gal);
                Galary::create(['employer_id' => auth()->id(), 'company_image_gal' => $company_image_gal]);
            }

        }

        if ($request->has("resume")) {

            File::delete("storage/Resume/" . $img->resume);

            $resume = $request->file("resume");
            $resume_img =
                time() .
                rand(0000, 9999) .
                "." .
                $resume->getClientOriginalExtension();

            $resume->storeAs("public/Resume", $resume_img);

            $data["resume"] = $resume_img;
        } else {
            $data["resume"] = $img->resume;
        }
        if ($request->has("image")) {

            File::delete("storage/image/" . $img->image);

            $image = $request->file("image");
            $image_img =
                time() .
                rand(0000, 9999) .
                "." .
                $image->getClientOriginalExtension();

            $image->storeAs("public/image", $image_img);

            $data["image"] = $image_img;
        } else {
            $data["image"] = $img->image;
        }

        if ($request->has("company_image")) {

            File::delete("storage/Company_image/" . $img->company_image);

            $company_image = $request->file("company_image");
            $company_image_img =
                time() .
                rand(0000, 9999) .
                "." .
                $company_image->getClientOriginalExtension();

            $company_image->storeAs("public/Company_image", $company_image_img);

            $data["company_image"] = $company_image_img;
        } else {
            $data["company_image"] = $img->company_image;
        }

        if ($request->has("video")) {

            File::delete("storage/Video/" . $img->video);

            $intro_video = $request->file("video");
            $intro_video_video =
                time() .
                rand(0000, 9999) .
                "." .
                $intro_video->getClientOriginalExtension();

            $intro_video->storeAs("public/Video", $intro_video_video);

            $data["Video"] = $intro_video_video;
        } else {
            $data["Video"] = $img->video;
        }




        $academic_old_data = DB::table('academic_infos')->where('user_id', auth()->user()->id)->get()->count();

        $data2 = $request->addMoreInputFields;
        //from request only last academic info coming thats why in the below line the last element is deleted and new record is inserted
        if ($academic_old_data > 0) {

            if ($data2 != null) {

                unset($data2[current(array_keys($data2))]);
                if (count($data2) > 0) {
                    foreach ($data2 as $new_academic_data) {
                        $new_academic_data['user_id'] = auth()->user()->id;
                        $academic = DB::table('academic_infos')->insert($new_academic_data);
                    }
                }
            }
        } else {
            if ($data2 != null) {
                foreach ($data2 as $new_academic_data) {
                    $new_academic_data['user_id'] = auth()->user()->id;
                    $academic = DB::table('academic_infos')->insert($new_academic_data);
                }
            }
        }
        $data3 = $request->addMoreCompaly;
        $old_company_data = DB::table('user_company_histories')->where('user_id', auth()->id())->get();
        if ($data3 != null) {
            if (!empty($old_company_data)) {
                foreach ($old_company_data as $company_data) {
                    DB::table('user_company_histories')->where('user_id', auth()->id())->delete();
                }
            }

            foreach($data3 as $newCompanyHistory){
                $newCompanyHistory['user_id'] = auth()->id();
                DB::table('user_company_histories')->insert($newCompanyHistory);
            }
        }



        $update = User::where('slug', $slug)->update($data);
        if ($update) {
            return redirect()->back()->with('msg', 'Profile Updated Successfully');
        } else {
            return redirect()->back()->with('msg', 'Some Error Occur!');
        }

    }

    function updateAcademic(Request $request)
    {
        $data = $request->except('_token');
        $update = academicInfo::where('id', $request->id)->update($data);
        if ($update) {
            return response()->json([
                'msg' => 'Information Updated Successfully',
                'status' => 1
            ]);
        } else {
            return response()->json([
                'msg' => 'Error Occur',
                'status' => 0
            ]);
        }
    }

    public function deleteAcademic(Request $request)
    {
        $delete = academicInfo::findOrFail($request->id)->delete();
        if ($delete) {
            return response()->json([
                'msg' => 'Information Deleted Successfully',
                'status' => 1
            ]);
        } else {
            return response()->json([
                'msg' => 'Error Occur',
                'status' => 0
            ]);
        }
    }

    public function updateCompany(Request $request)
    {
        $data = $request->except('_token');
        $update = UserCompanyHistory::where('id', $request->id)->update($data);
        if ($update) {
            return response()->json([
                'msg' => 'Information Updated Successfully',
                'status' => 1
            ]);
        } else {
            return response()->json([
                'msg' => 'Error Occur',
                'status' => 0
            ]);
        }
    }

    public function removeCompany(Request $request)
    {
        $delete = UserCompanyHistory::findOrFail($request->id)->delete();
        if ($delete) {
            return response()->json([
                'msg' => 'Information Deleted Successfully',
                'status' => 1
            ]);
        } else {
            return response()->json([
                'msg' => 'Error Occur',
                'status' => 0
            ]);
        }
    }
    
    
// public function uploadImage( Request $request ) {
//     User::where('id', auth()->id())->update(['image' => $request->image]);
//     return response()->json([
//         'msg' => 'Profule Image Updated Successfully'
//     ]);
// }
}