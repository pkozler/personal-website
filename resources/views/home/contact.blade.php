<section id="{{ $section->attr_id }}">
    <div class="container">
        @php($contactGrid = $contactList->chunk($design->linkCols))

        @foreach($contactGrid as $contactRow)
            <div class="row">

                @foreach($contactRow as $contact)
                    <div class="col-lg-{{ $design->linkColSize }} mx-auto text-center">
                        <a class="btn btn-link contact-link text-dark" id="{{ $contact->attr_id }}">
                            <i class="{{ $contact->attr_icon }} fa-3x mb-3 sr-contact"></i><br>
                            <p class="contact-text text-primary">{{ $contact->text_val }}</p>
                        </a>
                    </div>
                @endforeach

            </div>
        @endforeach
    </div>
</section>
