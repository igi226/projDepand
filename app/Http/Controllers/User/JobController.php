<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\JobRequest;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function job()
    {
        $data['topsection'] = DB::table('cms')->where('slug', 'seattle-job-seekers')->first();
        $data['secondsection'] = DB::table('cms')->where('slug', 'the-best-staffing-agency-in-seattle')->first();
        $data['letUs'] = DB::table('cms')->where('slug', 'let-us-help-you-find-your-dream-job')->first();
        $data['weareTrusted'] = DB::table('cms')->where('slug', 'we-are-one-of-the-most-trusted-staffing-agencies-in-seattle')->first();
        return View::make("User.Job.job", $data);
    }
    public function postJob()
    {
        $data["departments"] = DB::table("departments")->get();

        return View::make("User.Dashboard.postJob", $data);
    }

    public function storeJob(JobRequest $request)
    {
        $data = $this->jobData($request);
        $store = DB::table("jobs")->insert($data);

        if ($store) {
            return redirect()
                ->route("employer.postedJobs")
                ->with("msg", $data["title"] . " Added Successfully");
        } else {
            return redirect()
                ->back()
                ->with("msg", "some error occur!");
        }
    }

    

    public function jobData($request)
    {
        $data = $request->except("_token", "cover_image");
        $slug = Str::slug($data["title"]);
        $slug_count = DB::table("jobs")
            ->where("slug", $slug)
            ->count();
        if ($slug_count > 0) {
            $slug = time() . rand(100000, 999999) . "-" . $slug;
        }
        $data["slug"] = $slug;
        if ($request->has("cover_image")) {
            $cover_image = $request->file("cover_image");
            $cover_image_img =
                time() .
                rand(0000, 9999) .
                "." .
                $cover_image->getClientOriginalExtension();

            $cover_image->storeAs("public/JobImage", $cover_image_img);

            $data["cover_image"] = $cover_image_img;
        }
        if ($request->has("job_doc")) {
            $job_doc = $request->file("job_doc");
            $job_doc_img = time() . rand(0000, 9999) . "." . $job_doc->getClientOriginalExtension();
            $job_doc->storeAs("public/JobDoc", $job_doc_img);
            $data["job_doc"] = $job_doc_img;
        }
        $data["employer_id"] = auth()->user()->id;
        return $data;
    }
    public function viewJob($slug)
    {
        $data["job"] = Job::where("slug", $slug)->first();
        return View::make("User.Dashboard.viewJob", $data);
    }
    public function viewJobn($id)
    {
        $data["job"] = Job::where("id", $id)->first();
        return View::make("User.Dashboard.viewJob", $data);
    }
    
    public function editJob($slug)
    {
        $data["job"] = Job::where("slug", $slug)->first();
        $data["s_departments"] = DB::table("departments")
            ->where("id", $data["job"]->department_id)
            ->first();
        $data["departments"] = DB::table("departments")
            ->whereNotIn("id", [$data["job"]->department_id])
            ->get();

        return View::make("User.Dashboard.editJob", $data);
    }

    public function updateJob(JobRequest $request, $slug)
    {
        $data = $this->jobData($request);
        // dd($data);
        $update = Job::where("slug", $slug)->update($data);
        if ($update) {
            return redirect()
                ->route("employer.postedJobs")
                ->with("msg", $data["title"] . " updated Successfully");
        } else {
            return redirect()
                ->back()
                ->with("msg", "some error occur!");
        }
    }
    public function deleteJob(Request $request)
    {
        $job = Job::where("slug", $request->slug)->first();
        //dd($job);
        $job->delete();
        return redirect()
            ->back()
            ->with("msg", $job->title . " Deleted Successfully");
    }
    public function postedJobs(Request $request)
    {
       
        $data['search'] = $request['search'] ?? "";
        // dd($search);
        if($data['search'] != ""){
            $data["postedJobs"] = DB::table("jobs")->where('application_last_date', '>=', date("Y/m/d"))->where('title', 'LIKE', "%{$data['search']}%")->paginate(10);
            // dd($data["postedJobs"]);
        }else{
            $data["postedJobs"] = DB::table("jobs")
            ->where("jobs.employer_id", auth()->user()->id)
            ->paginate(10);
        }

        
            $data["departments"] = DB::table("departments")->get();

        return View::make("User.Dashboard.postedJobs", $data);
    }

    public function allJobs(Request $request)
    {
        $data['search'] = $request['search'] ?? "";
        // dd($search);
        if($data['search'] != ""){
            $data["postedJobs"] = DB::table("jobs")->where('application_last_date', '>=', date("Y/m/d"))->where('title', 'LIKE', "%{$data['search']}%")->paginate(10);
            // dd($data["postedJobs"]);
        }else{
            $data["postedJobs"] = DB::table("jobs")->where('application_last_date', '>=', date("Y/m/d"))->paginate(10);
        }
       
        // ->where('application_last_date', '>', date("Y/m/d"))
        $data["departments"] = DB::table("departments")->get();
        return View::make("User.Dashboard.postedJobs", $data);
    }

    public function applyJob(Request $request)
    {
        $resumee = DB::table('users')->where('id', auth()->id())->select('resume')->first();
        if(!$resumee->resume){
            $request->validate([
                'resume' => 'required'
            ]);
        }
        $data = $request->except("_token", "resume", "resumeold");
        $user_name = DB::table("users")
            ->where("id", $data["sender_id"])
            ->value("name");
        $employer_name = DB::table("users")
            ->where("id", $data["receiver_id"])
            ->value("name");
        $job_name = DB::table("jobs")
            ->where("id", $data["job_id"])
            ->value("title");
        if ($request->has("resume")) {
            File::delete("storage/Resume/" . $request->resumeold);

            $resume = $request->file("resume");
            $Resume_img =
                time() .
                rand(0000, 9999) .
                "." .
                $resume->getClientOriginalExtension();

            $resume->storeAs("public/Resume", $Resume_img);
            User::where("id", auth()->user()->id)->update([
                "resume" => $Resume_img,
            ]);
        }
        $check = JobApplication::where("job_id", $data["job_id"])
            ->where("user_id", $data["sender_id"])
            ->get();
        if (count($check) > 0) {
            return redirect()
                ->back()
                ->with("msg", "You Have Already Applied for This Job");
        } else {
            $apply = JobApplication::create([
                "user_id" => $data["sender_id"],
                "employer_id" => $data["receiver_id"],
                "job_id" => $data["job_id"],
            ]);

            if ($apply) {
                $data[
                    "msg"
                ] = "Hi $employer_name  $user_name Applied for $job_name ";
                //  dd($data);
                $notification = Notification::create($data);
                return redirect()
                    ->route("employee.myApplication")
                    ->with("msg", "Applied Successfully, Wait for Hr Response");
            } else {
                return redirect()
                    ->back()
                    ->with("msg", "Some error Occur");
            }
        }
    }

    public function myApplication()
    {
        $data["myApplications"] = DB::table("job_applications")
            ->where("job_applications.user_id", auth()->user()->id)
            ->join("jobs", "job_applications.job_id", "jobs.id")
            ->join("users", "job_applications.user_id", "users.id")
            ->select(
                "users.company_name",
                "jobs.title",
                "jobs.employer_id",
                "job_applications.job_id",
                "job_applications.employer_id",
                "job_applications.user_id",
                "job_applications.status",
                "job_applications.id",
            )
            ->get();
        // dd($data);
        // $data['totalApplications'] = DB::table('')->where('job_id', $data['myApplications']['job_id'])->count();
        return view("User.Dashboard.myApplication", $data);
    }
    public function applicantList()
    {
        $data["applicants"] = DB::table("job_applications")
            ->where("job_applications.employer_id", auth()->user()->id)
            ->join("users", "job_applications.user_id", "users.id")
            ->join("jobs", "job_applications.job_id", "jobs.id")
            ->select(
                "users.name",
                "users.resume",
                "users.slug",
                "job_applications.created_at",
                "jobs.title",
                "job_applications.status",
                "job_applications.job_id",
                "job_applications.employer_id",
                "job_applications.user_id",
                "job_applications.id"
            )
            ->get();
        $data["jobs"] = DB::table("jobs")
            ->where("employer_id", auth()->user()->id)
            ->get();
        return view("User.Dashboard.applicantList", $data);
    }
    public function viewApplicant($slug) {
        $data['applicantProfile'] = User::where('slug', $slug)->first();
        return view('User.Dashboard.applicantProfile', $data);
    }

    public function getApplicantByJob(Request $request)
    {
        $applicant_list_by_job = DB::table("job_applications")
            ->where("job_id", $request->job_id)
            ->join("users", "job_applications.user_id", "users.id")
            ->join("jobs", "job_applications.job_id", "jobs.id")
            ->select(
                "users.name",
                "users.resume",
                "job_applications.created_at",
                "jobs.title",
                "job_applications.status",
                "job_applications.job_id",
                "job_applications.employer_id",
                "job_applications.user_id",
                "job_applications.id"
            )
            ->get();
        $html = ' <table class="table ">
       <thead class="">
      <tr>
          <th>Applicant Name</th>
          <th>Resume</th>
          <th>Job Name</th>
          <th>Date of Apply</th>
          <th>Approvd</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>';
        foreach ($applicant_list_by_job as $item) {
            if ($item->status == 0) {
                $status = "Pending";
                $option = ' <option value="0" hidden >Pending</option>
                <option value="1" >View</option>
                <option  value="2" >Shortlist</option>';
            } elseif ($item->status == 1) {
                $status = "Viewed";
                $option = ' <option value="0"  >Pending</option>
                <option value="1" hidden >View</option>
                <option  value="2" >Shortlist</option>';
            } else {
                $status = "Shortlisted";
                $option = ' <option value="0"  >Pending</option>
                <option value="1"  >View</option>
                <option  value="2" hidden >Shortlist</option>';
            }

            $html .=
                ' <tr>
                <td>
                  <div class="row">
                    <div class="overflow col-md-8 col-sm-8 p-l">
                      <div class="text-shorting">
                        <h1>' .$item->name .'</h1>
                      </div>
                    </div>
                  </div>
                </td>
                <td style="vertical-align: text-top;">
                  <h1> <a href="' .  asset(" storage/Resume/" . $item->resume) . '" target="_blank" rel="noopener noreferrer">Click to Download</a></h1>
                </td>
                <td>
                  <div class="row">
                    <div class="overflow col-md-8 col-sm-8 p-l">
                      <div class="text-shorting">
                        <h1>' . $item->title . '</h1>
                      </div>
                    </div>
                  </div>
                </td>
                <td style="vertical-align: text-top;">
                  </i>' . \Carbon\Carbon::parse($item->created_at)->format( "D, d M Y H:i" ) . ' 
                <td>
                  <select name="status" class="form-control" id="{{ $item->id }}" onchange="GetSelectedTextValue(this,' . $item->id . " , " . $item->job_id . " , " . $item->user_id . " , " . $item->employer_id . ')">
                    <option value="' .$item->status . '">' .$status . '</option>
                    ' . $option . '
                  </select>
                </td>
                <td style="vertical-align: text-top;">
                  <a href="javascript:void(0);" class="btn btn-danger btn-sm text-white">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>';
        }

        $html .= " </tbody>  </table>";

       
        return response()->json([
            "msg" => $html,
        ]);
    }

    public function applicantChangeS(Request $request)
    {
        $data["receiver_id"] = $request->user_id;
        $data["sender_id"] = $request->employer_id;
        $data["job_id"] = $request->job_id;
        if ($request->status == 0) {
            $application_status = "Pending";
        } elseif ($request->status == 1) {
            $application_status = "Viewed";
        } else {
            $application_status = "Shortlisted";
        }
        // $user_name = DB::table('users')->where('id', $data['user_id'])->value('name');
        $employer_name = DB::table("users")
            ->where("id", $data["sender_id"])
            ->value("name");
        $job = DB::table("jobs")
            ->where("id", $data["job_id"])
            ->value("title");
        $data[
            "msg"
        ] = "Your $job's Aplication Status is  $application_status by $employer_name ";
        $status = DB::table("job_applications")
            ->where("id", $request->id)
            ->update(["status" => $request->status]);

        if ($status) {
            Notification::create($data);
            return response()->json([
                "msg" => "Application Is Approved.",
                "status" => 1,
            ]);
        } else {
            return response()->json([
                "msg" => "Some Error Occur!",
                "status" => 0,
            ]);
        }
    }

    public function sotilistedApplication()
    {
        $data["sortlisted"] = DB::table("job_applications")
            ->where("job_applications.user_id", auth()->user()->id)
            ->where("job_applications.status", 2)
            ->join("users", "job_applications.user_id", "users.id")
            ->join("jobs", "job_applications.job_id", "jobs.id")
            ->select(
                "job_applications.updated_at",
                "job_applications.employer_id",
                "jobs.title",
                "users.company_name",
                "users.phone"
            )
            ->get();
        return view("User.Dashboard.shortlisted", $data);
    }

    public function notifications()
    {
        // if(auth()->user()->user_type == 'Employer'){
        // dd(auth()->user()->user_type);
        $data["notifications"] = DB::table("notifications")
            ->where("receiver_id", auth()->user()->id)
            ->get();

        // }else {

        //    $data['notifications'] = DB::table('notifications')->where('user_id', auth()->user()->id)->get();
        // }
        return view("User.Dashboard.notifications", $data);
    }

    public function deleteNotifications($id) {
      
      Notification::findOrFail($id)->delete();
      return response()->json([
         'status' =>1,
         'msg' =>'The Notification is Deleted Succesfully'
      ]);
    //   return redirect()->back()->with('msg', 'The Application Is Deleted Successfully');

    }

    function addToFavorite( Request $request ) {
        $if_exxist = DB::table('favorite_jobs')->where('job_id', $request->job_id)->where('user_id', $request->user_id)->first();
        if( $if_exxist ) {
            return response()->json([
                'msg' => 'You Have Already Added It'
            ]);
        }else{
            $data = $request->except('_token');
            $store = DB::table('favorite_jobs')->insert($data);
            if($store){
                return response()->json([
                    'msg' => 'Successfully Addedd to favorite'
                ]);
            }else{
                return response()->json([
                    'msg' => 'Some Error ocur'
                ]);
            }
           
        }       
    }

    function favouriteJobs(){
       
        $data['favouriteJobs'] = DB::table('favorite_jobs')->join('jobs','favorite_jobs.job_id', 'jobs.id')->select('jobs.title', 'jobs.id', 'jobs.employer_id', 'jobs.number_of_post', 'jobs.application_last_date', 'jobs.created_at')->get();
        
        return view('User.Dashboard.favoriteJob', $data);
    }

    public function applicantDelete($id) {
        $delete = JobApplication::findOrFail($id);
        $delete->delete();
        return back()->with('msg', 'The Application Is Deleted Successfully');
    } 
    public function myApplicationDelete($id) {
      $this->applicantDelete($id);
      return back()->with('msg', 'The Application Is Deleted Successfully');

    } 
    
    public function getJobByIndustry( $slug ) {
       $data = DB::table('jobs')->where('department_id', $slug)->get();
        $html = '';
       foreach( $data as $job) {
            $html .= '<tr>
            <td>#</td>
            <td>'.$job->title .'  </td>
            <td>'.$job->number_of_post.'</td>
            <td>'.DB::table('job_applications')->where('job_id', $job->id)->count().'</td>
            <td>'.\Carbon\Carbon::parse($job->created_at)->format('D, d M Y H:i').'</td>
            <td>'.\Carbon\Carbon::parse($job->application_last_date)->format('D, d M Y H:i').'</td>

            <td>
            <a href="'. route('employer.viewJob', $job->slug) .'" class="btn btn-xs  btn-primary text-white"><i
                                    class="fa fa-eye"></i></a>';
            if (auth()->user()->user_type == 'Employer'){
                $html .='<a href="'.route('employer.editJob', $job->slug).'" class="btn btn-xs  btn-secondary text-white"><i
                class="fa fa-edit"></i></a>
                <form method="POST" action="'.route('employer.deleteJob', $job->slug).'"
                class="action-icon d-inline-block ">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-xs  btn-danger text-white  btn-flat delete_confirm " data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o font-size-18 "></i></button>
            </form> ';
                
            }
           
            $html .= '</td></tr>';   
              
       }
       
             
       return response()->json([
          'msg' => $html
       ]);
    }
}
