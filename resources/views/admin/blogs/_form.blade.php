<form method="POST" action="{{ url('admin/blogs', $blog->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    @if($blog->exists)
        {{ method_field('PUT') }}
    @endif


    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" id="title" placeholder="Title" value="{{ old('title', $blog->title) }}"/>

        @if ($errors->has('title'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif

    </div>

    <div class="form-group">
        <label>Featured image</label>

        @if(\Illuminate\Support\Facades\File::exists("storage/blogs/" . $blog->_id . ".jpg"))
            <div>
                <img src="{{ asset("storage/blogs/" . $blog->_id . ".jpg") }}" class="blog-img-form" />

                <p>You can change featured image bu uploading new one: </p>
            </div>

        @endif

        <input type="file" name="blog_img" />
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="blogContent">Description</label>
        <textarea class="form-control" name="description" rows="5" id="blogContent" placeholder="Description">{{ old('description', $blog->description) }}</textarea>

        @if ($errors->has('description'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif

    </div>


    <div class="col-sm-12 no-padding">
        <input type="submit" class="btn btn-primary" value="Save">
    </div>
</form>

<script type="application/javascript">
    var editor = new FroalaEditor('#blogContent');
</script>
