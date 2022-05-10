<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $webcontact = Contact::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.webcontact.index', compact('webcontact'))->with('no', 1);
    }
    public function add()
    {

        return view('admin.webcontact.add');
    }
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'name' => 'nullable',
            'email' => 'nullable',
            'subject' => 'nullable',
            'message' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $webcontact = new Contact;
        $webcontact->name = $request->name;
        $webcontact->email = $request->email;
        $webcontact->subject = $request->subject;
        $webcontact->message = $request->message;
        $webcontact->save();
        return redirect()->back()->with('message', 'Your Message has been sent');
    }
    public function edit($id)
    {
        $webcontact = Contact::findOrFail($id);
        return view('admin.webcontact.edit', compact('webcontact'));
    }
    public function update(Request $request, $id)
    {
        $webcontact = Contact::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'nullable',
            'email' => 'nullable',
            'subject' => 'nullable',
            'message' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $webcontact->name = request('name');
        $webcontact->email = request('email');
        $webcontact->subject = request('subject');
        $webcontact->message = request('message');
        $webcontact->update();
        return redirect()->to('/admin/contact')->with('success', 'Contact updated successfully.');
    }
    public function delete($id)
    {
        $webcontact = Contact::findOrFail($id);
        $webcontact->delete();
        return redirect()->to('/admin/contact')->with('success', 'Contact deleted successfully.');
    }
}
