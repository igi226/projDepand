<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RequestTalent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ClientController extends Controller
{

    public function client()
    {
        $data['topcms'] = DB::table('cms')->where('slug', 'request-talent-for-employer-needs')->first();
        $data['midcms'] = DB::table('cms')->where('slug', 'request-talent-form')->first();
        return View::make('User.Client.client', $data);
    }

    public function requestTalent(Request $request)
    {
        $request->validate([
            'jobfunction' => 'required|string',
            'positiontype' => 'required|string',
            'position_hiring_for'  => 'required|string',
            'email'  => 'required|email',
            'fname'  => 'required|string',
            'lname'  => 'required|string',
            'jobtitle'  => 'required|string',
            'number'  => 'required|string',
            'address'  => 'required|string',
            'city'  => 'required|string',
            
            'state'  => 'required|string',
            'country'  => 'required|string',
            'zipcode'  => 'required|numeric',
            // 'company'  => 'required|string',
            
        ]);
        $data  = $request->except('_token');
        $store = RequestTalent::create($data);
        if($store) {
            return redirect('/client')->with('msg', 'Thanks For Your Request');
        }else {
            return redirect()->back()->with('msg', 'Some Error Occur');

        }
    }
}