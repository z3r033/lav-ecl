<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @if ($currentPage == PAGECREATEFORM)
    @include('livewire.articles.create')
    @endif
    @if ($currentPage == PAGEEDITFORM)
    @include('livewire.articles.edit')
    @endif
    @if($currentPage == PAGELIST)
        @include('livewire.articles.lists')
    @endif
</div>