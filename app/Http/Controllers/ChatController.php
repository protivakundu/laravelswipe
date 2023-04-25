<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        

         
    }


    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        
        $chats = Chat::where(["s_id" => Auth::user()->id])->orderBy('created_at', 'DESC')->get();
            
        $visited = [];
        $persons = [];
        
        foreach($chats as $chat) {
            if(!in_array($chat["r_id"], $visited)) {
                $visited[] = $chat["r_id"];
                $persons[] = [
                    "user" => User::where("id", $chat["r_id"])->first(),
                    "lastChat" => $chat 
                ];
            }
        }
        
        return view("dashboard", ["friends" => $persons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function chat()
    {
        return view("chats");

    }

    public function search(Request $request)
    {
        $userfind=User::where("name", $request->name)->get();
        return view("dashboard", ["persons"=>$userfind]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
