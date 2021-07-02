        $(document).ready(function() {
            $.ajax({
                        method: "POST",
                        url: "dueno.php",
                        data: {
                            matricula: $('#vehicle').find("option:selected").attr('value')
                        }
                    })
                    .done(function(response) {
                        $("#owner").val(response);
                    })
        });

        $(document).ready(function() {
            $('#vehicle').change(function() {
                $.ajax({
                        method: "POST",
                        url: "dueno.php",
                        data: {
                            matricula: $(this).find("option:selected").attr('value')
                        }
                    })
                    .done(function(response) {
                        $("#owner").val(response);
                    })
            });
        });