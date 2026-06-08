<h2>New Contact Message from <x-logo /> </h2>

<p><strong>From:</strong> {{ $data['email'] }}</p>
<p class="capitalize"><strong>Subject:</strong> {{ $data['subject'] }}</p>

<x-line :black="true" />

<p class=" text-pretty ">{{ $data['message'] }}</p>