<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Todo;

class TodoController extends Controller
{
  public $restful = true;

  public function getIndex() {
    $todos = Todo::all();
    return view("index")
      ->with("todos", $todos);
  }

  public function postAdd(Request $request) {
    dd($request->all());
    // if (Request::ajax) {
      // $todo = new Todo();
      // $todo->title = Input::get("title");
      // $todo->save();
      // $last_todo = $todo->id;
      // $todos = Todo::whereId($last_todo)->get();
      // return view("ajaxData")->with("todos", $todos);
    // }
  }

  public function postUpdate($id) {
    if (Request::ajax) {
      $task = Todo::find($id);
      $task->title = Input::get("title");
      $task->save();
      return "OK";
    }
  }
}
