<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
class LoaiTinController extends Controller
{
    public function getDanhSach(){
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
    public function getSua($id){
        $loaitin = LoaiTin::find($id);
        $theloai = TheLoai::all();
        return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postSua(Request $request, $id){
        $this->validate($request,
        [
            'Ten'     => 'required|min:3|max:100|unique:LoaiTin,Ten',
            'TheLoai' => 'required'
        ],
        [
            'Ten.unique'   => 'Tên Loại tin đã tồn tại',
            'Ten.required' => 'Bạn chưa nhập tên Loại Tin',
            'Ten.min'      => 'Bạn cần nhập tên loại tin ít nhất 3 kí tự',
            'Ten.max'      => 'Bạn chỉ nhập tên loại tin nhiều nhất 100 kí tự',
            'TheLoai.required' => "Bạn phải chọn 1 thể loại cho loại tin này"
        ]
        );
        $loaitin = LoaiTin::find($id);
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();
        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa Thành Công !!!');
    }
    public function getThem(){
        $theloai = TheLoai::all();
        return view('admin.loaitin.them',['theloai'=>$theloai]);
    }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'Ten'     => 'required|min:3|max:100|unique:LoaiTin,Ten',
            'TheLoai' => 'required'
        ],
        [
            'Ten.unique'   => 'Tên Loại tin đã tồn tại',
            'Ten.required' => 'Bạn chưa nhập tên Loại Tin',
            'Ten.min'      => 'Bạn cần nhập tên loại tin ít nhất 3 kí tự',
            'Ten.max'      => 'Bạn chỉ nhập tên loại tin nhiều nhất 100 kí tự',
            'TheLoai.required' => "Bạn phải chọn 1 thể loại cho loại tin này"
        ]
        );
        $loaitin = new LoaiTin;
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();
        return redirect('admin/loaitin/them')->with('thongbao','Thêm Thành Công !!!');
    }
    public function getXoa($id){
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Đã Xóa thành công');
    }
}
