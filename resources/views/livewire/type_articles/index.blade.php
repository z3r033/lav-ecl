<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @if ($currentPage == PAGECREATEFORM)
    @include('livewire.type_articles.create')
    @endif
    @if ($currentPage == PAGEEDITFORM)
    @include('livewire.type_articles.edit')
    @endif
    @if($currentPage == PAGELIST)
        @include('livewire.type_articles.lists')
    @endif
</div>