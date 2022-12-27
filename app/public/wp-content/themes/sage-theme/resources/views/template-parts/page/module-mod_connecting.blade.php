<section class=" flex justify-center w-full  ">
  <div class=" flex flex-col lg:flex-row xl:w-4/5 2xl:w-3/5 ">
      <div class=" w-full col ">
          <img class="min-w-[50px] "
              src=" {{ $data->module['image']->url }} "alt="{{ $data->module['image']->alt }}">
      </div>
      <div class="mt-[10%] col w-full justify-center lg:row lg:w-4/5 xl:w-full ">
          @foreach ($data->module['content'] as $test)
              <h2>{!! $test->content1 !!}</h2>
              <p>{!! $test->content2 !!}</p>
          @endforeach
          <button class="w-102 h-30 rounded-13 btn-brown text-base font-bold">LEARN MORE</button>
      </div>


</section>
