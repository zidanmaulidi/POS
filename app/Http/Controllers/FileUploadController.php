<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function FileUpload()
    {
        return view('file-upload');
    }
    public function prosesFileUpload(Request $request)
    {
        //dump($request->berkas);
        // if ($request->hasFile('berkas')) {
        //     echo "path(): " . $request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): " . $request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): " . $request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): " . $request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): " . $request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): " . $request->berkas->getSize();
        // } else {
        //     echo "tidak ada berkas diupload";
        // }
        $request->validate([
            'berkas' => 'required|file|image|max:5000',
            'nama' => 'required|string|max:255'
        ]);
        $exfile = $request->berkas->getClientOriginalName();
        $NameFile = $request->nama . '_' . time();
        $path = $request->berkas->storeAS('public', $NameFile);
        $pathbaru = asset('storage/' . $NameFile);
        echo  "berhasil di upload file berada di : <a href=\"$pathbaru\">$NameFile </a> <br>";
        echo  "<img src=\"$pathbaru\" alt=\"\" style=\"width: 100px; height: auto;\">";
    }
}
