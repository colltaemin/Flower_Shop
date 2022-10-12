<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="h-20 w-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Bạn hãy nhập Email đăng kí và bấm xác nhận, chúng tối sẽ gửi link lấy lại mật khẩu tới Email của bạn.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <x-button>
                    {{ __('Xác nhận') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
