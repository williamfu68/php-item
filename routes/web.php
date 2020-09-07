<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function() {
    return view('/login');
});
Route::get('/login',function() {
    return view('login');
});
Route::get('/register',function() {
    return view('register');
});
Route::get('/userPage',function() {
    return view('user.userPage');
});
Route::get('/adminPage',function() {
    return view('admin.adminPage');
});

Route::post('/userCheck','LoginController@userCheck');
Route::post('/adminCheck','LoginController@adminCheck');
Route::post('/register/users','RegisterController@userAdd');
Route::post('/register/admins','RegisterController@adminAdd');
Route::get('/forget','SessionForgetController@forget');

Route::get('/userRegisterInfo',function() {
    return view('user.userRegisterInfo');
});
Route::get('/adminRegisterInfo',function() {
    return view('admin.adminRegisterInfo');
});
Route::get('/userAlreadyExist',function() {
    return view('user.userAlreadyExist');
});
Route::get('/adminAlreadyExist',function() {
    return view('admin.adminAlreadyExist');
});
Route::get('/userForgetPassword',function() {
    return view('user.userForgetPassword');
});
Route::get('/adminForgetPassword',function() {
    return view('admin.adminForgetPassword');
});
Route::get('/userAlterPasswordInfo',function() {
    return view('user.userAlterPasswordInfo');
});
Route::get('/adminAlterPasswordInfo',function() {
    return view('admin.adminAlterPasswordInfo');
});
Route::get('/userResetPassword',function() {
    return view('user.userResetPassword');
});
Route::get('/adminResetPassword',function() {
    return view('admin.adminResetPassword');
});
Route::get('/userResetPasswordInfo',function() {
    return view('user.userResetPasswordInfo');
});
Route::get('/adminResetPasswordInfo',function() {
    return view('admin.adminResetPasswordInfo');
});
// user admin
Route::post('/userResetPassword','ResetPasswordController@userResetPassword');
Route::post('/adminResetPassword','ResetPasswordController@adminResetPassword');
Route::post('/alterUserPassword','forgetPasswordController@alterUserPassword');
Route::post('/alterAdminPassword','forgetPasswordController@alterAdminPassword');
// customer
Route::get('/addCustomerInfo','CustomerInfoController@add');
Route::get('/queryCustomerInfo','CustomerInfoController@query');
Route::get('/allCustomerInfo','CustomerInfoController@all');
Route::get('/updateCheckOutTime','CustomerInfoController@update');
Route::get('/deleteCustomerInfo','CustomerInfoController@delete');
Route::get('/queryHousingRoomInfo','CustomerInfoController@queryHousingRoomInfo');
Route::get('/customerInfoList',function() {
    return view('customerInfoList');
});
// roomInfo
Route::get('/queryRoomInfo','RoomInfoController@query');
Route::get('/allRoomInfo','RoomInfoController@all');
Route::get('/queryEmptyRoomInfo','RoomInfoController@queryEmptyRoomInfo');
Route::get('/addRoomInfo','RoomInfoController@add');
Route::get('/deleteRoomInfo','RoomInfoController@delete');
Route::get('/alterRoomInfo','RoomInfoController@alter');
// memberInfo
Route::get('/registerMember','MemberInfoController@register');
Route::get('/queryMemberInfo','MemberInfoController@query');
Route::get('/alterMemberInfo','MemberInfoController@alter');
Route::get('/deleteMemberInfo','MemberInfoController@delete');
Route::get('/allMemberInfo','MemberInfoController@all');
// bookInfo
Route::get('/customerBookInfo','BookInfoController@customerBook');
Route::get('/memberBookInfo','BookInfoController@memberBook');
Route::get('/queryCustomerBookInfo','BookInfoController@customerQuery');
Route::get('/queryMemberBookInfo','BookInfoController@memberQuery');
Route::get('/cancelCustomerBookInfo','BookInfoController@cancelCustomerBookInfo');
Route::get('/cancelMemberBookInfo','BookInfoController@cancelMemberBookInfo');
Route::get('/allCustomerBookInfo','BookInfoController@allCustomerBookInfo');
Route::get('/allMemberBookInfo','BookInfoController@allMemberBookInfo');
// personalInfo
Route::get('/queryUserPersonalInfo','PersonalInfoController@queryUser');
Route::get('/deleteUserPersonalInfo','PersonalInfoController@deleteUser');
Route::get('/alterUserPersonalInfo','PersonalInfoController@alterUser');
Route::get('/queryAdminPersonalInfo','PersonalInfoController@queryAdmin');
Route::get('/deleteAdminPersonalInfo','PersonalInfoController@deleteAdmin');
Route::get('/alterAdminPersonalInfo','PersonalInfoController@alterAdmin');
// businessRecordInfo
Route::get('/addBusinessRecordInfo','BusinessRecordController@add');
Route::get('/manageBusinessRecord','BusinessRecordController@manage');
Route::get('/deleteBusinessRecordInfo','BusinessRecordController@delete');
// userInfo
Route::get('/queryUserInfo','UserInfoController@query');
Route::get('/deleteUserInfo','UserInfoController@delete');





