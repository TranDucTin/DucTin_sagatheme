<section class=" flex justify-center w-full  ">
  <div class=" flex flex-col lg:flex-row xl:w-4/5 2xl:w-3/5 ">
      <div class=" w-full col ">
          <img class="min-w-[50px] "
              src=" {{ $data->module['picture']->url }} "alt="{{ $data->module['picture']->alt }}">
      </div>
      <div class="mt-[10%] col w-full justify-center lg:row lg:w-4/5 xl:w-full ">
          @foreach ($data->module['content'] as $test)
              <h2>{{ $test->heading }}</h2>
              <p>{{ $test->para }}</p>
          @endforeach
          <button class="rounded-2xl  btn-brown text-base font-bold text-center">LEARN MORE</button>
      </div>


</section>
