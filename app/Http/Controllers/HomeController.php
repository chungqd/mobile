<?php

namespace App\Http\Controllers;

use App\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Product;
use App\DonHang;
use App\CTDonHang;
use Cart;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsNew = Product::orderBy('created_at', 'desc')->simplePaginate(10);
        $hotDeal = Product::orderBy('giacu', 'desc')->first();
        $hotProducts = Product::where('giacu', '>=', 9000000)->simplePaginate(8);
        $saleProducts = Product::where('giamoi', '>', 0)->get();
        return view('home', compact('productsNew', 'hotDeal', 'hotProducts', 'saleProducts'));
    }

    public function detailProduct($id)
    {
        $productDetail = Product::getDetailProduct($id);
        $imgDetail = Product::find($productDetail->id)->image;
        $productBrands = Product::where('brands_id', $productDetail->brands_id)->get();
//        dd($productDetail);
        return view('detail', compact('productDetail', 'imgDetail', 'productBrands'));
    }

    public function brandProduct($id)
    {
        $productByBrands = Product::where('brands_id', $id)->paginate(4);
        $nameBrand = Brands::find($id);
//        $countProduct = count($productByBrands);
//        dd($countProduct);
//            $productByBrands = $productByBrands->simplePaginate(4);
//        dd($productByBrands);
        return view('brandProduct', compact('productByBrands', 'nameBrand'));
    }

    public function price($price)
    {
        if ($price == 1) {
            $productByPrices = Product::whereBetween('giacu', [3000000, 5000000])->paginate(4);
            return view('price', compact('productByPrices'));
        } elseif ($price == 2) {
            $productByPrices = Product::whereBetween('giacu', [6000000, 10000000])->paginate(4);
            return view('price', compact('productByPrices'));
        } elseif ($price == 3) {
            $productByPrices = Product::where('giacu', '>', 10000000)->paginate(4);
            return view('price', compact('productByPrices'));
        } else {
            return view('errors.404');
        }
    }

    public function search(Request $request)
    {
        $key = $request->txtSearch;
        $products = Product::where('name', 'like', "%$key%")->paginate(4);
        return view('search', compact('products'));
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email',
                'passwd' => 'required|min:1|max:20',
            ],
            [
                'email.required' => "Vui lòng nhập email",
                'email.email' => "Bạn nhập không đúng định dạng email",
                'passwd.required' => "Vui lòng nhập mật khẩu",
                'passwd.min' => "Mật khẩu tối thiểu 1 kí tự",
                'passwd.max' => "Mật khẩu tối da 20 kí tự",
            ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->passwd, 'status' => 1])) {
            return redirect()->route('home');
        } elseif (Auth::attempt(['email' => $request->email, 'password' => $request->passwd, 'status' => 0])) {
            return redirect('signin')->with('error', 'Tài khoản chưa được kích hoạt');
        } else {
            return redirect('signin')->with('error', 'Sai tên đăng nhập hoặc mật khẩu');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $messages = [
            'email_create.required'    => 'Trường email còn trống',
            'email_create.unique'      => 'Đã tồn tại email',
            'email_create.email'       => 'Không đúng định dạng email',
            'fullname.required'     => 'Bạn chưa nhập tên chuyên mục',
            'fullname.max'          => 'Tên chuyên mục phải có độ dài 3 - 100 kí tự',
            'fullname.min'          => 'Tên chuyên mục phải có độ dài 3 - 100 kí tự',
            'passwd.required' => 'Trường mật khẩu không được để trống',
            'passwd.min'      => 'Mật khẩu phải có độ dài từ 6 - 60 ký tự',
            'passwd.max'      => 'Mật khẩu phải có độ dài từ 6 - 60 ký tự',
            'repasswd.required' => 'Trường nhập lại mật khẩu còn trống',
            'repasswd.same'     => 'Mật khẩu nhập lại không trùng',
        ];
        $rules = [
            'email_create'    => 'required|unique:users,email|email',
            'fullname'     => 'required|min:3|max:100',
            'passwd' => 'required|min:1|max:60',
            'repasswd' => 'required|same:passwd',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user           = new User;
        $user->name     = $request->fullname;
        $user->email    = $request->email_create;
        $user->password = bcrypt($request->passwd);
        $user->quyen    = 1;
        $user->remember_token = $request->_token;
        $user->save();

        $idUser = encrypt($user->id);
        $link = $idUser."/".$user->remember_token;
        $data = ['name' => $request->fullname ,'link' => $link];
        Mail::send('mailActive', $data, function ($message) {
            $message->from('php1608e@gmail.com', 'CHUNG MOBILE');
            $message->to(Input::get('email_create'))->subject('Kích hoạt tài khoản');
        });
        return redirect('register')->with('thongbao', "Vui lòng vào email để kích hoạt tài khoản");
    }

    public function active($id, $authenKey)
    {
        $idUser = decrypt($id);
        $user = User::find($idUser);

        if (empty($user))
        {
            return view('active', ['thongbao' => 'Mã kích hoạt không hợp lệ']);
        }

        if ($authenKey != $user->remember_token)
        {
            return view('active', ['thongbao' => 'Mã kích hoạt không hợp lệ']);
        }

        $timeRegister = strtotime($user->created_at);
        $timeLimit = strtotime('+30 minutes', $timeRegister);
        $today = strtotime("now");
        if($today > $timeLimit)
        {
            return view('active', ['thongbao' => 'Mã kích hoạt đã hết hạn']);
        }


        if($user->status == 1)
        {
            return view('active', ['thongbao' => 'Tài khoản đã được kích hoạt']);
        }
        else
        {
            DB::beginTransaction();
            try {
                $user->status = 1;
                $user->save();
                DB::commit();
            } catch (Exception $ex) {
                DB::rollback();
                throw $ex;
            }
            return view('active', ['thongbao' => "Kích hoạt tài khoản thành công"]);
        }
    }

    public function addCart($id)
    {
        $product = Product::find($id);
        Cart::add(array('id'=>$id, 'name'=>$product->name, 'qty'=>1, 'price'=>$product->giacu, 'options' => array('img'=>$product->hinhanh)));
        $content = Cart::content();
        return redirect()->route('gio-hang');
    }

    public function gioHang()
    {
//        $content = Cart::content();
//        $product = Product::find()
//        $total = Cart::total();
        return view('cart');
    }

    public function delSp($id)
    {
        Cart::remove($id);
        return redirect()->route('gio-hang');
    }

    public function updateSp(Request $request, $id)
    {
        Cart::update($id, $request->quantity);
        return redirect()->route('gio-hang');
    }

    public function getOrder()
    {
        return view('order');
    }

    public function postOrder(Request $request)
    {
        $content = Cart::content();
        if (!$content) {
            return redirect()->route('home');
        }

        $messages = [
            'fullname.required'             => 'Bạn chưa nhập tên',
            'address.min'                  => 'Bạn chưa nhập địa chỉ',
            'email_create.max'                  => 'Bạn chưa nhập email',
            'phone.required'        => 'Bạn chưa nhập số điện thoại',

        ];
        $rules = [
            'fullname'          => 'required',
            'address'     => 'required',
            'email_create'           => 'required',
            'phone'      => 'required',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator    ->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $total = Cart::subtotal();
        $donHang = new DonHang();
        $donHang->ten_kh = $request->fullname;
        $donHang->users_id = (Auth::check()) ? Auth::user()->id : 0;
        $donHang->diachi = $request->address;
        $donHang->email = $request->email_create;
        $donHang->sdt = $request->phone;
        $donHang->tongtien = $total;
        $donHang->ghichu = $request->note;
        $donHang->save();
        $idOrder = $donHang->id;
        foreach (Cart::content() as $item) {
            $detailOrder = new CTDonHang();
            $detailOrder->don_hang_id = $idOrder;
            $detailOrder->products_id = $item->id;
            $detailOrder->soluong = $item->qty;
            $detailOrder->thanhtien = ($item->qty)*($item->price);
            $detailOrder->save();
        }
        Cart::destroy();
        return redirect()->route('order')->with('thongbao', 'Đặt hàng thành công vui lòng đợi liên hệ lại');
    }
}
