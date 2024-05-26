<x-app-layout>
    <!-- ヘッダースロットを定義 -->
    <x-slot name="header">
        <!-- ヘッダーにページタイトルを設定 -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Management page') }} <!-- 管理ページのタイトルを多言語対応で表示 -->
        </h2>
    </x-slot>
    <!-- 管理者ページのメインタイトル -->
    <h1>管理者ページ</h1>

    <!-- ユーザー検索フォーム -->
    <form method="GET" action="{{ route('admin.index') }}">
        <!-- 検索入力フィールド -->
        <input type="text" name="search" placeholder="ユーザーを探す" value="{{ request('search') }}">
        <!-- 検索ボタン -->
        <button type="submit">検索</button>
    </form>
    <!-- ユーザーリストを表示するテーブル -->
    <table>
        <!-- テーブルヘッダ -->
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <!-- ユーザーデータの繰り返し表示 -->
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td> <!-- ユーザーID -->
            <td>{{ $user->name }}</td> <!-- ユーザー名 -->
            <td>{{ $user->email }}</td> <!-- ユーザーメールアドレス -->
            <td>
                @if ($user->deleted_at)
                    <!-- ユーザー復元フォーム -->
                    <form action="{{ route('user.restore', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit">復元</button>
                    </form>
                @else
                    <!-- ユーザー編集リンク -->
                    <a href="{{ route('user.edit', $user->id)}}">編集</a>
                    
                    <!-- ユーザー論理削除フォーム -->
                    <form action="{{ route('user.soft-delete', $user->id) }}" method="POST">
                        @csrf <!-- CSRF保護 -->
                        @method('DELETE') <!-- DELETEメソッド指定 -->
                        <button type="submit">削除</button>  
                    </form> 
                @endif

                <!-- ユーザー完全削除フォーム -->
                <form action="{{route('user.delete', $user->id)}}" method="POST">
                    @csrf <!-- CSRF保護 -->
                    @method('DELETE') <!-- DELETEメソッド指定 -->
                    <button type="submit">完全削除</button>  
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</x-app-layout>
