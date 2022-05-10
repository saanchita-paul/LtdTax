<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FooterEmployer;
use App\Http\Controllers\Session;
use Validator;
use Illuminate\Support\Str;


class FooterEmployerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $femp = FooterEmployer::where('status',1)->get();
        return view('admin.footer.employer.all_employer',compact('femp'))->with('no', 1); 
    }
    public function add() {
        return view('admin.footer.employer.add_employer');
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'url' => 'url|string|nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $femp = new FooterEmployer;
        $femp->title = $request->title;
        $femp->url = $request->url;
        $femp->save();
        return redirect('/admin/footer/employer')->with('success','Employer option created successfully.');
    }
    public function edit($id) {  
        $femp = FooterEmployer::findOrFail($id);
        return view('admin.footer.employer.edit_employer', compact('femp'));
    }
    public function update(Request $request, $id) {
        $femp = FooterEmployer::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'url' => 'url|string|nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $femp->title = request('title');
        $femp->url = request('url');
        $femp->update();
        return redirect()->to('/admin/footer/employer')->with('success','Employer option updated successfully.');
    }
    public function delete($id) {
        $femp = FooterEmployer::findOrFail($id);
        $femp->status=0;
        $femp->update();  
        return redirect()->to('/admin/footer/employer')->with('success','Employer option deleted successfully.');
    }
}
