<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
  {!! App::getTrackingCode('after_open_body') !!}
  @include('partials.loading')
  <div id="wrapper" class="wrapper has-animation">
    @php do_action('get_header') @endphp
    @include('partials.header')
    <main id="main-content" class="bg-white">
      @yield('content')
    </main>
    @if (App\display_sidebar())
      <aside class="sidebar">
        @include('partials.sidebar')
      </aside>
    @endif
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @include('partials.javascript')
    @php wp_footer() @endphp
    </div>
    {!! App::getTrackingCode('before_close_body') !!}
  </body>
</html>
