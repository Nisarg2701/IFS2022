@php
  use App\Models\Services;
  $services = Services::all();
@endphp

<footer contentEditable class="footer">

<div class="foot-main">
    <div class="row">
            <h2>Innovative Financial solution</h2><br>
    </div>
    <div class="row">
        <div class="col-sm-6">
            SF-5 (2nd. Floor) Diamond Square,<br>
            Navjivan Press Road, Income Tax,<br>
            Ahmedabad - 380014<br><br>
            <div class = "phno">
                Phone: +91 9725012819<br><br>
            </div>
            <div class = "email">
                E-mail: pakhawala@rediffmail.com<br><br>
            </div>
        </div>
        <div class="col-sm-6">
            <h5><b>Services</b></h5>
            <div class="services">
                @foreach ($services as $service)
                    <a href="{{ url('/services/'.$service->name) }}">{{ $service->name }}</a><br>
                @endforeach
            </div>
            <a href='https://www.freepik.com/vectors/digital-lines'>Digital lines vector created by starline - www.freepik.com</a>
        </div>
    </div>
</div>

</footer>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- for awards -->
    <script type="text/javascript">
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
<script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ url('js/owl.carousel.min.js') }}" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
</body>
</html>

