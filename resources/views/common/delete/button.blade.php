<!-- Delete Button that triggers the a confirmation modal -->
<button class="btn btn-danger btn-sm delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"
    data-url="{{ $url }}">
    Delete
</button>

@push('scripts')
    <script src="{{ asset('js/delete-modal.js') }}"></script>
@endpush