<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate New Website') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <form method="POST" action="{{ route('websites.store') }}">
                    @csrf

                    <div>
                        <x-label for="name" value="{{ __('Website Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="subfolder_name" value="{{ __('Subfolder Name') }}" />
                        <x-input id="subfolder_name" class="block mt-1 w-full" type="text" name="subfolder_name" required />
                    </div>

                    <!-- New fields -->
                    <div class="mt-4">
                        <x-label for="company_name" value="{{ __('Company Name') }}" />
                        <x-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" />
                    </div>

                    <div class="mt-4">
                        <x-label for="contact_email" value="{{ __('Contact Email') }}" />
                        <x-input id="contact_email" class="block mt-1 w-full" type="email" name="contact_email" />
                    </div>

                    <div class="mt-4">
                        <x-label for="phone_number" value="{{ __('Phone Number') }}" />
                        <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" />
                    </div>

                    <div class="mt-4">
                        <x-label for="address" value="{{ __('Address') }}" />
                        <x-input id="address" class="block mt-1 w-full" type="text" name="address" />
                    </div>

                    <div class="mt-4">
                        <x-label for="logo_path" value="{{ __('Logo Path') }}" />
                        <x-input id="logo_path" class="block mt-1 w-full" type="text" name="logo_path" placeholder="URL or relative path" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Generate') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
