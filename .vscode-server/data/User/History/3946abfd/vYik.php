<!-- 検索機能ここから -->
<div>
  <form action="{{ route('crud.index') }}" method="GET">

  @csrf

    <input type="text" name="keyword">
    <input type="submit" value="検索">
  </form>
</div>


<!-- 新規作成ボタン -->
<button style="margin-top:50px; margin-bottom:20px;" class="btn btn-primary" type=“button” onclick="location.href='/create'">新規作成</button>

<!--テーブル-->

      <div class="table-responsive">
          <table class="table" style="width: 1000px; max-width: 0 auto;">
                <tr class="table-info">
                <th scope="col" >id</th>
                  <th scope="col" >商品画像</th>
                  <th scope="col" >商品名</th>
                  <th scope="col" >価格</th>
                  <th scope="col" >在庫数</th>
                  <th scope="col" >メーカー名</th>
                  <th scope="col" >詳細表示</th>
                  <th scope="col" >削除</th>
                </tr>
                
                <!--レコードの繰り返し処理--> 

                @foreach($posts as $companie)
                <tr>
                  <td>{{$companie->id}}</td>
                  <td><img style="width:80px;" src="{{asset($companie->products->img_path)}}" ></td>
                  <td>{{$companie->products->product_name}}</td>
                  <td>{{$companie->products->price}}</td>
                  <td>{{$companie->products->stock}}</td>
                  <td>{{$companie->company_name}}</td>
                  <td><a href="/show/{{$companie->id}}"><button type="button" class="btn btn-success">詳細</button></a></td>

                  <td>


                  <form  class="id">

                         <input data-user_id="{{$companie->id}}" type="submit" class="btn btn-danger btn-dell" value="削除">

                  </form>


                  </td>

                </tr>
                @endforeach
            </table>
       </div>

    {{ $posts->links() }}

    </div>