<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @if ($currentPage == PAGECREATEFORM)
    @include('livewire.interventions.create')
    @endif
    @if ($currentPage == PAGEEDITFORM)
    @include('livewire.interventions.edit')
    @endif
    @if($currentPage == PAGELIST)
        @include('livewire.interventions.lists')
    @endif
</div>