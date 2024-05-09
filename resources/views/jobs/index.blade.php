<x-layout>
    <x-slot:heading>
         The available Jobs
    </x-slot:heading>

    <ul>
        @foreach($jobs as $job)
            <a href="/jobs/show/{{$job['id']}}">
                <li> {{$job['title']}} </li>
            </a>
        @endforeach
    </ul>

    <div>
        {{ $jobs->links() }}
    </div>
</x-layout>
