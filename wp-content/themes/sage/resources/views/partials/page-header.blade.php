
@props(['center' => false])

<div class="mt-20 md:mt-36 py-6 sm:py-8 md:py-14" id="page-header">
    <div class="w-full flex items-center justify-start {{ $center ? 'max-w-[58rem] mx-auto' : '' }}">
      <h1 class="section-title">{!! $title !!}</h1>
    </div>    
</div>
