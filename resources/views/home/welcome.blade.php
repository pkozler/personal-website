
<header class="masthead text-center text-white d-flex"
        style="background-image: url('storage/images/header.jpg');">
    <div class="container my-auto">
        <div class="row text-white text-center">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase">
                    <strong>{{ $section->heading }}</strong>
                </h1>
                <hr>
            </div>

            <div class="col-lg-8 mx-auto">
                <h3 class="text-faded mb-5">{{ $section->paragraph }}</h3>
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="#{{ $nextSection->attr_id }}">{{ $section->next_label }}</a>
            </div>
        </div>
    </div>
</header>
