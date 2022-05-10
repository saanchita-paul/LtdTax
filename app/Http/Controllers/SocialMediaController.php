<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\FooterSocialMediaIcon;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use Validator;
use Illuminate\Support\Str;


class SocialMediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $social = FooterSocialMediaIcon::where('status','!=',2)->get();
        return view('admin.footer.social_media_icons.all_social_media_icon',compact('social'))->with('no', 1); 
    }
    public function changeStatus(Request $request)
    {
        $social = FooterSocialMediaIcon::findOrFail($request->social_id);
        $social->status = $request->status;
        $social->save();
        return $social;
    }
    public function add() {
        return view('admin.footer.social_media_icons.add_social_media_icon');
    }
    public function store(Request $request) {     
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:footer_social_media_icons,title',
            'icon_class' => 'required|string|unique:footer_social_media_icons,icon_class',
            'url' => 'url|nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $social = new FooterSocialMediaIcon;
        $social->title = $request->title;
        $social->icon_class = $request->icon_class;
        $social->url = $request->url;
        $social->save();
        return redirect('/admin/footer/social-media-icon')->with('success','Social media icon created successfully.');
    }
    public function edit($id) {
        $social = FooterSocialMediaIcon::findOrFail($id);
        return view('admin.footer.social_media_icons.edit_social_media_icon', compact('social'));
    }
    public function update(Request $request, $id) {
        $social = FooterSocialMediaIcon::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:footer_social_media_icons,title,' . $id,
            'icon_class' => 'required|string|unique:footer_social_media_icons,icon_class,' . $id,
            'url' => 'url|nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $social->title = request('title');
        $social->icon_class = request('icon_class');
        $social->url = request('url');
        $social->update();
        return redirect()->to('/admin/footer/social-media-icon')->with('success','Social media icon updated successfully.');
    }
    public function delete($id) {
        $social = FooterSocialMediaIcon::findOrFail($id);
        $s_title = $social->title;
        $s_t = $s_title.' '.time();
        $s_class = $social->icon_class;
        $s= $s_class.' '.time();
        $social->icon_class=$s;
        $social->title=$s_t;
        $social->status=2;
        $social->update();
        return redirect()->to('/admin/footer/social-media-icon')->with('success','Social media icon deleted successfully.');
    }
}