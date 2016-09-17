<p>
    {{ isset($user)? $user['name']: '' }}
    <hr>
    <a href="{{ $url['url'] }}">{{ $url['text'] }}</a>
</p>

