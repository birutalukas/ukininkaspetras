{{--
  Template Name: Text Content
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="container mt-24 md:mt-0 pb-20 md:pb-32">

      @include('partials.page-header', ['center' => true])

      <div class="mx-auto max-w-[58rem]">
        @includeFirst(['partials.content-page', 'partials.content'])
      </div>

    </div>
  @endwhile
@endsection
