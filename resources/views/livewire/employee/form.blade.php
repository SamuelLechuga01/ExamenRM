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
  <div class="grid grid-cols-4 gap-6">
    <div class="col-span-3 sm:col-span-1">
      <div class="relative z-0 w-full mb-5">
        <input
          type="text"
          placeholder=" "
          name="name"
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200 text-xs"
          wire:model.lazy="name"
          autocomplete="off"
        />
        <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">*Nombre</label>
        @error('name') <span class="error" style="color: red;">{{ $message }}</span> @enderror
      </div>
    </div>

    <div class="col-span-3 sm:col-span-1">
      <div class="relative z-0 w-full mb-5">
        <select
          name="gender"
          wire:model="gender"
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200 text-xs"
        >
          <option value="" selected>Selecciona un género</option>
          <option value="Femenino">Femenino</option>
          <option value="Masculino">Masculino</option>
        </select>
        <label for="gender" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Género</label>
        @error('gender') <span class="error" style="color: red;">{{ $message }}</span> @enderror
      </div>
    </div>

    <div class="col-span-3 sm:col-span-1">
       <div class="relative z-0 w-full mb-5">
        <input
          type="email"
          placeholder=" "
          name="email"
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200 text-xs"
          wire:model="email"
          autocomplete="off"
        />
        <label for="email" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">*Correo:</label>
        @error('email') <span class="error" style="color: red;">{{ $message }}</span> @enderror
      </div>
    </div>

    <div class="col-span-3 sm:col-span-1">
       <div class="relative z-0 w-full mb-5">
        <input
          type="date"
          placeholder=" "
          name="birthday"
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200 text-xs"
          wire:model="birthday"
          autocomplete="off"
        />
        <label for="birthday" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">*F. de nacimiento</label>
        @error('birthday') <span class="error" style="color: red;">{{ $message }}</span> @enderror
      </div>
    </div>
  </div>

  <div class="grid grid-cols-4 gap-6">
    <div class="col-span-3 sm:col-span-1">
      <div class="relative z-0 w-full mb-5">
        <input
          type="number"
          placeholder=" "
          name="phone"
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200 text-xs"
          wire:model.lazy="phone"
          autocomplete="off"
        />
        <label for="phone" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Teléfono</label>
        @error('phone') <span class="error" style="color: red;">{{ $message }}</span> @enderror
      </div>
    </div>
    <div class="col-span-3 sm:col-span-1">
      <div class="relative z-0 w-full mb-5">
        <input
          type="number"
          placeholder=" "
          name="mobile"
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200 text-xs"
          wire:model.lazy="mobile"
          autocomplete="off"
        />
        <label for="mobile" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Celular</label>
        @error('mobile') <span class="error" style="color: red;">{{ $message }}</span> @enderror
      </div>
    </div>
    <div class="col-span-3 sm:col-span-1">
      <div class="col-span-3 sm:col-span-1">
        <div class="relative z-0 w-full mb-5">
          @if($create)
          <input
            type="text"
            name="date"
            placeholder=" "
            onclick="this.setAttribute('type', 'date');"
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200 text-xs"
            wire:model.lazy="date"
          />
          @endif
          @if($edit)
           <input
            type="text"
            name="date"
            placeholder=" "
            onclick="this.setAttribute('type', 'date');"
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200 text-xs"
            wire:model.lazy="date"
            readOnly="true"
          />
          @endif
          <label for="date" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">*F. de ingreso</label>
          @error('date') <span class="error" style="color: red;">{{ $message }}</span> @enderror
        </div>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-4 gap-6">
    <div class="col-span-3 sm:col-span-1">
      <div class="relative z-0 w-full mb-5">
        <select
          name="company_id"
          wire:model="company_id"
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200 text-xs"
        >
        <option value="" selected>Selecciona una empresa</option>
          @foreach($list_companies as $company)
          <option value="{{ $company->id }}">{{ $company->name }}</option>
          @endforeach
        </select>
        <label for="company_id" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Empresa</label>
        @error('company_id') <span class="error" style="color: red;">{{ $message }}</span> @enderror
      </div>
    </div>
    <div class="col-span-3 sm:col-span-1">
      <div class="relative z-0 w-full mb-5">
        <select
          name="departament_id"
          wire:model="departament_id"
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200 text-xs"
        >
        <option value="" selected>Selecciona un departamento</option>
          @foreach($list_departaments as $departament)
          <option value="{{ $departament->id }}">{{ $departament->name }}</option>
          @endforeach
        </select>
        <label for="departament_id" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Departamento</label>
        @error('departament_id') <span class="error" style="color: red;">{{ $message }}</span> @enderror
      </div>
    </div>
  </div>
  

  

  

  

  
  
  
</form>