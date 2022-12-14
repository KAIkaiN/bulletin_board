<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadRequest;
use App\Models\Message;
use App\Models\Thread;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index()
    {
        //modelからテーブルの情報を取得
        //N + 1 問題を回避（loadの書き方）
        $threads = Thread::orderBy('created_at','desc')->Paginate(5);
        $threads->load('user','message.user');

        //withの書き方
        // $threads = Thread::with('user','message.user')->orderBy('created_at','desc')->Paginate(5);
        return view('threads.thread-all',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.thread');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThreadRequest $request)
    {
        \DB::beginTransaction();
        try{
            $thread = new Thread();
            $thread->user_id = Auth::id();
            $thread->thread_title = $request->threadTitle;
            $thread->latest_comment_time = Carbon::now();
            $thread->save();

            $message = new Message();
            $message->thread_id = $thread->id;
            $message->user_id = Auth::id();
            $message->body = $request->content;
            $message->save();
        } catch (\Exception $error){
            \DB::rollBack();
            \Log::error($error->getMessage());
            return redirect()->route('user.threads.create')->with('message','作成に失敗しました。');
        }
        \DB::commit();

        return redirect()->route('user.threads.create')->with('message','新規スレッドを作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $threads = Thread::find($id);
        return view('threads.response',compact('threads'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
