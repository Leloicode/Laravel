<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function getinputemail(){
        return view('product.input-email');
    }
    public function postInputEmail(Request $request){
        $email=$request->txtEmail;
        
        // kiểm tra có user có email như vậy không
        $user=User::where('email',$email)->get();
        //dd($user);
        if($user->count()!=0){
            //gửi mật khẩu reset tới email
            $sentData = [
                'title' => 'Mật khẩu mới của bạn là:',
                'body' => '123456'
            ];
            Mail::to($email)->send(new \App\Mail\SendMail($sentData));
            Session::flash('message', 'Send email successfully!');
            return redirect()->route('login');//về lại trang đăng nhập của khách
        }
        else {
              return redirect()->route('getinputemail')->with('message','Your email is not right');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function getAddtocart(Request $request,$id)
    {
        $product = Product::find($id);
        $oldcart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
