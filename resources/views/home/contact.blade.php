<section id="{{ $section->attr_id }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto text-center">
                <h2 class="section-heading">{{ $section->heading }}</h2>
                <hr class="my-4">
                <p class="mb-5">{{ $section->paragraph }}</p>
            </div>
        </div>

        <div class="row">
            @foreach($contactList as $idx => $contact)
                <div class="col-lg-4 mx-auto text-center">
                    <a class="btn btn-link contact-link text-dark" id="{{ $contact->attr_id }}">
                        <i class="{{ $contact->attr_icon }} fa-3x mb-3 sr-contact"></i><br>
                        <p class="contact-text text-primary">{{ $contact->text_val }}</p>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</section>
