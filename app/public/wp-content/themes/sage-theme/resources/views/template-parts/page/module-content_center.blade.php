<section class="wrap mod-threecol">
  <div class="cus-container flex flex-col items-center justify-center mx-auto max-w-[1104px]">
    <div class="flex flex-col items-center text-center max-w-[85%] mt-16 mb-16">
      {!! $data->module['content1'] !!}
    </div>
    <div class="xl:flex items-start min-h-[479px]">
      <div class="info-col self xl: w-2/4 md: w-1/3 text- center flex flex-col items-center xl: mt-15 xl: mb-12 md: mx-auto">
        <div>
        <img class="info-icon w-40 h-40 mb-8" src="{{$data->module['image1']->url}}" alt="{{$data->module['image1']->alt}}">
        </div>
        {!! $data->module['content2'] !!}
      <div class="mt-auto">
        <a href="#">
          <span class="text-base font-bold">{{ $data->content_1 }}</span>
          <span class="icomoon icon-chevron-right w-3"></span>
        </a>
      </div>
    </div>
    <div>
      <img class="dot-arrow xl:rotate-90 xl:my-25 md:my-83 md:mx-auto" src="{{$data->module['icon']->url}}" alt="{{$data->module['icon']->alt}}">
    </div>
    <div class="info-col self xl: w-2/4 md: w-1/3 text-center flex flex-col items-center xl: mt-10 xl: mb-12 md: mx-auto ">
      <div>
        <img class="info-icon w-40 h-40" src="{{$data->module['image2']->url}}" alt="{{$data->module['image2']->url}}">
      </div>
      <p>{!! $data->module['content3'] !!}</p>
      <div class="mt-auto">
        <a href="#">
          <span class="text-base font-bold">{{ $data->content_2 }}</span>
          <span class="icomoon icon-chevron-right w-3"></span>
        </a>
      </div>
    </div>
    <div>
      <img class="dot-arrow xl:rotate-0 xl:my-25 md:my-83 md:mx-auto" src="{{$data->module['icon']->url}}" alt="{{$data->module['icon']->alt}}">
    </div>
    <div class="info-col self xl: w-2/4 md: w-1/3 text-center flex flex-col items-center xl: mt-15 xl: mb-12 md: mx-auto">
      <div>
        <img class="info-icon w-40 h-40" src="{{$data->module['image3']->url}}" alt="{{$data->module['image3']->url}}">
      </div>
      <p>{!! $data->module['content4'] !!}</p>
      <div class="mt-auto">
        <a href="#">
          <span class="text-base font-bold">{{$data->content_3}}</span>
          <span class="icomoon icon-chevron-right w-3"></span>
        </a>
      </div>
    </div>
  </div>
  </div>


</section
