@if (session()->has('error_message'))
    <div class="flex items-center mb-2 bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
        {{ session('error_message') }}
    </div>
@endif
@if (session()->has('success_message'))
    <div class="flex items-center mb-2 bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
        {{ session('success_message') }}
    </div>
@endif