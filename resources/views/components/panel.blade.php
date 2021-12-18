<div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <h3 class="text-lg font-medium leading-6 text-gray-800">
            {{ $title }}
        </h3>
        <div class="mt-2 sm:flex sm:items-start sm:justify-between">
            <div class="max-w-xl text-sm text-gray-400">
                <p>
                    {{ $description }}
                </p>
            </div>
            <div class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:flex sm:items-center">
                {{ $action }}
            </div>
        </div>
    </div>
</div>