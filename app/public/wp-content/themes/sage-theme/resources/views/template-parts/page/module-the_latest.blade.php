<section class="container flex flex-col justify-center w-4/5 2xl:w-3/5 ">
  <div class=" flex flex-col w-full ">
    {!! $data->module['content'] !!}
    <div class="flex  flex-col  w-full  xl:flex-row">
      <div class="shadow-2xl  rounded-b-4xl mb-[30px]xl:row">
        @foreach ($data->module['content2'] as $item)
            <img class="w-full" src="{{$item->image->url}}" alt="">
            <div class="w-4/5 ml-20">
              {!! $item->content_1 !!}
              <button>
              <a href="{{$item->link1->url}}"">{{$item->link1->title}}</a>
              <span class="icomoon icon-chevron-right"></span>
            </button>
            </div>
        @endforeach
      </div>
      <div class="flex flex-col col-span-2 xl:row xl:ml-[30px] ">
        <div class=" shadow-2xl  rounded-4xl col mb-[30px] ">
          @foreach($data->module['content3'] as $item)
          {!! $item->content_1 !!}
          <button>
            <a href="{{$item->link->url}}"">{{$item->link->title}}</a>
            <span class="icomoon icon-chevron-right"></span>
          </button>
          @endforeach
        </div>
      </div>
    </div>
    <div class="absolute ">
      <img src="{!! App::getLogo()['bgHide'] !!}" alt="{!! App::getLogo()['alt'] !!}">
  </div>
  </div>
</section>
