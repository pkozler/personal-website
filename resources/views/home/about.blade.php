<section class="bg-primary" id="{{ $section->attr_id }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto text-center">
                <h2 class="section-heading text-white">{{ $section->heading }}</h2>
                <hr class="light my-4">
                <p class="text-faded mb-4">{{ $section->paragraph }}</p>
                <a class="btn btn-light btn-xl js-scroll-trigger" href="#{{ $nextSection->attr_id }}">{{ $section->next_label }}</a>
            </div>
        </div>
    </div>
</section>
