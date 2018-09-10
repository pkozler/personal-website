<section class="bg-dark" id="message">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 mx-auto text-center text-faded">
                <h2 class="section-heading">Vzkazy</h2>
                <hr class="primary">
                <div id="message-list"></div>
            </div>
        </div>

        <div @guest data-toggle="tooltip" data-html="true" title="<p class='lead'>Pro odeslání vzkazu je vyžadováno přihlášení.</p>" @endguest>
            <form method="POST">
                <div class="row">
                    <div class="col-lg-12 mx-auto text-center">

                        <div class="form-group">
                            <label class="text-faded" for="message-input-content"> Nový vzkaz:</label>
                            <textarea @guest disabled @endguest class="form-control" id="message-input-content" required="required" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <button @guest disabled @endguest type="submit" class="page-scroll btn btn-default sr-button pull-right">Odeslat</button>
                        </div>

                        <a href="http://antispam.er.cz/"><img src="http://as.er.cz/n.gif" width="1" height="1" border="0" alt="Antispam.er.cz" /></a>

                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
