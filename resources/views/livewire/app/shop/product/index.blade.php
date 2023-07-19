<div>
    <x-slot name="title">
        {{ __('bap.shop') }}
    </x-slot>


    @foreach($products as $product)
    <div class="card">
        <!-- Photo -->
        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(./static/photos/home-office-desk-with-macbook-iphone-calendar-watch-and-organizer.jpg)"></div>
        <div class="card-body">
            <h3 class="card-title">Card with top image</h3>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
        </div>
    </div>
    @endforeach

</div>
