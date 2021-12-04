@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opa!</strong> Tem algum problema com seu input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
