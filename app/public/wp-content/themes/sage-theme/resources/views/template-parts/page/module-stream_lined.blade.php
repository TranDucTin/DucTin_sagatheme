<section class="container flex flex-col justify-center w-4/5 2xl:w-3/5 ">
  <div class="w-full flex flex-col justify-between items-center text-center mb-[50px] lg:flex-row ">
    <div class="flex flex-col mb-[50px] lg:ml-3">
      <img class="info-icon w-40 h-40 mb-8" src="{{$data->module['image1']->url}}" alt="{{$data->module['image1']->alt}}">
        <span class="text-5xl font-bold text-black-200 leading-normal"> {!! $data->module['content1']!!}</span>
        <span class="text-4xl leading-tight">{!! $data->module['content2'] !!}</span>
    </div>
    <div class="flex flex-col border-b-4 border-t-4 border-blue-300 mb-[50px]">
      <div>
        <img class="info-icon w-40 h-40 mb-8" src="{{$data->module['image2']->url}}" alt="{{$data->module['image2']->alt}}">
      </div>
      <span class="text-5xl font-bold text-black-200 leading-normal"> {!! $data->module['content3']!!}</span>
      <span class="text-4xl leading-tight">{!! $data->module['content4'] !!}</span>
    </div>
    <div class="flex flex-col mb-[50px]">
      <div>
        <img class="info-icon w-40 h-40 mb-8" src="{{$data->module['image3']->url}}" alt="{{$data->module['image3']->alt}}">
      </div>
      <span class="text-5xl font-bold text-black-200 leading-normal"> {!! $data->module['content5']!!}</span>
      <span class="text-4xl leading-tight">{!! $data->module['content6'] !!}</span>
    </div>
  </div>
</section>
