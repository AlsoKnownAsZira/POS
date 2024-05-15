<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }
    public function prosesFileUpload(Request $request)
    {
        // dump($request->berkas);
        // $request->hasFile('berkas');
        // // return "Proses file upload";

        //Cek detail file
        // if($request->hasFile('berkas')){
        //     echo "path() ".request()->berkas->path();
        //     echo "<br>";
        //     echo "extension() ".request()->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalName() ".request()->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getMimeType() ".request()->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): ". $request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): ". $request->berkas->getSize();
        // }else{
        //     echo "Tidak ada file yang diupload";
        // }

        //Validasi File
        // $request->validate([
        //     'berkas'=>'required|file|image|max:500'
        // ]);
        // echo $request->berkas->getClientOriginalName()." lolos Validasy";

        //Memindah FIle
        // $request->validate([
        //     'berkas' => 'required|file|image|max:500'
        // ]);
        // $extfile=$request->berkas->getClientOriginalName();
        // $namaFile='web-'.time().".".$extfile;
        // $path = $request->berkas->storeAs('uploads',$namaFile);
        // echo "file berhasil diupload dan berada di: $path";

        //SYMLINK
        // $request->validate([
        //     'berkas' => 'required|file|image|max:500'
        // ]);
        // $extfile=$request->berkas->getClientOriginalName();
        // $namaFile='web-'.time().".".$extfile;
        // $path = $request->berkas->storeAs('public',$namaFile);
        // $pathBaru=asset('storage/'.$namaFile);
        // echo "file berhasil diupload dan berada di: $path";
        // echo "<br>";
        // echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";

        //Move file
        // $request->validate([
        //     'berkas' => 'required|file|image|max:500'
        // ]);
        // $extfile = $request->berkas->getClientOriginalName();
        // $namaFile = 'web-' . time() . "." . $extfile;
        // $path = $request->berkas->storeAs('public', $namaFile);
        // $path = str_replace("\\", "//", $path);
        // echo "Variabel path berisi:$path <br>";


        // $pathBaru = asset('gambar/' . $namaFile);
        // echo "file berhasil diupload dan berada di: $path";
        // echo "<br>";
        // echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";

        $request->validate([
            'berkas' => 'required|file|image|max:500'
        ]);

        $extFile = $request->berkas->getClientOriginalExtension();
        $namaFileInput = $request->input('nama_file');
        $namaFile = $namaFileInput . '.' . $extFile;
        $path = $request->berkas->move('gambar', $namaFile);
        $path = str_replace("\\", "//", $path);
        $pathBaru = asset('gambar/' . $namaFile);

        return view('file-upload', ['pathBaru' => $pathBaru]);
    }
}
