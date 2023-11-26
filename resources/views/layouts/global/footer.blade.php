<footer class="footer footer-transparent d-print-none">
    <div class="{{ $container }}">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="{{ route('faqs.index') }}" class="link-secondary">{{ __('bap.faqs') }}</a></li>
                    <li class="list-inline-item"><a href="{{ route('article.index') }}" class="link-secondary">{{ __('bap.articles') }}</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Copyright © 2021
                        <a href="https://github.com/alighasemzadeh/bap" class="link-secondary">Base Admin Panel</a>.
                    </li>
                    <li class="list-inline-item">
                        <!-- Download SVG icon from http://tabler-icons.io/i/clock -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><polyline points="12 7 12 12 15 15" /></svg>
                        {{ \Carbon\Carbon::now() }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
