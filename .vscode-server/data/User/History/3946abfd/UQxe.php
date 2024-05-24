<x-app-layout>
    <x-slot name="header">
        <h1>ユーザー管理画面</h1>
    </x-slot>

    <div class="container">
        <!-- 成功メッセージの表示 -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

       

        <!-- ユーザー一覧テーブル -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- ユーザーごとのテーブル行 -->
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <!-- ユーザー編集 -->
                            <a href="{{ route('admin.users.edit', $user->id) }}">編集</a>
                            <!-- 論理削除されたユーザーの場合 -->
                            @if ($user->trashed())
                                <!-- ユーザーを復元するフォーム -->
                                <form action="{{ route('admin.users.restore', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">復元</button>
                                </form>
                                <!-- ユーザーを物理削除するフォーム -->
                                <form action="{{ route('admin.users.forceDelete', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">物理削除</button>
                                </form>
                            @else
                                <!-- ユーザーを論理削除するフォーム -->
                                <form action="{{ route('admin.users.softDelete', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning">論理削除</button>
                                </form>
                                <!-- ユーザーを物理削除するフォーム -->
                                <form action="{{ route('admin.users.forceDelete', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">物理削除</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>