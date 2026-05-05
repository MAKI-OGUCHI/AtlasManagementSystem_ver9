<x-sidebar>
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex justify-content-between align-items-center">
  <div class="post_sub_categories">
    @foreach($post->subCategories as $subcategory)
      <button>{{ $subcategory->sub_category }}</button>
    @endforeach
  </div>

  <div class="post_actions d-flex align-items-center">
    <div class="comment">
      <i class="fa fa-comment"></i>
      <span>{{ $post->postComments->count() }}</span>
    </div>

    <div class="like_area">
      @if(Auth::user()->is_Like($post->id))
        <p class="m-0">
          <i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i>
          <span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span>
        </p>
      @else
        <p class="m-0">
          <i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i>
          <span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span>
        </p>
      @endif
    </div>
  </div>
</div>
    </div>
    @endforeach
  </div>
  <div class="other_area w-25">
    <div class="border m-4">
      <div class="post_btn"><a href="{{ route('post.input') }}">投稿</a></div>
      <div class="keyword">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest" class="search_input">
        <input type="submit" value="検索" form="postSearchRequest" class="search_btn">
      </div>
      <div class="filter_btn">
        <input type="submit" name="like_posts" class="like_btn_list" value="いいねした投稿" form="postSearchRequest">
        <input type="submit" name="my_posts" class="my_posts" value="自分の投稿" form="postSearchRequest">
      </div>
      <ul>
        @foreach($categories as $category)
        <div>
        <label class="main_categories" data-target="#category{{ $category->id }}" data-toggle="collapse">{{ $category->main_category }}<span class="p_arrow"></span></label>
        <div id="category{{$category->id}}" class="collapse">
          <ul class="sub">
            @foreach($category -> subCategories as $subCategory)
            <li><button type="submit" name="category_word" value="{{$subCategory -> sub_category}}" form="postSearchRequest">{{$subCategory -> sub_category}}</button></li>
            @endforeach
          </ul>
        </div>
        </div>
        @endforeach
      </ul>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
</x-sidebar>
