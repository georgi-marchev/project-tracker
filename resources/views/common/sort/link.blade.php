<a
    href="{{ request()->fullUrlWithQuery(['sort_by' => $field, 'order' => (request('order') == 'asc' ? 'desc' : 'asc')]) }}">
    {{ $label }}
    @if(request('sort_by') == $field)
        <i class="bi {{ request('order') == 'asc' ? 'bi-sort-up' : 'bi-sort-down' }}"></i>
    @endif
</a>