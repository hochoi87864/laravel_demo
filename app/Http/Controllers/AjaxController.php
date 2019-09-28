<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
class AjaxController extends Controller
{
    //
    public function getLoaiTin($id){
        $loaitin = LoaiTin::where('idTheLoai','=',$id)->get();
        foreach($loaitin as $lt){
            echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
        }
    }
}
