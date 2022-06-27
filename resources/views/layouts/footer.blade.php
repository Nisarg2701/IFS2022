@php
  use App\Models\Services;
  $services = Services::all();
@endphp

<footer class="footer">

<div class="foot-main">
    <div class="row">
            <h2>Innovative Financial solution</h2><br>
    </div>
    <div class="row">
        <div class="col-sm-6 text-base">
            SF-5 (2nd. Floor) Diamond Square,<br>
            Navjivan Press Road, Income Tax,<br>
            Ahmedabad - 380014<br><br>
            <div class = "phno" style="font-size:17px">
                Phone: +91 9725012819<br><br>
            </div>
            <div class = "email" style="font-size:17px">
                E-mail: pakhawala@rediffmail.com<br><br>
            </div>
        </div>
        <div class="col-sm-6 ">
            <h5><b class="text-2xl">Services</b></h5>
            <div class="services">
                @foreach ($services as $service)
                <div class="pb-2">
                    <a style="font-size:17px" href="{{ url('/services/'.$service->name) }}">{{ '> '.$service->name }}</a><br>
                </div>
                @endforeach
            </div>
            <a contenteditable="true" style="color:white; font-size:6px; font-style:none;" href='https://www.freepik.com/vectors/digital-lines'>Digital lines vector created by starline - www.freepik.com</a>
        </div>
    </div>
</div>

</footer>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="{{ url('owlcarousel/owl.carousel.min.js') }}"></script>


</body>
</html>

