<x-sidebar>
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="w-75 m-auto border" style="border-radius:5px;">

      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>
<div class="modal">
  <div class="modal__bg js_modal_close"></div>
  <div class="modal__content">
  <p>予約日：</p><p class="modal-reserveDay"></p>
  <p>時間：</p><p class="modal-reservePart"></p>
  <p>上記の予約をキャンセルしてもよろしいですか？</p>
  <button class="modal_bg">閉じる</button>
  <button class="">キャンセル</button>
  </div>
</div>
</x-sidebar>
