<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TypeProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
   
    public function postlogout(Request $request){
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('getloginadmin')->with(['dx'=>'Bạn đã đăng xuất!!']);
    }

    public function getlogin(){
        
        return view('layoutadmin.login');
    }
    public function getuser()
    {
        $users = User::where('level',3)->paginate(4, ['*'], 'page');
        return view('admin.user',compact('users'));
    }
    public function edituser($id)
    {
        $user = User::find($id);
        return view('admin.edituser',compact('user'));
    }
    public function updateuser(Request $request,$id)
    {
        $this->validate($request,[
            'phone' => 'required|min: 10| max: 10'
        ],
        [
            'phone.min' =>'Số điện thoại phải 10 số',
            'phone.max' => 'Số điện thoại phải 10 số'
        ]
    );
    $user = User::find($id);
    $user->update($request->all());
    return redirect('admin/user')->with('success','Bạn đã update người dùng thành công');
    }

    public function postlogin(Request $request){
        $this->validate($request,[
            'email' => 'required|max: 100',
            'password' => 'required|min:6|max:20'
        ],
        [
            'email.required' => 'Vui lòng nhập tài khoản email của bạn!',
            'email.email'=>'Không đúng định dạng email',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu không được hơn 20 kí tự'
        ]
    );
    $credentials=array('email'=>$request->email,'password'=>$request->password,'level'=> 1 );
    if(Auth::attempt($credentials)){
        $user = User::where('email',$request->email)->get();
        
        return redirect('/admin')->with(['flag'=>'alert','message'=>'Đăng nhập thành công']);
    }
    else{
        return redirect()->back()->with(['flag'=>'danger','message'=>'Sai tên đăng nhập hoặc mật khẩu']);
    }
        
    }

    public function deleteuser($id){
        
        $user = User::find($id)->delete();
        return redirect()->route('admin.user')->with('success','Xóa user thành công');
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

    //typeProduct
   
    
   
   
    //end_typeProduct
}
