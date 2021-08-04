<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as  Image;


class AdminController extends Controller
{
    public function dashboard()
    {
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'email' => 'required|email',
                'password' => 'required'
            ];

            $customMessages = [
                'email.required' => 'Không được bỏ trống phần email',
                'email.email' => 'Đây không phải là email',
                'password.required' => 'Không được bỏ trống phần password',
            ];

            $this->validate($request, $rules, $customMessages);
            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('admin/dashboard');
            } else {
                Session::flash('error_message', 'sai email hoặc mật khẩu');
                return redirect()->back();
            }
        }
        return view('admin.login');
    }

    public function changePassword()
    {
        Session::put('page','changePassword');
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view('admin.settings', compact('adminDetails'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin');
    }

    public function chkCurrentPassword(Request $request)
    {
        $data = $request->all();
//        echo "<pre>";print_r($data);die;
//        echo "<pre>";print_r(Auth::guard('admin')->user()->password);die;
        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function updateCurrentPassword(Request $request)
    {
        $data = $request->all();
        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
            if ($data['new_pwd'] == $data['confirm_pwd']) {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
                Session::flash('success_message', 'Đổi mật khẩu thành công');
                return redirect()->back();
            } else {
                Session::flash('error_message', 'lỗi,vui lòng nhập lại');
                return redirect()->back();
            }
        } else {
            Session::flash('error_message', 'thao tác lỗi,vui lòng nhập lại');
            return redirect()->back();
        }
    }

    public function updateAdminDetails(Request $request)
    {
        Session::put('page','updateAdminDetails');
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'admin_name' => 'required',
                'admin_mobile' => 'required|numeric',
                'admin_image' => 'image',
            ];

            $customMessages = [
                'admin_name.required' => 'Không được bỏ trống phần tên',
                'admin_mobile.required' => 'Không được bỏ trống phần số điện thoại',
                'admin_mobile.numeric' => 'số điện thoại chỉ gồm các số',
                'admin_image.image' => 'chỉ nhận file ảnh',
            ];

            $this->validate($request, $rules, $customMessages);

            if ($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePatch = 'images/admin_images/admin_photos/'.$imageName;
                    Image::make($image_tmp)->save($imagePatch);
                    $old_image_patch = 'images/admin_images/admin_photos/';
                    if (file_exists($old_image_patch.$data['current_admin_image'])){
                        unlink($old_image_patch.$data['current_admin_image']);
                    }
                }
                elseif (!empty($data['current_admin_image']) && empty($data['admin_image'])){
                    $imageName = $data['current_admin_image'];
                }
                else{
                    $imageName="";
                }
                Admin::where('email', Auth::guard('admin')->user()->email)->update(['image' => $imageName]);
            }

            Admin::where('email', Auth::guard('admin')->user()->email)->update(['name' => $data['admin_name'], 'mobile' => $data['admin_mobile']]);
            Session::flash('success_message','Cập nhật tài khoản thành công');
            return redirect()->back();
        }
        return view('admin.update_admin_details');
    }
}
