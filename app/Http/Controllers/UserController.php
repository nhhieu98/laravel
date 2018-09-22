<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function index() {
    	return view('datatable');
    }

    public function list() {
        $user = User::orderBy('id', 'desc');

    	return Datatables::of($user)
    	->addColumn('action', function ($user) {
            return '<a class="btn btn-xs btn-primary" data-id="'. $user->id .'"><i class="glyphicon glyphicon-eye-open"></i> Show</a><a class="btn btn-xs btn-warning" data-id="'. $user->id .'"><i class="glyphicon glyphicon-edit"></i> Edit</a><a class="btn btn-xs btn-danger" data-id="'. $user->id .'"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
        ->editColumn('email', function ($user) {
            return '<a href="mailto: '. $user->email .'">'. $user->email .'</a>';    
            })
        ->rawColumns(['email', 'action'])
    	->toJson(true);
    }

    public function destroy($id) {
        User::find($id)->delete();

        return response()->json([
            'message' => 'Xóa thành công'
        ]);
    }

}
