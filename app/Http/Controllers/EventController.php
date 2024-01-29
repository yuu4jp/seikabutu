<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function show(){
        return view("calendars.calendar");
    }
    public function create(Request $request, Task $task){
        // バリデーション（eventsテーブルの中でNULLを許容していないものをrequired）
        $request->validate([
            'event_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        
        // 登録処理
        $task->task = $request->input('event_title');
       // $event->event_body = $request->input('event_body');
        $task->start_date = $request->input('start_date');
        $task->end_date = date("Y-m-d", strtotime("{$request->input('end_date')} +1 day")); // FullCalendarが登録する終了日は仕様で1日ずれるので、その修正を行っている
        $task->save();
        
        // カレンダー表示画面にリダイレクトする
        return redirect(route("show"));
    }
    // DBから予定取得
    public function get(Request $request, Task $task){
        // バリデーション
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer'
        ]);

        // 現在カレンダーが表示している日付の期間
        $start_date = date('Y-m-d', $request->input('start_date') / 1000); // 日付変換（JSのタイムスタンプはミリ秒なので秒に変換）
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);

        $tasks = Auth::user()->tasks()->get();
        $event = array();
        
        foreach($tasks as $task){
            if($task->start_date < $end_date && $task->end_date > $start_date){
                $event[] = array(
                    'title' => $task->task,
                    'description' => $task->comment,
                    'start' => $task->start_date,
                    'end' => $task->end_date,
                );
            }
        }

        // 予定取得処理（これがaxiosのresponse.dataに入る）
        // return $task->query()
        //     // DBから取得する際にFullCalendarの形式にカラム名を変更する
        //     ->select(
        //         'id',
        //         'task as title',
        //         'comment as description',
        //         'start_date as start',
        //         'end_date as end',
        //       //  'event_color as backgroundColor',
        //         //'event_border_color as borderColor'
        //     )
        //     // 表示されているカレンダーのeventのみをDBから検索して表示
        //     ->where('task', )
        //     ->where('end_date', '>', $start_date)
        //     ->where('start_date', '<', $end_date) // AND条件
        //     ->get();
        return response()->json($event);
    }
    
}
