<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::paginate(5);
    	return view('admin.user.index', compact('users'));
    }

    /**
     * show view add user
     * 
     * @return view
     */
    public function getAdd()
    {
    	return view('admin.user.add');
    }

    /**
     * add new user
     * 
     * @param  Request $request 
     * @return view
     */
    public function postAdd(Request $request)
    {
    	$messages = [
            'txtName.required'     => 'Bạn chưa nhập tên chuyên mục',
            'txtName.max'          => 'Tên chuyên mục phải có độ dài 3 - 100 kí tự',
            'txtName.min'          => 'Tên chuyên mục phải có độ dài 3 - 100 kí tự',
            'txtEmail.required'    => 'Trường email còn trống',
            'txtEmail.unique'      => 'Đã tồn tại email',
            'txtEmail.email'       => 'Không đúng định dạng email',
            'txtPassword.required' => 'Trường mật khẩu không được để trống',
            'txtPassword.min'      => 'Mật khẩu phải có độ dài từ 6 - 60 ký tự',
            'txtPassword.max'      => 'Mật khẩu phải có độ dài từ 6 - 60 ký tự',
            're-password.required' => 'Trường nhập lại mật khẩu còn trống',
            're-password.same'     => 'Mật khẩu nhập lại không trùng',
        ];
        $rules = [
            'txtName'     => 'required|min:3|max:100',
            'txtEmail'    => 'required|unique:users,email|email',
            'txtPassword' => 'required|min:1|max:60',
            're-password' => 'required|same:txtPassword',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        User::addUser($request->txtName, $request->txtEmail, $request->txtPassword, $request->slcRole);
        return redirect('admin/user/list')->with('thongbao', "Thêm thành công");
    }

    /**
     * show view edit user
     * 
     * @param  int $id
     * @return view
     */
    public function getEdit($id)
    {
    	$user = User::find($id);
    	if (empty($user)) {
    		return redirect('admin/user/list')->with('mess', 'Không tồn tại thành viên cần sửa');
    	} else {
    		return view('admin.user.edit', compact('user'));
    	}
    }

    /**
     * edit user
     * 
     * @param  Request $request
     * @param  int  $id
     * @return view
     */
    public function postEdit(Request $request, $id)
    {
    	$user = User::find($id);
    	if (empty($user)) {
            return redirect('admin/user/list')->with('mess', 'Không tồn tại thành viên cần sửa');
        }

        $messages = [
            'txtName.required' => 'Bạn chưa nhập tên người dùng',
            'txtName.max'      => 'Tên người dùng phải có độ dài 3 - 100 kí tự',
            'txtName.min'      => 'Tên người dùng phải có độ dài 3 - 100 kí tự',
        ];
        $rules = [
            'txtName' => 'required|min:3|max:100',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
        try {
            $user->name  = $request->txtName;
            $user->quyen = $request->slcRole;
            if ($request->changePass == 'on') {
                $this->validate($request, [
                        'txtPassword' => 'required|min:6|max:60',
                        're-password' => 'required|same:txtPassword',
                    ],
                    [
                        'txtPassword.required' => 'Trường mật khẩu không được để trống',
                        'txtPassword.min'      => 'Mật khẩu phải có độ dài từ 6 - 60 ký tự',
                        'txtPassword.max'      => 'Mật khẩu phải có độ dài từ 6 - 60 ký tự',
                        're-password.required' => 'Trường nhập lại mật khẩu còn trống',
                        're-password.same'     => 'Mật khẩu nhập lại không trùng',
                    ]);
                $user->password = bcrypt($request->txtPassword);
            }
            $user->save();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            throw $ex;
        }

        return redirect('admin/user/list')->with('thongbao', 'Sửa thành công');
    }

    /**
     * delete Member
     *
     * @param  [int] $id
     * @return view
     */
    public function delete($id) {
        $user = User::find($id);
        if (empty($user)) {
            return redirect('admin/user/list')->with('mess', 'Không tồn tại thành viên cần xóa');
        }
        $post = Post::where('users_id', $id)->count();
        if ($post == 0) {
            $user->delete();
            return redirect('admin/user/list')->with('thongbao', "Xóa thành công");
        } else {
            echo "<script type='text/javascript'>
                alert('Xin lỗi! Bạn phải xóa bài viết của thành viên trước');
                window.location = '";
                    echo route('ds_user');
            echo "'</script>";
        }
    }

    /**
     * search post
     * 
     * @param  Request $request 
     * @return view
     */
    public function search($keyword)
    {
        $users = User::where('name', 'like', "%$keyword%")->orWhere('email', 'like', "%$keyword%")->simplePaginate(5);
        return view('admin.user.index', ['users'=>$users]);
    }

    /**
     * show view login
     *
     * @return view
     */
    public function getLogin() {
        return view('admin.login');
    }

    /**
     * handle login
     * @param  Request $request
     * @return view
     */
    public function postLogin(Request $request) {
        $this->validate($request, [
                'txtTenDangNhap' => 'required',
                'txtMatKhau' => 'required',
            ],
            [
                'txtTenDangNhap.required' => 'Tên đăng nhập không được để trống',
                'txtMatKhau.required' => 'Mật khẩu không được để trống',
            ]);

        if (Auth::attempt(['name' => $request->txtTenDangNhap, 'password' => $request->txtMatKhau, 'status' => 1])) {
            return redirect('admin/home');
        } elseif (Auth::attempt(['name' => $request->txtTenDangNhap, 'password' => $request->txtMatKhau, 'status' => 0])) {
            return redirect('admin/login')->with('error', 'Tài khoản chưa được kích hoạt');
        } else {
            return redirect('admin/login')->with('error', 'Sai tên đăng nhập hoặc mật khẩu');
        }
    }

    /**
     * logout
     *
     * @return view
     */
    public function logout() {
        Auth::logout();
        return redirect('admin/login');
    }
}
