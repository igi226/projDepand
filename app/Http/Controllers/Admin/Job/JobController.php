<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\JobRequest;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::get();
        //dd($jobs->department);
        return View::make('Admin.Job.index')
            ->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = DB::table('departments')->get();
        $data['employers'] = DB::table('users')->where('user_type', 'Employer')->where('status', 1)->whereNotNull('email_verified_at')->get();
        return View::make('Admin.Job.create',$data);
    }

    public function store(JobRequest $request)
    {
        $data = $request->except('_token');
        $slug = Str::slug($data['title']);
        $slug_count = DB::table('jobs')->where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . rand(100000, 999999) . '-' . $slug;
        }
        $data['slug'] = $slug;
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
            $job_doc = $request->file("cover_image");
            $job_doc_img = time() . rand(0000, 9999) . "." . $job_doc->getClientOriginalExtension();
            $job_doc->storeAs("public/JobDoc", $job_doc_img);
            $data["job_doc"] = $job_doc_img;
        }
        // dd($data);
        $store = Job::create($data);
        if ($store) {
            
                return redirect('/admin/jobs')->with("msg", $data['title'] . " Added Successfully");
           
        } else {
            return redirect()->back()->with('msg', 'some error occur!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $jobs = Job::where('slug', $slug)->first();
        return View::make('Admin.Job.view')->with('jobs', $jobs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $jobs['jobs'] = Job::where('slug', $slug)->first();
        $jobs['departments'] = DB::table('departments')->whereNotIn('id', [$jobs['jobs']->department_id])->get();
        // $jobs['specific_employer'] = DB::table('users')->whereNotIn('id', [$jobs['jobs']->employer_id])->first();

        $jobs['employers'] = DB::table('users')->where('user_type', 'Employer')
                                ->where('status', 1)
                                ->whereNotNull('email_verified_at')
                                ->whereNotIn('id', [$jobs['jobs']->employer_id])
                                ->get();
        // dd($jobs);
        return View::make('Admin.Job.edit', $jobs);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, $slug)
    {
        $data = $request->except('_token', '_method', 'files');
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
            $job_doc = $request->file("cover_image");
            $job_doc_img = time() . rand(0000, 9999) . "." . $job_doc->getClientOriginalExtension();
            $job_doc->storeAs("public/JobDoc", $job_doc_img);
            $data["job_doc"] = $job_doc_img;
        }
        $store = Job::where('slug', $slug)->update($data);
        if ($store) {
            return redirect('/admin/jobs')->with("msg", $data['title'] . " Updated Successfully");
        } else {
            return redirect()->back()->with('msg', 'some error occur!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $delete_user = Job::where('slug', $slug)->first();
        $delete_user->delete();
        return redirect()->back()->with('msg', $delete_user->title . ' Deleted Successfully');
    }

    public function jobApplicantList() {
        $data['job_applications'] = JobApplication::with('employee','employer','job')->get();
        return View::make('Admin.Job.applicationList', $data);
    }
}