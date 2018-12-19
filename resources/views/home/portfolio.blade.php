<section class="p-0" id="{{ $section->attr_id }}">
    <div class="container-fluid p-0">

        <div class="row no-gutters">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">{{ $section->heading }}</h2>
                <hr class="my-4">
            </div>
        </div>

        <div class="row no-gutters popup-gallery">
            @foreach($imageList as $idx => $image)

                <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box d-block mb-4 mx-2 h-80" href="{{ "storage/$uploadConfig->fullsize/$image->path" }}">
                        <img class="img-fluid img-thumbnail rounded-0" src="{{ "storage/$uploadConfig->thumbnails/$image->path" }}">

                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
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
