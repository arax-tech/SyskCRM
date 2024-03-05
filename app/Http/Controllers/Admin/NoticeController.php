<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notice;
use App\University;

class NoticeController extends Controller
{
    public function index()
    {
        error_reporting(0);
        Check('NoticeView');
        $notices = Notice::get();
        $universities = University::get();
        return view('admin.notice.index', compact('notices', 'universities'));
    }


    public function store(Request $request)
    {
        Check('NoticeCreate');
        // dd($request->all());
        $notice = new Notice();
        $notice->university_id = $request->university_id;
        $notice->title = $request->title;
        $notice->date = $request->date;
        $notice->save();
        return redirect()->back()->with('flash_message_success','Notice Create Successfully...');
    }

    public function update(Request $request, $id)
    {
        Check('NoticeUpdate');
    	// dd($request->all());
        $notice = Notice::find($id);
        $notice->university_id = $request->university_id;
        $notice->title = $request->title;
        $notice->date = $request->date;
        $notice->save();
        return redirect()->back()->with('flash_message_success','Notice Update Successfully...');
    }






    public function delete($id)
    {
        Check('NoticeDelete');
        Notice::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Notice Delete Successfully...');
    }

}
