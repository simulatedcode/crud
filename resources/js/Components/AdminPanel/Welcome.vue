<script setup>

</script>

<template>
    <div>
        <div class="p-6 sm:px-10 bg-white border-b border-gray-200">
            <div class="text-2xl">
               Hi, {{ $page.props.user.name }}!
            </div>

            <div class="mt-6 text-gray-500">
                Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                ecosystem to be a breath of fresh air. We hope you love it.
            </div>
        </div>
        <div>
            {{ $page.props.user.updated_at }}
        </div>
    </div>
</template>
