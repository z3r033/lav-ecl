<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @if ($currentPage == PAGECREATEFORM)
    @include('livewire.utilisateurs.create')
    @endif
    @if ($currentPage == PAGEEDITFORM)
    @include('livewire.utilisateurs.edit')
    @endif
    @if($currentPage == PAGELIST)
        @include('livewire.utilisateurs.lists')
    @endif
</div>