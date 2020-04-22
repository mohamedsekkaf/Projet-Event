@section("content")
@if(Auth::user()->name = 'polat')
<table>
    @foreach($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->pass}}</td>
    </tr>
    @endforeach
</table>
@else
<h1 style="text-align:center ; color:red;">error</h1>
@endif
@section("content")