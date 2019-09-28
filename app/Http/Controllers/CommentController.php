<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
use App\TinTuc;
class CommentController extends Controller
{
    public function getXoa($idTinTuc,$id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao','Xóa Comment Thành Công !!!');
    }
    public function binhluan($id, Request $request){
        $tintuc = TinTuc::find($id);
        $comment= new Comment;
        $comment->idUser = Auth::user()->id;
        $comment->idTinTuc = $tintuc->id;
        $comment->NoiDung= $request->binhluan;
        $comment->save();
        return redirect("tintuc/$id/".$tintuc->TieuDeKhongDau.".trungle")->with("thongbao","Bạn đã đăng bình luận");
    }
}
