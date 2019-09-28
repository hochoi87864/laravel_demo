<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
{
    //
    public function getDanhSach(){
        $user = User::all();
        return view("admin.user.danhsach",['user' => $user]);
    }
    public function getThem(){
        return view("admin.user.them");
    }
    public function postThem(Request $request){
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
        $user->quyen = $request->Role;
        $user->password = bcrypt($request->Password);
        $user->save();
        return redirect('admin/user/them')->with("thongbao","Thêm thành công !!!");
    }
    public function getSua($id){
        $user = User::find($id);
        return view("admin.user.sua",["user"=>$user]);
    }
    public function postSua(Request $request,$id){
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
        $user = User::find($id);
        $user->name = $request->Name;
        $user->email = $request->Email;
        $user->quyen = $request->Role;
        if($request->changePass == "on"){
            $user->password = bcrypt($request->Password);
        }
        $user->save();
        return redirect('admin/user/them')->with("thongbao","Sửa thành công !!!");
    }
    public function getXoa($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with("thongbao","Xóa thành công !!!");
    }
    public function getLogin(){
        return view("admin.login");
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            "email" => "required",
            "password" => "required|min:3|max:32",
        ],[
            "email.required" => "Bạn chưa nhập email !!!",
            "password.min" => "Mật khẩu phải có ít nhất 3 ký tự !!!",
            "password.max" => "Mật khẩu nhiều nhất là 32 ký tự !!!"
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('admin/theloai/danhsach');
        }
        else{
            return redirect('admin/login')->with("thongbao","Đăng nhập không thành công !!!");
        }
    }
    public function getLogout(){
        Auth::logout();
        return view("admin.login");
    }
}
