<h1>
    Hai ricevuto un messaggio da 
</h1>
<ul>
    <li>Nome:{{$contact->name}} </li>
    <li>Email:{{$contact->email}} </li>
    <li>Messaggio:{!! nl2br($contact->message) !!} </li>
</ul>