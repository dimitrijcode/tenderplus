@props(['name', 'label', 'placeholder' => '', 'value' => ''])

<div style="margin-bottom: 1rem;">
    <label for="{{ $name }}"><b>{{ $label }}</b></label><br>
    <input type="text" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}" class="border border-gray-300 rounded px-2 py-1 w-full">
    @error($name) <div style="color: red;">{{ $message }} </div> @enderror
</div>
