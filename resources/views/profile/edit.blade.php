<x-app-layout>
        
    <div class="py-12">        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="text-xl px-8">{{ __('Edição de Perfil') }}</div>

            @if (session('status'))
                <div class="text-xl ml-8 p-2 text-white bg-green-600 rounded-lg" x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                    {{ __('Perfil salvo com sucesso!') }}
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
