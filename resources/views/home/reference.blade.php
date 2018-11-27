<section class="bg-dark text-white" id="{{ $section->attr_id }}">
    <div class="container text-center">
        <h3 class="mb-4">{{ $section->heading }}</h3>
        <a class="btn btn-light btn-xl js-scroll-trigger" href="#{{ $nextSection->attr_id }}">{{ $section->next_label }}</a>
        {{--<a class="btn btn-link contact-link" id="github-profile">--}}
            {{--<i class="fa fa-github fa-4x mb-4 sr-contact"></i><br>--}}
            {{--<span class="contact-text text-primary"></span></a>--}}
    </div>
</section>
