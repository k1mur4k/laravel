<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * ユーザーの情報の表示と検索
     */
    public function index(Request $request): View
    {
        $query = User::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $users = $query->get();
        return view('admin.index', compact('users'));
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

