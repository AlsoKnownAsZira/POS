<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\LevelModel;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserController extends Controller
{
   public function index()
   {

      $breadcrumb     = (object)[
         'title' => 'Daftar User',
         'list' => ['Home', 'User']
      ];

      $page = (object)[
         'title' => 'Daftar User yang terdaftar dalam sistem'
      ];
      $activeMenu = 'user';
      $level = LevelModel::all();
      return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
   }
   public function tambah()
   {
      return view('user_tambah');
   }

   public function tambah_simpan(Request $request)
   {
      UserModel::create([
         'username' => $request->username,
         'nama' => $request->nama,
         'password' => Hash::make($request->password),
         'level_id' => $request->level_id
      ]);
      return redirect('/user');
   }

   public function ubah($id)
   {
      $user = UserModel::find($id);
      return view('user_ubah', ['data' => $user]);
   }

   public function ubah_simpan($id, Request $request)
   {
      $user = UserModel::find($id);

      $user->username = $request->username;
      $user->nama = $request->nama;
      $user->password = Hash::make($request->password);
      $user->level_id = $request->level_id;
      $user->save();
      return redirect('/user');
   }
   public function hapus($id)
   {
      $user = UserModel::find($id);
      $user->delete();

      return redirect('/user');
   }
   // Ambil data user dalam bentuk json untuk datatables
   public function list(Request $request)
   {
      $users = userModel::select(['user_id', 'username', 'nama', 'level_id', 'image'])->with('level');
      return DataTables::of($users)
         ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
         ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
            $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btninfo btn-sm">Detail</a> ';
            $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" 
class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="' .
               url('/user/' . $user->user_id) . '">'
               . csrf_field() . method_field('DELETE') .
               '<button type="submit" class="btn btn-danger btn-sm" 
onclick="return confirm(\'Apakah Anda yakit menghapus data 
ini?\');">Hapus</button></form>';
            return $btn;
         })
         ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
         ->make(true);
   }
   public function create()
   {
      $breadcrumb = (object)[
         'title' => 'Tambah User',
         'list' => ['Home', 'User', 'Tambah']
      ];
      $page = (object)[
         'title' => 'Tambah User Baru'
      ];
      $level = LevelModel::all();
      $activeMenu = 'user';
      return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
   }
   public function store(Request $request)
   {
      $request->merge([
         'image' => $request->file('image')
      ]);
      $request->validate([
         'username' => 'required|string|min:3|unique:m_user,username',
         'nama' => 'required|string|max:100',
         'password' => 'required|string|min:5',
         'level_id' => 'required|integer',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);
      $image = $request->file('image');
      $fileName = $image->hashName();
      $image->move(public_path('gambar'), $fileName);
      userModel::create([
         'username' => $request->username,
         'nama' => $request->nama,
         'password' => bcrypt($request->password),
         'level_id' => $request->level_id,
         'image' => $fileName,
      ]);

      return redirect('/user')->with('success', 'Data user berhasil disimpan');
   }
   public function show(string $id)
   {
      $user = UserModel::with('level')->find($id);

      $breadcrumb = (object)[
         'title' => 'Detail User',
         'list' => ['Home', 'User', 'Detail']
      ];
      $page = (object)[
         'title' => 'Detail User'
      ];
      $activeMenu = 'user';
      return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
   }
   public function edit(string $id)
   {
      $user = userModel::find($id);
      $level = levelModel::all();

      $breadcrumb = (object)[
         'title' => 'Edit User',
         'list' => ['Home', 'User', 'Edit']
      ];

      $page = (object)[
         'title' => "Edit User"
      ];

      $activeMenu = 'user';

      return view('user.edit', [
         'breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user,
         'level' => $level, 'activeMenu' => $activeMenu
      ]);
   }

   public function update(Request $request, string $id)
   {
      $request->merge([
         'image' => $request->file('image')
      ]);
      $request->validate([
         'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
         'nama' => 'required|string|max:100',
         'password' => 'nullable|string|min:5',
         'level_id' => 'required|integer',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);

      $user = userModel::find($id);
      $user->update([
          'username' => $request->username,
          'nama' => $request->nama,
          'password' => $request->password ? bcrypt($request->password) : $user->password,
          'level_id' => $request->level_id,
          'image' => $user->updateImage($request->file('image')),
      ]);

      return redirect('/user')->with('success', 'Data user berhasil diubah');
   }
   public function destroy(string $id)
   {
      $check = userModel::find($id);
      if (!$check) {
         return redirect('/user')->with('error', 'Data user tidak ditermukan');
      }

      try {
         userModel::destroy($id);

         return redirect('/user')->with('success', 'Data user berhasil dihapus');
      } catch (\Illuminate\Database\QueryException $e) {

         return redirect('/user')->with('error', 'Data user gagal dihapus, karena masih terdapat tabel lain yang terkait dengan data ini');
      }
   }
}
