<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManagementUserController extends Controller
{
    // public function index(){
    //     $users = User::withTrashed()->get();
    //     dump($users);
    //     return view('admin.index', compact('users'));
    // }

    // ユーザー編集メソッド
    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    // ユーザー削除メソッド
    public function delete($id) {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete(); // ユーザーの物理削除
        return redirect()->route('admin.index')->with('success', 'User soft deleted successfully');
    }

    public function softDelete($id)
{
    $user = User::findOrFail($id);
    $user->delete(); // 論理削除を行う

    return redirect()->route('admin.index')->with('success', 'User deleted successfully');
}

    // public function test(){
    //     $users = User::all();
    //     dump($users);
    //     return view('unko', compact('users'));
    // }

    /**
     * ユーザーデータを更新するメソッド
     * @param Request $request
     * @param int $id ユーザーID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());  // リクエストデータでユーザー情報を更新
        return redirect()->route('admin.index')->with('success', 'User updated successfully');
    }
    
    public function index(Request $request)
{
    $query = User::withTrashed();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
    }

    $users = $query->get();
    return view('admin.index', compact('users'));
}

}


?>