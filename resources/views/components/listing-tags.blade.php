@props(['tagsCsv'])

<?php 
    $tags = explode(",", $tagsCsv);
?>
<ul class="flex">
    @foreach ($tags as $tag)
    {{-- <li class="bg-black text-white rounded-xl px-3 py-1 mr-2"> --}}
    <li {{$attributes->merge(['class' => 'flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2'])}}>
        <a href="/?tag={{$tag}}">{{ucwords($tag)}}</a>
    </li>
    @endforeach
</ul>