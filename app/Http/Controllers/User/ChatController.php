<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ChatController extends Controller
{
   public function chat() {
    if(auth()->user()->user_type == 'Employer') {
        $get_chat = JobApplication::where('job_applications.employer_id', auth()->user()->id)
            ->where('job_applications.status', 2)->join('users','job_applications.user_id', 'users.id')->select('job_applications.user_id')->get()->collect()->unique()->toArray();
            
    }else{
        $get_chat = JobApplication::where('job_applications.user_id', auth()->user()->id)
            ->where('job_applications.status', 2)->join('users','job_applications.employer_id', 'users.id')->select('job_applications.employer_id')->get()->collect()->unique()->toArray();
            
    }
    $chat_users['chat_users'] = collect($get_chat)->unique();
    return view('User.Dashboard.chat', $chat_users);
   }
   public function sendMsg( Request $request ){
    // return $request->user_id;
  $data = $request->except('_token');

    $sendMsg = Chat::create($data);
    if($sendMsg) {
        return response()->json([
            'msg' => 'Chat Successfully Sent'
        ]);
    }else {
        return response()->json([
        'msg' => 'Some Error Occur!',
    ]);
    }
   }

public function getmsg($to_user_id){
    $chats = DB::table('chats')
            ->where(function($query) use ($to_user_id){
                $query->where('from_user_id', auth()->id());
                $query->where('to_user_id', $to_user_id);})
            ->orWhere(function($query) use ($to_user_id){
                $query->where('from_user_id', $to_user_id);
                $query->where('to_user_id', auth()->id());})
            ->orderBy('id','asc')->get()->toArray();
    $user_name = DB::table('users')->where('id', $to_user_id)->select('name', 'image')->first();
    $html = '<div class="chat-main-body">
            <div class="chat-main-heading">
                <div class="main-heading-profile">';
                if (isset($user_name->image) && !empty($user_name->image) && File::exists(public_path('storage/image/' . $user_name->image))){
                    $html .= ' <img height="80" width="100" src="'.asset('storage/image/' . $user_name->image).'"
                    alt="no-p_image" class="img-fluid">';
                }else{
                    $html .= '<img src="'.asset('noimg.png').'" alt="no-p_image" class="img-fluid">';
                }
                    
                
            $html .= '<div class="main-heading-title">
                        <p>'.$user_name->name.'</p>
                    </div>
                </div>
            </div>
            <div class="main-body">';
    foreach( $chats as $chat) {
       $first_div =  $chat->from_user_id == auth()->user()->id ? "class = main-body-content" : "class = main-body-content-right";
       $second_div =  $chat->from_user_id == auth()->user()->id ? "class = main-body-right" : "class = main-body-left";
        $html .=
        '<div '.$first_div .'>
            <div '.$second_div.'>
                <p>'.$chat->chat.'</p>
            </div>
        </div>';
    }
   
       
    $html .=
        '</div>
    <div class="chat-bottom" wire:ignore>
        
  
           
            <input type="text" id="chat" placeholder="Enter Message">
            <div class="bottom-icon">
                <ul>
                
                    <li><button onClick="sendMsg('.auth()->id().', '.$to_user_id.')"><i class="fa fa-send-o"></i></button> </li>
                </ul>
            </div>
      
    </div>
</div>';
return $html;
}
}
