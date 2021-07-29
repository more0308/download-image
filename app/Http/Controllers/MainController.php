<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        $data = DB::table('files')
            ->limit(10)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('welcome', ['data'=>$data]);
    }
    public function store(Request $request)
    {
        $name = md5(microtime() . rand(0, 9999)).$request->file('name')->getClientOriginalName();
        $file = new File(array('name'  => $name));
        $file->save();
        Storage::putFileAs('public', $request->file('name'), $name);
        return redirect()->route('home')->with('info', 'Файл успешно загружен');
    }
    public function download($name)
    {
        return Storage::download('public/'.$name);
    }
    public function delete($name)
    {
        DB::table('files')
            ->where('name',$name)
            ->delete();
        Storage::delete('public/'.$name);
        return redirect()->route('home')->with('info', 'Файл успешно удалён');
    }
}
