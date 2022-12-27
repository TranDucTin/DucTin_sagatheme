<section class="wrap 2xl:flex xl:w-4/5 xl:flex-none xl:justify-center mx-auto">
<div class="title 2xl:w-2/5 2xl:mr-[90px] xl:w-full lg:w-3/4 lg:mx-[auto] md:w-3/4 md:mx-[auto]">
    <div class="Line-4 mb-[9px]"></div>
    {!! $data->module['content1'] !!}
  </div>
  <div class="info 2xl:w-3/5 xl:w-full xl:flex lg:flex-none lg:mx-[auto]">
    <div class="column1 mr-2.5 xl:w-1/2 md:w-3/4 md:mx-[auto]">
      @foreach ($data->module['content2'] as $test)
      {!! $test->content_a !!}
      {!! $test->content_b !!}
  @endforeach
  <div class="xl:w-4/5 ">
    @foreach ($data->module['content3'] as $test)
    {!! $test->content_a !!}
    {!! $test->content_b !!}
  @endforeach
  </div>
    </div>
  <div class="column2 xl:w-1/2 md:w-3/4 md:mx-[auto]">
    <div class="xl:w-4/5">
    @foreach ($data->module['content4'] as $test)
      {!! $test->content_a !!}
      {!! $test->content_b !!}
    @endforeach
      </div>
      <div class="xl:w-4/5">
    @foreach ($data->module['content5'] as $test)
      {!! $test->content_a !!}
      {!! $test->content_b !!}
    @endforeach
      </div>
    </div>
  </div>
</section>







