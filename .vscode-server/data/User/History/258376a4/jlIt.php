<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;


public function index(Request $request)
{
    $users = User::query();

    // 検索機能
    if ($request->filled('search')) {
        $users->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
    }

    $users = $users->paginate(10);
    return view('admin.users.index', compact('users'));
}
?>

