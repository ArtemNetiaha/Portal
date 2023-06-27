<div class="form-group">
    <label for="category">Category</label>
    <select name="category_id" id="category">
        @foreach($categories as $category)
            <option @selected($category->id == old('category_id', $current))
                    value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>
    @error('category_id')
    <p style="color: darkred">{{ $message }}</p>
    @enderror
</div>
