<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadRequest;
use App\Models\Message;
use App\Models\Thread;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:users');

    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //modelからテーブルの情報を取得
        $threads = Thread::all();
        return view('threads.thread',compact('threads'));
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
            $thread->thread_title = $request->threadTitle;
            $thread->latest_comment_time = Carbon::now();
            $thread->save();

            $message = new Message();
            // $message->thread_id = $thread->id;
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
        //
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
