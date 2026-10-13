@props(['name', 'label', 'placeholder' => '', 'value' => ''])

<div style="margin-bottom: 1rem;">
    <label for="{{ $name }}"><b>{{ $label }}</b></label><br>
    <textarea name="{{ $name }}" placeholder="{{ $placeholder }}" class="border border-gray-300 rounded px-2 py-1 w-full">{{ old($name, $value) }}</textarea>
    @error($name) <div style="color: red;">{{ $message }} </div> @enderror
</div>
