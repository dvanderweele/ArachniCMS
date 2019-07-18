<div>
  <h1>Contact Form Submission: {{ config('app.name') }}</h1>
  <p>Note: this email is the only record of this contact form submission.</p>
</div>
<div>
  <h2>Submission Timestamp</h2>
  <p>{{ $submission['time'] }}</p>
</div>
<div>
  <h2>Submitter's Name</h2>
  <p>{{ $submission['name'] }}</p>
</div>
<div>
  <h2>Submitter's Email</h2>
  <p>{{ $submission['email'] }}</p>
</div>
<div>
  <h2>Submitter's Message</h2>
  <p>
    {{ $submission['contact_body'] }}
  </p>
</div>