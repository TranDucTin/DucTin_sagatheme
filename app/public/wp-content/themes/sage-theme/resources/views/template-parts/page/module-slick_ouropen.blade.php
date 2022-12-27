<section class="w-full bg-slate-100">
  <div class="carousel2 w-4/5 mx-[auto]">
    <div class="">
      <div class="flex">
        <div class="w-1/2 mx-25 my-50">
        {!! $data->module['content'] !!}
      </div>
      <div class="w-1/2 flex mx-25 my-40">
        <div class="w-1/2">
        @foreach ($data->module['image'] as $item)
            <img src="{{$item->image1->url}}" alt="">
        @endforeach
        </div>
        <div class="w-1/2">
        @foreach ($data->module['image'] as $item)
          <img src="{{$item->image2->url}}" alt="">
        @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="flex">
      <div class="w-1/2 mx-25 my-50">
      {!! $data->module['content'] !!}
    </div>
    <div class="w-1/2 flex mx-25 my-40">
      <div class="w-1/2">
      @foreach ($data->module['image'] as $item)
          <img src="{{$item->image1->url}}" alt="">
      @endforeach
      </div>
      <div class="w-1/2">
      @foreach ($data->module['image'] as $item)
        <img src="{{$item->image2->url}}" alt="">
      @endforeach
      </div>
    </div>
  </div>
</div>
<div class="">
  <div class="flex">
    <div class="w-1/2 mx-25 my-50">
    {!! $data->module['content'] !!}
  </div>
  <div class="w-1/2 flex mx-25 my-40">
    <div class="w-1/2">
    @foreach ($data->module['image'] as $item)
        <img src="{{$item->image1->url}}" alt="">
    @endforeach
    </div>
    <div class="w-1/2">
    @foreach ($data->module['image'] as $item)
      <img src="{{$item->image2->url}}" alt="">
    @endforeach
    </div>
  </div>
</div>
</div>
</div>
</section>
