<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use Illuminate\Support\Facades\Auth;
use App\User;
class PageController extends Controller
{
    public function __construct(){
        $theloai = TheLoai::all();
        view()->share('theloai',$theloai);
        $slide = Slide::all();
        view()->share('slide',$slide);
    }
    public function trangchu(){
        return view('pages.trangchu');
    }
    public function lienhe(){
        return view('pages.lienhe');
    }
    public function loaitin($id){
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin',$id)->paginate(5);
        return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    public function tintuc($id){
        $tintuc = TinTuc::find($id);
        $tinnoibat = TinTuc::where('NoiBat',1)->where('id','!=',$tintuc->id)->take(4)->get();
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->where('id','!=',$tintuc->id)->take(4)->get();
        return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }
    public function getDangNhap(){
        return view('pages.login');
    }
    public function postDangNhap(Request $request){
        $this->validate($request,[
            "email" => "required",
            "password" => "required|min:3|max:32",
        ],[
            "email.required" => "Bạn chưa nhập email !!!",
            "password.min" => "Mật khẩu phải có ít nhất 3 ký tự !!!",
            "password.max" => "Mật khẩu nhiều nhất là 32 ký tự !!!"
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('trangchu');
        }
        else{
            return redirect('dangnhap')->with("thongbao","Đăng nhập không thành công !!!");
        }
    }
    public function dangxuat(){
        Auth::logout();
        return redirect('trangchu');
    }
    public function getNguoidung(){
        return view('pages.nguoidung');
    }
    public function postNguoidung(Request $request){
        $this->validate($request,[
            "Name"  => "required|min:3"
        ],[
            "Name.required" => "Bạn chưa nhập tên !!!",
            "Name.min"  => "Tên người dùng phải nhập 3 ký tự trở lên"
        ]);
        $user = Auth::user();
        $user->name = $request->Name;
        if($request->checkpassword   == "on"){
            $this->validate($request,[
                "Password" => "required|min:3|max:32",
                "RePassword" => "required|same:Password"
            ],[
                "Password.min" => "Mật khẩu phải có ít nhất 3 ký tự !!!",
                "Password.max" => "Mật khẩu nhiều nhất là 32 ký tự !!!",
                "Password.required" => "Bạn chưa nhập password !!!",
                "RePassword.required" => "Bạn chưa nhập password xác nhận !!!",
                "RePassword.same" => "Mật khẩu nhập lại chưa đúng !!!"
            ]);
            $user->password = bcrypt($request->Password);
        }
        $user->save();
        return redirect('nguoidung')->with("thongbao","Sửa thành công !!!");
    }
    public function getDangki(){
        return view("pages.dangki");
    }
    public function postDangki(Request $request){
        $this->validate($request,[
            "Name"  => "required|min:3",
            "Email" => "required|email|unique:users,email",
            "Password" => "required|min:3|max:32",
            "RePassword" => "required|same:Password"
        ],[
            "Name.required" => "Bạn chưa nhập tên !!!",
            "Name.min"  => "Tên người dùng phải nhập 3 ký tự trở lên",
            "Email.required" => "Bạn chưa nhập email !!!",
            "Email.email"   => "Bạn chưa nhập đúng định dạng email !!!",
            "Email.unique" => "Email đã có người đăng kí !!!",
            "Password.min" => "Mật khẩu phải có ít nhất 3 ký tự !!!",
            "Password.max" => "Mật khẩu nhiều nhất là 32 ký tự !!!",
            "Password.required" => "Bạn chưa nhập password !!!",
            "RePassword.required" => "Bạn chưa nhập password xác nhận !!!",
            "RePassword.same" => "Mật khẩu nhập lại chưa đúng !!!"
        ]);
        $user = new User;
        $user->name = $request->Name;
        $user->email = $request->Email;
        $user->quyen = 0;
        $user->password = bcrypt($request->Password);
        $user->save();
        return redirect('dangki')->with("thongbao","Xin chúc mừng, Bạn đã đăng kí thành công !!!");
    }
    public function postTimkiem(Request $request){
        $tukhoa = $request->tukhoa;
        $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->orWhere('NoiDung','like',"%$tukhoa%")->take(30)->paginate(5);
        return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
    }
}
