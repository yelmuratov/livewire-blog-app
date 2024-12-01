<div class="main mt-4 pt-4">
<!-- Page Title -->
<div class="page-title" data-aos="fade">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1>Blog</h1>
          <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="/">Home</a></li>
        <li class="current">Blog</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">

  <div class="d-flex gap-5 container">
    <div class="col-lg-9">
      <div class="row gy-4">
        <!-- Post List Item -->
        @foreach($posts as $post)
          <div class="col-lg-4">
            <article>

              <div class="post-img">
                <img src="{{$post->img}}" alt="" class="img-fluid">
              </div>

              <p class="post-category">
                @foreach($categories as $category)
                  @if($category->id == $post->category_id)
                    {{ $category->name }}
                  @endif
                @endforeach
              </p>

              <h2 class="title">
                <a href={{route('blog.detail',$post->slug)}}>{{$post->title}}</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-author-2.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">
                    @foreach($users as $user)
                      @if($user->id == $post->user_id)
                        {{$user->name}}
                      @endif
                    @endforeach
                  </p>
                  <p class="post-date">
                    <time datetime="2021-01-01">{{$post->created_at}}</time>
                  </p>
                </div>
              </div>

            </article>
          </div>
        @endforeach
        <!-- End post list item -->
      </div>
    </div>
    <div class="col-lg-3 sidebar">

      <div>

        <!-- Search Widget -->
        <div class="search-widget widget-item">

          <h3 class="widget-title">Search</h3>
          <form action="">
            <input type="text">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
          </form>

        </div><!--/Search Widget -->

        <!-- Categories Widget -->
        <div class="categories-widget widget-item">

          <h3 class="widget-title">Categories</h3>
          <ul class="mt-3">
            <li><a href="#">General <span>(25)</span></a></li>
            <li><a href="#">Lifestyle <span>(12)</span></a></li>
            <li><a href="#">Travel <span>(5)</span></a></li>
            <li><a href="#">Design <span>(22)</span></a></li>
            <li><a href="#">Creative <span>(8)</span></a></li>
            <li><a href="#">Educaion <span>(14)</span></a></li>
          </ul>

        </div><!--/Categories Widget -->

        <!-- Recent Posts Widget -->
        <div class="recent-posts-widget widget-item">

          <h3 class="widget-title">Recent Posts</h3>

          <div class="post-item">
            <img src="assets/img/blog/blog-recent-1.jpg" alt="" class="flex-shrink-0">
            <div>
              <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
              <time datetime="2020-01-01">Jan 1, 2020</time>
            </div>
          </div><!-- End recent post item-->

          <div class="post-item">
            <img src="assets/img/blog/blog-recent-2.jpg" alt="" class="flex-shrink-0">
            <div>
              <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
              <time datetime="2020-01-01">Jan 1, 2020</time>
            </div>
          </div><!-- End recent post item-->

          <div class="post-item">
            <img src="assets/img/blog/blog-recent-3.jpg" alt="" class="flex-shrink-0">
            <div>
              <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a></h4>
              <time datetime="2020-01-01">Jan 1, 2020</time>
            </div>
          </div><!-- End recent post item-->

          <div class="post-item">
            <img src="assets/img/blog/blog-recent-4.jpg" alt="" class="flex-shrink-0">
            <div>
              <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
              <time datetime="2020-01-01">Jan 1, 2020</time>
            </div>
          </div><!-- End recent post item-->

          <div class="post-item">
            <img src="assets/img/blog/blog-recent-5.jpg" alt="" class="flex-shrink-0">
            <div>
              <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
              <time datetime="2020-01-01">Jan 1, 2020</time>
            </div>
          </div><!-- End recent post item-->

        </div><!--/Recent Posts Widget -->

        <!-- Tags Widget -->
        <div class="tags-widget widget-item">

          <h3 class="widget-title">Tags</h3>
          <ul>
            <li><a href="#">App</a></li>
            <li><a href="#">IT</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Mac</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Office</a></li>
            <li><a href="#">Creative</a></li>
            <li><a href="#">Studio</a></li>
            <li><a href="#">Smart</a></li>
            <li><a href="#">Tips</a></li>
            <li><a href="#">Marketing</a></li>
          </ul>

        </div><!--/Tags Widget -->

      </div>

    </div>
  </div>

</section><!-- /Blog Posts Section -->

<!-- Blog Pagination Section -->
<section id="blog-pagination" class="blog-pagination section">
  <div class="container">
    <div class="d-flex justify-content-center col-lg-8">
      <ul>
        <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
        <li><a href="#">1</a></li>
        <li><a href="#" class="active">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li>...</li>
        <li><a href="#">10</a></li>
        <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
      </ul>
    </div>
  </div>

</section><!-- /Blog Pagination Section -->
</div>