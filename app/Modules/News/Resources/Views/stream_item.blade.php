@if ($item->itemType == 'news')
    <div class="item news" data-timestamp="{{ $item->updated_at->timestamp }}" data-time-offset="{{ $item->updated_at->offsetHours }}" data-more={{ $more }}>
        <div class="meta above clearfix">
            <div class="category pull-left">
                {!! HTML::fontIcon('newspaper-o') !!} {!! trans('app.object_news') !!}
            </div>
            <div class="comments pull-right" title="{!! trans('app.comments') !!}">
                {!! HTML::fontIcon('comments') !!} {{ $item->countComments() }}
            </div>
        </div>

        @if ($item->newscat->image)
            <a class="image text-hide" href="{!! 'news/'.$item->id.'/'.$item->slug !!}" style="background-image: url({!! $item->newscat->uploadPath().$item->newscat->image !!}">{{ $item->title }}
            </a>
        @endif

        <h2 title="{{ $item->title }}">{{ $item->title }}</h2>

        <div class="meta below">
            <time>{{ $item->updated_at }}</time> - {!! link_to('users/'.$item->creator->id.'/'.$item->creator->slug, $item->creator->username) !!}
        </div>
    </div>
@endif

@if ($item->itemType == 'video')
    <div class="item video" data-timestamp="{{ $item->updated_at->timestamp }}" data-time-offset="{{ $item->updated_at->offsetHours }}" data-more={{ $more }}>
        <div class="meta above clearfix">
            <div class="category">
                {!! HTML::fontIcon('youtube-play') !!} {!! trans('app.object_video') !!}
            </div>
        </div>

        @if ($item->provider == 'youtube')
            <a class="image text-hide" href="{!! 'videos/'.$item->id.'/'.$item->slug !!}" style="background-image: url(http://img.youtube.com/vi/{{ $item->permanent_id }}/mqdefault.jpg)">{{ $item->title }}
            </a>
        @endif

        <h2 title="{{ $item->title }}">{{ $item->title }}</h2>

        <div class="meta below">
            <time>{{ $item->updated_at }}</time> - {!! link_to('users/'.$item->creator->id.'/'.$item->creator->slug, $item->creator->username) !!}
        </div>
    </div>
@endif