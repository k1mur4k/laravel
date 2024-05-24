<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Management page') }}
        </h2>
    </x-slot>
    <h1>管理者ページ</h1>

    <form method="GET" action="{{ route('admin.index') }}">
    <input type="text" name="search" placeholder="Search users" value="{{ request('search') }}">
    <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>

                {{-- <a href="{{ route('user.edit', $user->id)}}">編集</a>
                <form action="{{route('user.delete', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE') --}}

                        <button type="submit">削除</button>
                    
                     
                </form>
            </td>
        </tr>
        @endforeach
            
    </table>
    

        
</x-app-layout>