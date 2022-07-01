@php

    function uniqueIds($min, $max, $quantity){
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }

    use App\Models\Testimonials;
    $testimonials = Testimonials::all();
    $testimonial_ids = array();
    foreach($testimonials as $testimonial){
        if($testimonial->visibility == 'yes'){
            array_push($testimonial_ids, $testimonial->testimonial_id);
        }
    }
    $testimonial_id = uniqueIds(0, sizeof($testimonial_ids)-1, 2);

    use App\Models\Awards;
    $awards = Awards::all();
    $award_ids = array();
    foreach($awards as $award){
      array_push($award_ids, $award->awards_id);
    }

    use App\Models\Principals;
    $principals = Principals::all();
@endphp

@extends('layouts.main')
@push('title', 'About Us')
@section('main_content')
    <h1 class='heading'>About Us</h1>
<div class="aboutus-body">

<!-- company info -->
  <div class="container">
    <h1 class="text-3xl font-medium title-font text-white mb-12 aboutus-heading">Company Information</h1>
    <p class="aboutus-info text-white">
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </p>
  </div>
<section class="text-gray-600 bg-transparent body-font">
  <div class="px-2 py-8 mx-auto flex flex-col">
    <div class="lg:w-4/6 mx-auto">
      <div class="flex flex-col sm:flex-row mt-10">
        <div class="sm:w-1/2 text-center sm:pr-8 sm:py-8">
          <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
            <img alt="narendra pakhawala" src="{{ url('images\narendra_pakhawala.jpeg') }}"  class="w-20 h-20 rounded-full inline-flex items-center justify-center"/>
          </div>
          <div class="flex flex-col items-center text-center justify-center">
            <h2 class="font-medium title-font mt-4 text-white text-lg">Narendra Pakhawala (MBA)</h2>
            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
            <p class="text-base text-white">Ex. State Manager - Fullerton India <br> Ex. Manager - ICICI Bank (HL & Mrtg.)</p>
          </div>
        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
          <p class="leading-relaxed text-white mb-4">Meggings portland fingerstache lyft, post-ironic fixie man bun banh mi umami everyday carry hexagon locavore direct trade art party. Locavore small batch listicle gastropub farm-to-table lumbersexual salvia messenger bag. Coloring book flannel truffaut craft beer drinking vinegar sartorial, disrupt fashion axe normcore meh butcher. Portland 90's scenester vexillologist forage post-ironic asymmetrical, chartreuse disrupt butcher paleo intelligentsia pabst before they sold out four loko. 3 wolf moon brooklyn.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!--testimonials -->
  <section class="text-gray-600 bg-transparent body-font container">
  <div class=" px-2 py-8 mx-auto">
    <h1 class="text-3xl font-medium title-font text-white mb-12 text-center aboutus-heading">
    Testimonials</h1>
    <div class="flex flex-wrap -m-4">
      @php
          $size = sizeof($testimonial_ids);
          if($size < 2){
            $n=$size;
          }else{
            $n=2;
          }
      @endphp
        @for ($i = 0; $i < $n; $i++)
        @php
            $testimonial = Testimonials::find($testimonial_ids[$testimonial_id[$i]]);
        @endphp
        <div class="p-4 md:w-1/2 w-full">
            <div class="h-full bg-gray-100 p-8 rounded">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
              </svg>
              <p class="leading-relaxed text-gray-900 mb-6">{{ $testimonial->testimonials }}</p>
              <a class="inline-flex items-center">
                <img alt="testimonial" src="{{ url('storage/'.$testimonial->image) }}" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                <span class="flex-grow flex flex-col pl-4">
                  <span class="title-font font-medium text-gray-900">{{ $testimonial->name }}</span>
                  <span class="text-gray-500 text-sm">{{ $testimonial->designation }}</span>
                </span>
              </a>
            </div>
          </div>
        @endfor
    </div>
  </div>
</section>

<!-- awards -->
<h1 class="text-3xl font-medium title-font text-white mb-12 text-center aboutus-heading">
    Awards</h1>
<div class="owl-carousel owl-theme text-white">
    @foreach ($awards as $award)
        <div class="item">
            {{-- <h4 class="bg-white text-black text-center">{{ $award->name }}</h4> --}}
            <img class="h-25" src = "{{ url('storage/'.$award->image) }}" alt="{{ $award->name }} image"  style="height:10vh"/>
            <div class="bg-white text-black text-center">{{ $award->description }}</div>
        </div>
    @endforeach
</div>
  <script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            stagePadding: 50,
            center: true,
            loop:true,
            margin:10,
            autoplay:true,
            autoWidth:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            nav:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:5,
                    nav:true,
                    loop:true
                }
            }
        });
    });
</script>

<!-- principals -->
<section class="px-4 py-8 mx-auto max-w-7xl">
    <div class=" px-2 py-8 mx-auto">
        <h1 class="text-3xl font-medium title-font text-white mb-12 text-center aboutus-heading">
        Principals </h1>
        <div class="grid grid-cols-2 gap-10 text-center lg:grid-cols-8">
            @foreach ($principals as $principal)
                <div class="flex items-center justify-center">
                    <img src="{{ url('storage/'.$principal->image)}}" alt='{{ $principal->name }}' class="block object-contain h-12" />
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
</div>
