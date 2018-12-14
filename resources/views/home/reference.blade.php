<section class="bg-dark text-white" id="{{ $section->attr_id }}">
    <div class="container text-center">
        <h3 class="mb-4">{{ $section->heading }}</h3>

        @if ($githubLink)
            <a class="btn btn-link contact-link text-light" id="{{ $githubLink->attr_id }}">
                <i class="{{ $githubLink->attr_icon }} fa-4x mb-4 sr-contact"></i><br>
                <p class="contact-text text-primary">{{ $githubLink->text_val }}</p>
            </a>
        @else
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#{{ $nextSection->attr_id }}">{{ $section->next_label }}</a>
        @endif

    </div>
</section>
