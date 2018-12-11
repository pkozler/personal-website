<section class="p-0" id="{{ $section->attr_id }}">
    <div class="container-fluid p-0">

        <div class="row no-gutters">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">{{ $section->heading }}</h2>
                <hr class="my-4">
            </div>
        </div>

        @php
            $imageList = \App\Image::all();
        @endphp

        <div class="row no-gutters popup-gallery">
            @foreach($imageList as $idx => $image)

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset('storage/gallery/fullsize/' . $image->path) }}">
                        <img class="img-fluid img-thumbnail" src="{{ asset('storage/gallery/thumbnails/' . $image->path) }}">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category">
                                    {{ $image->label_category }}
                                </div>
                                <div class="project-name">
                                    {{ $image->label_name }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach
        </div>

    </div>
</section>
