<div class="flex flex-col gap-6">
    <!-- Header -->
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ __('Forgot password') }}</h2>
        <p class="text-gray-600">{{ __('Enter your email to receive a password reset link') }}</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-center">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                {{ __('Email Address') }}
            </label>
            <input
                id="email"
                wire:model="email"
                type="email"
                required
                autofocus
                placeholder="email@example.com"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white text-gray-900"
            >
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-gray-900 text-white px-8 py-3 rounded-lg font-medium hover:bg-gray-800 transition-colors">
            {{ __('Email password reset link') }}
        </button>
    </form>

    <div class="text-center text-sm text-gray-600">
        <span>{{ __('Or, return to') }}</span>
        <a href="{{ route('login') }}" wire:navigate class="text-primary-600 hover:text-primary-800 font-medium">
            {{ __('log in') }}
        </a>
    </div>
</div>
