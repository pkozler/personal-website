<section id="{{ $section->attr_id }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">{{ $section->heading }}</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>

    <div class="container">
        @php($n = $noteList->count() and $nRows = 2 and $nCols = intval($n / $nRows) or $noteList = null)

        @if($noteList)

            @for($i = 0; $i < $nRows; $i++)
                <div class="row">

                    @for($j = 0; $j < $nCols; $j++)
                        @php($note = $noteList->get($i * $nCols + $j))

                        <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box mt-5 mx-auto">
                                <i class="{{ $note->figure }} mb-3 large-icon"></i>
                                <h3 class="mb-3">{{ $note->title }}</h3>
                                <p class="text-muted mb-0">{{ $note->description }}</p>
                            </div>
                        </div>
                    @endfor

                </div>
            @endfor

        @endif

    </div>

</section>
