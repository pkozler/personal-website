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
        @php($n = $noteList->count() and $nRows = ceil($n / $nCols) or $noteList = null)

        @if($noteList)

            @for($i = 0; $i < $nRows; $i++)
                <div class="row">

                    @for($j = 0; $j < $nCols; $j++)
                        @php(($k = $i * $nCols + $j) < $n and $note = $noteList->get($k) or $note = null)

                        @if(!$note)
                            @break
                        @else
                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="service-box mt-5 mx-auto">
                                    <i class="{{ $note->figure }} mb-3 large-icon"></i>
                                    <h3 class="mb-3 mt-3">{{ $note->title }}</h3>
                                    <p class="text-muted mb-0">{{ $note->description }}</p>
                                </div>
                            </div>
                        @endif
                    @endfor

                </div>
            @endfor

        @endif

    </div>

</section>
