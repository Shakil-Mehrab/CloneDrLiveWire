@props([
    'title' => '',
])

<div x-data="{ showModal: false }">
    <x-button.default @click="showModal = true" @close-modal.window="showModal = false" type="button"><i
            class="text-green-600 far fa-plus fa-2x"></i></x-button.default>
    <div x-cloak :class="showModal ? '' : 'hidden'" class="fixed inset-0 overflow-hidden"
        aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="absolute inset-0 overflow-hidden">
            <div :class="showModal ? 'opacity-100' : 'opacity-0'"
                class="absolute inset-0 transition-opacity duration-500 ease-in-out bg-gray-500 bg-opacity-75"
                aria-hidden="true"></div>

            <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
                <div :class="showModal ? 'translate-x-0' : 'translate-x-full'"
                    class="w-screen max-w-md transition duration-500 ease-in-out transform sm:duration-700">
                    <div class="flex flex-col h-full py-6 bg-white shadow-xl">
                        <div class="px-4 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                    {{ $title }}
                                </h2>
                                <div class="flex items-center ml-3 h-7">
                                    <button @click="showModal = false"
                                        class="text-gray-400 bg-white rounded-md hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                        <span class="sr-only">Close panel</span>
                                        <i class="far fa-times fa-2x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="relative flex-1 px-4 mt-6 sm:px-6">
                            <div class="absolute inset-0 px-4 sm:px-6">
                                <div class="h-full p-4 overflow-y-auto border-2 border-gray-200 border-dashed"
                                    aria-hidden="true">
                                    {{ $slot }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
