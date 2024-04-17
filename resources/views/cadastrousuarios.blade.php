<form action="{{ route('user.post.register') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="group-input">
        <label for="user">Usuario:</label>
        <input type="text" name="user" id="user">
    </div>
    <div class="group-input">
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password">
    </div>
    <button type="submit">Cadastrar</button>
</form>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(function () {
        var $form = $("form")

        $form.submit(function (e) { 
            e.preventDefault();
            
            var method = $form.attr("method");
            var action = $form.attr("action");

            $.ajax({
                type: method,
                url: action,
                data: $form.serialize(),
                dataType: "json",
                success: function (response) {
                    if(response.type =="sucess"){
                        location.href = response.redirect;
                    }
                }
            });
        });
    })
</script>