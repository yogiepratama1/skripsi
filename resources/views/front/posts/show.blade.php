@extends('layouts.innerFront')
@section('content')
    <section class="s-content">

        <div class="row">
            <div class="column large-12">

                <article class="s-content__entry format-standard">

                    <div class="s-content__media">
                        <div class="s-content__post-thumb text-center">
                            <img src="{{ asset('images/' . $post->image) }}" alt="">
                        </div>
                    </div> <!-- end s-content__media -->

                    <div class="s-content__entry-header">
                        <h1 class="s-content__title s-content__title--post">{{ $post->title }}</h1>
                    </div> <!-- end s-content__entry-header -->

                    <div class="s-content__primary">

                        <div class="s-content__entry-content">

                            <p class="lead">
                                {{ $post->body }}
                            </p>
                            <div style="margin-top: 2rem;">
                                <form action="{{ url('komentar') }}" method="post">
                                    @csrf
                                    <button type="submit" style="font-size: 12px;">Tambah Komentar</button>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="text" name="comment" required>
                                </form>
                                @foreach ($post->comments as $comment)
                                <div class="comment" style="margin-top: 1rem; border: 1px solid #ccc; padding: 10px;">
                                    <div class="ml-3 comment__author">
                                        {{ $comment->user->name }}
                                    </div>
                                    <div class="comment__content">
                                        {{ $comment->comment }}
                                    </div>
                                    <div>
                                        <a style="font-size: 12px;" onclick="toggleReplyForm({{ $comment->id }})">Reply</a>
                                    </div>
                                    <!-- Reply Form -->
                                    <form id="replyForm{{ $comment->id }}" action="{{ url('balasan') }}" method="post" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                        <input required type="text" name="reply" style="margin-top: 0.5rem;">
                                        <button type="submit" style="font-size: 12px; margin-top: 0.5rem;">Reply</button>
                                    </form>
                                    <!-- End Reply Form -->

                                    <!-- Display Replies -->
                                    @foreach ($comment->replies as $reply)
                                    <div class="comment reply" style="border: 1px solid #ccc; padding: 10px; margin-top: 1rem; margin-left: 20px;">
                                        <div class="ml-3 comment__author">
                                            {{ $reply->user->name }}
                                        </div>
                                        <div class="comment__content">
                                            {{ $reply->reply }}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>

                            <script>
                            function toggleReplyForm(commentId) {
                                var replyForm = document.getElementById('replyForm' + commentId);
                                if (replyForm.style.display === 'none') {
                                    replyForm.style.display = 'block';
                                } else {
                                    replyForm.style.display = 'none';
                                }
                            }
                            </script>

                        </div> <!-- end s-entry__entry-content -->

                        
                        <div class="s-content__entry-meta">

                            <div class="entry-author meta-blk">
                                <div class="byline">
                                    <span class="bytext">Posted By</span>
                                    <a href="#0">{{ $post->user->name }}</a>
                                </div>
                            </div>
                            <div class="meta-bottom">
                                <div class="entry-tags meta-blk">
                                    <span class="tagtext">Category</span>
                                    <a
                                        href="{{ route('categories.view', $post->categories->first()->id) }}">{{ $post->categories->first()->title }}</a>
                                </div>
                                <div class="like-button">
                                    <button onclick="toggleLike({{ $post->id }})" id="likeButton{{ $post->id }}"
                                            class="{{ $post->userLiked ? 'liked' : '' }}">
                                        {{ $post->userLiked ? 'Unlike' : 'Like' }}
                                    </button>
                                    <span id="likeCount{{ $post->id }}">{{ $post->likes }} {{ Str::plural('Like', $post->likes) }}</span>
                                </div>
                                @if (auth()->user()->role != 'user')
                                <div>
                                    <a class="btn btn-info btn-sm" href="{{ route('posts.edit', $post->id) }}">
                                        Edit
                                    </a>
                                    <form id="delete-post{{ $post->id }}" class="deletion-form"
                                        action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm show-alert"
                                            data-id="{{ $post->id }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                                @endif

<script>
    function toggleLike(postId) {
        var likeCount = document.getElementById('likeCount' + postId);
        var likeButton = document.getElementById('likeButton' + postId);

        // Check if the post is already liked
        var isAlreadyLiked = likeButton.classList.contains('liked');

        likeButton.disabled = true; // Disable the button temporarily

        $.ajax({
            type: 'POST',
            url: '{{ route('addLike') }}', // Use the correct route name
            data: {
                _token: '{{ csrf_token() }}',
                post_id: postId,
                user_id: '{{ auth()->user()->id }}'
            },
            success: function(response) {
                likeButton.classList.toggle('liked', response.userLiked);
                likeButton.textContent = response.userLiked ? 'Unlike' : 'Like';
                likeCount.textContent = response.likes + (response.likes === 1 ? ' Like' : ' Likes');
            },
            error: function() {
                alert('An error occurred while updating the like status.');
            },
            complete: function() {
                likeButton.disabled = false; // Re-enable the button
            }
        });
    }
</script>



                            </div>

                        </div> <!-- s-content__entry-meta -->
                    </div> <!-- end s-content__primary -->
                </article> <!-- end entry -->

            </div> <!-- end column -->
        </div> <!-- end row -->
    </section> <!-- end s-content -->
@endsection
