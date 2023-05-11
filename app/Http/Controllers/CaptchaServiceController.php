<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaptchaServiceController extends Controller
{
    public function index()
    {
        // return view('index');

        return view('index',[
            'coba' => DB::table('coba')
            ->orderBy('id','desc')
            ->get()
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'phone' => 'required|max:12',
            'alamat' => 'required|max:225',
            'jenis_kelamin' => 'required',
            'email' => 'required|email',
            'captcha' => 'required|captcha'
        ]);

        DB::table('coba')->insert([
            'nama' => $request->nama,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email
        ]);

        return redirect()
            ->route('captchaservice.index')
            ->with('success','Country creared');
    }

    public function edit($id)
    {
        $country = DB::table('coba')->find($id);

        return view('edit',['captchaservice' => $country]);
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'nama' => 'required|max:255',
            'phone' => 'required|max:12',
            'alamat' => 'required|max:225',
            'jenis_kelamin' => 'required',
            'email' => 'required|email',
            'captcha' => 'required|captcha'
        ]);

        DB::table('coba')
                ->where('id',$id)
                ->update([
                    'nama' => $request->nama,
                    'phone' => $request->phone,
                    'alamat' => $request->alamat,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'email' => $request->email
                ]);

        return redirect()
            ->route('captchaservice.index')
            ->with('success','Country updated');
    }

    public function destroy($id)
    {
        DB::table('coba')->where('id',$id)->delete();

        return redirect()
            ->route('captchaservice.index')
            ->with('success','Country deleted');
    }

    public function show($id)
    {
        $country = DB::table('coba')->find($id);

        return view('show',['captchaservice' => $country]);
    }

    public function capthcaFormValidate(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'phone' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email',
            'captcha' => 'required|captcha'
        ]);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('text')]);
    }
}
