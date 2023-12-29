<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
    ]
]">
 
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bicolor rounded-lg shadow-lg p-6">
            <div class="flex items-center">
                <img class="h-12 w-12 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                <div class="ml-4 flex-1">
                    <h2 class="font-semibold">
                        Bienvenido: {{ Auth::user()->name }}
                    </h2>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="text-sm hover:text-blue-500">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bicolor rounded-lg shadow-lg p-6 flex items-center justify-center">
            <h2 class="font-semibold">
                Bienvenido al panel de administración
            </h2>
        </div>
    </div>

</x-admin-layout>