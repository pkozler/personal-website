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
            {{--<div class="col-lg-4 mx-auto text-center">--}}
            {{--<a class="btn btn-link contact-link" id="github-profile">--}}
                {{--<i class="fa fa-github fa-3x mb-3 sr-contact"></i><br>--}}
                {{--<span class="contact-text text-primary"></span></a>--}}
            {{--</div>--}}
            <div class="col-lg-4 mx-auto text-center">
                <a class="btn btn-link contact-link text-dark" id="phone-number">
                    <i class="fa fa-phone fa-3x mb-3 sr-contact"></i><br>
                    <p class="contact-text text-primary"></p></a>
            </div>
            <div class="col-lg-4 mx-auto text-center">
                <a class="btn btn-link contact-link text-dark" id="email-address">
                    <i class="fa fa-envelope fa-3x mb-3 sr-contact"></i><br>
                    <p class="contact-text text-primary"></p></a>
            </div>
            <div class="col-lg-4 mx-auto text-center">
                <a class="btn btn-link contact-link text-dark" id="facebook-link">
                    <i class="fa fa-facebook fa-3x mb-3 sr-contact"></i><br>
                    <p class="contact-text text-primary"></p></a>
            </div>
        </div>

    </div>
</section>
