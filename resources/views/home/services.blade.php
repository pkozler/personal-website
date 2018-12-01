<section id="{{ $section->attr_id }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">{{ $section->heading }}</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>

    @php
        $noteList = \App\Note::all();
        $rowCount = 2;
        $colCount = count($noteList) / $rowCount;
    @endphp

    <div class="container">
        @for($i = 0; $i < $rowCount; $i++)
            <div class="row">

                @for($j = 0; $j < $colCount; $j++)
                    @php($note = $noteList->get($i*$colCount + $j))

                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box mt-5 mx-auto">
                            <span class=" {{ $note->figure }} mb-3 large-icon"></span>
                            <h3 class="mb-3">{{ $note->title }}</h3>
                            <p class="text-muted mb-0">{{ $note->description }}</p>
                        </div>
                    </div>
                @endfor

            </div>
        @endfor

    </div>

</section>
