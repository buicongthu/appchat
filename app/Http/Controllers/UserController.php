<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageEvent;
use App\Models\mess_group;
use App\Models\Message;
use App\Models\MessGroup;
use App\Models\User;
use App\Models\user_group;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    //
    public function sendMessage(Request $request)
    {

        // $message = $request->input('message');
        // $user = $request->user();
        // event(new ChatMessageEvent($message, $user));
        $user = Auth::user();
        $senderId = Auth::id();
        $content = $request->content;

        if ($request->has('id_receiver')) {
            # code...
            $receiverId = $request->id_receiver;

            $conversation = MessGroup::whereHas('users', function ($query) use ($receiverId) {
                $query->where('users.id', $receiverId);
            })->whereHas('users', function ($query) use ($senderId) {
                $query->where('users.id', $senderId);
            })->first();

            // Cuộc trò chuyện đã tồn tại
            if ($conversation) {

                $message = new Message();
                $message->content = $content;
                $message->conversation_id = $conversation->id;
                $message->sender_id = Auth::id();
                // $message->save();
                event(new ChatMessageEvent($content, $user));
            } else // Cuộc trò chuyện không tồn tại
            {
                $messgroup = new MessGroup();
                $messgroup->save();
                $messgroup->users()->attach($receiverId);
                $messgroup->users()->attach($senderId);

                $message = new Message();
                $message->content = $content;
                $message->conversation_id = $messgroup->id;
                $message->sender_id = Auth::id();

                // $message->save();
                event(new ChatMessageEvent($content, $user));
            }
        } elseif ($request->has('id_conversation')) {
            # code...
            $conversation_id = $request->id_conversation;
            $message = new Message();
            $message->content = $content;
            $message->conversation_id = $conversation_id;
            $message->sender_id = Auth::id();
            // $message->save();
            event(new ChatMessageEvent($content, $user));
            // dd(  event(new ChatMessageEvent($content, $user)));


        }
    }

    public function getMess(Request $request)
    {

        $receiverId = $request->id_receiver;
        $senderId = Auth::id();
        $id = $request->id_conversation;


        $conversation = MessGroup::whereHas('users', function ($query) use ($receiverId) {
            $query->where('users.id', $receiverId);
        })->whereHas('users', function ($query) use ($senderId) {
            $query->where('users.id', $senderId);
        })->first();
        // dd($conversation);



        if ($request->has('id_receiver')) {
            
            if ($conversation) {
                # code...
                $messages = Message::where('conversation_id', $conversation->id)->orderBy('created_at', 'asc')->get();
                return response()->json([
                    'messages' => $messages
                ]);
            } else {
                # code...
            }
            
            
            
        } else {
            # code...
            $messages = Message::where('conversation_id', $id)->orderBy('created_at', 'asc')->get();
            return response()->json([
                'messages' => $messages
            ]);
        }

        // $messages = Message::where('conversation_id', $id)->orderBy('created_at', 'asc')->get();
        // return response()->json([
        //     'messages' => $messages
        // ]);
    }

    public function create_group(Request $request)
    {
        
    }
}
