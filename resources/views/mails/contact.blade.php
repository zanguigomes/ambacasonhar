@if(isset($data['first-name']))

<h2>Olá, Manager</h2>
<h5>Foi enviada uma mensagem pela página de contacto do site.</h5>
<hr>
<p>Remetente: {{ $data['first_name'] . ' ' . $data['last_name'] }}</p>
<p>Email: {{ $data['email'] }}</p>
<p>Tefefone: {{ $data['phone'] }}</p>
<p>Assunto: {{ $data['subject'] }}</p>
<hr>
<p>{{ $data['message'] }}</p>

@endif
