<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    /**
     * show list posts
     *
     * @return view
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * show form add post
     *
     * @return view
     */
    public function getAdd()
    {
        return view('admin.post.add');
    }

    /**
     * add post new
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postAdd(Request $request)
    {
        $messages = [
            'tieude.required' => 'Bạn chưa nhập tiêu đề',
            'tieude.min'      => 'Tiêu đề phải có độ dài 10 - 255 kí tự',
            'tieude.max'      => 'Tiêu đề phải có độ dài 10 - 255 kí tự',
            'tomtat.required'   => 'Bạn chưa nhập nội dung tóm tắt',
            'tomtat.min'        => 'Nội dung tóm tắt phải có độ dài 10 - 255 kí tự',
            'tomtat.max'        => 'Nội dung tóm tắt phải có độ dài 10 - 255 kí tự',
            'noidung.required'  => 'Bạn chưa nhập nội dung',
            'noidung.min'       => 'Nội dung tối thiểu phải có 10 kí tự',
            'file.required'     => 'Chưa chọn hình ảnh',
            'file.image'        => 'Chưa đúng định dạng ảnh',
        ];
        $rules = [
            'tieude'   => 'required|min:10|max:255',
            'tomtat'   => 'required|min:10|max:255',
            'noidung'  => 'required|min:10',
            'file'     => 'required|image',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator       ->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        if ($request->hasFile('file')) {
            $file    = $request->file('file');
            $nameImg = str_random(3)."_".$file->getClientOriginalName();
            while (file_exists("uploads/posts/".$nameImg)) {
                $nameImg = str_random(3)."_".$file->getClientOriginalName();
            }
            $file->move('uploads/posts', $nameImg);
        }

        $idUser               = Auth::user()->id;
        $post                 = new Post;
        $post->tieu_de        = $request->tieude;
        $post->tomtat         = $request->tomtat;
        $post->noidung        = $request->noidung;
        $post->HinhAnh        = $nameImg;
        $post->users_id       = $idUser;
        $post->save();
        return redirect('admin/post/list')->with('thongbao', "Thêm thành công");
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEdit($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            return redirect('admin/post/list')->with('mess', "Không tồn tại bài viết cần sửa");
        }
        return view('admin.post.edit', compact('post'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function postEdit(Request $request, $id)
    {
        $post   = Post::find($id);
        $idUser = Auth::user()->id;

        if (empty($post)) {
            return redirect('admin/post/list')->with('mess', "Không tồn tại bài viết cần sửa");
        }

        $idUserOfPost = $post->users_id;
        if ($idUser == $idUserOfPost || Auth::user()->quyen == 3 || Auth::user()->quyen == 2) {
            $messages = [
                'tieude.required'   => 'Bạn chưa nhập tiêu đề',
                'tieude.min'        => 'Tiêu đề phải có độ dài 10 - 255 kí tự',
                'tieude.max'        => 'Tiêu đề phải có độ dài 10 - 255 kí tự',
                'tomtat.required'   => 'Bạn chưa nhập nội dung tóm tắt',
                'tomtat.min'        => 'Nội dung tóm tắt phải có độ dài 10 - 255 kí tự',
                'tomtat.max'        => 'Nội dung tóm tắt phải có độ dài 10 - 255 kí tự',
                'noidung.required'  => 'Bạn chưa nhập nội dung',
                'noidung.min'       => 'Nội dung tối thiểu phải có 10 kí tự',
                'file.image'        => 'Chưa đúng định dạng ảnh',
            ];
            $rules = [
                'tieude'   => 'required|min:10|max:255',
                'tomtat'   => 'required|min:10|max:255',
                'noidung'  => 'required|min:10',
                'file'     => 'image',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator    ->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // upload image
            $nameImg = '';
            if ($request->hasFile('file')) {
                $file    = $request->file('file');
                $nameImg = str_random(3)."_".$file->getClientOriginalName();
                while (file_exists("uploads/posts/".$nameImg)) {
                    $nameImg = str_random(3)."_".$file->getClientOriginalName();
                }
                unlink("uploads/posts/".$post->hinhanh);
                $file->move('uploads/posts', $nameImg);
            }

            //update post
            DB::beginTransaction();
            try {
                $post->tieu_de        = $request->tieude;
                $post->tomtat         = $request->tomtat;
                $post->noidung        = $request->noidung;

                if (!empty($nameImg)) {
                    $post->hinhanh = $nameImg;
                }

                $post->save();
                DB::commit();
            } catch (Exception $ex) {
                DB::rollback();
                throw $ex;
            }

            return redirect('admin/post/list')->with('thongbao', "Sửa bài viết thành công");
        } else {
            return redirect('admin/post/list')->with('mess', "Không tồn tại bài viết cần sửa");
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $post         = Post::find($id);
        $idUser       = Auth::user()->id;
        $idUserOfPost = $post->user_id;

        if ($idUser == $idUserOfPost || Auth::user()->quyen == 3 || Auth::user()->quyen == 2) {
            unlink("uploads/posts/".$post->hinhanh);
            $post->delete();
            return redirect('admin/post/list')->with('thongbao', "Xóa thành công");
        } else {
            return redirect('admin/post/list')->with('mess', "Không tồn tại bài viết cần xóa");
        }
    }

    /**
     * @param $keyword
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search($keyword) {
        $posts = Post::where('tieu_de', 'like', "%$keyword%")->orWhere('tomtat', 'like', "%$keyword%")->simplePaginate(5);
        return view('admin.post.index', ['posts' => $posts]);
    }
}
