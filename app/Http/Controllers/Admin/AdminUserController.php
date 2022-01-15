<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminProfileRequest;
use App\Traits\DashboardRedirects;
use Illuminate\Http\Request;
class AdminUserController extends Controller
{
    use DashboardRedirects;
    public function getProfile(){
        return view('admin.pages.adminUsers.profile',[
            'user'=>auth()->user()
        ]);
    }

    public function profile(AdminProfileRequest $request){
        $user=auth('admin')->user();
        $data = $request->validated();        
        $user->update($data);
        return $this->redirectRouteWithSuccessStore();
    }
}
