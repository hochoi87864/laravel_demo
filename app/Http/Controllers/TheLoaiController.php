<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach(){
        $theloai = TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function postThem(Request $request){
        $this->validate($request,
            [
                'Ten' => 'required|min:3|max:100|unique:TheLoai,Ten'
            ],
            [
                'Ten.unique'   => 'Tên thể loại đã tồn tại',
                'Ten.required' => 'Bạn chưa nhập tên thể loại',
                'Ten.min'      => 'Bạn cần nhập tên thể loại ít nhất 3 kí tự',
                'Ten.max'      => 'Bạn chỉ nhập tên thể loại nhiều nhất 100 kí tự'
            ]
        );
        $theloai      = new TheLoai;
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm Thành Công !!!');

    }
    public function getSua($id){
        $theloai = TheLoai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
        $theloai= TheLoai::find($id);
        $this->validate($request,[
            "Ten" => "required|unique:TheLoai,Ten|min:3|max:300"
        ],[
            'Ten.required' => 'Bạn chưa nhập tên thể loại',
            'Ten.unique'   => 'Tên thể loại đã tồn tại',
            'Ten.min'      => 'Bạn cần nhập tên thể loại ít nhất 3 kí tự',
            'Ten.max'      => 'Bạn chỉ nhập tên thể loại nhiều nhất 100 kí tự'
        ]);
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa thành công !!!');
    }
    public function getThem(){
        return view('admin.theloai.them');
    }
    public function getXoa($id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa thành công !!!');
    }
}
