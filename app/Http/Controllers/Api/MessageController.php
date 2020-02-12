<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Auth;
use DB;

class MessageController extends Controller
{

    public function __construct(){
       
    }
    public function index(){

    }

    public function contanct_message($id){
        $sender_id = Auth::user()->id;
        $receiver_id = $id;

        $messages = Message::where('sender_id', $sender_id)->where('receiver_id', $receiver_id)->get();
        
        return response()->json($messages);
    }


    public function get_message($id){
        $sender_id = Auth::user()->id;
        $receiver_id = $id;

        $messages = DB::select("SELECT 
            m.sender_id, 
            m.receiver_id, 
            m.text_message,
            m.created_at,
            sp.firstname as sender_firstname,
            sp.middlename as sender_middlename,
            sp.lastname as sender_lastname,
            rp.firstname as receiver_firstname,
            rp.middlename as receiver_middlename,
            rp.lastname as receiver_lastname
        from messages as m 
        left outer join users as s on s.id = m.sender_id
        left outer join users as r on r.id = m.receiver_id
        left outer join user_profiles as sp on sp.user_id = s.id
        left outer join user_profiles as rp on rp.user_id = r.id
        where (m.sender_id = $sender_id 
        and m.receiver_id = $receiver_id) 
        OR (m.receiver_id = $sender_id 
        and m.sender_id = $receiver_id) 
        order by m.created_at asc");


        return response()->json($messages);
    }


    public function send_message(Request $request, $id){
        $sender_id = Auth::user()->id;
        $receiver_id = $id;

        $message = Message::create([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'text_message' => $request->text_message,
            'viewed' => 0,
        ]);

        return response()->json();
    }

    public function view_message($sender_id){
        $messages = Message::where('sender_id', $sender_id)->update([
            'viewed' => 1
        ]);

        return response()->json();
    }

    public function get_user_id(){
        $user_id = Auth::user()->id;

        return response()->json($user_id);
    }

    public function new_user_messages(){
        $user_id = Auth::user()->id;
        $messages = Message::where('receiver_id', $user_id)->get()->toArray();
        return response()->json($messages);
    }

    public function user_and_messages(){
        
    }

}
