<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取所有用户
        $users = User::all();

        // 返回用户列表
        return response()->json(['users' => $users], 200);
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
        try{
            $user = new User;
            $user->invite_code = $request->invite_code;
            $user->password = bcrypt("12345");
            $user->save();
            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 根据 ID 找到用户
    $user = User::find($id);

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    // 返回用户信息
    return response()->json(['user' => $user], 200);
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
    public function initUser(Request $request)
    {
           // 根据 invite_code 找到要用户
        $user = User::where('invite_code', $request->invite_code)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // 更新用户属性
        $user->phone_number = $request->phone_number;
        $user->password = bcrypt($request->password);  // 对密码进行哈希处理
        $user->address = $request->address;
        $user->name = $request->name;

        // 保存用户
        $user->save();

        return response()->json(['user' => $user], 200);
    }

    public function update(Request $request, $id)
    {
                // 找到要更新的用户
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            // 更新用户属性
            $user->invite_code = $request->invite_code;
            $user->phone_number = $request->phone_number;
            $user->password = bcrypt($request->password);  // 对密码进行哈希处理
            $user->address = $request->address;
            $user->name = $request->name;

            // 保存用户
            $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // 根据 ID 找到用户
    $user = User::find($id);

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    // 删除用户
    $user->delete();

    // 返回成功消息
    return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
