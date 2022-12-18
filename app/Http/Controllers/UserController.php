<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where("role",0)->paginate();

        return view('admin.user.index', compact('users'));
    }

    public function addToVerif(Request $request){
        $data =  User::where('id',$request['id'])->update([
            'status'=>1,
        ]);

        return redirect('users')->with('status',"Berhasil menambahkan admin");
    }

    public function delToVerif(Request $request){
        $data =  User::where('id',$request['id'])->update([
            'status'=>0,
        ]);

        return redirect('users')->with('status',"Berhasil menjadikan user");
    }

    public function deleteUser(Request $request){
         User::where('id',$request['id'])->delete();

        return redirect('users')->with('status',"Berhasil menghapus user");
    }
}
