<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\FooterLetUsKnow;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use Validator;
use Illuminate\Support\Str;



class LetUsKnowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $lets_know_us = FooterLetUsKnow::where('status',1)->get();
        return view('admin.footer.lets_know_us.lets_know_us_all',compact('lets_know_us'))->with('no', 1); 
    }
    public function add() {
        return view('admin.footer.lets_know_us.add_lets_know_us');
    }   
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'url' => 'string|url|nullable|max:255', 
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $lets_know_us = new FooterLetUsKnow;
        $lets_know_us->title = $request->title;
        $lets_know_us->url = $request->url;
        $lets_know_us->save();
        return redirect('/admin/footer/letsknowus')->with('success','Option created successfully.');
    }
    public function edit($id) {
        $lets_know_us = FooterLetUsKnow::findOrFail($id);
        return view('admin.footer.lets_know_us.edit_lets_know_us', compact('lets_know_us'));
    }
    public function update(Request $request, $id) {
        $lets_know_us = FooterLetUsKnow::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'url' => 'string|url|nullable|max:255', 
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $lets_know_us->title = request('title');
        $lets_know_us->url = request('url');
        $lets_know_us->update();
        return redirect()->to('/admin/footer/letsknowus')->with('success','Option updated successfully.');
    }
    public function delete($id) {
        $lets_know_us = FooterLetUsKnow::findOrFail($id);
        $lets_know_us->status=0;
        $lets_know_us->update();
        return redirect()->to('/admin/footer/letsknowus')->with('success','Option deleted successfully.');
    }
}