@props(['title' => '', 'metaDescription' => 'Better Process Management - Expert consulting for Business Process Management, efficiency, and cost optimization.'])

<x-layouts.app :title="$title" :meta-description="$metaDescription">
    {{ $slot }}
</x-layouts.app>
