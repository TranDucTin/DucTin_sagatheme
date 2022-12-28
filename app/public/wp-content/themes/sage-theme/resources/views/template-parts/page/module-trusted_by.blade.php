<section class="flex  justify-center w-full">
  <div class="container w-4/5">
    <div class="flex flex-col justify-center text-center">
      <div class="     ">
        {!! $data->module['content1']!!}
      </div>
      <div class="carousel6 flex">
        <div class="">
          <div class="flex w-full items-center justify-around">
            @foreach ($data->module['image'] as $item)
            <div>
                <img src="{{$item->image_repeater->url}}" alt="">
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
