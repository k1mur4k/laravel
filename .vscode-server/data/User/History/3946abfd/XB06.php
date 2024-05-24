<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Management page') }}
        </h2>
    </x-slot>
    <h1>管理者ページ</h1>

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
            
                    <button type="submit">削除</button>  
                </form>
            </td>
        </tr>
        @endforeach
            
    </table>
    

        
</x-app-layout>