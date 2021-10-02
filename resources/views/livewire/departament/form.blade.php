<style>
  .-z-1 {
    z-index: -1;
  }

  .origin-0 {
    transform-origin: 0%;
  }

  input:focus ~ label,
  input:not(:placeholder-shown) ~ label,
  textarea:focus ~ label,
  textarea:not(:placeholder-shown) ~ label,
  select:focus ~ label,
  select:not([value='']):valid ~ label {
    /* @apply transform; scale-75; -translate-y-6; */
    --tw-translate-x: 0;
    --tw-translate-y: 0;
    --tw-rotate: 0;
    --tw-skew-x: 0;
    --tw-skew-y: 0;
    transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate))
      skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    --tw-scale-x: 0.75;
    --tw-scale-y: 0.75;
    --tw-translate-y: -1.5rem;
  }

  input:focus ~ label,
  select:focus ~ label {
    /* @apply text-black; left-0; */
    --tw-text-opacity: 1;
    color: rgba(156, 163, 175, var(--tw-text-opacity));
    left: 0px;
  }
</style>
<form class="w-full">
  <div class="relative z-0 w-full mb-5">
      <select
        name="company_id"
        wire:model="company_id"
        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
      >
      <option value="" selected>Selecciona una empresa</option>
        @foreach($list_companies as $company)
        <option value="{{ $company->id }}">{{ $company->name }}</option>
        @endforeach
      </select>
      <label for="company_id" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Empresa</label>
      @error('company_id') <span class="error" style="color: red;">{{ $message }}</span> @enderror
  </div>
  <div class="relative z-0 w-full mb-5">
    <input
      type="text"
      placeholder=" "
      name="name"
      class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
      wire:model="name"
      autocomplete="off"
    />
    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Departamento</label>
    @error('name') <span class="error" style="color: red;">{{ $message }}</span> @enderror
  </div>
  
  <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3"></div>
      <label class="md:w-2/3 block text-grey font-regular">
          <input class="mr-2 leading-tight" type="checkbox" wire:model="enable">
          @error('enable') <span class="error" style="color: red;">{{ $message }}</span> @enderror
          <span class="text-sm">
              Registro Activo
          </span>
      </label>
  </div>
</form>