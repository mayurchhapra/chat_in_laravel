<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chat = Chat::all();
        $user = User::all();
        return view('chat',['chat'=>$chat,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {

        $msg = $req['value'];
        $user = $req['user'];
        
        if($msg != ''){
            

            $chat = new Chat();
            $chat->sender_id = auth()->user()->id;
            $chat->content = $msg;

            $chat->save();
        }
        
        return response()->json(array('msg'=> $msg,'user'=>$user), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        echo "Store of Chat. ";//.$request->input('content');

    }

    public function getChat()
    {
        $chat = Chat::all();
        
        foreach ($chat as $chat)
        {
                if ($chat->sender_id == Auth::User()->id)
                {
                     echo "<div class='row'>
                <div class='col-md-6'></div>
                <div class='col-md-6 '> <pre class='text-left'> $chat->content  </pre></div>
                </div>";
                }
                else
                    echo "<div class='col-md-6'> <pre class='text-left'>$chat->content  </pre></div>";
                

               
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
