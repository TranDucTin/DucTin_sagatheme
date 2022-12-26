@extends('layouts.app')
<div class="h-50"></div>
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
  @endwhile
@endsection
