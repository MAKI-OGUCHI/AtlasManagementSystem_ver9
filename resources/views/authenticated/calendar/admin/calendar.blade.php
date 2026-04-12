<x-sidebar>
<div class="w-75 m-auto">
  <div class="w-100">
    <p>{{ $calendar->getTitle() }}</p>
    <p>{!! $calendar->render() !!}</p>
  </div>
</div>
<div>
  <!-- <p>予約日：calendar -> }}</p> -->
  <!-- <p>時間：calendar -> }}</p> -->
  <p>上記の予約をキャンセルしてもよろしいですか？</p>
  <button class="">閉じる</button>
  <button class="">キャンセル</button>
</div>

</x-sidebar>
