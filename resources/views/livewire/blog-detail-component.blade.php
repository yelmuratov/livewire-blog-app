<div class="main blog-detail-page mt-4 pt-4">
    <!-- Page Title -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Blogs</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                            {{ $blog->title }}
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
                                {{ $blog->title }}
                            </h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i
                                            class="bi bi-person"></i>{{ $author->name }}</li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                            datetime="2020-01-01">{{ $blog->created_at }}</time></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i>
                                        {{ $comments->count() }}
                                        Comments
                                    </li>
                                </ul>
                            </div><!-- End meta top -->
                            <div class="d-flex align-items-center mt-3">
                                <button class="btn btn-outline-success me-2" wire:click="likePost({{ $blog->id }})">
                                    <i class="bi bi-hand-thumbs-up"></i> Like
                                </button>
                                <span>{{ $blog->likes_count }}</span>
                                <button class="btn btn-outline-danger ms-3" wire:click="dislikePost({{ $blog->id }})">
                                    <i class="bi bi-hand-thumbs-down"></i> Dislike
                                </button>
                                <span>{{ $blog->dislikes_count }}</span>
                            </div>

                            <div class="content">
                                <p>
                                    {{ $blog->content }}
                                </p>
                            </div><!-- End post content -->
                        </article>

                    </div>
                </section><!-- /Blog Details Section -->

                <!-- Blog Author Section -->
                <section id="blog-author" class="blog-author section">
                    <div class="container">
                        <div class="author-container d-flex align-items-center">
                            <img src="{{ asset('assets/img/blog/blog-author.jpg') }}"
                                class="rounded-circle flex-shrink-0" alt="">
                            <div>
                                <h4>{{ $author->name }}</h4>
                                <div class="social-links">
                                    <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                    <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                    <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                </div>
                                <p>
                                    Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus
                                    accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse
                                    et accusantium ut unde voluptas.
                                </p>
                            </div>
                        </div>
                    </div>

                </section><!-- /Blog Author Section -->

                <!-- Blog Comments Section -->
                <section id="blog-comments" class="blog-comments section">
                    <form wire:submit.prevent="submitComment" class="mt-3 mb-4">
                      <div class="input-group">
                          <input type="text" class="form-control"
                              placeholder="Your Comment*" wire:model="MainComment">
                          <button class="btn btn-primary" type="submit">Post Comment</button>
                      </div>
                    </form>
                  <br>
                  <br>
                  <br>
                    <div class="container">
                        <h4 class="comments-count">{{ $comments->count() }} Comments</h4>

                        @php
                            function PrintReply($data, $level, $parentCommentId, $newComment)
                            {
                                if ($data->replies->count() > 0) {
                                    echo '<ul class="list-unstyled ms-' . $level * 3 . '">';
                                    foreach ($data->replies as $comment) {
                                        echo '<li class="mt-3">';
                                        echo '<div class="d-flex">';
                                        echo '<div class="comment-img me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                            </svg>
                                        </div>';
                                        echo '<div class="flex-grow-1">';
                                        echo '<h6 class="mb-1"><a href="#">' .
                                            $comment->user->name .
                                            '</a> <a href="#" wire:click.prevent="replyToComment(' .
                                            $comment->id .
                                            ')" class="reply text-muted"><i class="bi bi-reply-fill"></i> Reply</a></h6>';
                                        echo '<small class="text-muted d-block mb-2">' .
                                            $comment->created_at->diffForHumans() .
                                            '</small>';
                                        echo '<p>' . $comment->content . '</p>';

                                        if ($parentCommentId == $comment->id) {
                                            echo '<form wire:submit.prevent="submitComment" class="mt-3">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Your Comment*" wire:model="newComment">
                                                        <button class="btn btn-primary" type="submit">Post Comment</button>
                                                    </div>
                                                </form>';
                                        }

                                        PrintReply($comment, $level + 1, $parentCommentId, $newComment);
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }
                            }
                        @endphp

                        @foreach ($comments as $comment)
                            <div id="comment-{{ $comment->id }}" class="comment mb-4">
                                <div class="d-flex">
                                    <div class="comment-img me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                        </svg>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1">
                                            <a href="#">{{ $comment->user->name }}</a>
                                            <a href="#" wire:click.prevent="replyToComment({{ $comment->id }})"
                                                class="reply text-muted">
                                                <i class="bi bi-reply-fill"></i> Reply
                                            </a>
                                        </h5>
                                        <small
                                            class="text-muted d-block mb-2">{{ $comment->created_at->diffForHumans() }}</small>
                                        <p>{{ $comment->content }}</p>

                                        @if ($parentCommentId == $comment->id)
                                            <form wire:submit.prevent="submitComment" class="mt-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Your Comment*" wire:model="newComment">
                                                    <button class="btn btn-primary" type="submit">Post Comment</button>
                                                </div>
                                            </form>
                                        @endif

                                        @php
                                            PrintReply($comment, 1, $parentCommentId, $newComment);
                                        @endphp
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </section><!-- /Blog Comments Section -->

            </div>
        </div>
    </div>

</div>
