@props(['breadcrumbs' => []])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- FontAwesome -->

    <script src="https://kit.fontawesome.com/171971b7c7.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900" :class="{'overflow-y-hidden': sidebarOpen}" x-data= '{ sidebarOpen: false }'>

    <div class="fixed inset-0 bg-gray-900 opacity-50 z-20 sm:hidden" style="display: none" x-show="sidebarOpen" x-on:click="sidebarOpen = false"> 

    </div>

    @include('layouts.partials.admin.navigation')

    @include('layouts.partials.admin.sidebar')

    <div class="mt-14">
        <div class="p-4 sm:ml-64">
            <div class="flex justify-between items-center">
                @include('layouts.partials.admin.breadcrumb')
    
                @isset($action)
                    <div class="mr-4 mt-4">
                        {{ $action }}
                    </div>
                @endisset
            </div>
            <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700">
                {{ $slot }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireScripts
    @stack('js')

    @if (session('swal'))
        
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
        
    @endif

    <script>
        Livewire.on('swal', data => {
            Swal.fire(data[0]);
        });
    </script>

    <script>
        function confirmDelete() {
            Swal.fire({
                title: "¿Estas seguro?",
                text: "!No podrás revertir esta acción!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4338ca",
                cancelButtonColor: "#b91c1c",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Si, eliminar!",
                customClass: {
                    title: 'text-black',
                    confirmButton: 'btn-danger',
                    cancelButton: 'btn-primary',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            });
        }
    </script>
</body>

</html>
