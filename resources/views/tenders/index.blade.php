<div>
    Header comes here
</div>

<h1>Tenders overview</h1>
<p>This is the full content of our tender platform</p>
<ul>
@foreach($tenders as $tender)
    <li><b>{{ $tender->title }}</b> by {{ $tender->organization_name }} ({{ $tender->location }})</li>
@endforeach
</ul>

<div>
    Footer comes here
</div>
