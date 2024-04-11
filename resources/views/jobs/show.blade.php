<x-layout>

    <x-slot:heading>
        Job Page
    </x-slot:heading>
    <h1> Welcome to the Job page : </h1>

    <ul>
       <li> {{$job['title']}} has {{$job['salary']}} as a salary per year</li>

    </ul>

    <p class="mt-6">
        <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    </p>
</x-layout>
