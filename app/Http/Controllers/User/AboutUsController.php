<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CareService;
use App\Models\Terms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AboutUsController extends Controller
{
    public function aboutUs() {
        $data['about1'] = DB::table('cms')->where('slug', 'the-best-temp-agency-in-federal-way')->first();
        $data['about2'] = DB::table('cms')->where('slug', 'why-choose-us')->first();
        $data['about3'] = DB::table('cms')->where('slug', '30')->first();
        $data['about4'] = DB::table('cms')->where('slug', 'dependable-staffing-agency-is-one-of-the-most-trusted-temp-agencies-in-seattle')->first();
        return View::make('User.AboutUs.aboutUs', $data);
    }

    public function homeCareSol() {
        return View::make('User.AboutUs.homeCareSol');
    }

    public function homeHealthSol() {
        return View::make('User.AboutUs.homeHealthSol');
    }

    public function packages()
    {
        $packages['packages'] = DB::table('packages')->get();
        return view('User.AboutUs.packages', $packages);
    }

    public function conditions() {
        $data['terms'] = Terms::where('slug', 'terms')->first();

        return View::make('User.AboutUs.conditions', $data);
    }

    public function careService ( Request $request ) {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);
        $data = $request->except('_token');
        CareService::create($data);
        return back()->with('msg', 'Service request has sent successfully.');
    }
    
}
