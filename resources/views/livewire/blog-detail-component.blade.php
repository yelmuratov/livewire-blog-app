<div class="main blog-detail-page mt-4 pt-4">
  <!-- Page Title -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Blogs</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  
  <div class="page-title aos-init aos-animate" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Blog Details</h1>
            <p class="mb-0">
              {{
                $blog->title
              }}
            </p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="/">Home</a></li>
          <li class="current">Blog Details</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">

        <!-- Blog Details Section -->
        <section id="blog-details" class="blog-details section">
          <div class="container">

            <article class="article">

              <div class="post-img">
                <img src="{{ $blog->img }}" alt="" class="img-fluid">
              </div>

              <h2 class="title">
                {{
                  $blog->title
                }}
              </h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i>{{$author->name}}</li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="2020-01-01">{{$blog->created_at}}</time></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> 
                      {{$comments->count()}}
                      Comments
                </li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <p>
                  {{
                    $blog->content
                  }}
                </p>
              </div><!-- End post content -->
            </article>

          </div>
        </section><!-- /Blog Details Section -->

        <!-- Blog Author Section -->
        <section id="blog-author" class="blog-author section">
          <div class="container">
            <div class="author-container d-flex align-items-center">
              <img src="{{ asset('assets/img/blog/blog-author.jpg') }}" class="rounded-circle flex-shrink-0" alt="">
              <div>
                <h4>{{$author->name}}</h4>
                <div class="social-links">
                  <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                </div>
                <p>
                  Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                </p>
              </div>
            </div>
          </div>

        </section><!-- /Blog Author Section -->

        <!-- Blog Comments Section -->
        <section id="blog-comments" class="blog-comments section">

          <div class="container">

            <h4 class="comments-count">8 Comments</h4>

            @foreach ($comments as $comment)
              <div id="comment" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="{{ asset('assets/img/blog/comments-1.jpg') }}" alt=""></div>
                  <div>
                    <h5><a href="">{{$comment->user->name}}</a> <a href="#" wire:click.prevent="replyToComment({{ $comment->id }})" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">{{$comment->created_at}}</time>
                    <p>{{ $comment->content }}</p>
                  </div>
                </div>
                @foreach ($comment->replies as $reply)
                  <div class="comment-reply">
                    <div class="d-flex">
                      <div class="comment-img"><img src="{{ asset('assets/img/blog/comments-1.jpg') }}" alt=""></div>
                      <div>
                        <h5><a href="">{{$reply->user->name}}</a></h5>
                        <time datetime="2020-01-01">{{$reply->created_at}}</time>
                        <p>{{ $reply->content }}</p>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              @if ($parentCommentId == $comment->id)
                <section id="comment-form" class="comment-form section">
                  <div class="container">
                    <form >
                      <h4>Post Comment</h4>
                        <div class="row">
                          <div class="col form-group">
                            <textarea name="comment" class="form-control" placeholder="Your Comment*" wire:model="newComment"></textarea>
                          </div>
                        </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                      </div>
                    </form>
                  </div>
                </section><!-- /Comment Form Section -->
              @endif
            @endforeach
          </div>
        </section><!-- /Blog Comments Section -->

      </div>
    </div>
  </div>
  
</div>