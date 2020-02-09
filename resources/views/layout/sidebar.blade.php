<aside class="col-md-4 blog-sidebar">
    <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">Теги</h4>
{{--        @if($post)--}}
            @include('posts.tags', ['tags' => $tagsCloud])
{{--        @endif--}}
    </div>


</aside><!-- /.blog-sidebar -->
