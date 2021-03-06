@extends('layouts.app')
@section('title', 'レシート一覧')
@section('content')


<div class="row">
    <div class = "col-md-5">
        {{$message}}
    </div>
  <div class = "col-md-offset-5 col-md-2">
    <a href="/" class="btn btn-lg btn-primary btn-block" type="button" style="margin-bottom: 20px">記入に戻る</a>
  </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<table class="table table-striped table-bordered">
 <tr>
 <th>種類<span class="glyphicon glyphicon-sort pull-right" onclick="nowalart('title')" aria-hidden="true">降順</span></th>
 <th>値段<span class="glyphicon glyphicon-sort pull-right" onclick="nowalart('price')" aria-hidden="true">降順</span></th>
 <th>購入日<span class="glyphicon glyphicon-sort pull-right" onclick="nowalart('purchased_at')" aria-hidden="true">降順</span></th>
 <th>詳細<span class="glyphicon glyphicon-sort pull-right" onclick="nowalart('detail')" aria-hidden="true">降順</span></th>
 <th>必要<span class="glyphicon glyphicon-sort pull-right" onclick="nowalart('needs')" aria-hidden="true">降順</span></th>
 <th>更新日</th>
 <th>編集</th>
 <th>削除</th>
 </tr>
 <tbody id="response_body">
@include('ajaxlist')
</tbody>
</table>

<script>
function nowalart(genre) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
     type: "GET",
     url: "/sort/",
     data: {
       "genre": genre
     },
     dataType: 'html',
     success: function(data){
       $('#response_body').html(data);
     }
   });
}
</script>

@endsection
