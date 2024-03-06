<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
//prak js 3
// class UserController extends Controller
// {
//    public function index( $id, $name)
//    {
//        return view('UserView')
//     ->with('id', $id)
//     ->with('name', $name);
//    }
// }

//prak eloquent
// class UserController extends Controller
// {
//    public function index()
//    {
//       //coba akses model UserModel
//       $user = UserModel::all(); // ambil semua data dari tabel m_user
//       return view('user', ['data' => $user]);
//    }
// }
//prak eloquent 2
// Class UserController extends Controller{
//    public function index(){
//       // tambah data user dengan eloquent model
//       $data = [
//          'username' => 'customer-1',
//          'nama' => 'Pelanggan',
//          'password' => Hash::make('12345'),
//          'level_id' => 4
//       ];
//       UserModel::insert($data); //tambahkan data ke tabel m_user
//       //coba akses model UserModel
//       $user = UserModel::all(); // ambil semua data dari tabel m_user
//       return view('user', ['data' => $user]);

//    }
// }
// prak eloquent 3
class UserController extends Controller{
   public function index(){
    
      // $data = [
      //    'nama' => 'Pelanggan Pertama',
      // ];
      // UserModel::where('username','customer-1')->update($data); //update data ke tabel m_user
      //prak 1 js eloquent 
      $data = [
            'level_id' =>2,
            // 'username'=>'manager_dua',
            // 'nama'=>'Manager 2',
            'username'=> 'manager_tiga',
            'nama'=> 'Manager 3',
            'password'=>Hash::make('12345')
         ];
         UserModel::create($data); //tambahkan data ke tabel m_user
    
      //coba akses model UserModel
      $user = UserModel::all(); // ambil semua data dari tabel m_user
      return view('user', ['data' => $user]);
   }
}