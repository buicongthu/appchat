<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessGroup;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // //lay cac user trong ds tru nguoi dang nhap
        $curentuserid = Auth::id();
        $user = User::whereNotIn('id', [$curentuserid])->get();

        $user1 = Auth::user();
        $conversations = $user1->messgroups;
        $conversations_id = $conversations->pluck('id');

    
        $userConversations = $conversations->map(function ($conversation) use ($user1) {
            $users = $conversation->users;
            $filteredUsers = $users->reject(function ($user) use ($user1) {
                return $user->id === $user1->id;
            });
        
            return [
                'user' => $filteredUsers->first(),
                'conversation_id' => $conversation->id
            ];
        });
 
        return view('home1', compact('user','conversations','userConversations'));
    }
}
