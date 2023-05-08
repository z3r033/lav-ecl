<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @if ($currentPage == PAGECREATEFORM)
    @include('livewire.reclamations.create')
    @endif
    @if ($currentPage == PAGEEDITFORM)
    @include('livewire.reclamations.edit')
    @endif
    @if($currentPage == PAGELIST)
        @include('livewire.reclamations.lists')
    @endif
</div>