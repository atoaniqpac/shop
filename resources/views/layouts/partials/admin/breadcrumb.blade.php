@if (count($breadcrumbs))

    <nav class="ml-4 text-black dark:text-white">

        <ol class="flex flex-wrap">
            @foreach ($breadcrumbs as $item)
                <li class="text-sm leading-normal {{ !$loop->first ? "pl-2 before:float-left before:pr-2 before:content-['/']" : '' }}">
                    @isset($item['route'])
                        <a href="{{ $item['route'] }}" class="opacity-50 hover:opacity-75">
                            {{ __($item['name'])  }}
                         </a>
                    @else
                            {{ __($item['name'])  }}  
                    @endisset
                </li>
            @endforeach
        </ol>    
        
        @if (count($breadcrumbs) > 1)
            <h6 class="font-bold">
                {{ __(end($breadcrumbs)['name']) }}
            </h6>
        @endif

    </nav>

@endif