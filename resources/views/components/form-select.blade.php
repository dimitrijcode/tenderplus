@props(['name', 'label', 'value' => '', 'options'])

<div style="margin-bottom: 1rem;">
    <label for="{{ $name }}"><b>{{ $label }}</b></label><br>
    <select name="{{ $name }}" class="border border-gray-300 rounded px-2 py-1 w-full">
        @foreach ($options as $key => $title)
            <option value="{{ $key }}" @selected(old($name, $value) == $key)>{{ $title }}</option>
        @endforeach
    </select>
    @error($name) <div style="color: red;">{{ $message }} </div> @enderror
</div>
