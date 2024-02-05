    <!-- Header container -->
    <div class="section-header">
        <div class="row">
            <div class="col-md-12 {{ $class ?? '' }}">
                <h1 class="display-4 text-default">{{ $title }}</h1>
                @if (isset($description) && $description)
                    <p class="text-default mt-0 mb-5">{{ $description }}</p>
                @endif                
            </div>
        </div>
    </div>