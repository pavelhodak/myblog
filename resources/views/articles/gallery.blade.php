<!-- images here -->
@foreach($images as $image)
    <a class="fancybox" rel="group" href="{{ $image }}">
        <img src="{{ $image }}" height="120">
    </a>
@endforeach