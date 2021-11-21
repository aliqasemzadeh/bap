<div>
    <x-slot name="title">
        {{ $article->title }}
    </x-slot>
    <x-slot name="pretitle">
        {{ $article->pretitle }}
    </x-slot>
    <div class="card card-lg">
        <div class="card-body ">
            <div class="row g-4">
                @php
                    $converter = new \League\CommonMark\CommonMarkConverter([
                        'html_input' => 'strip',
                        'allow_unsafe_links' => false,
                    ]);
                    echo $converter->convertToHtml($article->body);
                @endphp
            </div>
        </div>
    </div>
</div>
