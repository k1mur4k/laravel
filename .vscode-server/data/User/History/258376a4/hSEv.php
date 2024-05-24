<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * 　ユーザーの情報の表示
     */
    public function show_user(): View
    {
        $users = DB::select("select * from users");
        return view('user-admin', compact('users'));
    }
}
// public function index(Request $request)
// {
//     $users = User::query();

//     // 検索機能
//     if ($request->filled('search')) {
//         $users->where('name', 'like', '%' . $request->search . '%')
//               ->orWhere('email', 'like', '%' . $request->search . '%');
//     }

//     $users = $users->paginate(10);
//     return view('admin.users.index', compact('users'));
// }
?>
