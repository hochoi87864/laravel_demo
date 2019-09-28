<?php

namespace App\Http\Controllers;
use App\TinTuc;
use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\Comment;
class TinTucController extends Controller
{
    //
    public function getDanhSach(){
        $tintuc = TinTuc::all();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    public function getSua($id){
        $theloai= TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view('admin.tintuc.sua',['theloai'=>$theloai,'loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    public function postSua(Request $request,$id){
        $this->validate($request,
        [
            'TheLoai' => 'required',
            'LoaiTin' => 'required',
            'TieuDe' => 'required|min:3,unique:tintuc,Tieude',
            'TomTat' =>  'required|min:3',
            'NoiDung' =>  'required|min:3'
        ],
        [
            'TheLoai.required' => 'Bạn chưa chọn Thể Loại',
            'LoaiTin.required' => 'Bạn chưa chọn Loại Tin',
            'TieuDe.required' => 'Bạn chưa nhập Tiêu Đề',
            'TieuDe.min' => 'Bạn phải nhập tiêu đề ít nhất 3 kí tự',
            'TieuDe.unique' => 'Tên Tiêu Đề bị trùng',
            'TomTat.required' => 'Bạn Chưa nhập tóm tắt',
            'TomTat.min' => 'Bạn phải nhập tóm tắt ít nhất 3 kí tự',
            'NoiDung.required' => 'Bạn chưa nhập Nội Dung',
            'NoiDung.min' => 'Bạn phải nhập nội dung ít nhất 3 kí tự',
        ]);
        $tintuc =TinTuc::find($id);
        $tintuc->TieuDe= $request->TieuDe;
        $tintuc->TieuDeKhongDau= changeTitle($request->TieuDe);
        $tintuc->TomTat= $request->TomTat;
        $tintuc->NoiDung= $request->NoiDung;
        $tintuc->idLoaiTin= $request->LoaiTin;
        $tintuc->NoiBat = $request->NoiBat;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $name= $file->getClientOriginalNAme();
            $duoi = $file->getClientOriginalExtension();
            echo $duoi;
            if($duoi != 'jpg' && $duoi != 'png' && $duoi !='jpeg'){
                return redirect('admin/tintuc/them')->with('loi','Chỉ được truyền file ảnh đuôi jpg,png,jpeg !');
            }
            $Hinh = str_random(4)."_".$name;
            While(file_exists('upload/tintuc/'.$Hinh)){
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            unlink('upload/tintuc/'.$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;
        }
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa Thành Công !!!');
    }
    public function getThem(){
        $theloai= TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'TheLoai' => 'required',
            'LoaiTin' => 'required',
            'TieuDe' => 'required|min:3,unique:tintuc,Tieude',
            'TomTat' =>  'required|min:3',
            'NoiDung' =>  'required|min:3'
        ],
        [
            'TheLoai.required' => 'Bạn chưa chọn Thể Loại',
            'LoaiTin.required' => 'Bạn chưa chọn Loại Tin',
            'TieuDe.required' => 'Bạn chưa nhập Tiêu Đề',
            'TieuDe.min' => 'Bạn phải nhập tiêu đề ít nhất 3 kí tự',
            'TieuDe.unique' => 'Tên Tiêu Đề bị trùng',
            'TomTat.required' => 'Bạn Chưa nhập tóm tắt',
            'TomTat.min' => 'Bạn phải nhập tóm tắt ít nhất 3 kí tự',
            'NoiDung.required' => 'Bạn chưa nhập Nội Dung',
            'NoiDung.min' => 'Bạn phải nhập nội dung ít nhất 3 kí tự',
        ]);
        $tintuc = new TinTuc;
        $tintuc->TieuDe= $request->TieuDe;
        $tintuc->TieuDeKhongDau= changeTitle($request->TieuDe);
        $tintuc->TomTat= $request->TomTat;
        $tintuc->NoiDung= $request->NoiDung;
        $tintuc->idLoaiTin= $request->LoaiTin;
        $tintuc->NoiBat = $request->NoiBat;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $name= $file->getClientOriginalNAme();
            $duoi = $file->getClientOriginalExtension();
            echo $duoi;
            if($duoi != 'jpg' && $duoi != 'png' && $duoi !='jpeg'){
                return redirect('admin/tintuc/them')->with('loi','Chỉ được truyền file ảnh đuôi jpg,png,jpeg !');
            }
            $Hinh = str_random(4)."_".$name;
            While(file_exists('upload/tintuc/'.$Hinh)){
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh = $Hinh;
        }
        else{
            $tintuc->Hinh = "";
        }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Thêm Thành Công !!!');
    }
    public function getXoa($id){
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa Thành Công !!!');
    }
}
