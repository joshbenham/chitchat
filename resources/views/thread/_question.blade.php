{{--  Editing the question.  --}}
<div class="panel panel-default" v-if="editing">
    <div class="panel-heading">
        <div class="form-group">
            <input type="text" class="form-control" v-model="form.title">
        </div>
    </div>

    <div class="panel-body">
        <div class="form-group">
            <wysiwyg v-model="form.body"></wysiwyg>
        </div>
    </div>

    <div class="panel-footer">
        <div class="level">
            <button class="btn btn-xs btn-primary level-item" @click="update">Update</button>
            <button class="btn btn-xs btn-link level-item" @click="reset">Cancel</button>

            @can ('update', $thread)
                <form action="{{ $thread->path() }}" method="POST" class="ml-a">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-xs btn-danger">Destroy</button>
                </form>
            @endcan
        </div>
    </div>
</div>

{{--  Viewing the question.  --}}
<div class="panel panel-default" v-if="! editing">
    <div class="panel-heading">
        <div class="level">
            <img src="{{ $thread->creator->avatar_path }}" 
                 alt="{{ $thread->creator->name }}" 
                 width="25" 
                 height="25" 
                 class="mr-1">

            <span class="flex">
                <a href="{{ route('profile', $thread->creator) }}">
                    {{ $thread->creator->name }}
                </a> posted: <span v-text="title"></span>
            </span>
        </div>
    </div>

    <div class="panel-body" v-html="body"></div>

    <div class="panel-footer" v-if="authorise('owns', thread)">
        <button class="btn btn-xs" @click="editing = true">Edit</button>
    </div>
</div>

<replies @added="repliesCount++" @removed="repliesCount--"></replies>