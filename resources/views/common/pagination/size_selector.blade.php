<!-- Form for selecting the number of items per page -->
<form method="GET" action="{{ $url }}" class="mb-3">
    <label for="per_page">Items per page:</label>
    <select name="per_page" id="per_page" onchange="this.form.submit()">
        <option value="5" {{ request('per_page', 10) == 5 ? 'selected' : '' }}>5</option>
        <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
        <option value="20" {{ request('per_page', 10) == 20 ? 'selected' : '' }}>20</option>
    </select>
</form>