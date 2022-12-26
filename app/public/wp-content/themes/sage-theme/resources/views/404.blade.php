@extends('layouts.app')

@section('content')
  <section class="module mod-404 9w-content-not-foundwrelative">
    <div class="container text-center">
      @if (!have_posts())
        <div class="table mx-auto w-full">
          <div class="table-cell py-50 last-mb-none align-middle">
            {!! App::getContent404() !!}
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection