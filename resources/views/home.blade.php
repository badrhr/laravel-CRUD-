<x-layout>

    <x-slot:heading>
        Home Page
    </x-slot:heading>
    <h1> Welcome page : </h1>

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
