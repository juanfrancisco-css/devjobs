
    <!-- When there is no desire, all things are at peace. - Laozi -->
    @php
        $classes=" text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800";
    @endphp
     <!-- 
        $attributes = es una variable que existe en los componentes de laravel 
        merge= Unir todos los atributos que le pasemos como es en este caso las clases 
        y le decimos que se llama $classes es igual a class ( en html se usa class)
    -->
    <a {{ $attributes->merge(['class' =>$classes ]) }}>
        {{--{{ __('Forgot your password?') }}--}}
        {{$slot}}
    </a>
