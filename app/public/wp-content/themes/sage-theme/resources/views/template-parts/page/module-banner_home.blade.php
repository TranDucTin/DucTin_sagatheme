<section class="mod-banner items-center mt-[-50px] min-h-[857px]">
  <div class="container"><h3>Module: Banner Home</h3></div>
   <div class="content flex absolute xl:top-80 xl:right-0 3xl:left-[13%] 2xl:left-[10%] xl:left-37 xl:flex-row xl:text-left lg:flex-col lg:text-center lg:top-54">
    <div class="flex flex-col text-white max-w-[500px] xl:mx-0 xl:items-start lg:mx-[auto] lg:items-center">
    {!! $data->module['content'] !!}
    <a href="#">{{ $data->buttom }}</a>
   </div>
  </div>
  <div class="3xl:ml-113 2xl:ml-35 xl:w-full xl:mt-0 lg:w-4/5 lg:mx-[auto] lg:mt-35">
    <img src="{{$data->module['img']->url}}" alt="{{$data->module['img']->alt}}">
  </div>
  </section>
