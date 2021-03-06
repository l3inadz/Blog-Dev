@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    {{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=nk4fz930u36fp80tw5lw70459r4sxn2hf62z6oaoukdms7ts"></script>
    <script>
        tinymce.init({ 
            selector:'textarea',
            plugins: 'link',
            menubar: false
        });
    </script> --}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(array('route'  => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
                <div class="form-group">
                    {{ Form::label('title', 'Title:') }}
                    {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('slug', 'Slug:') }}
                    {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '4','maxlength' => '255')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('category_id', 'Category:') }}
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category-> id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{ Form::label('tags', 'Tags:') }}
                    <select name="tags[]" class="form-control js-select2" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{ $tag-> id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{ Form::label('featured_image', 'Upload Featured Image:') }}
                    {{ Form::file('featured_image', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('body', 'Body:') }}
                    {{ Form::textarea('body', null, array('id' => 'article-ckeditor', 'class' => 'form-control', 'required' => '')) }}
                </div>
                {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".js-select2").select2();
        });
    </script>
@endsection