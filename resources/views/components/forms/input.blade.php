<label class="flex flex-col">
  <div class="flex justify-between items-center">
    <span class="text-gray-500 mb-1.5 text-sm">{{ $label }}</span>
    @error($name)
      <span class="text-red-500 mb-1.5 text-sm">{{ $message }}</span>
    @enderror
  </div>
  <input 
    name="{{ $name }}" 
    type="{{ $type }}" 
    placeholder="{{ $placeholder }}"
    value="{{ old($name) }}"
    autocomplete="off"
    class="border border-gray-300 placeholder:text-gray-300 text-gray-700 rounded-md px-3 py-2 outline-none"
  />
</label>